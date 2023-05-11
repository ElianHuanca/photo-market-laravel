<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\FotoUsuarios;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function postFoto(Request $request){
        //return $request;
        if($request->has('fotos')){            
            foreach($request->file('fotos') as $file){
                $path = $file->store("{$request->idUser}prueba{$request->idEvento}", 's3');
                Storage::disk('s3')->url($path);
            }   
            return response()->json(['message' => 'Archivos Subidos con exito']);    
        }
        return response()->json(['message' => 'Error al subir el archivo']);
    }

    public function postFotoByFotografo(Request $request)
    {                
        if ($request->has('fotos')) {
            foreach($request->file('fotos') as $file){                
                $path = $file->store("Fotografo{$request->idUser}", 's3');    
                $url=Storage::disk('s3')->url($path);
                $foto = new Foto();
                $foto->url=$url;
                $foto->idUser=$request->idUser;
                $foto->save();
            }            
            return response()->json(['message' => 'Archivos Subidos con exito']);    
        } else {
            return response()->json(['message' => 'Error al subir el aarchivo']);
        }
    } 

    public function buyFotoUsuario($idUser,$idFoto){
        $fotoUser=FotoUsuarios::where('idFoto',$idFoto)->where('idUser',$idUser)->firstOrFail();
        $fotoUser->comprado=!$fotoUser->comprado;
        $fotoUser->save();
        $foto=Foto::where('id',$idFoto)->first();
        $foto->cantidad++;
        $foto->save();
        return $fotoUser;
    }


    public function getFotosCliente($idUser, $idEvento)
    {
        $fotos = DB::table('fotos')
            ->join('foto_usuarios', 'fotos.id', '=', 'foto_usuarios.idFoto')
            ->select('fotos.*','foto_usuarios.comprado')
            ->where('foto_usuarios.idUser',$idUser)
            ->where('fotos.idEvento',$idEvento)
            ->get();
        return $fotos;
    }

    public function getFotos($idUser,$idRol,$idEvento){
        if($idRol==3){            
            return DB::table('fotos')->where('idEvento',$idEvento)->get();            
        }else{            
            return DB::table('fotos')->where('idEvento',$idEvento)->where('idUser',$idUser)->get();        
        }
    }

    public function postFotoByEvento(Request $request){
        if(!DB::table('eventos')->where('id', $request->idEvento)->exists())
            return response()->json(['message' => 'No Existe el evento seleccionado'],404);
        if(!DB::table('users')->where('id', $request->idUser)->exists())
            return response()->json(['message' => 'No Existe el usuario'],404);        
        if ($request->has('fotos')) {            
            foreach($request->file('fotos') as $file){                
                $path = $file->store("evento{$request->idEvento}", 's3');
                $foto = new Foto();
                $foto->url = Storage::disk('s3')->url($path);
                $foto->precio=10;
                $foto->idEvento=$request->idEvento;
                $foto->idUser=$request->idUser;
                $foto->save();
                $users= $this->getParticipantesByEvento($request->idEvento);                
                foreach($users as $user){                    
                    if($this->compararFotos($user->url,$foto->url)){
                        $fotoUser=new FotoUsuarios();
                        $fotoUser->idUser=$user->id;
                        $fotoUser->idFoto=$foto->id;
                        $fotoUser->save();
                    }                    
                }            
            }
            return response()->json(['message' => 'Fotos subidos con éxito']);
        }
        return response()->json(['message' => 'problemas al subir las Fotos']);
    }

    public function getParticipantesByEvento($idEvento){
        $users = DB::table('users')
            ->join('participantes', 'users.id', '=', 'participantes.idUser')
            ->select('users.id','users.url')                        
            ->where('participantes.idEvento',$idEvento)
            ->where('users.idRol','1')
            ->get();
        return $users;        
    }
    //public function compararFotos(Request $request){
    public function compararFotos($url1,$url2){                    
            $img1=substr($url1,38,strlen($url1));
            $img2=substr($url2,38,strlen($url2));
            $client = new RekognitionClient([
                'region' => env('AWS_DEFAULT_REGION'),
                'version' => 'latest',
            ]);            
            $results = $client->compareFaces([
                'SimilarityThreshold' => 0,
                'SourceImage' => [
                    'S3Object' => [
                        'Bucket' => env('AWS_BUCKET'),//'sw1-proyects',
                        'Name' => $img1,
                    ],
                ],
                'TargetImage' => [
                    'S3Object' => [
                        'Bucket' => env('AWS_BUCKET'),//'sw1-proyects',
                        'Name' => $img2,
                    ],
                ],
            ]);
            $resultLabels = $results->get('FaceMatches');
            //return $resultLabels;
            return $resultLabels[0]['Similarity']>=51;
    }
    
}

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
    public function postFoto(Request $request)
    {
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store("prueba", 's3');
            $newContent=Storage::disk('s3')->url($path);
            return $newContent;            
        } else {
            return response()->json(['message' => 'Error al subir el aarchivo']);
        }
    } 

    public function putFotoUsuario(Request $request){
        $fotoUser=FotoUsuarios::where('idFoto',$request->idFoto)->where('idUser',$request->idUser)->firstOrFail();
        //return $fotoUser;
        $fotoUser->comprado=!$fotoUser->comprado;
        $fotoUser->save();
        return $fotoUser;
    }


    public function getFotos($idUser, $idEvento)
    {
        $fotos = DB::table('fotos')
            ->join('foto_usuarios', 'fotos.id', '=', 'foto_usuarios.idFoto')
            ->select('fotos.*','foto_usuarios.comprado')
            ->where('foto_usuarios.idUser',$idUser)
            ->where('fotos.idEvento',$idEvento)
            ->get();
        return $fotos;
    }

    public function sendFotosToEvent(Request $request){
        if(!DB::table('eventos')->where('id', $request->idEvento)->exists())
            return response()->json(['message' => 'No Existe el evento seleccionado'],404);
            if(!DB::table('users')->where('id', $request->idUser)->exists())
            return response()->json(['message' => 'No Existe el usuario'],404);
        //return $request;
        if ($request->has('files')) {
            foreach($request->file('files') as $file){
                $path = $file->store("prueba", 's3');
                $Foto = new Foto();
                $Foto->url = Storage::disk('s3')->url($path);
                $Foto->precio=10;
                $Foto->idEvento=$request->idEvento;
                $Foto->idUser=$request->idUser;
                $Foto->save();
                
            }
        }

        return response()->json(['message' => 'archivo subido con éxito']);
    }

    public function comparerImages(Request $request){
            $image1= substr($request->file1,37,strlen($request->file1));//https://pruebas3000.s3.amazonaws.com/prueba/Vl5dWUqgUtoRGHdANyDRkh3DtA8xBIYtSn0Ux6F8.jpg
            //return $image1;//image1=prueba/Vl5dWUqgUtoRGHdANyDRkh3DtA8xBIYtSn0Ux6F8.jpg
            $image2= substr($request->file2,37,strlen($request->file2));//        
            $client = new RekognitionClient([
                'region' => env('AWS_DEFAULT_REGION'),
                'version' => 'latest',
            ]);            
            $results = $client->compareFaces([
                'SimilarityThreshold' => 0,
                'SourceImage' => [
                    'S3Object' => [
                        'Bucket' => 'pruebas3000',
                        'Name' => $image1,
                    ],
                ],
                'TargetImage' => [
                    'S3Object' => [
                        'Bucket' => 'pruebas3000',
                        'Name' => $image2,
                    ],
                ],
            ]);
            $resultLabels = $results->get('FaceMatches');
            return $resultLabels;
           
    }

    public function subirFotos(Request $request)
    {
        return $request;
        $files = $request->file('files');

        if ($request->hasFile('files')) {
            foreach ($files as $file) {
                //$file->store('users/' . $this->user->id . '/messages');
            }
        }
    }
}

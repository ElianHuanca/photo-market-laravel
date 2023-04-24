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
    /* public function postImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store("1", 's3');
            $newContent = new Image();
            $newContent->url = Storage::disk('s3')->url($path);
            $newContent->save();
            return response()->json(['message' => 'archivo subido con éxito']);
        } else {
            return response()->json(['message' => 'Error al subir el aarchivo']);
        }
    } */

    public function putFotoUsuario(Request $request){
        $fotoUser=FotoUsuarios::where('idFoto',$request->idFoto)->where('idUser',$request->idUser)->firstOrFail();
        //return $fotoUser;
        $fotoUser->comprado=!$fotoUser->comprado;
        $fotoUser->save();
        return $fotoUser;
    }

    public function getFotos($idUser,$idEvento){
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
            $image1= substr($request->file1,38,strlen($request->file1));
            $image2= substr($request->file2,38,strlen($request->file2));
            $client = new RekognitionClient([
                'region' => env('AWS_DEFAULT_REGION'),
                'version' => 'latest',
            ]);
            /* $image = fopen($request->file('file')->getPathname(), 'r');
            $bytes = fread($image, $request->file('file')->getSize());
            $image1 = fopen($request->file('file1')->getPathname(), 'r');
            $bytes1 = fread($image1, $request->file('file1')->getSize()); */
            $results = $client->compareFaces([
                'SimilarityThreshold' => 0,
                'SourceImage' => [
                    'S3Object' => [
                        'Bucket' => 'sw1-proyects',
                        'Name' => $image1,
                    ],
                ],
                'TargetImage' => [
                    'S3Object' => [
                        'Bucket' => 'sw1-proyects',
                        'Name' => $image2,
                    ],
                ],
            ]);
            $resultLabels = $results->get('FaceMatches');
            return $resultLabels;
            return response()->json(['message' => 'no se detectaron etiquetas']);
        /* } else {
            return response()->json(['message' => 'Error al subir el archivo']);
        } */
    }
}

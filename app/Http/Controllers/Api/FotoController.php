<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Http\Request;


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
    

    public function getFotos($idUser){
        
    }
    public function comparerImages(Request $request){
        //return response()->json(['mensaje' => 'si llega al método de la petición']);

        if ($request->hasFile('file') && $request->hasFile('file1')) {
            $client = new RekognitionClient([
                'region' => env('AWS_DEFAULT_REGION'),
                'version' => 'latest',
            ]);

            $image = fopen($request->file('file')->getPathname(), 'r');
            $bytes = fread($image, $request->file('file')->getSize());

            $image1 = fopen($request->file('file1')->getPathname(), 'r');
            $bytes1 = fread($image1, $request->file('file1')->getSize());

            $results = $client->compareFaces([
                'SimilarityThreshold' => 0,
                'SourceImage' => [
                    'Bytes' => $bytes
                ],
                'TargetImage' => [
                    'Bytes' => $bytes1
                ],
            ]);
            //return $results;

            $resultLabels = $results->get('FaceMatches');
            return $resultLabels;
            return response()->json(['message' => 'no se detectaron etiquetas']);
        } else {
            return response()->json(['message' => 'Error al subir el archivo']);
        }
    
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\UserPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function postImage(Request $request)
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
    }
}

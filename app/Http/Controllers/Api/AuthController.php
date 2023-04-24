<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RolUsuario;
use App\Models\User;
use App\Models\UserPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if (!DB::table('users')->where('email', $request->email)->exists())
            return response()->json(['message' => 'No existe un usuario con ese email.'], 404);
        $user = User::where('email', $request->email)->firstOrFail();

        if (Hash::check($request->password, $user->password))
            return $user;
        else
            return response()->json(['message' => 'La contraseña es incorrecta.'], 404);
    }

    public function register(Request $request){
        
        $request->validate([
            'name'=> 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'foto' => 'required',
            'idRol' => 'required'
        ]);

        if (DB::table('users')->where('email', $request->email)->exists())
            return response()->json(['message' => 'Ya existe un usuario con ese email.'], 404);
        
        if ($request->hasFile('foto')) {
            $user = new User();
            $path = $request->file('foto')->store("user{$user->id}", 's3');        
            $user->url = Storage::disk('s3')->url($path);    
            $user->name=$request->name;        
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->idRol=$request->idRol;
            $user->save();
            //$newContent->save();
            return $user;
        } else {
            return response()->json(['message' => 'Error al registrarse']);
        }
    }

    /*public function userPhothos(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->firstOrFail();
        if ($request->hasFile('foto1') && $request->hasFile('foto2') && $request->hasFile('foto3')) {
            $userPhoto = new UserPhoto();
            $path = $request->file('foto1')->store("user{$user->id}", 's3');
            $userPhoto->url1 = Storage::disk('s3')->url($path);
            $path = $request->file('foto2')->store("user{$user->id}", 's3');
            $userPhoto->url2 = Storage::disk('s3')->url($path);
            $path = $request->file('foto3')->store("user{$user->id}", 's3');
            $userPhoto->url3 = Storage::disk('s3')->url($path);
            $userPhoto->idUser = $user->id;
            $userPhoto->save();
            return response()->json(['message' => 'archivo subido con éxito']);
        } else {
            return response()->json(['message' => 'Error al subir el aarchivo']);
        }
    }

    public function getUserByEmail($email)
    {
        return response()->json(['message' => 'No existe un usuario con ese email.']);
        if (!DB::table('users')->where('email', $email)->exists())
            return response()->json(['message' => 'No existe un usuario con ese email.'], 404);
        $user = User::where('email', $email)->firstOrFail();
        return $user;
    }*/
}

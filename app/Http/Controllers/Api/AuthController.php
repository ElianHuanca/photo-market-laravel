<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function getUser($email)
    {
        if (!DB::table('users')->where('email', $email)->exists())
            return response()->json(['message' => 'No existe un usuario con ese email.'], 404);
        $user = User::where('email', $email)->firstOrFail();
        return $user;
    }

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

    public function register(Request $request)
    {
        //return $request;
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'idRol' => 'required'
        ]);

        if (DB::table('users')->where('email', $request->email)->exists())
            return response()->json(['message' => 'Ya existe un usuario con ese email.'], 404);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->idRol = $request->idRol;
        $user->save();
        return $user;
    }

    public function userPhotho(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->firstOrFail();
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store("user{$user->id}", 's3');
            $user->url = Storage::disk('s3')->url($path);
            $user->save();
            return response()->json(['message' => 'archivo subido con éxito']);
        } else {
            return response()->json(['message' => 'Error al subir el aarchivo']);
        }
    }
}

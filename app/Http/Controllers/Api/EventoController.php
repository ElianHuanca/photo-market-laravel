<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    public function getEventoParticipante($idUser){
        $eventos = DB::table('eventos')
            ->join('participantes', 'eventos.id', '=', 'participantes.idEvento')
            ->select('eventos.*')
            ->where('participantes.idUser',$idUser)
            ->get();
        return $eventos;
    }

    public function getEventoOrganizador($idUser){
        $eventos = DB::table('eventos')->where('idUser', $idUser)->get();
        return $eventos;
    }

    public function participarEvento(Request $request){       
        if(DB::table("Participantes")->where('idUser', $request->idUser)->where('idEvento', $request->idEvento)->exists())
            return response()->json(['message' => 'El Usuario ya participa en el evento']);
        $participante = new Participante();
        $participante->idUser=$request->idUser;
        $participante->idEvento=$request->idEvento;
        $participante->save();
        return $participante;
    }

    public function postEvento(Request $request){
        /* $rol = DB::table('rol_usuarios')
        ->join('users', 'rol_usuarios.idUser', '=', 'users.id')
        ->select('rol_usuarios.idRol')
        ->where('users.id',$request->idUser)
        ->where('rol_usuarios.idRol',3)
        ->get(); */
        $user=DB::table('users')->where('id', $request->idUser)->first();
        if($user->idRol==3){            
            $request->validate([
                'titulo' => 'required|string',
                'descripcion' => 'required|string',
                'fecha' => 'required',
                'hora' => 'required',
                'lugar' => 'required|string',
                'idUser' => 'required',
            ]);
            $evento = new Evento();
            $evento->titulo=$request->titulo;
            $evento->descripcion=$request->descripcion;
            $evento->fecha=$request->fecha;
            $evento->hora=$request->hora;
            $evento->lugar=$request->lugar;        
            $evento->idUser=$request->idUser;
            $evento->save();
            return $evento;
        }
        return response()->json(['message' => 'El Usuario no es Organizador']);
    }
}

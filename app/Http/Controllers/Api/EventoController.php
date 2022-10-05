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

    public function getEventoFotografo($idUser){
        $eventos = DB::table('eventos')
            ->join('fotografos', 'eventos.id', '=', 'fotografos.idEvento')
            ->select('eventos.*')
            ->where('fotografos.idUser',$idUser)
            ->get();
        return $eventos;
    }

    public function getEventoOrganizador($idUser){
        $eventos = DB::table('eventos')->where('idUser', $idUser)->get();
        return $eventos;
    }

    public function postEvento(Request $request){
        $rol = DB::table('rol_usuarios')
        ->join('users', 'rol_usuarios.idUser', '=', 'users.id')
        ->select('rol_usuarios.idRol')
        ->where('users.id',$request->idUser)
        ->where('rol_usuarios.idRol',3)
        ->get();
        if($rol->isNotEmpty()){
            return response()->json(['message' => 'El Usuario es Organizador']);
            $request->validate([
                'titulo' => 'required|string',
                'descripcion' => 'required|string',
                'fecha' => 'required|date',
                'hora' => 'required|time',
                'lugar' => 'required|string',
                'idTipo' => 'required',
                'idUser' => 'required',
            ]);
            $evento = new Evento();
            $evento->titulo=$request->titulo;
            $evento->descripcion=$request->descripcion;
            $evento->fecha=$request->fecha;
            $evento->hora=$request->hora;
            $evento->lugar=$request->lugar;
            $evento->idTipo=$request->idTipo;
            $evento->idUser=$request->idUser;
            $evento->save();
            return $evento;
        }
        return response()->json(['message' => 'El Usuario no es Organizador']);
    }
}

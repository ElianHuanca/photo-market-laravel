<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use App\Models\Participante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    public function getEventoParticipante($idUser)
    {
        $eventos = DB::table('eventos')
            ->join('participantes', 'eventos.id', '=', 'participantes.idEvento')
            ->select('eventos.*')
            ->where('participantes.idUser', $idUser)
            ->get();
        return $eventos;
    }

    public function getEventoOrganizador($idUser)
    {
        $eventos = DB::table('eventos')->where('idUser', $idUser)->get();
        return $eventos;
    }

    public function participarEvento(Request $request)
    {
        if (DB::table("Participantes")->where('idUser', $request->idUser)->where('idEvento', $request->idEvento)->exists())
            return response()->json(['message' => 'El Usuario ya participa en el evento']);
        $participante = new Participante();
        $participante->idUser = $request->idUser;
        $participante->idEvento = $request->idEvento;
        $participante->save();
        return $participante;
    }

    public function getFotografos()
    {
        return DB::table("users")->select('users.id', 'users.name')->where('idRol', 2)->get();
    }

    public function postEvento(Request $request)
    {
        
        /*$url = "https://qrickit.com/api/qr.php?d=www.google.com.bo";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $path = $response('qr')->store("qr", 's3');
        $url1=Storage::disk('s3')->url($path);
        return $url1;*/

        $evento = new Evento();
        $evento->titulo = $request->titulo;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->lugar = $request->lugar;
        $evento->idUser = $request->idUser;
        $evento->save();
        foreach ($request->fotografos as $fotografo) {
            $participante = new Participante();
            $participante->idEvento = $evento->id;
            $participante->idUser = $fotografo;
            $participante->save();
        }
        return $evento;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Pergunta;
use App\Http\Requests\StorePerguntaRequest;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function show(Evento $evento)
    {
        // Carrega o evento e traz apenas as perguntas aprovadas/públicas, mantendo a relação de usuário
        $perguntas = $evento->perguntas()
            ->with('user')
            ->where('is_public', true)
            ->latest()
            ->paginate(10);
    
        return view('eventos.show', compact('evento', 'perguntas'));
    }
}

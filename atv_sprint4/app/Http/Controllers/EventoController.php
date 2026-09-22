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
        // Carrega as perguntas do evento com Eager Loading (with('user'))
        $perguntas = $evento->perguntas()
            ->with('user')
            ->latest() // Mantém a ordenação decrescente por data
            ->paginate(10); // Mantém a paginação de 10 em 10

        return view('eventos.show', compact('evento', 'perguntas'));
    }
}
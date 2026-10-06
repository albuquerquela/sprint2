<?php

namespace App\Http\Controllers;

use App\Models\Evento;

class EventoController extends Controller
{
    public function show(Evento $evento)
    {
        $evento->load(['perguntas' => function ($query) {
            $query->withCount('votos')
                  ->orderByDesc('votos_count');
        }]);

        return view('eventos.show', compact('evento'));
    }
}

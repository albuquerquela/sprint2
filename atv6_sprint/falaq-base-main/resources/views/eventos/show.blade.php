@foreach ($evento->perguntas as $pergunta)
    <div class="card mb-3 p-3">
        <p>{{ $pergunta->conteudo }}</p>

        <div class="d-flex align-items-center gap-2">
            <span>Votos: <strong>{{ $pergunta->votos_count }}</strong></span>

            @auth
                @php
                    $jaVotou = $pergunta->votos()->where('user_id', auth()->id())->exists();
                @endphp

                <form action="{{ route('perguntas.votar', $pergunta) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm {{ $jaVotou ? 'btn-success active' : 'btn-outline-secondary' }}">
                        {{ $jaVotou ? '👍 Votado (Clique para remover)' : '👍 Votar' }}
                    </button>
                </form>
            @endauth
        </div>
    </div>
@endforeach
use App\Http\Controllers\PerguntaController;

Route::post('/perguntas/{pergunta}/votar', [PerguntaController::class, 'votar'])
    ->middleware('auth')
    ->name('perguntas.votar');
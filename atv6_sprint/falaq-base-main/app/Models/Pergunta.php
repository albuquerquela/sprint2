<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pergunta extends Model
{
    public function votos(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'pergunta_user')->withTimestamps();
    }
}
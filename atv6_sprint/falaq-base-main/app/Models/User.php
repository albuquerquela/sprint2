<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    public function perguntasVotadas(): BelongsToMany
    {
        return $this->belongsToMany(Pergunta::class, 'pergunta_user')->withTimestamps();
    }
}
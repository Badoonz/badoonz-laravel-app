<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    public function chat()

    {

        return $this->hasMany(Chat_Participant::class);

    }
}

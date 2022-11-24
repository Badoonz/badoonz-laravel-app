<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function chat()
    {
        return $this->hasMany(ChatParticipant::class);
    }
}

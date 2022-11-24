<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat_Participant extends Model
{
    public function chat_participant()

    {

        return $this->belongsTo(Chat::class);

    }
}

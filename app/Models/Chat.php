<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Chat extends Model
{
    public function chatParticipant()
    {
        return $this->hasMany(ChatParticipant::class);
    }

    public static function registerChat($chat_id)
    {
        DB::table('chats')->insert([
            'chat_id' => $chat_id
        ]);
    }

}

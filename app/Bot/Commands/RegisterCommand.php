<?php

namespace App\Bot\Commands;

use App\Models\Chat;
use App\Models\Chat_Participant;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Illuminate\Support\Facades\DB;

class RegisterCommand extends Command
{

    protected $name = "register";

    protected $description = "Register Command to get you started";

    public function registerChat($chat_id)
    {
        DB::table('chats')->insert([
           'chat_id' => $chat_id
        ]);

        return $chat_id;
    }

    public function registerMember($participant_id, $first_name, $last_name, $chat_id)
    {
        DB::table('chat_participants')->insert([
            'participant_id' => $participant_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'chat_id' => $chat_id
        ]);
    }

    public function handle()
    {
        $telegramUpdate = $this->getUpdate();
        $telegramChat = $telegramUpdate->getChat();
        $telegramUser = $telegramUpdate->getMessage()->from;

        try {
            $chat = Chat::query()
                ->where('chat_id', '=', $telegramChat->id)
                ->get()
                ->first();

            if(!$chat)
                $this->registerChat($telegramChat->id);

                $this->registerMember(
                    $telegramUser->id,
                    $telegramUser->firstName,
                    $telegramUser->lastName,
                    $this->registerChat($telegramChat->id)
            );

            $this->replyWithMessage(['text' => 'Done']);
        } catch (\Exception $exception) {
            $this->replyWithMessage(['text' => "Oops... Something went wrong. {$exception->getMessage()}"]);
        }

}
}

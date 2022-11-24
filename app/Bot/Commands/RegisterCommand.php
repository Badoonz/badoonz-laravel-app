<?php

namespace App\Bot\Commands;

use App\Models\Chat;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class RegisterCommand extends Command
{

    protected $name = "register";

    protected $description = "Register Command to get you started";


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

            if(!$chat) {
                $chat = $this->randomCoffee->registerChat(
                    $telegramChat->id,
                    "Chat {$telegramChat->id}"
                );
            }

            $this->randomCoffee->registerMember(
                $telegramUser->id,
                "{$telegramUser->firstName} {$telegramUser->lastName}",
                $chat
            );

            $this->replyWithMessage(['text' => 'Done']);
        } catch (\Exception $exception) {
            $this->replyWithMessage(['text' => "Oops... Something went wrong. {$exception->getMessage()}"]);
        }

}}

<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangDetail;
use Illuminate\Http\Request;
use Telegram\Bot\FileUpload\InputFile;
use Illuminate\Support\Carbon;

use Telegram\Bot\Laravel\Facades\Telegram;
use GuzzleHttp\Client;
use Telegram\Bot\Api;
use App\Models\ChatId;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\WaitingList;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use App\Models\Pesanan;

class TelegramController extends Controller
{

    public function webhook(Request $request)
    {
        $data = $request->all();

        if (isset($data['message'])) {
            $message = $data['message'];

            // Dapatkan informasi pesan
            $chatId = $message['chat']['id'];
            if (isset($message['from']['username'])) {
                $username = $message['from']['username'];
            } else {
                $username = '-';
            }
            $text = $message['text'];

            if ($text === '/start') {
                $this->handleStart($chatId, $username);
            } else {
                $responseText = 'Maaf, saya tidak mengenali perintah tersebut.';
            }
            if (isset($responseText)) $this->sendTelegramMessage($chatId, $responseText);
        } elseif (isset($data['callback_query'])) {

            $this->handleCallbackQuery($data['callback_query']);
        }
        return response()->json(['status' => 'success']);
    }

    private function handleStart($chatId, $username)
    {
        $responseText = 'Halo '   . $username . '❤️❤️❤️❤️. Salam kenal ya. Aku adalah bot imut yang masih dalam tahap pengembangan. Tunggu kejutan selanjutnya dari bos saya ya. hehehe.';
        $this->sendTelegramMessage($chatId, $responseText);
        return response('Handling /help command');
    }

    private function sendTelegramMessage($chatId, $text)
    {
        $url = 'https://api.telegram.org/bot' . env('TELEGRAM_BOT_TOKEN') . '/sendMessage';
        $messageData = [
            'chat_id' => $chatId,
            'text' => $text,
        ];
        Telegram::sendMessage($messageData);
    }
}

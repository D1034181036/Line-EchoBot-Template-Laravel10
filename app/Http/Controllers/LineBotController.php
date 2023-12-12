<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp\Client;

class LineBotController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function echo(Request $request)
    {
        $replyToken = data_get($request, 'events.0.replyToken');
        $replyText = data_get($request, 'events.0.message.text');

        if ($replyToken && $replyText) {
            $this->replyMessage($replyToken, $replyText);
        }

        return response()->json(['status' => 'success']);
    }

    private function replyMessage(String $replyToken, String $replyText)
    {
        $requestBody = json_encode([
            'replyToken' => $replyToken,
            'messages' => [
                [
                    'type' => 'text',
                    'text' => $replyText,
                ]
            ],
        ]);

        return $this->client->request(
            'POST',
            'https://api.line.me/v2/bot/message/reply',
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . config('line-bot.channel_access_token'),
                ],
                'body' => $requestBody,
            ]
        );
    }
}

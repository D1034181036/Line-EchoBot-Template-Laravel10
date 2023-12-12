<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use LINE\Clients\MessagingApi\Model\TextMessage;
use LINE\Clients\MessagingApi\Model\ReplyMessageRequest;
use LINE\Laravel\Facades\LINEMessagingApi;

class LineBotSDKController extends Controller
{
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
        $message = new TextMessage([
            'type' => 'text',
            'text' => $replyText,
        ]);

        $request = new ReplyMessageRequest([
            'replyToken' => $replyToken,
            'messages' => [$message],
        ]);

        return LINEMessagingApi::replyMessage($request);
    }
}

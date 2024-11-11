<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use OpenAI;

class ChatbotController extends Controller
{
    public function index(Request $request)
    {
        return view('chatbot.index');
    }

    /**
     * chat
     *
     * @param  Request  $request
     */
    public function post(Request $request)
    {
        // バリデーション
        $request->validate([
            'sentence' => 'required',
        ]);

        // 画面で入力した質問
        $sentence = $request->input('sentence');

        // .env に設定したAPIキー
        // .env には OPENAI_API_KEY='' の形式でAPIキーを追加しておきます。
        $yourApiKey = getenv('OPENAI_API_KEY');
        $client = OpenAI::client($yourApiKey);
        // $client = OpenAI::factory()
        //         ->withApiKey($yourApiKey)
        //         ->withOrganization('')
        //         ->withHttpClient($client = new \GuzzleHttp\Client([])) // default: HTTP client found using PSR-18 HTTP Client Discovery
        //         ->make();

        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'max_tokens' => 300,
            'messages' => [
                ['role' => 'system', 'content' => '100文字程度で返答して'],
                ['role' => 'user', 'content' => $sentence],
            ],
        ]);

        $response_text = $response['choices'][0]['message']['content'];

        return view('chatbot.index', compact('sentence', 'response_text'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller,
    Session;

use OpenAI;

class QuestionnaireController extends Controller
{
    public function index(Reservation $reservation)
    {
        return view('questionnaire.index',compact('reservation'));
    }

    /**
     * chat
     *
     * @param  Request  $request
     */
    public function post(Request $request)
    {
        $userMessage = $request->input('message');
        $conversation = Session::get('conversation', []);
        $conversation[] = $userMessage;
        $apiKey = getenv('OPENAI_API_KEY');
        $client = OpenAI::client($apiKey);
        $summary = "";
        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'max_tokens' => 300,
            'messages' => [
                ['role' => 'system', 'content' => 'あなたは医者です。問診する患者が回答するので、2問質問してください。まとまり終わったら、問診票として表形式で要約して$summaryに要約した内容を入れてください'],
                ['role' => 'user', 'content' => $userMessage],
            ],
        ]);

        $conversation[] = $response['choices'][0]['message']['content'];

        Session::put('conversation', $conversation);

        return response()->json($response['choices'][0]['message']['content']);
    }
}

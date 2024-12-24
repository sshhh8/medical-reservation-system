<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Repositories\QuestionnaireRepository;
use App\Http\Controllers\Controller,
    Session;

use OpenAI;

class QuestionnaireController extends Controller
{
    public function __construct(QuestionnaireRepository $questionnaireRepository)
    {
        $this->Questionnaire = $questionnaireRepository;
    }

    public function index(Reservation $reservation)
    {
        return view('questionnaire.index',compact('reservation'));
    }

    /**
     * chat
     *
     * @param  Request  $request
     */
    public function post(Request $request, int $reservationId)
    {
        $userMessage = $request->input('message');
        $conversation = Session::get('conversation', []);
        $conversation[] = $userMessage;
        $apiKey = getenv('OPENAI_API_KEY');
        $client = OpenAI::client($apiKey);
        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'max_tokens' => 300,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => '簡単な問診票を作成します。患者が回答するので、症状をまとめてください。最後に「要約:」で始まる文章に書き出してください。'
                ],
                ['role' => 'user', 'content' => $userMessage],
            ],
        ]);
        $content = $response['choices'][0]['message']['content'];
        if (str_contains($content, '要約')) {
            $this->Questionnaire->createQuestionnaire($content, $reservationId);

            return response()->json("要約を作成しました。トップ画面に戻ってください。");
        }
        $conversation[] = $content;

        Session::put('conversation', $conversation);

        return response()->json($content);
    }
}

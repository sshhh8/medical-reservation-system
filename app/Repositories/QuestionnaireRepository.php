<?php

namespace App\Repositories;

use App\Models\questionnaire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class questionnaireRepository
{
    public function createQuestionnaire($content, $reservationId)
    {
        Questionnaire::create([
            'reservation_id' => $reservationId,
            'content' => $content,
            ]);
    }
}

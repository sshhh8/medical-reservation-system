<?php

namespace App\Repositories;

use App\Models\questionnaire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class questionnaireRepository
{
    public function createQuestionnaire($responseData, $reservationId)
    {
        Questionnaire::create([
            'reservation_id' => $reservationId,
            'content' => $responseData,
            ]);
    }
}

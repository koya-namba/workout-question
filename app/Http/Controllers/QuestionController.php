<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Question $question)
    {
        return view('questions.index', [
            'questions' => $question->get(),
        ]);
    }
}
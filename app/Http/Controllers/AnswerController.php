<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function create(Question $question)
    {
        return view('answers.create', ['question' => $question]);
    }
    
    public function store(Request $request, Question $question, Answer $answer)
    {
        $request->validate([
            'answer.context' => 'required|string|max:200'
        ]);
        
        $input_answer = $request['answer'];
        $input_answer['user_id'] = $request->user()->id;
        $input_answer['question_id'] = $question->id;

        $answer->fill($input_answer)->save();
        
        return redirect(route('questions.show', $question));
    }
    
    public function delete(Question $question, Answer $answer)
    {
        $answer->delete();
        return redirect(route('questions.show', $question));
    }
}

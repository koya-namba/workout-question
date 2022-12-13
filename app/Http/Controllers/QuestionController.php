<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index(Question $question)
    {
        return view('questions.index', [
            'questions' => $question->get(),
        ]);
    }
    
    public function create(Category $category)
    {
        return view('questions.create', ['categories' => $category->get()]);
    }
    
    public function store(Request $request, Question $question)
    {
        $request->validate([
            'question.title' => 'required|string|max:50',
            'question.context' => 'required|string|max:200'
        ]);
        
        
        $input_question = $request['question'];
        $input_categories = $request->categories_arr;
        
        $input_question['user_id'] = $request->user()->id;

        $question->fill($input_question)->save();
        $question->categories()->attach($input_categories);
        
        return redirect(route('questions.index'));
    }
    
    public function show(Question $question)
    {
        $answers = Answer::where('question_id', $question->id)->get();
        $answers->map(function ($answer) {
            $answer->favorites = DB::table('favorites')->where('answer_id', $answer->id)->count();
        });
        return view('questions.show', 
            ['question' => $question, 'answers' => $answers]
        );
    }
}

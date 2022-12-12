<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Category;
use Illuminate\Http\Request;

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
}

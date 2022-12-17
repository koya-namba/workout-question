<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function create(Question $question)
    {
        // 回答作成
        return view('answers.create', ['question' => $question]);
    }
    
    public function store(Request $request, Question $question, Answer $answer)
    {
        // 回答保存
        // バリデーション
        $request->validate([
            'answer.context' => 'required|string|max:200'
        ]);
        // 回答を取得
        $input_answer = $request['answer'];
        // 回答にユーザ情報を追加
        $input_answer['user_id'] = $request->user()->id;
        // 回答に質問情報を追加
        $input_answer['question_id'] = $question->id;
        // 回答を保存
        $answer->fill($input_answer)->save();
        
        return redirect(route('questions.show', $question));
    }
    
    public function delete(Question $question, Answer $answer)
    {
        // 回答削除
        $answer->delete();
        return redirect(route('questions.show', $question));
    }
    
    public function like(Question $question, Answer $answer)
    {
        $answer->users()->attach(Auth::id());
        return redirect(route('questions.show', $question));
    }
    
    public function unlike(Question $question, Answer $answer)
    {
        $answer->users()->detach(Auth::id());
        return redirect(route('questions.show', $question));
    }
}

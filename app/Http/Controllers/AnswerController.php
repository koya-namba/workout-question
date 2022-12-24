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
    
    public function delete(Request $request, Question $question, Answer $answer)
    {
        // 回答削除
        if($request->user()->id == $answer->user_id){
            $answer->delete();
            $status = 'true';
            $message = '削除に成功しました';
        }else{
            $status = 'false';
            $message = '削除に失敗しました';
        }
        
        return redirect(route('questions.show', $question))->with(['status'=>$status, 'message'=>$message]);
    }
    
    public function like(Question $question, Answer $answer)
    {
        // お気に入り登録
        // favoritesテーブルにデータがないことを確認
        if (!($answer->users()->where('user_id', Auth::id())->exists())){
            $answer->users()->attach(Auth::id());
        }
        
        return redirect(route('questions.show', $question));
    }
    
    public function unlike(Question $question, Answer $answer)
    {
        // お気に入り登録削除
        // favoritesテーブルにデータがあることを確認
        if ($answer->users()->where('user_id', Auth::id())->exists()){
            $answer->users()->detach(Auth::id());
        }
        
        return redirect(route('questions.show', $question));
    }
}

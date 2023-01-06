<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index(Request $request, Question $question, Category $category)
    {
        // 質問一覧
        // カテゴリー選択のための変数
        $category_id = 0;
        // カテゴリーが選択されている場合には，カテゴリーで質問一覧を取得
        if (isset($request->category_id)) {
            $category_id = $request->category_id;
            $question_collection = $question->whereHas('categories', function($q) use($category_id) {
                $q->where('category_question.category_id', $category_id);
            })->get();
        } else {
            $question_collection = $question->get();
        }
        $questions = $question->multi_training_period($question_collection);
        
        return view('questions.index', ['questions' => $questions, 'categories' => $category->get(), 'category_id' => $category_id]);
    }
    
    public function create(Category $category)
    {
        // 質問作成
        return view('questions.create', ['categories' => $category->get()]);
    }
    
    public function store(Request $request, Question $question)
    {
        // 質問保存
        // バリデーション
        $request->validate([
            'question.title' => 'required|string|max:50',
            'question.context' => 'required|string|max:200'
        ]);
        // 質問を取得
        $input_question = $request['question'];
        // 質問にユーザ情報を追加
        $input_question['user_id'] = $request->user()->id;
        // カテゴリーを取得
        $input_categories = $request->categories_arr;
        // 質問を保存
        $question->fill($input_question)->save();
        // 質問カテゴリを中間テーブルに保存
        $question->categories()->attach($input_categories);
        
        return redirect(route('questions.index'));
    }
    
    public function show(Question $question)
    {
        // 質問詳細ー回答一覧
        // トレーニング期間を計算し，取得
        $question = $question->training_period($question);
        // 質問に関連する回答を取得
        $answers = Answer::where('question_id', $question->id)->get();
        // 回答のお気に入り数とトレーニング期間を計算し，取得
        $answers = $answers->map(function ($answer) {
            $answer->favorites = DB::table('favorites')->where('answer_id', $answer->id)->count();
            $answer = $answer->training_period($answer);
            return $answer;
        });
        
        return view('questions.show', ['question' => $question, 'answers' => $answers]);
    }
    
    public function delete(Request $request, Question $question)
    {
        // 質問削除
        if($request->user()->id == $question->user_id){
            $question->delete();
            $status = 'true';
            $message = '削除に成功しました';
        }else{
            $status = 'false';
            $message = '削除に失敗しました';
        }
        
        return redirect(route('questions.index'))->with(['status'=>$status, 'message'=>$message]);
    }
    
    public function myquestions(Question $question)
    {
        // 自分の質問一覧
        // トレーニング期間を計算し，取得
        $myquestion_collection = $question->where('user_id', Auth::id())->get();
        $myquestions = $question->multi_training_period($myquestion_collection);
        
        return view('questions.myquestions', ['questions' => $myquestions]);
    }
}

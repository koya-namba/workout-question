<x-app-layout>
    <x-slot name="header">
        <!--戻るボタン-->
        <div class="py-2 px-4">
            <a href="{{ route('questions.index') }}" class="bg-transparent hover:bg-gray-100 text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">戻る</a>
        </div>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--登録可否のコメント-->
            @if (session('status') == 'true')
                <div class="mb-8 bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
                    <p>{{ session('message') }}</p>
                </div>
            @elseif (session('status') == 'false')
                <div class="mb-8 bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ session('message') }}</p>
                </div>
            @endif
            <!--質問詳細を表示-->
            <div class="mt-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between">
                            <div class="py-4">
                                <h1><span class="font-semibold">タイトル: </span>{{ $question->title }}</h1>
                            </div>
                            <!--削除ボタンの表示-->
                            @auth
                                @if($question->user_id === Auth::id())
                                    <div>
                                        <form action="{{ route('questions.delete', $question) }}" method="POST" id="form_question_{{ $question->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <div>
                                                <button type="button" onclick="deleteQuestion({{ $question->id }})" class="bg-transparent hover:bg-gray-100 text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
                                                    質問削除
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                        <div class="mt-2 mb-4">
                            <h3>
                                <span class="font-semibold">カテゴリー: </span>
                                @foreach($question->categories as $category)
                                    {{ $category->category_name }}
                                @endforeach
                            </h3>
                        </div>
                        <div class="mt-2 mb-4">
                            <h3><span class="font-semibold">質問者: </span>{{ $question->user->name }}</h3>
                        </div>
                        <div class="mt-2 mb-4">
                            <h3><span class="font-semibold">トレーニング歴: </span>{{ $question->training_period }}</h3>
                        </div>
                        <div class="mt-2 mb-4">
                            <h3><span class="font-semibold">質問日時: </span>{{ $question->created_at->format("Y/m/d H:i") }}</h3>
                        </div>
                        <div class="mt-4">
                            <h2 class="font-semibold">内容</h2>
                        </div>
                        <div class="mt-1">
                            <p>{{ $question->context }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between mt-6">
                <div class="py-2">
                    <h1 class="font-bold">回答一覧</h1>
                </div>
                <!--回答作成ボタン-->
                <div>
                    <a href="{{ route('answers.create', $question) }}" class="bg-transparent hover:bg-white text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
                        質問に回答
                    </a>
                </div>
            </div>
            <!--回答一覧を表示-->
            <div class="mt-2">
                @foreach($answers as $answer)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="flex justify-between">
                            <div class="py-2">
                                <h3><span class="font-semibold">回答者: </span>{{ $answer->user->name }}</h3>
                            </div>
                            @auth
                                <!--削除ボタンの表示-->
                                @if($answer->user_id === Auth::id())
                                <div>
                                    <form action="{{ route('answers.delete', [$question, $answer]) }}" method="POST" id="form_answer_{{ $answer->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <div>
                                            <button type="button" onclick="deleteAnswer({{ $answer->id }})" class="bg-transparent hover:bg-gray-100 text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
                                                回答削除
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            @endauth
                            </div>
                            <div class="mt-2 mb-4">
                                <h3><span class="font-semibold">トレーニング歴: </span>{{ $answer->training_period }}</h3>
                            </div>
                            <div class="mt-2 mb-4">
                                <h3><span class="font-semibold">回答日時: </span>{{ $answer->created_at->format("Y/m/d H:i") }}</h3>
                            </div>
                            <div class="mt-4">
                                <h2 class="font-semibold">内容</h2>
                            </div>
                            <div class="mt-1">
                                <p>{{ $answer->context }}</p>
                            </div>
                            <div class="mt-4 flex justify-start">
                                @auth
                                    <div>
                                        <!--お気に入り機能-->
                                        @if($answer->users()->where('user_id', Auth::id())->exists())
                                            <form action="{{ route('answers.unlike', [$question, $answer]) }}" method="POST">
                                                <!--お気に入りフォーム-->
                                                @csrf
                                                <button type="submit" class="bg-gray-100 hover:bg-gray-100 text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
                                                    参考になった
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('answers.like', [$question, $answer]) }}" method="POST">
                                                <!--お気に入りフォーム-->
                                                @csrf
                                                <button type="submit" class="bg-transparent hover:bg-transparent text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
                                                    参考になった
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endauth
                                @guest
                                    <div class="mt-2">
                                        <a  href="{{ route('login') }}" class="bg-transparent hover:transparent text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
                                            参考になった
                                        </a>
                                    </div>
                                @endguest
                                <div class="mt-2">
                                    <h1>{{ $answer->favorites }}件</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function deleteQuestion(id) {
            'use strict'
            
            if (confirm('本当に削除しますか？')) {
                document.getElementById(`form_question_${id}`).submit();
            }
        }
        
        function deleteAnswer(id) {
            'use strict'
            
            if (window.confirm('本当に削除しますか？')) {
                document.getElementById(`form_answer_${id}`).submit();
            }
        }
    </script>
</x-app-layout>

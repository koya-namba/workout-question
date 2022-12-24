<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Answer Create') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!--質問詳細を表示-->
                    <div class="mt-2">
                        <h1>質問タイトル: {{ $question->title }}</h1>
                    </div>
                    <div class="mt-2">
                        <h3>
                            カテゴリー: 
                            @foreach($question->categories as $category)
                                {{ $category->category_name }}
                            @endforeach
                        </h3>
                    </div>
                    <div class="mt-2">
                        <h3>質問者: {{ $question->user->name }}</h3>
                    </div>
                    <div class="mt-2">
                        <h3>トレーニング歴: </h3>
                    </div>
                    <div class="mt-2">
                        <h3>投稿日時: </h3>
                    </div>
                    <div class="mt-2">
                        <h2>質問内容</h2>
                    </div>
                    <div class="mt-1">
                        <p>{{ $question->context }}</p>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!--回答作成フォーム-->
                        <form action="{{ route('answers.store', $question) }}" method="POST">
                            @csrf
                            <div class="mt-2">
                                <h3>回答者:{{ Auth::user()->name }}</h3>
                            </div>
                            <div class="mt-2">
                                <h3>回答内容</h3>
                            </div>
                            <div class="mt-1">
                                <textarea name="answer[context]"></textarea>
                            </div>
                            @error('answer.context')
                                <div class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mt-4 flex">
                                <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">
                                    回答する
                                </button>
                                <div class="p-2">
                                    <a href="{{ route('questions.show', $question) }}" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">
                                        キャンセル
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

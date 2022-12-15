<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Question Show') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('questions.index') }}" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">
                戻る
            </a>
            <div class="mt-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
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
            </div>
            <div class="mt-8">
                <h1>回答一覧</h1>
            </div>
            <div class="mt-6">
                <a href="{{ route('answers.create', $question) }}" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">
                    質問に回答
                </a>
            </div>
            <div class="mt-6">
                @foreach($answers as $answer)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="mt-2">
                                <h3>回答者: {{ $answer->user->name }}</h3>
                            </div>
                            <div class="mt-2">
                                <h3>トレーニング歴: </h3>
                            </div>
                            <div class="mt-2">
                                <h3>投稿日時: </h3>
                            </div>
                            <div class="mt-2">
                                <h2>回答内容</h2>
                            </div>
                            <div class="mt-1">
                                <p>{{ $answer->context }}</p>
                            </div>
                            <div class="mt-4">
                                <a class="bg-blue-500 rounded font-medium px-4 py-2 text-white">
                                    参考になった: {{ $answer->favorites }}件
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Questions') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--質問一覧を表示-->
            <div class="mt-6">
                @foreach($questions as $question)
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
                                <h3>投稿日時: {{ $question->created_at }}</h3>
                            </div>
                            <div class="mt-2">
                                <h2>質問内容</h2>
                            </div>
                            <div class="mt-1">
                                <p>{{ $question->context }}</p>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('questions.show', $question) }}" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">
                                    回答をみる
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
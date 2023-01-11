<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-2 px-4">
                {{ __('自分の質問') }}
            </h2>
            <!--質問作成ボタン-->
            <a href="{{ route('questions.create') }}" class="bg-transparent hover:bg-gray-100 text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
                質問作成
            </a>
        </div>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--質問一覧を表示-->
            <div class="mt-6">
                @foreach($questions as $question)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="py-4">
                                <h1><span class="font-semibold">タイトル: </span>{{ $question->title }}</h1>
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
                            <div class="mt-4 flex justify-center">
                                <a href="{{ route('questions.show', $question) }}" class="bg-transparent hover:bg-gray-100 text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
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

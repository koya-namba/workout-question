<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-2 px-4">
            {{ __('回答作成') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!--質問詳細を表示-->
                    <div class="py-4">
                        <h1><span class="font-semibold">タイトル: </span>{{ $question->title }}</h1>
                    </div>
                    <div class="mt-2">
                        <h3>
                            <span class="font-semibold">カテゴリ: </span>
                            @foreach($question->categories as $category)
                                {{ $category->category_name }}
                            @endforeach
                        </h3>
                    </div>
                    <div class="mt-2">
                        <h3><span class="font-semibold">質問者: </span>{{ $question->user->name }}</h3>
                    </div>
                    <div class="mt-2">
                        <h3><span class="font-semibold">トレーニング歴: </span>{{ $question->training_period }}</h3>
                    </div>
                    <div class="mt-2">
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
            <div class="mt-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!--回答作成フォーム-->
                        <form action="{{ route('answers.store', $question) }}" method="POST">
                            @csrf
                            <div class="mt-2 mb-4">
                                <h3><span class="font-semibold">回答者: </span>{{ Auth::user()->name }}</h3>
                            </div>
                            <div class="mt-2">
                                <h3 class="font-semibold">回答内容</h3>
                            </div>
                            <div class="mt-1">
                                <textarea rows="4" name="answer[context]" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                            </div>
                            @error('answer.context')
                                <div class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mt-4 flex">
                                <button type="submit" class="bg-transparent hover:bg-gray-100 text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
                                    回答する
                                </button>
                                <div class="p-2">
                                    <a href="{{ route('questions.show', $question) }}" class="bg-transparent hover:bg-red-100 text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
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

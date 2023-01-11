<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight py-2 px-4">
            {{ __('質問作成') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!--質問回答フォーム-->
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="mt-2 mb-4">
                            <h1 class="mb-2 font-semibold">タイトル</h1>
                            <input type="text" name="question[title]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="タイトル">
                            @error('question.title')
                                <div class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-2 mb-4">
                            <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">カテゴリ</h3>
                            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @foreach($categories as $category)
                                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="{{ $category->id }}-checkbox-list" type="checkbox" value="{{ $category->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="{{ $category->id }}-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->category_name }}</label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mt-2 mb-4">
                            <h3><span class="font-semibold">質問者: </span>{{ Auth::user()->name }}</h3>
                        </div>
                        <div class="mt-2">
                            <h3 class="font-semibold">内容</h3>
                        </div>
                        <div class="mt-2">
                            <textarea rows="4" name="question[context]" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                            @error('question.context')
                                <div class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-4 flex">
                            <button type="submit" class="bg-transparent hover:bg-gray-100 text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
                                質問する
                            </button>
                            <div class="p-2">
                                <a href="{{ route('questions.index') }}" class="bg-transparent hover:bg-red-100 text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
                                    キャンセル
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

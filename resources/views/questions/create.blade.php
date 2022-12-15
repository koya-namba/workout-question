<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Question Create') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="mt-2">
                            <h1>質問タイトル</h1>
                            <textarea name="question[title]"></textarea>
                        </div>
                        <div class="mt-2">
                            <h3>カテゴリー</h3>
                            @foreach($categories as $category)
                                <input type="checkbox" value="{{ $category->id }}" name="categories_arr[]">
                                    {{ $category->category_name }}
                                </input>
                            @endforeach
                        </div>
                        <div class="mt-2">
                            <h3>質問者:{{ Auth::user()->name }}</h3>
                        </div>
                        <div class="mt-2">
                            <h3>質問内容</h3>
                        </div>
                        <div class="mt-2">
                            <textarea name="question[context]"></textarea><br />
                        </div>
                        <div class="mt-4 flex">
                            <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">
                                質問する
                            </button>
                            <div class="p-2">
                                <a href="{{ route('questions.index') }}" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">
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

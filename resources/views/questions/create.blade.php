<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <h1>質問題名</h1>
        <textarea name="question[title]"></textarea>
        <h3>カテゴリー</h3>
        @foreach($categories as $category)
            <input type="checkbox" value="{{ $category->id }}" name="categories_arr[]">
                {{ $category->category_name }}
            </input>
        @endforeach
        <h3>質問者:{{ Auth::user()->name }}</h3>
        <h3>質問内容</h3>
        <textarea name="question[context]"></textarea>
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('questions.index') }}">キャンセル</a>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>
    <h1>質問題名: {{ $question->title }}</h1>
    <h3>
        カテゴリー: 
            @foreach($question->categories as $category)
                {{ $category->category_name }}
            @endforeach
    </h3>
    <h3>質問者: {{ $question->user->name }}</h3>
    <h3>トレーニング歴: </h3>
    <h3>投稿日時: </h3>
    <h2>質問内容</h2>
    <p>{{ $question->context }}</p>
    <br />
    <form action="{{ route('answers.store', $question) }}" method="POST">
        @csrf
        <h3>質問者:{{ Auth::user()->name }}</h3>
        <h3>回答内容</h3>
        <textarea name="answer[context]"></textarea>
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('questions.show', $question) }}">キャンセル</a>
</x-app-layout>

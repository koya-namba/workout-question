<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show') }}
        </h2>
    </x-slot>
    <a href="{{ route('questions.index') }}">戻る</a>
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
    <h1>回答一覧</h1>
    @foreach($answers as $answer)
        <h3>回答者: {{ $answer->user->name }}</h3>
        <h3>トレーニング歴: </h3>
        <h3>投稿日時: </h3>
        <h2>回答内容</h2>
        <p>{{ $answer->context }}</p>
        <a>参考になった: {{ $answer->favorites }}件</a>
        <br />
    @endforeach
</x-app-layout>

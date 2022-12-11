<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Index') }}
        </h2>
    </x-slot>
    
    @foreach($questions as $question)
    <h1>質問題名: {{$question->title}}</h1>
    <h3>
        カテゴリー: 
            @foreach($question->categories as $category)
                {{ $category->category_name }}
            @endforeach
    </h3>
    <h3>質問者: {{$question->user->name}}</h3>
    <h3>トレーニング歴: </h3>
    <h3>投稿日時: </h3><br />
    <h2>質問内容</h2>
    <p>{{$question->context}}</p>
    @endforeach
</x-app-layout>

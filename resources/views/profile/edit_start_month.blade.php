<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('トレーニング開始月設定') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!--質問回答フォーム-->
                    <form action="{{ route('start_month.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <h1 class="mb-4">{{ $user_name }}さん，筋トレをいつから始めましたか?</h1>
                            <input type="month" name="profile[start_month]">
                            @error('profile.start_month')
                                <div class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-transparent hover:bg-gray-100 text-gray-800 font-semibold hover:text-gray-800 py-2 px-4 rounded">
                                登録する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-layout>
    @session('message')
        <h3>{{ $value }}</h3>
    @endsession


    <h1>
        welocm {{ Auth::user()->name }}
    </h1>

    <a href="{{ route('salla.store.auth', []) }}">ربط المتجر</a>

</x-layout>

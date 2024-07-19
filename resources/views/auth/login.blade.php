<x-layout>
    <form action="{{ route('session.store', []) }}" method="POST">
        @csrf
        @method('POST')

        <div>
            <input required type="email" name="email">
            @error('email')
                {{ $message }}
            @enderror
        </div>

        <div>
            <input required type="password" name="password">
            @error('password')
                {{ $message }}
            @enderror
        </div>

        <button type="submit">Login</button>
    </form>
</x-layout>

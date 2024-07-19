<x-layout>
    <form action="{{ route('register.store', []) }}" method="POST">
        @csrf
        @method('POST')
        <div>
            <input required type="text" name="name">
            @error('name')
                {{ $message }}
            @enderror
        </div>

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

        <button type="submit">register</button>
    </form>
</x-layout>

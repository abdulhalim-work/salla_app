<nav>
    <ul>
        @guest
            <li>
                <a href="{{ route('register') }}">Register</a>
            </li>

            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>
        @endguest

        @auth
            <li>
                <form action="{{ route('logout', []) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">logout</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>

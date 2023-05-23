<aside>
    <ul>
        <li><a href="#">ユーザ管理</a></li>
        <li><a href="{{ route('facility.top') }}">施設管理</a></li>
        <li><a href="#">管理者管理</a></li>
    </ul>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</aside>

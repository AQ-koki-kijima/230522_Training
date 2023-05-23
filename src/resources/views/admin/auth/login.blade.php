<!-- login.blade.php -->
<form action="{{ route('login.submit') }}" method="POST">
    @csrf

    @if($errors->has('login'))
        <div>{{ $errors->first('login') }}</div>
    @endif

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required autofocus>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>

    <button type="submit">Login</button>
</form>

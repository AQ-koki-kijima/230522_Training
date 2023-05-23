<!DOCTYPE html>
<html>
<head>
    <title>My Application</title>
</head>
<body>
<div style="display: flex;">
    @include('layout.menu')
    <main>
        @include('layout.header')
        <div>
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>

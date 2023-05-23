<!DOCTYPE html>
<html>
<head>
    <title>My Application</title>
</head>
<body>
<div style="display: flex;">
    @include('admin.layout.menu')
    <main>
        @include('admin.layout.header')
        <div>
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>

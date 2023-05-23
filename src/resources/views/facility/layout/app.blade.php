<!DOCTYPE html>
<html>
<head>
    <title>My Application</title>
</head>
<body>
<div style="display: flex;">
    @include('facility.layout.menu')
    <main>
        @include('facility.layout.header')
        <div>
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>

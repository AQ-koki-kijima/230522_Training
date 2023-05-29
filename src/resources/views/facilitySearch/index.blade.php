<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

</head>
<body class="antialiased">
施設検索
{{Form::open(['url' => '/search', 'method' => 'GET'])}}
<div>
    {{ Form::label('keyword', 'フリーワード') }}
    {{ Form::text('keyword', '' , ['class' => 'form-control']) }}
</div>
<div>
    {{ Form::label('category', 'カテゴリ') }}
    {{ Form::text('category', '' , ['class' => 'form-control']) }}
</div>
<div>
    {{ Form::label('location', 'エリア検索') }}
    {{ Form::text('location', '' , ['class' => 'form-control']) }}
</div>

{{Form::submit('送信', ['class'=>'btn btn-primary btn-block'])}}

{{Form::close()}}

@if ($facilities->count() > 0)
    @foreach($facilities as $index => $facilityData)
        <h2>施設ID: {{ $index }}</h2>
        <table>
            <tbody>
            @foreach($facilityData as $data)
                <tr>
                    <td>{{ $data->service_name }}</td>
                    <td>{{ $data->price }}円</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endforeach

@else
    <p>検索結果がありません。</p>
@endif

</body>
</html>

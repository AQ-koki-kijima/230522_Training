@extends('facility.layout.app')

@section('content')
    <head>
        <title>Facilities</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            
            th, td {
                border: 1px solid black;
                padding: 8px;
            }
            
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h1>Facilities</h1>
        <table>
            <thead>
                <tr>
                    <th>施設名</th>
                    <th>カテゴリ</th>
                    <th></th>
                    <th></th>
                </tr>
            @foreach ($facilities as $facility)
                <tr>
                    <td>{{ $facility->name }}</td>
                    <td>{{ $facility->description }}</td>
                    <td><a href="/example">編集</a></td>
                    <td><a href="{{ route('facility.delete', $facility->id) }}">削除</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </body>
@endsection
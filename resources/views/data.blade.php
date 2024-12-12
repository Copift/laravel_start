@extends('app')

@section('title', 'Данные')

@section('content')
<h1>Полученные данные</h1>

<table>
    <thead>
        <tr>
            <th>Тема</th>
            <th>Email</th>
            <th>Сообщение</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dataList as $item)
            <tr>
                <td>{{ $item['topic'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>{{ $item['message'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Нет данных</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

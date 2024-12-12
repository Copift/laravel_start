@extends('app')

@section('title', 'Форма')


@if (session()->has('success'))
<script type='text/javascript'>alert("Успешно добавлено");</script>
@endif

@section('content')
<h1><b>Форма</b></h1>
<br>


@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('form.submit') }}">
    @csrf

    <label for="topic">Тема:</label>
    <input type="text" id="topic" name="topic" value="{{ old('topic') }}" required>
    

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" required>


    <label for="message">Сообщение:</label>
    <input type="message" id="message" name="message" value="{{ old('name') }}" required>
    
    <button type="submit">Отправить</button>
</form>
@endsection
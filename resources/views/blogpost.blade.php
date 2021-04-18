@extends('layouts.app')
@section('content')
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif
    <br>
    <form action="{{ route('posts.update', $post['id']) }}" method="POST">
        @method('PUT') @csrf
        <input type="text" name="title" value="{{ $post['title'] }}"><br>

        <input class="btn btn-primary" type="submit" value="UPDATE">
    </form>

    <p style="font-size: 20px; margin-top: 15px">Darbuotojai: </p>
    @foreach ($post->comments as $comment)
        <p style="font-size: 20px">{{ $comment['text'] }}</p>
    @endforeach

    <form action="{{ route('posts.comments.store', $post['id']) }}" method="POST">
        @csrf
        <input type="text" name="text"><br>
        <input class="btn btn-primary" type="submit" value="Pridėti darbuotoją">
    </form>
@endsection

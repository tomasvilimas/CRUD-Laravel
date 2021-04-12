@extends('layouts.master')
@section('content')
    @foreach ($posts as $post)
        <h1>{{ $post['title'] }}</h1>
        <p>{{ $post['text'] }}</p>
    @endforeach



<form method="POST" action="/posts">
    @csrf
    <label for="title">Post title:</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="text">Post text:</label><br>
    <input type="text" id="text" name="text"><br><br>
    <input class="btn btn-primary" type="submit" value="Submit">
</form>
@endsection
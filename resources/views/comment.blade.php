@extends('layouts.app')
@section('content')
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif
    <br>
    <form action="{{ route('comments.update', $comment['id']) }}" method="POST">
        @method('PUT') @csrf
        <input type="text" name="text" value="{{ $comment['text'] }}"><br>

        <input class="btn btn-primary" type="submit" value="UPDATE">
    </form>
    @endsection

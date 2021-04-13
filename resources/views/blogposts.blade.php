@extends('layouts.master')
@section('content')



    {{-- @if ($errors->any())
  <div>
      @foreach ($errors->all() as $error)
          <p style="color: red">{{ $error }}</p>
      @endforeach
  </div>
@endif --}}



    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif
    <br>
    @foreach ($posts as $post)
        <h1>{{ $post['title'] }}</h1>
        <p>{{ $post['text'] }}</p>
        <p style="font-size: 10px">Comment count: {{ count($post->comments) }} 
            | <a href="{{ route('posts.show', $post['id']) }}">View post details and comment on it</a></p>


        {{-- <form action="{{ route('posts.destroy', $post['id']) }}" method="POST">
            @method('DELETE') @csrf
            <input class="btn btn-danger" type="submit" value="DELETE">
        </form>
        <form action="{{ route('posts.show', $post['id']) }}" method="GET">
            <input class="btn btn-primary" type="submit" value="UPDATE">
        </form> --}}
        <div class="btn-group" style="overflow: auto">
            <form style='float: left;' action="{{ route('posts.destroy', $post['id']) }}" method="POST">
                @method('DELETE') @csrf
                <input class="btn btn-danger" type="submit" value="DELETE"> 
            </form>
            &nbsp;
            <form style='float: left;' action="{{ route('posts.show', $post['id']) }}" method="GET">
                <input class="btn btn-primary" type="submit" value="UPDATE">
            </form>
        </div>


        <hr>
    @endforeach

    <br>

    <form method="POST" action="/posts">
        @csrf

        <label for="title">Post title:</label><br>
        @error('title')
            <div style="color: red">{{ $message }}</div>
        @enderror

        <input type="text" id="title" name="title"><br>
        //placeholder="Projekto pavadinimas" Required
        <label for="text">Post text:</label><br>
        @error('text')
            <div style="color: red">{{ $message }}</div>
        @enderror
        <input type="text" id="text" name="text"><br><br>
        <input class="btn btn-primary" type="submit" value="Submit">
    </form>
@endsection

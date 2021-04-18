@extends('layouts.app')
@section('content')


@if (session('status_success'))
<p style="color: green"><b>{{ session('status_success') }}</b></p>
@else
<p style="color: red"><b>{{ session('status_error') }}</b></p>
@endif
<br>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Darbuotojas</th>
            <th scope="col">Projekto pavadinimas</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
            <tr>
                <th>{{ $comment['id'] }}</th>
                <td>
                    {{ $comment['text'] }} 
                </td>
                <td>
                    {{ $comment->blogpost['title'] }}
                </td>
                <td>
                    @if (auth()->check())
                    
                    <div class="btn-group" style="overflow: auto">
                        {{-- @if (auth()->user()->id === $post['user_id']) --}}
                        <form style='float: left;' action="{{ route('comments.destroy', $comment['id']) }}" method="POST">
                            @method('DELETE') @csrf
                            <input class="btn btn-danger" type="submit" value="DELETE"> 
                        </form>
                        
                        {{-- &nbsp;
                        <form style='float: left;' action="{{ route('posts.show', $post['id']) }}" method="GET">
                            <input class="btn btn-primary" type="submit" value="UPDATE">
                        </form>
                        @endif
                        <td>
                        {{ $post['user']['name'] }} </p> --}}
                        </td>
                    </div>
                    @endif

                   
                   
                   
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<br>
    @if (auth()->check())
    <form method="POST" action="/comments">
        @csrf

        <label for="text"></label><br>
        @error('text')
            <div style="color: red">{{ $message }}</div>
        @enderror

        <input type="text" id="text" name="text" placeholder="Darbuotojo vardas" Required><br>
        
        
        <input class="btn btn-primary" type="submit" value="Pridėti projektą">
    </form>
    @endif
@endsection
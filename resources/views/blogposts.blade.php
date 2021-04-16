@extends('layouts.app')
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


<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Projekto pavadinimas</th>
            <th scope="col">Darbuotojai</th>
            <th scope="col">Actions</th>
            <th scope="col">Autorius</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post['id'] }}</th>
                <td>
                    {{ $post['title'] }}
                </td>
                <td>
                    
                    @foreach ($post->comments as $comment)
                        {{ $comment['text'] }}{{ $loop->last ? '' : ', ' }}
                    @endforeach
                    
                </td>
                <td>
                    @if (auth()->check())
                    
                    <div class="btn-group" style="overflow: auto">
                        @if (auth()->user()->id === $post['user_id'])
                        <form style='float: left;' action="{{ route('posts.destroy', $post['id']) }}" method="POST">
                            @method('DELETE') @csrf
                            <input class="btn btn-danger" type="submit" value="DELETE"> 
                        </form>
                        
                        &nbsp;
                        <form style='float: left;' action="{{ route('posts.show', $post['id']) }}" method="GET">
                            <input class="btn btn-primary" type="submit" value="UPDATE">
                        </form>
                        @endif
                        <td>
                        {{ $post['user']['name'] }} </p>
                        </td>
                    </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>











   
        
        
        {{-- <p style="font-size: 10px">Comment count: {{ count($post->comments) }} 
            | <a href="{{ route('posts.show', $post['id']) }}">View post details and comment on it</a></p> --}}
       


        {{-- <form action="{{ route('posts.destroy', $post['id']) }}" method="POST">
            @method('DELETE') @csrf
            <input class="btn btn-danger" type="submit" value="DELETE">
        </form>
        <form action="{{ route('posts.show', $post['id']) }}" method="GET">
            <input class="btn btn-primary" type="submit" value="UPDATE">
        </form> --}}
        {{-- @if (auth()->check())
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
        @endif --}}
    

        <hr>
   

    <br>
    @if (auth()->check())
    <form method="POST" action="/posts">
        @csrf

        <label for="title"></label><br>
        @error('title')
            <div style="color: red">{{ $message }}</div>
        @enderror

        <input type="text" id="title" name="title" placeholder="Projekto pavadinimas" Required><br>
        
        
        <input class="btn btn-primary" type="submit" value="Pridėti projektą">
    </form>
    @endif
@endsection

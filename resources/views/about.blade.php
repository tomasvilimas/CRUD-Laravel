@extends('layouts.master')
@section('content')


<p> Hello </p>

{{-- php single line code (multiline expressions do not work), like 2 == 2 ? "Equals" : "Does not equal" --}}
    <h1>{{ 3 == 2 ? "Equals" : "Does not equal" }}</h1>


  @endsection  
@extends('app')
@section('content')
<h1>People list</h1>
@if(count($people))
@foreach ($people as $person)
<li>{{ $person }}</li>
@endforeach
@endif
@stop
@extends('app')

@section('content')
   
   <h1>Edit {!! $article->title !!}</h1>
   <hr/>
   
   {!! Form::model($article,['method'=>'PATCH','url'=>'articles/'.$article->id]) !!}

      @include('articles.form', ['buttonText' => 'Update Article'])


   {!! Form::close() !!}

@stop
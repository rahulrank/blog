@extends('app')

@section('content')
    
    <h1>Write a new Article</h1>

    <hr/>

    {!! Form::model($article = new \myblog\Article, ['url'=>'articles']) !!}

      @include('articles.form', ['buttonText' => 'Add Article'])


    {!! Form::close() !!}


@stop
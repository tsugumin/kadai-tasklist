@extends('layouts.app')


@section('content')

<!-- Write content for each page here -->

<h1>タスク新規作成ページ</h1>

  


    {!! Form::model($tasklist, ['route' => 'tasklists.store']) !!}

        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::text('status') !!}

        
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('追加') !!}

    {!! Form::close() !!}


@endsection
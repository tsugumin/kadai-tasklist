@extends('layouts.app')

@extends('layouts.app')
@section('content')

<!-- Write content for each page here -->
<h1>id: {{ $tasklist->id }} のタスク編集ページ</h1>

 


    {!! Form::model($tasklist, ['route' => ['tasklists.update', $tasklist->id], 'method' => 'put']) !!}

        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::text('status') !!}
        
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('追加') !!}

    {!! Form::close() !!}
@endsection
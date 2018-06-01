@extends('layouts.app')

@section('content')

<!-- Write content for each page here -->



<h1>タスクリスト</h1>

    @if (count($tasklists) > 0)
        <ul>
            @foreach ($tasklists as $tasklist)
                <li>{!! link_to_route('tasklists.show', $tasklist->id, ['id' => $tasklist->id]) !!} :{{$tasklist->status}} .<tasklists class="show"></tasklists>{{ $tasklist->content }}</li>
            @endforeach
        </ul>
    @endif
    
     {!! link_to_route('tasklists.create', '新規タスクの追加') !!}
   
  @endsection
  
  <!--{!! link_to_route('tasklists.show', $tasklist->id, ['id' => $tasklist->id]) !!} : {{ $tasklist->content }} -->
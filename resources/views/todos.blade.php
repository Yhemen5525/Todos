@extends('layout')

@section('content')


    <div class="row">

        <div class="col-lg-6 col-lg-offset-3">
            
            <form action="/create/todo" method="post">

            <!--never forget your crsf field is a must  -->
            {{ csrf_field() }}
            
            <input type="text" class="form-control input-lg" name="todo" placeholder="Create a new todo">

            </form>

        </div>

    </div>

    <hr>

    @foreach($todos as $todo)

        {{$todo->todo}} <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger">x</a>
        <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-info btn-xs">update</a>
        @if (!$todo->completed)

        <a href="{{ route('todos.complete', ['id' => $todo->id]) }}" class="btn btn-success btn-xs">Mark as complete</a>
        
        @else

        <span class="text-success">Completed</span>

        @endif

        
        <hr>
    @endforeach
@stop
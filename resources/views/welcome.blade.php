@extends('layouts.main')

@section('title', 'ToDoApp - Arthur')

@section('content')
    <div class="shadow-lg tasksContainer rounded">
        @foreach ($tasks as $task)
            <div class="task">
                <div class="form-check rounded px-5 py-3 mb-0">
                    <form action="/mark/{{ $task->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($task->state == '1')
                            <input
                                style= "border-radius: 50%;
                                        background-color: #282a36;
                                        border: 1px solid rgba(128, 128, 128, 0.178)"
                                class="form-check-input"
                                type="checkbox"
                                checked
                                name="{{ $task->id }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                            <label style=" text-decoration: line-through; color:rgb(163, 163, 163)" class="form-check-label" for="flexRadioDefault1">
                                {{ $task->content }}
                            </label>
                            @else
                            <input
                            style= "border-radius: 50%;
                                    background-color: #282a36;
                                    border: 1px solid rgba(128, 128, 128, 0.178)"
                            class="form-check-input"
                            type="checkbox"
                            name="{{ $task->id }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ $task->content }}
                            </label>
                        @endif
                    </form>
                    <form action="/delete/{{ $task->id }}" method="POST">
                        <div class="d-inline closeBtn"  onclick="">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outlined" type="submit"><img src="./assets/icon-cross.svg" alt=""></button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
        <div class="bottomMenu mx-4 py-3 container">
            <p class="d-inline me-3">{{ $actives }} items restantes</p>

            @switch($order)
                @case(null)
                    <a class="offset-1 text-primary" href="/">Todos</a>
                    <a href="/?order=actives">Ativos</a>
                    <a href="/?order=concluded">Concluídos</a>
                    @break

                @case('actives')
                    <a class="offset-1" href="/">Todos</a>
                    <a href="/?order=actives" class="text-primary">Ativos</a>
                    <a href="/?order=concluded">Concluídos</a>
                    @break

                @case('concluded')
                    <a class="offset-1" href="/">Todos</a>
                    <a href="/?order=actives">Ativos</a>
                    <a href="/?order=concluded" class="text-primary">Concluídos</a>
                    @break
                @default
            @endswitch
        </div>
    </div>
    <form action="/deleteAll" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-outlined mt-2" style="margin: auto; width: 100%;"><small>Deletar Concluídos</small></button>
    </form>
@endsection

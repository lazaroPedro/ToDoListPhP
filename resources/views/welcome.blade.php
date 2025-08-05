@extends("layouts.default")

@section("content")
    @include("layouts.header")


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="w-100 d-flex justify-content-center m-5" >  
    @foreach($tasks as $task)
        


<ul class="list-group" style="width: 600px;">
    <li class="list-group-item d-flex align-items-start">
        <form action="{{route("tasks.update.status")}}" method="post" >
            @csrf
            <input type="hidden" name="id" value="{{ $task->id }}">
            <input type="hidden" name="checked" value="0">
            <input class="form-check-input me-3 mt-1" type="checkbox" value="1" id="task1" onchange="this.form.submit()" @checked($task->is_done) name="checked">
        </form>
        <div class="d-flex justify-content-between w-100 align-items-center">
        <div>
            <label for="task1" class="fw-bold">{{$task->title}}</label>
            <div class="text-muted small">{{$task->description}}</div>

            @php
                \Carbon\Carbon::setLocale('pt_BR');
    $dataFormatada = \Carbon\Carbon::parse($task->date_meta)
        ->translatedFormat('l, d\-m  \à\s H:i');
            @endphp

            <div class="text-muted small"> <i class="bi bi-clock"></i> {{ $dataFormatada}}</div>

        </div>
        <div>

            <form action="{{ route('tasks.delete') }}" method="POST" class="d-inline">
                @csrf
            
                <input type="hidden" name="id" value="{{ $task->id }}">
                
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-trash"></i> 
                </button>
            </form>
        </div>
            </div>

        
    </li>


        
    @endforeach
       </div> 
@endsection
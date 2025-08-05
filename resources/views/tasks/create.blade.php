@extends("layouts.default")

@section("content")
@include("layouts.header")
<div class="d-flex justify-content-center align-items-center min-vh-100" >
        <form class="card shadow-sm p-4" method="post" action="{{route("tasks.create.post")}}" style="width: 600px;">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Título..." name="title">
            </div>
            <div class="mb-3">
                <input type="datetime-local" class="form-control" name="datetime">
            </div>
            <div class="mb-3">
                <textarea class="form-control" rows="3" name="description" placeholder="Descrição..."></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">Salvar</button>
        </form>
    </div>
@endsection
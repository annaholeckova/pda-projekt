@extends('layout')

@section('content')
        @include('includes.status_alert')
        <div class="row">
            <div class="col-sm-6">
                <h1>{{ $agency->name }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <form action="/agencies/{{ $agency->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger">Odstrániť</button>
                </form>
            </div>
        </div>


    <form method="post" action="/agencies/{{ $agency->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="formGroupExampleInput">Meno agentúry</label>
            <input type="text" class="form-control" id="formGroupExampleInput" value="{{ $agency->name }}" name="name">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Kontakt</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" value="{{ $agency->contact }}" name="contact">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Upraviť</button>
        </div>
        @include('includes.form_error')
    </form>


@endsection
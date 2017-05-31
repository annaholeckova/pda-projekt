@extends('layout')

@section('content')
        @include('includes.status_alert')
        <div class="row">
            <div class="col-sm-6">
                <h1>{{ $skill->name }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <form action="/skills/{{ $skill->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger">Odstrániť</button>
                </form>
            </div>
        </div>


    <form method="post" action="/skills/{{ $skill->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="formGroupExampleInput">Názov zručnosti</label>
            <input type="text" class="form-control" id="formGroupExampleInput" value="{{ $skill->name }}" name="name">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Upraviť</button>
        </div>
        @include('includes.form_error')
    </form>


@endsection
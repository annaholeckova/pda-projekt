@extends('layout')

@section('content')
    @include('includes.status_alert')
    <div class="row">
        <div class="col-sm-6">
            <h1>Vytvorenie zručnosti</h1>
        </div>
    </div>


    <form method="post" action="/skills">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="formGroupExampleInput">Meno agentúry</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Názvo zručnosti">
        </div>
        <div class="form-group">
            <button class="btn btn-success">Vytvoriť</button>
        </div>
        @include('includes.form_error')
    </form>


@endsection
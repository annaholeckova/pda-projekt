@extends('layout')

@section('content')
    @include('includes.status_alert')
    <div class="row">
        <div class="col-sm-6">
            <h1>Vytvorenie študenta</h1>
        </div>
    </div>


    <form method="post" action="/students">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="formGroupExampleInput">Meno</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="first_name" placeholder="Meno">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Priezvisko</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="last_name" placeholder="Meno">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Email</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Preferovaný plat</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="preferred_rate" placeholder="Preferovaný plat">
        </div>
        <div class="form-group">
            <button class="btn btn-success">Vytvoriť</button>
        </div>
        @include('includes.form_error')
    </form>


@endsection
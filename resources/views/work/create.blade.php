@extends('layout')

@section('content')
    @include('includes.status_alert')
    <div class="row">
        <div class="col-sm-6">
            <h1>Vytvorenie brigády</h1>
        </div>
    </div>


    <form method="post" action="/works">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="formGroupExampleInput">Názov</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="title">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Popis</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Zamestnávateľ</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="employer">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Plat</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="pay">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Začiatok</label>
            <input type="datetime-local" class="form-control" id="formGroupExampleInput" name="starts_at">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Koniec</label>
            <input type="datetime-local" class="form-control" id="formGroupExampleInput" name="ends_at">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Agentúra</label>
            <select class="form-control" id="formGroupExampleInput" name="agency_id">
                @foreach($agencies as $agency)
                    <option value="{{ $agency->id }}">
                        {{ $agency->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Agentúrna provízia</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="agency_provision">
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="is_active" checked>
                Brigáda je aktívna
            </label>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Upraviť</button>
        </div>
        @include('includes.form_error')
    </form>
@endsection
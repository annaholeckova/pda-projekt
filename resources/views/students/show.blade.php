@extends('layout')

@section('content')
        @include('includes.status_alert')
        <div class="row">
            <div class="col-sm-6">
                <h1>{{ $student->first_name }} {{ $student->last_name }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <form action="/students/{{ $student->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger">Odstrániť</button>
                </form>
            </div>
        </div>


    <form method="post" action="/students/{{ $student->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="formGroupExampleInput">Meno</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="first_name" value="{{ $student->first_name }}" placeholder="Meno">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Priezvisko</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="last_name" placeholder="Meno" value="{{ $student->last_name }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Email</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="email" placeholder="Email" value="{{ $student->email }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Preferovaný plat</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="preferred_rate" placeholder="Preferovaný plat" value="{{ $student->preferred_rate }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Upraviť</button>
        </div>
        @include('includes.form_error')
    </form>
    <div class="row">
        <div class="col-md-12">
            <h1>Zručnosti</h1>
        </div>
        <div class="col-md-6">
            <h3>Pridať Zručnosť</h3>
            <form action="/students/{{ $student->id }}/skills" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control" id="formGroupExampleInput" name="skill_id">
                            @foreach($filteredSkills as $skill)
                                <option value="{{ $skill->id }}">
                                    {{ $skill->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary">
                            Pridať
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h3>Zoznam Zrucnosti</h3>
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach($student->skills as $skill)
                        <li class="list-group-item">
                            <div class="col-sm-6">
                                {{ $skill->name }}
                            </div>
                            <div class="col-sm-6 text-right">
                                <form action="/students/{{ $student->id }}/skills" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="skill_id" value="{{ $skill->id }}">
                                    <button class="btn btn-danger btn-sm">Odstrániť</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

@endsection
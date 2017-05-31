@extends('layout')

@section('content')
        @include('includes.status_alert')
        <div class="row">
            <div class="col-sm-6">
                <h1>{{ $work->title }}</h1>
            </div>
            <div class="col-sm-6 text-right">
                <form action="/works/{{ $work->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger">Odstrániť</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="/works/{{ $work->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Názov</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="title" value="{{ $work->title }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Popis</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $work->description }}</textarea>
                    </div>
                    <label for="formGroupExampleInput">Kategória</label>
                    <select class="form-control" id="formGroupExampleInput" name="work_category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $work->work_category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                    </select>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Zamestnávateľ</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="employer" value="{{ $work->employer }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Plat</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="pay" value="{{ $work->pay }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Začiatok</label>
                        <input type="datetime-local" class="form-control" id="formGroupExampleInput" name="starts_at" value="{{ $work->starts_at->format('Y-m-d\\Th:i') }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Koniec</label>
                        <input type="datetime-local" class="form-control" id="formGroupExampleInput" name="ends_at" value="{{ $work->ends_at->format('Y-m-d\\Th:i') }}">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Agentúra</label>
                        <select class="form-control" id="formGroupExampleInput" name="agency_id">
                            @foreach($agencies as $agency)
                                <option value="{{ $agency->id }}" @if($agency->id == $work->agency_id) selected @endif>
                                    {{ $agency->name }}
                                </option>
                            @endforeach
                        </select>
                        {{--<input type="datetime-local" class="form-control" id="formGroupExampleInput" name="start_at" value="{{ $work->ends_at->format('Y-m-d\\Th:i') }}">--}}
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Agentúrna provízia</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="agency_provision" value="{{ $work->agency_provision }}">
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="{{ $work->is_active }}" name="is_active"
                                @if($work->is_active) checked @endif
                            >
                            Brigáda je aktívna
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Upraviť</button>
                    </div>
                    @include('includes.form_error')
                </form>
            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>Študenti</h1>
        </div>
        <div class="col-md-6">
            <h3>Pridať študenta</h3>
            <form action="/works/{{ $work->id }}/students" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <select class="form-control" id="formGroupExampleInput" name="student_id">
                            @foreach($filteredStudents as $student)
                                <option value="{{ $student->id }}">
                                    {{ $student->first_name }} {{ $student->last_name }}
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
            <h3>Zoznam študnetov</h3>
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach($work->students as $student)
                        <li class="list-group-item">
                            <div class="col-sm-6">
                                {{ $student->first_name }} {{ $student->last_name }}
                            </div>
                            <div class="col-sm-6 text-right">
                                <form action="/works/{{ $work->id }}/students" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="student_id" value="{{ $student->id }}">
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
@extends('layout')

@section('content')
    @include('includes.status_alert')
    <div class="row">
        <div class="col-md-6">
            <h1>Agentúry</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="/works/create" class="btn btn-success">Pridať</a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#ID</td>
                    <td>Názov</td>
                    <td>Začiatok</td>
                    <td>Koniec</td>
                    <td>Plat</td>
                    <td>Zamestnávateľ</td>
                    <td>Kategória</td>
                    <td> </td>
                    <td> </td>
                </tr>
            </thead>
            <tbody>
                @foreach($works as $work)
                <tr>
                    <td>{{$work->id }}</td>
                    <td>{{$work->title }}</td>
                    <td>{{ $work->starts_at->format('d.m Y') }}</td>
                    <td>{{ $work->ends_at->format('d.m Y') }}</td>
                    <td>{{$work->pay }}</td>
                    <td>{{$work->employer }}</td>
                    <td>{{$work->work_category->name }}</td>
                    <td>
                        <form action="/works/{{ $work->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-sm">Odstrániť</button>
                        </form>
                    </td>
                    <td>
                        <a href="/works/{{ $work->id }}" class="btn btn-primary btn-sm">Editovať</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>Kategorie brigád</h1>
        </div>
        <div class="col-md-6">
            <h3>Pridať brigádu</h3>
            <form action="/works/categories" method="post">
                {{ csrf_field() }}
                <div class="row">

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" placeholder="Nazov">
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary">
                            Pridať
                        </button>
                    </div>
                    @include('includes.form_error')
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h3>Zoznam kategorií</h3>
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            <div class="col-sm-6">
                                {{ $category->name }}
                            </div>
                            <div class="col-sm-6 text-right">
                                <form action="/works/categories/{{ $category->id }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
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
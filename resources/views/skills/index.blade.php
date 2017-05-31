@extends('layout')

@section('content')
    @include('includes.status_alert')
    <div class="row">
        <div class="col-md-6">
            <h1>Zručnosti</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="/skills/create" class="btn btn-success">Pridať</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#ID</td>
                    <td>Zručnosť</td>
                    <td> </td>
                    <td> </td>
                </tr>
            </thead>
            <tbody>
                @foreach($skills as $skill)
                <tr>
                    <td>{{$skill->id }}</td>
                    <td>{{$skill->name }}</td>
                    <td>
                        <form action="/skills/{{ $skill->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-sm">Odstrániť</button>
                        </form>
                    </td>
                    <td>
                        <a href="/skills/{{ $skill->id }}" class="btn btn-primary btn-sm">Editovať</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
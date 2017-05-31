@extends('layout')

@section('content')
    @include('includes.status_alert')
    <div class="row">
        <div class="col-md-6">
            <h1>Agentúry</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="/agencies/create" class="btn btn-success">Pridať</a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#ID</td>
                    <td>Meno agentúry</td>
                    <td>Kontakt</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </thead>
            <tbody>
                @foreach($agencies as $agency)
                <tr>
                    <td>{{$agency->id }}</td>
                    <td>{{$agency->name }}</td>
                    <td>{{$agency->contact }}</td>
                    <td>
                        <form action="/agencies/{{ $agency->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-sm">Odstrániť</button>
                        </form>
                    </td>
                    <td>
                        <a href="/agencies/{{ $agency->id }}" class="btn btn-primary btn-sm">Editovať</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
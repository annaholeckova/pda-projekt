@extends('layout')

@section('content')
    @include('includes.status_alert')
    <div class="row">
        <div class="col-md-6">
            <h1>Studenti</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="/students/create" class="btn btn-success">Pridať</a>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#ID</td>
                    <td>Meno</td>
                    <td>Priezvisko</td>
                    <td>Email</td>
                    <td>Preferovaná výplata</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{$student->id }}</td>
                    <td>{{$student->first_name }}</td>
                    <td>{{$student->last_name }}</td>
                    <td>{{$student->email }}</td>
                    <td>{{$student->preferred_rate }}</td>
                    <td>
                        <form action="/students/{{ $student->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-sm">Odstrániť</button>
                        </form>
                    </td>
                    <td>
                        <a href="/students/{{ $student->id }}" class="btn btn-primary btn-sm">Editovať</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
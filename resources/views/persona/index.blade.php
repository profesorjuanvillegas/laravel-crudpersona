@extends('layouts.app')
@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif






    <a href=" {{ url('persona/create') }} " class="btn btn-success">Registrar nueva persona</a>
    <br><br>
    <table class="table table-light">

        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Sexo</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach( $personas as $persona )
            <tr>
                <td>{{ $persona->id }}</td>
                <td>{{ $persona->Nombre }}</td>
                <td>{{ $persona->Apellido }}</td>
                <td>{{ $persona->Sexo }}</td>
                <td>{{ $persona->Telefono }}</td>
                <td>
                    <a href="{{ url('/persona/'.$persona->id.'/edit') }}" class=" btn btn-warning">
                        Editar
                    </a>
                    |
                    <form action="{{ url('/persona/'.$persona->id) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE')}}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $personas->links() !!}
</div>
@endsection
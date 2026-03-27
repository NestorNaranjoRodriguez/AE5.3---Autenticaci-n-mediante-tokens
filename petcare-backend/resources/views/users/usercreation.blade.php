@extends('adminlte::page')


@section('title', 'Crear Usuario')


@section('content_header')
    <h1>Crear Usuario</h1>
@stop


@section('content')
    <form action="{{ route('users.create') }}" method="GET">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
@stop

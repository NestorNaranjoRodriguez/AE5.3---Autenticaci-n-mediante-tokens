@extends('adminlte::page')

@section('title', 'Gestión de usuarios')

@section('content_header')
    <h1>{{ __('users.list_title') }}</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">{{ __('users.new') }}</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('users.name') }}</th>
                <th>{{ __('users.email') }}</th>
                <th>{{ __('users.created_at') }}</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
                <tr>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $u->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Eliminar usuario?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@stop
@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content')
    <h1>{{ __('users.edit_title') }}</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>{{ __('users.name') }}</label>
            <input class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group">
            <label>{{ __('users.email') }}</label>
            <input class="form-control" name="email" type="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="form-group">
            <label>{{ __('users.password') }} ({{ __('users.leave_blank') }})</label>
            <input class="form-control" name="password" type="password">
        </div>
        <div class="form-group">
            <label>{{ __('users.password_confirmation') }}</label>
            <input class="form-control" name="password_confirmation" type="password">
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>
@stop
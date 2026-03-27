@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content')
    <h1>{{ __('users.create_title') }}</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>{{ __('users.name') }}</label>
            <input class="form-control" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label>{{ __('users.email') }}</label>
            <input class="form-control" name="email" type="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label>{{ __('users.password') }}</label>
            <input class="form-control" name="password" type="password" required>
        </div>
        <div class="form-group">
            <label>{{ __('users.password_confirmation') }}</label>
            <input class="form-control" name="password_confirmation" type="password" required>
        </div>
        <button class="btn btn-primary">Crear</button>
    </form>
@stop
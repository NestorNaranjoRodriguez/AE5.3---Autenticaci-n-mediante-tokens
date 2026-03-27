@extends('adminlte::page')

@section('title', 'Ver Usuario')

@section('content')
    <h1>{{ $user->name }}</h1>
    <p><strong>{{ __('users.email') }}:</strong> {{ $user->email }}</p>
    <p><strong>{{ __('users.created_at') }}:</strong> {{ $user->created_at }}</p>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Volver</a>
@stop
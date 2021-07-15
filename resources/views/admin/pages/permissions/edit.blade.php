@extends('adminlte::page')

@section('title', 'Cariri Food')

@section('content_header')
    <h1>Editar Permissão</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
                @method('PUT')
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>

@stop
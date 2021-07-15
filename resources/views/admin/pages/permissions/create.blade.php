@extends('adminlte::page')

@section('title', 'Cariri Food')

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=" {{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href=" {{ route('permissions.index') }}">Permissões</a></li>
        <li class="breadcrumb-item active"><a href=" {{ route('permissions.create') }}" class="active">Cadastrar Permissão</a></li>
    </ol>

    <h1>Cadastrar Permissão</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">
            <form action=" {{ route('permissions.store') }}" class="form" method="POST">
                
                @include('admin.pages.permissions._partials.form')

            </form>
        </div>
    </div>

@stop
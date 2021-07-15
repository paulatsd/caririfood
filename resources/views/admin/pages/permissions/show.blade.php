@extends('adminlte::page')

@section('title', "Permissão {$permission->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=" {{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href=" {{ route('permissions.index') }}">Permissões</a></li>
        <li class="breadcrumb-item"><a href=" {{ route('permissions.show', $permission->id) }}">{{ $permission->name }}</a></li>
    </ol>

    <h1>Detalhes da permissão <em> {{ $permission->name }} </em> </h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">
            <ul>
                <li>
                   <strong>Permissão:</strong> {{$permission->name}}
                </li>
            </ul>

            <ul>
                <li>
                   <strong>Descrição:</strong> {{ $permission->description }}
                </li>
            </ul>

            <form action=" {{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                    Excluir
                </button>
            </form>
            
        </div>

    </div>

@stop



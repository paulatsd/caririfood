@extends('adminlte::page')

@section('title', "Perfil {$profile->name}")

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=" {{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href=" {{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item"><a href=" {{ route('profiles.show', $profile->id) }}">{{ $profile->name }}</a></li>
    </ol>

    <h1>Detalhes do perfil <em> {{ $profile->name }} </em> </h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">
            <ul>
                <li>
                   <strong>Perfil:</strong> {{$profile->name}}
                </li>
            </ul>

            <ul>
                <li>
                   <strong>Descrição:</strong> {{ $profile->description }}
                </li>
            </ul>

            <form action=" {{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                    Excluir
                </button>
            </form>
            
        </div>

        {{-- <div class="card-footer"> --}}
            
        {{-- </div> --}}
    </div>

@stop



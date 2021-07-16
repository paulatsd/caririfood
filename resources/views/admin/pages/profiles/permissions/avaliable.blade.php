@extends('adminlte::page')

@section('title', 'Permissoes disponíveis')

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=" {{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href=" {{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item"><a href=" {{ route('profile.permissions', $profile->id) }}">Permissões do perfil</a></li>
        <li class="breadcrumb-item active"><a href=" {{ route('profile.permissions.available', $profile->id) }}">Add Permissão ao perfil</a></li>
    </ol>

    <h1>Permissões disponíveis para o perfil <strong>{{$profile->name}}</strong></h1>
@stop

@section('content')

    <div class="card">

        <div class="card-header">

            <form action=" {{ route('profiles.search') }}" method="post" class="form form-inline">
                @csrf

                <input type="text" name="filter" class="form-control" value=" {{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"> <i class="fas fa-search"></i></button>
                
            </form>

        </div>
    
        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table condensed">
                <thead>
                    <th width="50px">#</th>
                    <th>Nome</th>
                </thead>

                <tbody>
                    <form action="{{ route('profile.permissions.attach', $profile->id) }}" method="post">
                        @csrf

                        @foreach ($permissions as $permission)
                            <tr>
                                <td> 
                                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                                </td>
                                <td> {{ $permission->name }} </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="500">
                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer">

        @if (isset($filters))
            {!! $permissions->appends($filters)->links() !!}
        @else
            {!! $permissions->links() !!}    
        @endif
        
    </div>
@stop
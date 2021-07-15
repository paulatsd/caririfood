@extends('adminlte::page')

@section('title', 'Permissoes')

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=" {{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href=" {{ route('profiles.index') }}">Perfis</a></li>
    </ol>

    <h1>Permissões do perfil <strong>{{$profile->name}}</strong> 
        <a href=" {{ route('permissions.create') }}" class="btn btn-dark"> ADD NOVA PERMISSÃO</a>
    </h1>
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
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th width="250">Ações</th>
                </thead>

                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td> {{ $permission->name }} </td>
                            <td> 
                                {{ $permission->description }}
                            </td>
                            <td style="width=10px;">
                                <a href=" {{ route('profiles.show', $profile->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
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
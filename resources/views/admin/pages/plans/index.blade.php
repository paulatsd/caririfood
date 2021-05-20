@extends('adminlte::page')

@section('title', 'Planos Cariri Food')

@section('content_header')
    <h1>Planos <a href=" {{ route('plans.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')

    <div class="card">

        <div class="card-header">

            <form action=" {{ route('plans.search') }}" method="post" class="form form-inline">
                @csrf

                <input type="text" name="filter" class="form-control" value=" {{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Buscar</button>
                
            </form>

        </div>
    
        <div class="card-body">
            <table class="table table condensed">
                <thead>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th width="50">Ações</th>
                </thead>

                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td> {{ $plan->name }} </td>
                            <td> R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                            <td style="width=10px;">
                                <a href=" {{ route('plans.show', $plan->url) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer">

        @if (isset($filters))
            {!! $plans->appends($filters)->links() !!}
        @else
            {!! $plans->links() !!}    
        @endif
        
    </div>
@stop
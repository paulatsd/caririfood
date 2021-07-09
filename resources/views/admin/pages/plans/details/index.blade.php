@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name} ")

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=" {{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href=" {{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href=" {{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item active"><a href=" {{ route('details.plan.index', $plan->url) }}" class="active">Detalhes do plano</a></li>
    </ol>

    <h1>Detalhes do plano <em> {{ $plan->name }} </em> <a href=" {{ route('details.plan.create', $plan->url) }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">
            <table class="table table condensed">
                <thead>
                    <th>Nome</th>
                    <th width="150">Ações</th>
                </thead>

                <tbody>
                    @foreach ($details as $detail)

                        <tr>
                            <td> {{ $detail->name }} </td>
                            <td style="width=10px;">
                                <a href=" {{ route('plans.edit', $plan->url) }}" class="btn btn-info">Editar</a>
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
            {!! $details->appends($filters)->links() !!}
        @else
            {!! $details->links() !!}    
        @endif
        
    </div>
@stop



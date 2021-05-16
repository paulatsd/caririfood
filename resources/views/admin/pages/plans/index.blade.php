@extends('adminlte::page')

@section('title', 'Cariri Food')

@section('content_header')
    <h1>Planos</h1>
@stop

@section('content')
    <p>Listagens dos planos do Cariri Food.</p>

    <div class="card">

        <div class="card-header">
            #filtros
        </div>
    
        <div class="card-bory">
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
                            <td> R$ {{ $plan->price }}0</td>
                            <td style="width=10px;">
                                <a href="" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
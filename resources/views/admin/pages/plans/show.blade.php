@extends('adminlte::page')

@section('title', 'Cariri food')

@section('content_header')
    <h1>Detalhes do Plano</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            <ul>
                <li>
                   <strong>Nome:</strong> {{ $plan->name }}
                </li>
            </ul>

            <ul>
                <li>
                   <strong>Preço:</strong> R$ {{ number_format($plan->price, 2, ',', '.') }}
                </li>
            </ul>

            <ul>
                <li>
                   <strong>Descrição:</strong> {{ $plan->description }}
                </li>
            </ul>

            {{-- <a href=" {{ route('plans.index') }}" class="btn btn-dark"> Voltar </a> --}}

            <form action=" {{ route('plans.destroy', $plan->url) }}" method="post">
                @csrf
                @method("DELETE")

                <button type="submit" class="btn btn-danger">DELETAR {{ $plan->name }}</button>
            </form>


        </div>
    </div>

@stop
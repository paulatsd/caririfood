@extends('adminlte::page')

@section('title', 'Cariri Food')

@section('content_header')
    <h1>Cadastrar Planos</h1>
@stop

@section('content')

    <div class="card">

        <div class="card-body">
            <form action=" {{ route('plans.store') }}" class="form" method="POST">
                
                @csrf

                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nome">
                </div>

                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="text" name="price" id="price"  class="form-control" placeholder="R$ 0,00">
                </div>

                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Descrição">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>

            </form>
        </div>
    </div>

@stop
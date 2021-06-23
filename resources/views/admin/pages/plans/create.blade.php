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

                @include('admin.pages._partials.form')

            </form>
        </div>
    </div>

@stop
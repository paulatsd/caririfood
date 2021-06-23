@extends('adminlte::page')

@section('title', 'Cariri Food')

@section('content_header')
    <h1>Editar o plano <em> {{$plan->name}} </em></h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">
        <form action=" {{ route('plans.update', $plan->url) }}" class="form" method="POST">
            
            @csrf
            @method('PUT')

            @include('admin.pages._partials.form')

        </form>
    </div>
</div>
@stop
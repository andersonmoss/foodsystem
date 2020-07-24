@extends('adminlte::page')


@section('title', 'Cadastrar Novo Detalhe')


@section('content_header')
    <h1>Cadastrar Novo Detalhe ao plano <b>{{ $plan->name }}</b></h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
            
            <form action="{{route('plans.details.store', $plan->url)}}" class="form" method="POST">
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@endsection

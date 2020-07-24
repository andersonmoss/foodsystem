@extends('adminlte::page')


@section('title', 'Editar detalhe Plano')


@section('content_header')
    <h1>Editar detalhe Plano: <b>{{$detail->name}}</b></h1>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('plans.details.update', [$plan->url, $detail->id])}}" class="form" method="POST">
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@endsection

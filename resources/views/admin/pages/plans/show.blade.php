@extends('adminlte::page')


@section('title', 'Detalhes do plano')


@section('content_header')
    <h1>Detalhes do plano: <b>{{$plan->name}}</b></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$plan->name}}
                </li>
                <li>
                    <strong>URL: </strong> {{$plan->url}}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{ number_format($plan->price, 2, ',', '.')}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$plan->description}}
                </li>
            </ul>

            @include('admin.pages.includes.alerts')

            <form action="{{route('plans.destroy', $plan->url)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> | Deletar</button>
            </form>
        </div>
    </div>
@endsection

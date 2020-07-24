@extends('adminlte::page')


@section('title', 'Detalhes')


@section('content_header')
    <h1>Detalhes</b></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$detail->name}}
                </li>
            </ul>

            <form action="{{route('plans.details.destroy', [$plan->url,$detail->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> | Deletar</button>
            </form>
        </div>
    </div>
@endsection

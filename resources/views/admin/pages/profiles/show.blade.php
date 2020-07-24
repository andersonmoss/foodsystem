@extends('adminlte::page')


@section('title', 'Detalhes do Perfil')


@section('content_header')
    <h1>Detalhes do Perfil: <b>{{$profile->name}}</b></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$profile->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$profile->description}}
                </li>
            </ul>

            @include('admin.pages.includes.alerts')

            <form action="{{route('profiles.destroy', $profile->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> | Deletar</button>
            </form>
        </div>
    </div>
@endsection

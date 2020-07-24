@extends('adminlte::page')


@section('title', 'Editar Perfil')


@section('content_header')
    <h1>Editar Perfil: <b>{{$profile->name}}</b></h1>
@endsection


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('profiles.update', $profile->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@endsection

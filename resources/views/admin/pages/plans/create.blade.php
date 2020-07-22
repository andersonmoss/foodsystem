@extends('adminlte::page')


@section('title', 'Cadastrar Novo Plano')


@section('content_header')
    <h1>Cadastrar Novo Plano</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('plans.store')}}" class="form" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="text" name="price" id="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>

            </form>
        </div>
    </div>
@endsection

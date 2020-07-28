@extends('adminlte::page')


@section('title', 'Planos')


@section('content_header')
    <h1>Planos dos perfil: <b>{{$profile->name}}</b></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Planos incluídos</h3>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plansIn as $plan)
                        <tr>
                            <td>{{$plan->name}}</td>
                            <td>
                                <a href="{{route('profiles.plans.detach', [$profile->id, $plan->id])}}" class="btn btn-danger">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <h3>Planos disponíveis</h3>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plansOut as $plan)
                        <tr>
                            <td>{{$plan->name}}</td>
                            <td>
                                <a href="{{route('profiles.plans.attach', [$profile->id, $plan->id])}}" class="btn btn-success">Adicionar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

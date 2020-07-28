@extends('adminlte::page')


@section('title', 'Perfis')


@section('content_header')
    <h1>Perfis do plano: <b>{{$plan->name}}</b></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Perfis incluídos</h3>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profilesIn as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>
                            <td>
                                <a href="{{route('plans.profiles.detach', [$plan->id, $profile->id])}}" class="btn btn-danger">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <h3>Perfis disponíveis</h3>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profilesOut as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>
                            <td>
                                <a href="{{route('plans.profiles.attach', [$plan->id, $profile->id])}}" class="btn btn-success">Adicionar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

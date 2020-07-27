@extends('adminlte::page')


@section('title', 'Perfis com a permissão {{$permission->name}}')


@section('content_header')

    <h1>Perfis com a permissão: <b> {{$permission->name}}</b></h1>
    
@endsection

@section('content')
    <div class="card">
        
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>
                            <td>
                                <a class="btn btn-danger" href="{{route('profiles.permissions.detach', [$profile->id, $permission->id])}}">Desvincular</a>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

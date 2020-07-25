@extends('adminlte::page')


@section('title', 'Permissões do perfil {$profile->name}')


@section('content_header')
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
    </ol>

    <h1>Permissões do perfil <b> {{$profile->name}}</b> <a href="" class="btn btn-dark">ADD nova permissao</a> </h1>
    
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('profiles.search')}}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="name" placeholder="Nome" class="form-control" value="{{ $filters['name'] ?? ''}}">

                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->name}}</td>
                            <td>
                                <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!!$permissions->appends($filters)->links() !!}
            @else
                {!!$permissions->links() !!}
            @endif
        </div>
    </div>
@endsection

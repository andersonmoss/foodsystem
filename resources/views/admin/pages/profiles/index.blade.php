@extends('adminlte::page')


@section('title', 'Perfis')


@section('content_header')
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
    </ol>

    <h1>Dash <a href="{{route('profiles.create')}}" class="btn btn-dark">ADD</a> </h1>
    
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{$profile->name}}</td>
                            <td>
                                {{-- <a href="{{route('profiles.details.index', $profile->id)}}" class="btn btn-primary">Detalhes</a> --}}
                                <a href="{{route('profiles.edit', $profile->id)}}" class="btn btn-info">Editar</a>
                                <a href="{{route('profiles.show', $profile->id)}}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!!$profiles->appends($filters)->links() !!}
            @else
                {!!$profiles->links() !!}
            @endif
        </div>
    </div>
@endsection

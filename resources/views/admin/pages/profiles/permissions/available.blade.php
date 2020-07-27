@extends('adminlte::page')


@section('title', 'Permissões disponíveis para o perfil: {{$profile->name}}')


@section('content_header')
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
    </ol>

    <h1>Permissões disponíveis para <b> {{$profile->name}}</b></h1>
    
@endsection

@section('content')
    <div class="card">
        {{-- <div class="card-header">
            <form action="{{route('profiles.search')}}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="name" placeholder="Nome" class="form-control" value="{{ $filters['name'] ?? ''}}">

                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div> --}}
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('profiles.permissions.attach', $profile->id)}}" method="post">
                        @csrf
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                                </td>
                                <td>{{$permission->name}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                                @include('admin.pages.includes.alerts')
                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        {{-- <div class="card-footer">
            @if (isset($filters))
                {!!$permissions->appends($filters)->links() !!}
            @else
                {!!$permissions->links() !!}
            @endif
        </div> --}}
    </div>
@endsection

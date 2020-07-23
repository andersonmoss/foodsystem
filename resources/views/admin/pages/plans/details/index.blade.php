@extends('adminlte::page')


@section('title', 'Detalhes do plano {{ $plan->name }}')


@section('content_header')
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plan.details.index',  $plan->url)}}">Detalhes</a></li>
    </ol>

    <h1>Detalhes do plano <b>{{ $plan->name }}</b> <a href="{{route('plans.create')}}" class="btn btn-dark">ADD</a> </h1>
    
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{$plan->name}}</td>
                            
                            <td>
                                <a href="{{route('plans.edit', $plan->url)}}" class="btn btn-info">Editar</a>
                                <a href="{{route('plans.show', $plan->url)}}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!!$details->appends($filters)->links() !!}
            @else
                {!!$details->links() !!}
            @endif
        </div>
    </div>
@endsection

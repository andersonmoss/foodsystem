@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

@if(session('message'))
    <div class="alert alert-success">
        <p>{{session('message')}}</p>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        <p>{{session('error')}}</p>
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info">
        <p>{{session('info')}}</p>
    </div>
@endif
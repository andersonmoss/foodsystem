@include('admin.pages.includes.alerts')

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$plan->name ?? old('name')}}">
</div>

<div class="form-group">
    <label for="price">Preço:</label>
    <input type="text" name="price" id="price" class="form-control" value="{{number_format($plan->price ?? old('price'), 2, '.', ',')}}" >
</div>

<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$plan->description ?? old('description')}}</textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
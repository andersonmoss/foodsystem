@include('admin.pages.includes.alerts')
@csrf
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $detail->name ?? old('name') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Salvar</button>
</div>
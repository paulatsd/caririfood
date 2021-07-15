@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" placeholder="Nome da permissão" value="{{ $permission->name ??  old('name')}}" class="form-control">
</div>

<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" name="description" id="description" class="form-control" placeholder="Descrição" value="{{ $permission->description ?? old('description')}}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div> 
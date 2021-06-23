<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nome" value="{{$plan->name ?? ''}}">
</div>

<div class="form-group">
    <label for="price">Preço:</label>
    <input type="text" name="price" id="price"  class="form-control" placeholder="R$ 0,00" value="{{$plan->price ?? ''}}">
</div>

<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" name="description" id="description" class="form-control" placeholder="Descrição" value="{{$plan->description ?? ''}}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div> 
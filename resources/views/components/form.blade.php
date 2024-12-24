<form class="storeOrUpdateForm section" action="{{ route('notes.store') }}" method="POST">
    <h3>Criar conta</h3>

    @csrf
    <div class="field">
        <label for="title">Título</label>
        <input type="text" name="title" maxlength="255">
    </div>
    <div class="field">
        <label for="description">Descrição</label>
        <textarea name="description" cols="30" rows="10"></textarea>
    </div>
    <div class="field">
        <label for="categoryId">Categoria</label>
        <select name="categoryId">
            @foreach ($data['categories'] as $category)
                <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="options">
        <button type="submit">Save</button>
        <button class="cancelNote" type="button">Cancel</button>
    </div>
</form>
<x-layout>
    <div class="content">
        <div class="formGroup">
            <h3>Categorias</h3>
            <div class="item">
                <div class="entry">
                    <button class="store" type="button">New</button>
                </div>
                <!--Form de criação da categoria-->
                <form class="storeForm" action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" maxlength="255">
                    <div class="options">
                        <button type="submit">Save</button>
                        <button class="cancel" type="button">Cancel</button>
                    </div>
                </form>
            </div>
            @foreach ($categories as $category)
                <div class="item">
                    <!--Item da lista-->
                    <div class="entry">
                        <p>{{ $category->name }}</p>
                        <div class="options">
                            <button class="edit" type="button">Edit</button>
                            <form method="POST" action="{{ route('categories.destroy', $category) }}">
                                @csrf
                                @method('DELETE')
                                <button class="delete" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                    <!--Form de update da categoria-->
                    <form class="editForm" action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" maxlength="255" value="{{ $category->name }}">
                        <div class="options">
                            <button type="submit">Save</button>
                            <button class="cancel" type="button">Cancel</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>

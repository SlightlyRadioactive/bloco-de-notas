<div class="section noteList">
    <h3>Notas</h3>
    <div class="item">
        <div class="entry newEntry">
            <button class="storeOrUpdate" type="button">New</button>
        </div>
    </div>
    @foreach ($data['notes'] as $note)
        <div class="item">
            <!--Item da lista-->
            <div class="entry">
                <p class="note">{{ $note->title }}</p>
                <div class="options">
                    <form method="POST" action="{{ route('notes.destroy', $note) }}">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
<form action="{{ $href }}" method="POST" class="d-inline-block mx-2">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Smazat</button>
</form>

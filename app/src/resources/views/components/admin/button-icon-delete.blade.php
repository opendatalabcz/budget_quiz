<form action="{{ $href }}" method="POST" class="delete-button">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn"><i class="bi-trash text-danger"></i></button>
</form>

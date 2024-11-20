<form wire:submit="store">

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

 


    <div class="mb-4 text-center">
        <button type="submit" class="btn btn-primary">Add Pet</button>
    </div>
</form>
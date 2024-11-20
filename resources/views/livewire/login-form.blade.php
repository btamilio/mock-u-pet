<form wire:submit="login">

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
@endif

    <div class="form-floating mb-4">
        <input type="email" class="form-control" wire:model="email" value="{{ old('email') }}" required>
        <label for="email">Email Address</label>
    </div>
    <div class="form-floating mb-4">
        <input type="password" class="form-control"  wire:model="password"  required>
        <label for="password">Password</label>
    </div>


    <div class="mb-4 text-center">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</form>
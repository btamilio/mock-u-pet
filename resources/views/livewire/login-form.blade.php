<form wire:submit="login">
    <div class="form-floating mb-4">
        <input type="email" class="form-control" name="email" wire:model="email" value="{{ $email }}" required>
        <label for="email">Email Address</label>

    </div>
    <div class="form-floating mb-4">
        <input type="password" class="form-control" name="password" wire:model="password" value="" required>
        <label for="password">Password</label>

    </div>


    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="mb-4 text-center">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</form>
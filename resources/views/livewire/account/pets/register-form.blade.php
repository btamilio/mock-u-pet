<!-- Modal -->
<div class="modal modal-xl fade" id="addPetModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tell us about your pet...</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-8">

                <form wire:submit="store">


                    <div class="form-floating">
                        <input type="text" class="form-control" wire:model="name" value="{{ old('email') }}" required>
                        <label for="name">What is your pet's name?</label>
                    </div>

                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="btn-type" id="btn-type-cat" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-type-cat">Cat</label>

                        <input type="radio" class="btn-check" name="btn-type" id="btn-type-dog" autocomplete="off"
                            checked>
                        <label class="btn btn-outline-primary" for="btn-type-dog">Dog</label>

                    </div>




                    <div class="form-floating">
                        <label for="breeds" class="form-label">What's your pet's breed?</label>
                        <input class="form-control" list="breed-datalist" id="breeds" placeholder="Type to search...">
                        <datalist id="breed-datalist">
                            @foreach (($breeds ?? []) as $breed)
                                <option id="{{ $breed->id }}" data-type="{{ $breed->type }}">{{ $breed->name }}</option>
                            @endforeach
                        </datalist>

                    </div>

                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="btn-gender" id="btn-gender-f" autocomplete="off"
                            checked>
                        <label class="btn btn-outline-primary" for="btn-gender-f">Female</label>

                        <input type="radio" class="btn-check" name="btn-gender" id="btn-gender-m" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-gender-m">Male</label>

                    </div>

                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="btn-dob" id="btn-dob-y" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="btn-gender-f">Yes</label>

                        <input type="radio" class="btn-check" name="btn-dob" id="btn-dob-n" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-dob-n">No</label>

                    </div>



                </form>





            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary">Add Pet</button>
            </div>
        </div>
    </div>
</div>

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
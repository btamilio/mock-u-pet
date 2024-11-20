@include("common/header")
<main>
    <div class="row p-3">
        <div class="col text-start">
            <h2>{{ request()->user()->name }}'s' Pets</h2>
        </div>
        <div class="col text-end"> 
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Pet</button>
        </div>
    </div>


        <div class="row px-1">
            <div class="col ">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Name</th>
                            <th scope="col">Birthday</th>
                        </tr>
                    </thead>
                    <tbody  >
    @if (count($pets ?? []) == 0)
          <tr>
                                    <td colspan="3" class="text-center p-5">Rut-roh! No pets yet? Time to <u data-bs-toggle="modal" data-bs-target="#exampleModal">add some</u>.</td>

                                </tr>
    @else
                        @foreach ($pets as $pet) 
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach

    @endif
                    </tbody>
                </table>
            </div>
        </div>
 
@include("account.pets.add")
 
</main>


@include("common/footer")
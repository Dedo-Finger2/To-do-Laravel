<div wire:key='{{ $todo->id }}' class="container mt-4">
    <hr>
    <!-- Exemplo de uma task -->
    <div class="row bg-light rounded p-3 mb-2 align-items-center">
        <div class="col-9">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox">
                {{-- <input type="text"> --}}
                <label class="form-check-label" aria-describedby="checkBoxHelp"> {{ $todo->name }} </label>
                <div id="checkBoxHelp" class="form-text"> {{ $todo->description }} </div>
                <div id="checkBoxHelp" class="form-text"> {{ $todo->created_at }} </div>

                {{-- <button class="btn btn-success mt-1">Update</button>
                <button class="btn btn-danger mt-1">Cancelar</button> --}}
            </div>
        </div>
        <div class="col-3 text-right">
            <button class="btn btn-success mt-1">Editar</button>
            <button wire:click='deleteTask({{ $todo->id }})' class="btn btn-danger mt-1">Deletar</button>
        </div>
    </div>
</div>

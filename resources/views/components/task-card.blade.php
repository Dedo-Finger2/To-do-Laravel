<div wire:key='{{ $todo->id }}' class="container mt-4">
    <hr>
    <!-- Exemplo de uma task -->
    <div class="row bg-light rounded p-3 mb-2 align-items-center">
        <div class="col-9">
            <div class="form-check form-check-inline">
                @if ($todo->completed)
                    <input wire:click='toggleCheck({{ $todo->id }})' checked class="form-check-input" type="checkbox">
                @else
                    <input wire:click='toggleCheck({{ $todo->id }})' class="form-check-input" type="checkbox">
                @endif

                @if ($editingTodoId === $todo->id)
                    <input wire:model='editingTodoName' name="editingTodoName" type="text" class="form-control @error('editingTodoName') is-invalid @enderror">
                    @error('editingTodoName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                @else
                    <label class="form-check-label" aria-describedby="checkBoxHelp"> {{ $todo->name }} </label>
                @endif

                <div id="checkBoxHelp" class="form-text"> {{ $todo->created_at }} </div>

                @if ($editingTodoId === $todo->id)
                <button wire:click='updateTask' class="btn btn-success mt-1">Update</button>
                <button wire:click='cancelEdit' class="btn btn-danger mt-1">Cancelar</button>
                @endif
            </div>
        </div>
        <div class="col-3 text-right">
            <button wire:click='editTask({{ $todo->id }})' class="btn btn-success mt-1">Editar</button>
            <button wire:click='deleteTask({{ $todo->id }})' class="btn btn-danger mt-1">Deletar</button>
        </div>
    </div>
</div>

<form wire:submit.prevent='createTask'>
    <div class="mb-4">
        <label for="name" class="form-label">Nome</label>
        <input wire:model='name' name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="taskNameHlep">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <div id="taskNameHlep" class="form-text">Escolha um nome para sua task.</div>
    </div>

    <button type="submit" class="btn btn-primary">Adicionar task</button>
    @if(session('success'))
        <div class="">
            {{ session('success') }}
        </div>
    @endif
</form>

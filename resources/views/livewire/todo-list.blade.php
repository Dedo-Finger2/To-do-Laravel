<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                <h1>To do - Livewire</h1>
                <hr>
                @include('components.task-insert-box')
            </div>
            <div class="col-1">

            </div>
            <div class="col-8">
                <h1 class="text-center">Tasks</h1>
                <hr>
                @include('components.search-box')
                @if ($todos)
                    @foreach ($todos as $todo)
                        @include('components.task-card')
                    @endforeach
                    {{ $todos->links() }}
                @else
                    <h2 class="text-center mt-2">Nenhum resultado encontrado.</h2>
                @endif

            </div>
        </div>
    </div>
</div>

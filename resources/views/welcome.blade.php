<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To do - Livewire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
</head>

<body>
    @livewire('todo-list')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Delete modal --}}
    <script>
        window.addEventListener('deleteTaskEvent', event => {
            Swal.fire({
                title: 'Tem certeza?',
                text: "Não será possível reverter essa ação!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Deletar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteTaskConfirmation');
                }
            });
        });

        // Mensagem de "deletado"
        window.addEventListener('taskDeleted', event => {
            Swal.fire(
                'Deletado!',
                'Sua task foi deletada com sucesso.',
                'success'
            )
        });
    </script>
    @livewireScripts
</body>

</html>

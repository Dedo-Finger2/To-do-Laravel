<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To do - Livewire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
                <h1>To do - Livewire</h1>
                <hr>
                <form>
                    <div class="mb-4">
                        <label for="taskName" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="taskName" aria-describedby="taskNameHlep">
                        <div id="taskNameHlep" class="form-text">Escolha um nome para sua task.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar task</button>
                </form>
            </div>
            <div class="col-1">
                
            </div>
            <div class="col-8">
                <h1 class="text-center">Tasks</h1>
                <hr>
                <div class="container mt-4">
                    <!-- Exemplo de uma task -->
                    <div class="row bg-light rounded p-3 mb-2 align-items-center">
                        <div class="col-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label" aria-describedby="checkBoxHelp">Task name</label>
                                <div id="checkBoxHelp" class="form-text">Descrição.</div>
                            </div>
                        </div>
                        <div class="col-3 text-right">
                            <button class="btn btn-success mt-1">Editar</button>
                            <button class="btn btn-danger mt-1">Deletar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
</body>

</html>

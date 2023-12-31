<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name;
    public $deleteTodoId;
    protected $listeners = ['deleteTaskConfirmation'=>'deleteTask'];
    public $search;
    public $editingTodoId;
    public $editingTodoName;

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'editingTodoName' => 'required|min:3|max:50',
    ];

    protected $messages = [
        'name.required' => 'O campo nome é obrigatório.',
        'name.min' => 'O campo nome deve ter pelo menos 3 caracteres.',
        'name.max' => 'O campo nome não deve ter mais de 50 caracteres.',
        'editingTodoName.required' => 'O campo nome é obrigatório.',
        'editingTodoName.min' => 'O campo nome deve ter pelo menos 3 caracteres.',
        'editingTodoName.max' => 'O campo nome não deve ter mais de 50 caracteres.',
    ];

    public function createTask()
    {
        // Validação apenas
        $validData = $this->validateOnly('name');
        // Criar tarefa
        Todo::create($validData);
        // Limpar o input
        $this->reset('name');
        $this->reset('description');
        // Feedback
        session()->flash('success', 'Tarefa criada com sucesso!');
        // Volta para a página 1
        $this->resetPage();
    }

    public function toggleCheck(Todo $todo)
    {
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function editTask(Todo $todo)
    {
        $this->editingTodoId = $todo->id;
        $this->editingTodoName = $todo->name;
    }

    public function cancelEdit()
    {
        $this->reset('editingTodoId', 'editingTodoName');
    }

    public function updateTask()
    {
        $this->validateOnly('editingTodoName');
        Todo::find($this->editingTodoId)->update([
            'name' => $this->editingTodoName
        ]);

        $this->cancelEdit();
    }

    public function deleteTask()
    {
        $task = Todo::find($this->deleteTodoId);
        $task->delete();

        $this->dispatchBrowserEvent('taskDeleted');
    }

    public function deleteTaskConfirmation(Todo $todo)
    {
        $this->deleteTodoId = $todo->id;
        $this->dispatchBrowserEvent('deleteTaskEvent');
    }

    public function render()
    {
        $results = Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(4);

        return view('livewire.todo-list', [
            'todos' => $results->isEmpty() ? null : $results
        ]);
    }

}

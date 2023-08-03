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
    public $description;
    public $search;

    protected $rules = [
        'name' => 'required|min:3|max:50',
    ];

    protected $messages = [
        'name.required' => 'O campo nome é obrigatório.',
        'name.min' => 'O campo nome deve ter pelo menos 3 caracteres.',
        'name.max' => 'O campo nome não deve ter mais de 50 caracteres.',
    ];

    public function createTask()
    {
        // Validação apenas
        $validData = $this->validate();
        // Criar tarefa
        Todo::create($validData);
        // Limpar o input
        $this->reset('name');
        $this->reset('description');
        // Feedback
        session()->flash('success', 'Tarefa criada com sucesso!');
    }

    public function toggleCheck(Todo $todo)
    {
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function deleteTask(Todo $todo)
    {
        $todo->delete();
    }

    public function render()
    {
        return view('livewire.todo-list',[
            'todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(4)
        ]);
    }
}

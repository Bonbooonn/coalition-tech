<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\Tasks\TaskForm;
use App\Models\Project;
use App\Models\Task;
use Livewire\Attributes\Computed;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateTask extends Component
{
    use Actions;

    public TaskForm $form;

    public ?Task $task;

    public string $action = 'save';

    public function save()
    {
        if ($this->form->store()) {
            $this->notification()->success(
                title: 'Task Created Successfully',
            );
        } else {
            $this->notification()->error(
                title: 'Task Creation Failed',
            );
        }
    }

    public function update()
    {
        if ($this->form->update()) {
            $this->notification()->success(
                title: 'Task Updated Successfully',
            );
        } else {
            $this->notification()->error(
                title: 'Task Update Failed',
            );
        }
    }

    #[Computed()]
    public function projects()
    {
        return Project::query()
            ->select('id', 'name')
            ->get();
    }

    public function mount()
    {
        if (!empty($this->task)) {
            $this->form->fill($this->task->toArray());
            $this->form->task = $this->task;
            $this->action = 'update';
        }
    }

    public function render()
    {
        return view('livewire.tasks.create-task');
    }
}

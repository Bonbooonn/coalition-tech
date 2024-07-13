<?php

namespace App\Livewire\Forms\Tasks;

use App\Models\Task;
use Illuminate\Validation\Rule;
use Livewire\Form;

class TaskForm extends Form
{
    public string $name;

    public int $project_id;

    public int $priority;

    public Task $task;

    public function rules()
    {
        $taskId = isset($this->task->id) ? $this->task->id : null;

        return [
            'name' => 'required',
            'project_id' => 'required',
            'priority' => [
                'required',
                Rule::unique('tasks')->ignore($taskId),
            ],
        ];
    }

    public function store()
    {
        $this->validate();

        $record = Task::create($this->only(
            'name',
            'project_id',
            'priority',
        ));

        if ($record) {
            return true;
        }

        return false;
    }

    public function update()
    {
        $this->validate();

        $record = $this->task->update($this->only(
            'name',
            'project_id',
            'priority',
        ));

        if ($record) {
            return true;
        }

        return false;
    }
}

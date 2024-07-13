<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;
use Livewire\Attributes\On; 

class ShowTasks extends Component
{
    use WithPagination;
    use Actions;

    public function moveUp(Task $task)
    {
        $nextPriority = $task->priority;
        $priority = $task->priority - 1;

        $nextTask = Task::query()
            ->where('priority', $priority)
            ->first();

        if ($nextTask) {
            $nextTask->update([
                'priority' => $nextPriority,
            ]);
        }

        $task->update([
            'priority' => $priority,
        ]);
    }

    public function moveDown(Task $task)
    {
        $nextPriority = $task->priority;
        $priority = $task->priority + 1;

        $nextTask = Task::query()
            ->where('priority', $priority)
            ->first();

        if ($nextTask) {
            $nextTask->update([
                'priority' => $nextPriority,
            ]);
        }

        $task->update([
            'priority' => $priority,
        ]);
    }

    #[On('updateTaskOrder')]
    public function updateTaskOrder($tasks)
    {        
        foreach ($tasks as $task) {
            Task::query()
                ->where('id', $task['id'])
                ->update([
                    'priority' => $task['priority'],
                ]);
        }
    }

    public function confirmDelete(Task $task)
    {
        $this->dialog()->confirm([
            'title' => 'Are you sure you want to delete this task?',
            'description' => 'This action is irreversible.',
            'icon' => 'question',
            'accept' => [
                'label' => 'Yes',
                'method' => 'deleteTask',
                'params' => $task,
            ],
            'reject' => [
                'label' => 'No, cancel',
            ],
        ]);
    }

    public function deleteTask(Task $task)
    {
        $task->delete();
        Task::resetPriorities();

        $this->notification()->success(
            title: 'Task Deleted Successfully',
        );
    }

    #[Computed()]
    public function tasks()
    {
        return Task::query()
            ->with('project')
            ->orderBy('priority', 'asc')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.tasks.show-tasks');
    }
}

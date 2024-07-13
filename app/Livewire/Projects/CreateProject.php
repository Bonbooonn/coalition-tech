<?php

namespace App\Livewire\Projects;

use App\Livewire\Forms\Project\ProjectForm;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateProject extends Component
{
    use Actions;

    public ProjectForm $form;

    public function store()
    {
        $isSaved = $this->form->save();

        if ($isSaved) {
            $this->notification()->success(
                title: 'Project Created Successfully',
            );
        } else {
            $this->notification()->error(
                title: 'Project Creation Failed',
            );
        }
    }

    public function render()
    {
        return view('livewire.project.create-project');
    }
}

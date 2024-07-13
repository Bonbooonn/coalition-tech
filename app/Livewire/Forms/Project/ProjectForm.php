<?php

namespace App\Livewire\Forms\Project;

use App\Models\Project;
use Livewire\Form;

class ProjectForm extends Form
{
    public string $name = '';

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
        ];
    }

    public function save()
    {
        $this->validate();

        $project = Project::create([
            'name' => $this->name,
        ]);

        $this->reset();

        return $project;
    }
}

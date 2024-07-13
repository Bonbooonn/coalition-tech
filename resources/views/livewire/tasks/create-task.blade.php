<div class="mx-auto mt-10 w-1/2">

    <form wire:submit="{{ $action }}">
        <!-- Task Name -->
        <div>
            <x-input-label
                for="task_name"
                :value="__('Task Name')"
            />
            <x-text-input
                id="task_name"
                class="mt-1 block w-full"
                type="text"
                wire:model="form.name"
            />

            <x-input-error
                :messages="$errors->get('form.name')"
                class="mt-2"
            />
        </div>

        <div class="mt-2">
            <x-input-label
                for="email"
                :value="__('Project')"
            />

            <x-select
                wire:model="form.project_id"
                :options="$this->projects"
                option-value="id"
                option-label="name"
                class="mt-1 block w-full"
            />

            {{-- <x-text-input
                id="email"
                class="mt-1 block w-full"
                type="text"
                wire:model="form.name"
            /> --}}

            <x-input-error
                :messages="$errors->get('form.project_id')"
                class="mt-2"
            />
        </div>

        <div class="mt-2">
            <x-input-label
                for="priority"
                :value="__('Priority')"
            />
            <x-text-input
                id="priority"
                class="mt-1 block w-full"
                type="number"
                wire:model="form.priority"
            />

            <x-input-error
                :messages="$errors->get('form.priority')"
                class="mt-2"
            />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <x-primary-button class="ms-3">
                {{ __($action) }}
            </x-primary-button>
        </div>
    </form>
</div>

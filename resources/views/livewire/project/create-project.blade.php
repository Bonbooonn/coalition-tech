<div class="mx-auto mt-10 w-1/2">

    <form wire:submit="store">
        <!-- Email Address -->
        <div>
            <x-input-label
                for="email"
                :value="__('Project Name')"
            />
            <x-text-input
                id="email"
                class="mt-1 block w-full"
                type="text"
                wire:model="form.name"
            />

            <x-input-error
                :messages="$errors->get('form.name')"
                class="mt-2"
            />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <x-primary-button class="ms-3">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</div>

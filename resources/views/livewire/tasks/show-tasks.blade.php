<div class="mx-auto w-3/4">

    <div class="relative mt-10 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Sort</th>
                    <th scope="col" class="px-6 py-3">
                        Task Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Project Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Priority
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody id="sortable-table" x-data="sortableTable">
                @foreach ($this->tasks as $task)
                    <tr data-priority="{{ $task->priority }}" data-id="{{ $task->id }}"
                        class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                        <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 handle">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 8h16M4 16h16" />
                            </svg>
                        </td>
                        <th scope="row"
                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $task->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $task->project->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $task->priority }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="inline-flex gap-2">
                                <a class="rounded bg-blue-600 px-3 py-1 text-white hover:text-blue-700 hover:bg-white hover:outline-none hover:ring-2 hover:ring-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-blue-500"
                                    href="{{ route('update-task', $task) }}">
                                    Edit
                                </a>

                                <a href="javascript:;"
                                    class="rounded bg-red-600 px-3 py-1 text-white hover:text-red-700 hover:bg-white hover:outline-none hover:ring-2 hover:ring-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 dark:text-red-500"
                                    wire:click="confirmDelete({{ $task->id }})">
                                    Delete
                                </a>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-10">
        {{ $this->tasks->links() }}
    </div>
</div>

<script>
    function sortableTable() {
        return {
            init() {
                let table = document.getElementById('sortable-table');
                let sortable = new window.Sortable(table, {
                    handle: '.handle',
                    animation: 150,
                    onEnd: function(evt) {
                        let order = Array.from(table.children).map(function(el, index) {
                            return {
                                id: el.getAttribute('data-id'),
                                priority: index + 1
                            }
                        });

                        console.log(order);
                        Livewire.dispatch('updateTaskOrder', {
                            tasks: order
                        });
                    }
                });
            }
        }
    }
</script>

<x-layout.main>
    <form method="GET" action="{{ route('tasks.index') }}" class="mb-4 flex gap-2">
        <select name="project_id" class="px-3 py-2 border rounded-md focus:outline-none focus:ring">
            <option value="">-- All Projects --</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
            Filter
        </button>
    </form>


    <div class="flex justify-end space-x-3">
        <a href="{{ route('tasks.create') }}"
            class="bg-blue-600 text-white rounded-full px-10 py-2 w-10 h-6 text-xs flex items-center justify-center">
            Create
        </a>
    </div>

    <div class="flex items-center justify-center">
        <section class="w-full max-w-4xl">
            <div class="text-2xl font-bold mb-6 text-center dark:text-white text-gray-700">
                <h2>All Tasks</h2>
            </div>

            <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">#</th>
                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">Name</th>
                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">Project</th>
                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">Created At</th>
                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="task-table-body">
                    @forelse($tasks as $task)
                        <tr draggable="true" data-id="{{ $task->id }}"
                            class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $loop->iteration }}
                            </td>
                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $task->name }}</td>
                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">
                                {{ $task->project?->name }}</td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">
                                    {{ $task->created_at->toDayDateTimeString() }}
                                </td>
                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-center">
                                <a href="{{ route('tasks.show', $task) }}"
                                    class="text-blue-600 hover:underline">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500 dark:text-gray-400">No tasks found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </div>
</x-layout.main>

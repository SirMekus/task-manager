<x-layout.main>
    <div class="flex items-center justify-center">
        <section class="w-full max-w-lg">
            <div class="text-2xl font-bold mb-6 text-center dark:text-white text-gray-700">
                <h2>Task Details</h2>
            </div>

            <div class="flex justify-end space-x-3 mb-5">
                <a href="{{ route('tasks.index') }}"
                    class="bg-blue-600 text-white rounded-lg px-10 py-2 h-6 text-xs flex items-center ">
                    View All
                </a>
            </div>

            <table class="w-full border-collapse border border-gray-300 dark:border-gray-700 mb-6">
                <tbody>
                    <tr>
                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left w-1/3">Name</th>
                        <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $task->name }}</td>
                    </tr>
                    <tr>
                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left w-1/3">Project</th>
                        <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $task->project?->name }}</td>
                    </tr>
                    <tr>
                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">Priority</th>
                        <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $task->priority }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-between">
                <a href="{{ route('tasks.edit', $task) }}"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Edit
                </a>

                <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this task?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </section>
    </div>
</x-layout.main>

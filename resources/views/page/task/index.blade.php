<x-layout.main>
    {{-- <section>
    <div class="flex justify-end space-x-3">
        <a href="{{ route('tasks.create') }}"
          class="bg-red-600 text-white rounded-full px-10 py-2 w-10 h-6 text-xs flex items-center justify-center">
          Create
    </a>
      </div>
    <x-page-info> </x-page-info>
    </section> --}}

    <div class="flex justify-end space-x-3">
        <a href="{{ route('tasks.create') }}"
          class="bg-red-600 text-white rounded-full px-10 py-2 w-10 h-6 text-xs flex items-center justify-center">
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
                        {{-- <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-left">Priority</th> --}}
                        <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="task-table-body">
                    @forelse($tasks as $task)
                        <tr draggable="true" data-id="{{ $task->id }}" class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $task->name }}</td>
                            {{-- <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">{{ $task->priority }}</td> --}}
                            <td class="border border-gray-300 dark:border-gray-700 px-4 py-2 text-center">
                                <a href="{{ route('tasks.show', $task) }}" 
                                   class="text-blue-600 hover:underline">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500 dark:text-gray-400">No tasks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </div>
</x-layout.main>
  
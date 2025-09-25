<x-layout.main>
    <div class="flex items-center justify-center">
        <section class="w-full max-w-md">
            <div class="text-2xl font-bold mb-6 text-center dark:text-white text-gray-700">
                <h2>Create Task</h2>
            </div>

            <form action="{{ $task ? route('tasks.update', ['task' => $task]) : route('tasks.store') }}" method="POST" class="space-y-4">
                @csrf
                @if($task)
                    @method('PUT')
                @endif
                <div>
                    <label class="block font-medium text-sm text-black dark:text-white">
                        Name
                    </label>
                    <input name="name" required value="{{ old('name', $task->name ?? '') }}" type="text"
                        class="w-full px-4 py-3 rounded-lg border border-blue-300 focus:border-blue-500 focus:outline-none transition-all mt-1">
                </div>

                <div>
                    <button
                        class="w-full inline-flex justify-center items-center px-6 py-3 bg-theme text-black border-2 dark:border border-gray-300 dark:border-transparent rounded-md text-sm tracking-widest focus:outline-none focus:ring-2 focus:ring-primary-hover focus:ring-offset-2 transition ease-in-out duration-150">
                        Submit
                    </button>
                </div>
            </form>
        </section>
    </div>
</x-layout.main>

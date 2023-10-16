<x-app-layout>
    <div class="flex flex-col w-full max-w-md mt-8 mx-auto items-center">
        <div class="text-3xl">
            Todo List
        </div>

        <form method="POST" action="{{ route('todos.store') }}"
            class="flex flex-col sm:flex-row justify-center items-center w-full mt-12 space-x-2 space-y-2">
            @csrf
            <input name="content" placeholder="I need to..." autocomplete="off"
                class="block w-60 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-center"
                value="{{ old('content') }}" />
            <x-primary-button class="block h-10">Create</x-primary-button>
        </form>

        <div class="mt-12 flex flex-col text-center">
            <ul class="flex flex-col space-y-4">
                @forelse ($todos as $todo)
                    <li>
                        - <a href="{{ route('todos.edit', $todo) }}" class="hover:underline">{{ $todo->content }}</a>
                    </li>
                @empty
                    <li>You have not created any todo items!</li>
                @endforelse
            </ul>
        </div>

        <div class="mt-12 text-sm italic text-gray-600">
            Click on a todo item to edit it.
        </div>
    </div>
</x-app-layout>

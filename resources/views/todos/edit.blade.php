<x-app-layout>
    <div class="flex flex-col w-full max-w-md mt-8 mx-auto items-center">
        <div class="text-3xl">
            Edit Todo Item
        </div>

        <form method="POST" action="{{ route('todos.update', $todo) }}" class="mt-12">
            @csrf
            @method('patch')

            <input name="content" placeholder="I need to..."
                class="block w-72 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('content', $todo->content) }}" />

            <div class="mt-6 text-center space-x-2">
                <a tabindex="-1" href="{{ route('todos.index') }}">
                    <x-secondary-button type="button" class="h-10 w-28 justify-center">Cancel</x-secondary-button>
                </a>
                <x-primary-button class="h-10 w-28 justify-center">Confirm</x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('todos.destroy', $todo) }}" class="mt-12">
            @csrf
            @method('delete')
            <x-danger-button class="w-52 h-12 justify-center"
                onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this item?')) { this.closest('form').submit(); }">Delete
                this item</x-danger-button>
        </form>
    </div>
</x-app-layout>

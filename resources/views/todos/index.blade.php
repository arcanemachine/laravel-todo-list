<x-app-layout>
  <div class="flex flex-col w-full max-w-md mt-8 mx-auto items-center">
    <div class="text-3xl">
      Todo List
    </div>

    <form method="POST" action="{{ route('todos.store') }}" class="flex items-center mt-8 space-x-2">
      @csrf
      <input name="content" placeholder="I need to..."
        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        value="{{ old('content') }}" />
      <x-primary-button class="block h-10">Create</x-primary-button>
    </form>

    <div class="mt-12 flex flex-col text-center">
      <ul class="flex flex-col space-y-4">
        @forelse ($todos as $todo)
          <li>- {{ $todo->content }}</li>
        @empty
          <li>You have not created any todo items!</li>
        @endforelse
      </ul>
    </div>

  </div>


</x-app-layout>

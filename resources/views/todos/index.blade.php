<x-app-layout>
  <div class="flex flex-col w-full mt-8 mx-auto items-center">
    <div class="text-3xl">
      Todo List
    </div>

    <div class="mt-12 flex flex-col text-center">
      @forelse ($todos as $todo)
        {{ $todo->content }}
      @empty
        You have not created any todo items!
      @endforelse
    </div>

  </div>


</x-app-layout>

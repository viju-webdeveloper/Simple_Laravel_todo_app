<x-layout>
  <x-slot:title>Dashboard </x-slot:header>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <button class="mb-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            <a href="{{ route('todo.create') }}">Create Todo</a>
        </button>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Due Date</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @php
              $i = 1
              @endphp
                @foreach($todos as $todo)
                <tr>
                    <td class="border px-4 py-2">{{ $i++ }}</td>
                    <td class="border px-4 py-2">{{ $todo->title }}</td>
                    <td class="border px-4 py-2">{{ $todo->description }}</td>
                    <td class="border px-4 py-2">{{ $todo->due_date }}</td>
                    <td class="border px-4 py-2">
                      @if($todo->status == '0')
                      <span class="text-red-500">Pending</span>
                      @elseif($todo->status == '1')
                      <span class="text-green-500">in-process</span>
                      @elseif($todo->status == '2')
                      <span class="text-blue-500">Completed</span>
                      @endif
                    </td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('todo.edit', $todo->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        |
                        <form action="{{ route('todo.delete', $todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $todos->links() }}
      
    </div>
</x-layout>
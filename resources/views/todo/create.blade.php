<x-layout>
  <x-slot:title>Create Todo </x-slot:header>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <form method="POST" action="{{ route('todo.store') }}" class="mx-auto max-w-xl px-4 py-16">
        @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Create Todo</h2>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input type="text" name="title" id="title" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Title">
                  </div>
                  <x-input_error name="title" />
                </div>
              </div>

            </div>

            <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <textarea name="description" id="description" rows="3" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"></textarea>
                  </div>
                  <x-input_error name="description" />
                </div>
              </div>

            </div>
            <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <label for="due_date" class="block text-sm/6 font-medium text-gray-900">Due Date</label>
                <div class="mt-2">
                  <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input type="date" name="due_date" id="due_date" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                  </div>
                  <x-input_error name="due_date" />
                </div>
              </div>

            </div>

          </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>
      
      
    </div>
</x-layout>
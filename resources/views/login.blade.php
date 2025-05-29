<!doctype html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
  @if (session('success'))
  <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-800">
    {{ session('success') }}
  </div>
  @endif
  <form method="POST" action="{{ route('login') }}" class="mx-auto max-w-xl px-4 py-16">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Login</h2>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Username</label>
            <div class="mt-2">
              <x-input type="email" name="email" />
              <x-input_error name="email" />
            </div>
          </div>

        </div>

        <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="username" class="block text-sm/6 font-medium text-gray-900">Password</label>
            <div class="mt-2">
              <x-input type="password" name="password" />
            </div>
          </div>

        </div>
      </div>

    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>
</body>

</html>
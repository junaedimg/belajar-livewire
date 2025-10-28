<div class="w-1/2 m-auto my-10">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-900">
  <body class="h-full">
  ```
-->
    <div class="py-2">
        <div class="sm:mx-auto">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight ">Create New User</h2>
        </div>

        @if (session('success'))
            <div class="p-4 mb-4 mt-6 text-sm text-green-800 rounded-lg bg-green-50 bg-gray-800 dark:text-green-400"
                role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-10">
            <form wire:submit.prevent="createNewUser" method="POST" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm/6 font-medium text-gray-700">Name</label>
                    <div class="mt-2">
                        <input id="name" wire:model="name" type="text" name="name" autocomplete="name"
                            class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full" />
                        @error('name')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span
                                    class="font-medium">{{ $message }}</p>
                        @enderror

                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-700">Email address</label>
                    <div class="mt-2">
                        <input id="email" wire:model="email" type="email" name="email" autocomplete="email"
                            class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full" />
                        @error('email')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span
                                    class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-700">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot
                                password?</a>
                        </div>


                    </div>
                    <div class="mt-2">
                        <input id="password" wire:model="password" type="password" name="password"
                            autocomplete="current-password"
                            class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full" />
                        @error('password')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span
                                    class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold  hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Create
                        new user</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-400">
                Not a member?
                <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Start a 14 day free
                    trial</a>
            </p>
        </div>
    </div>


    <hr class="border-1 my-5">
    <h2 class="text-2xl font-semibold mb-2"> User List</h2>
    <ul class="list-disc">
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>

</div>

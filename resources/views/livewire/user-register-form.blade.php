<div class="w-1/3 my-10">
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

                <div class="col-span-full">
                    <label for="profile-picture" class="block text-sm/6 font-medium text-white">Avatar</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-6">
                        <div class="text-center">
                            <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true"
                                class="mx-auto size-12 text-gray-600">
                                <path
                                    d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                    clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm/6 text-gray-400">
                                <label for="avatar"
                                    class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-400 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-500 hover:text-indigo-300">
                                    <span>Upload a file</span>
                                    <input id="avatar" wire:model="avatar" type="file" name="avatar"
                                        class="sr-only" accept="image/png,image/jpeg" />
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs/5 text-gray-400">PNG, JPG up to 5MB</p>
                        </div>
                    </div>
                    @error('avatar')
                        <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}
                        </p>
                    @enderror
                </div>



                <div wire:loading wire:target="avatar"
                    class="flex items-center justify-center w-20 h-20 border border-gray-200 rounded-lg bg-gray-50 ">
                    <div
                        class="px-2 py-1 text-xs font-medium leading-none text-center text-blue-800 bg-blue-200 rounded-full animate-pulse dark:bg-blue-900 dark:text-blue-200">
                        loading...</div>
                </div>


                @if ($avatar)
                    <p class="my-2 text-sm/6 font-medium">Preview</p>
                    <img class="rounded w-20 h-20 block object-cover" src="{{ $avatar->temporaryUrl() }}"
                        alt="Preview Avatar">
                @endif

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
                            class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full" />
                        @error('password')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span
                                    class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold  hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">

                        <svg wire:loading wire:target="createNewUser" aria-hidden="true"
                            class="w-4 h-4 text-gray-200 animate-spin  fill-blue-600 self-center me=2"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                        <span class="sr-only">Loading...</span>

                        Create new user
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-400">
                Not a member?
                <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Start a 14 day free
                    trial</a>
            </p>
        </div>
    </div>
</div>

<div class="w-1/2 m-auto my-10">
    <h1>{{ $title }}</h1>
    <h1>Users Count : {{ count($users) }}</h1>
    <button wire:click="createUser" type="button" class="text-white bg-blue-500 hover:bg-blue-800 font-medium rounded-lg text-xm px-5 py-2.5">
        Create User
    </button>

    <hr class="border-1 my-5">
    <h2 class="text-2xl font-semibold mb-2"> User List</h2>
    <ul class="list-disc">
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>

</div>

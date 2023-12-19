<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-4  overflow-x-auto">
                <a href="{{ route('users.create') }}" class="bg-indigo-700 rounded-md text-white py-2 px-4 hover:bg-indigo-500">Create New User</a>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-end m-4  overflow-x-auto">
                    {{ $users->links() }}
                </div>
                <table class="m-4 ">
                    <thead>
                        <tr>
                            <th class="w-1/4">Name</th>
                            <th class="w-2/3">E-mail</th>
                            <th class="w-1/4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="p-2">{{ $user->name }}</td>
                                <td class="p-2">{{ $user->email }}</td>
                                <td class="p-2">
                                    <div class="grid grid-flow-col grid-cols-3 gap-x-2">
                                        <a href="{{ route('users.show', $user) }}" class="py-1 px-2">👁️</a>
                                        <a href="{{ route('users.edit', $user) }}" class="py-1 px-2">✏️</a>
                                        <div class="py-1 px-2">
                                            🗑️
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-end m-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

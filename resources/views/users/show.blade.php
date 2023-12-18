<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="m-4">
                    <tr>
                        <td class="p-2 text-right">Name:</td>
                        <td class="p-2">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 text-right">E-mail:</td>
                        <td class="p-2">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td class="p-2 text-right">Registered At:</td>
                        <td class="p-2">{{ $user->created_at->format('d-M-Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}"
                                class=" inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Edit
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

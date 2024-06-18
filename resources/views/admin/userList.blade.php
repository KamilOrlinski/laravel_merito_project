<x-adminApp-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel administratora') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mt-4">{{ __('Lista użytkowników') }}</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    {{ __('ID') }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    {{ __('Nazwa użytkownika') }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    {{ __('Email') }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    {{ __('Akcje') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">{{ $user->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="showEditForm({{ $user->id }})" class="text-indigo-600 dark:text-indigo-300 hover:text-indigo-900">{{ __('Edytuj') }}</button>
                                    </td>
                                </tr>
                                <tr id="edit-form-{{ $user->id }}" class="hidden">
                                    <td colspan="4" class="px-6 py-4">
                                        <form action="{{ route('admin.updateUser', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-4">
                                                <label for="name-{{ $user->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Nazwa użytkownika') }}</label>
                                                <input type="text" name="name" id="name-{{ $user->id }}" value="{{ $user->name }}" class="mt-1 block w-full">
                                            </div>
                                            <div class="mb-4">
                                                <label for="email-{{ $user->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Email') }}</label>
                                                <input type="email" name="email" id="email-{{ $user->id }}" value="{{ $user->email }}" class="mt-1 block w-full">
                                            </div>
                                            <div class="flex justify-end">
                                                <button type="button" onclick="hideEditForm({{ $user->id }})" class="mr-2 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-300 active:bg-red-600 disabled:opacity-25 transition">{{ __('Anuluj') }}</button>
                                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 active:bg-blue-600 disabled:opacity-25 transition">{{ __('Zapisz') }}</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showEditForm(userId) {
            document.getElementById('edit-form-' + userId).classList.remove('hidden');
        }

        function hideEditForm(userId) {
            document.getElementById('edit-form-' + userId).classList.add('hidden');
        }
    </script>
</x-adminApp-layout>
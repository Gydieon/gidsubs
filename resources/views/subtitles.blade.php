<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-100 dark:text-gray-200">
            {{ __('Subtitles List') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Available Subtitles</h3>

            <div class="overflow-x-auto">
                <table
                    class="min-w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Language</th>
                            <th class="py-3 px-6 text-center">Download</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($subtitles as $subtitle)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="py-4 px-6 text-gray-900 dark:text-gray-200">{{ $subtitle->name }}</td>
                                <td class="py-4 px-6 text-gray-600 dark:text-gray-300">{{ $subtitle->language }}</td>
                                <td class="py-4 px-6 text-center">
                                    <a href="{{ route('subtitles.download', $subtitle->id) }}"
                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow-md transition-all">
                                        <button class="btn btn-info">
                                            Download
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        @if ($subtitles->isEmpty())
                            <tr>
                                <td colspan="3" class="py-4 px-6 text-center text-gray-500 dark:text-gray-400">
                                    No subtitles available.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

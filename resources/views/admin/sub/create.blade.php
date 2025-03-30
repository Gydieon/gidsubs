<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-gray-800 text-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">Upload Subtitle</h2>

        <div class="flex justify-end">
            <a href="{{ route('subtitles') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-white">
                View Subtitles
            </a>
        </div>

        <form enctype="multipart/form-data" action="{{ route('sub.store') }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                    class="w-full mt-1 p-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring focus:ring-blue-500">
                @error('name')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="language" class="block text-sm font-medium">Language</label>
                <input type="text" name="language" value="{{ old('language') }}" 
                    class="w-full mt-1 p-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring focus:ring-blue-500">
                @error('language')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="file" class="block text-sm font-medium">Upload Subtitle File</label>
                <input type="file" name="file" 
                    class="w-full mt-1 p-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring focus:ring-blue-500">
                @error('file')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="w-full px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-black font-semibold rounded-lg">
                Upload
            </button>
        </form>
    </div>
</x-app-layout>

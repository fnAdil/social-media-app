<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-100">
                            {{ __('Create New Post') }}
                        </h2>
                    </header>

                    <form method="post" action="{{ route('posts.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <!-- Image Upload -->
                        <div class="space-y-2">
                            <div class="flex items-center space-x-6">
                                <div class="shrink-0 mb-4">
                                    <img id="image-preview" class="h-80 w-80 object-cover" 
                                         src="{{ old('image') ? asset('storage/' . old('image')) : '/placeholder.jpg' }}" 
                                         alt="image">
                                </div>
                                <label class="block">
                                    <span class="sr-only">Choose image</span>
                                    <input type="file" 
                                           name="image" 
                                           id="image"
                                           accept="image/*"
                                           class="block w-full text-sm text-gray-400
                                                  file:mr-4 file:py-2 file:px-4
                                                  file:rounded-md file:border-0
                                                  file:text-sm file:font-semibold
                                                  file:bg-gray-700 file:text-gray-300
                                                  hover:file:bg-gray-600
                                                  cursor-pointer">
                                                <script>
                                                    document.getElementById('image').addEventListener('change', function(event) {
                                                        const [file] = event.target.files;
                                                        if (file) {
                                                            document.getElementById('image-preview').src = URL.createObjectURL(file);
                                                        }
                                                    });
                                                </script>
                                        @if ($errors->has('image'))
                                            <p class="text-sm text-red-600">{{ $errors->first('image') }}</p>
                                        @endif
                                </label>
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-300">
                                {{ __('Description') }}
                                @if ($errors->has('description'))
                                    <p class="text-sm text-red-600">{{ $errors->first('description') }}</p>
                                 @endif
                            </label>
                            <textarea name="description" 
                                      id="description" 
                                      rows="5"
                                      class="mt-1 block w-full rounded-md border-gray-700 bg-gray-900 
                                             text-gray-300 shadow-sm focus:border-indigo-500 
                                             focus:ring-indigo-500">{{ old('description', '') }}</textarea>
                        </div>
                        <div class="flex items-center gap-4">
                            <button type="submit" 
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold 
                                           text-white shadow-sm hover:bg-indigo-500 
                                           focus-visible:outline focus-visible:outline-2 
                                           focus-visible:outline-offset-2 
                                           focus-visible:outline-indigo-600">
                                {{ __('Create') }}
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
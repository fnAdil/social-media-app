<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Post Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 shadow">
                <!-- Post Header -->
                <div class="flex items-center p-4 border-b border-gray-800">
                    <div class="flex items-center">
                        <img class="h-8 w-8 rounded-full object-cover" 
                             src="{{ $post->user->profile_photo_url ?? '/placeholder.jpg' }}" 
                             alt="{{ $post->user->name }}">
                        <span class="ml-3 font-medium text-gray-200">{{ $post->user->name }}</span>
                    </div>
                </div>

                <!-- Post Image -->
                <div class="aspect-square">
                    <img src="{{ asset('storage/' . $post->image) }}" 
                         alt="Post image" 
                         class="w-full h-full object-cover">
                </div>

                <!-- Post Actions -->
                <div class="p-4 flex space-x-4">
                    <button class="text-gray-200 hover:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                    <button class="text-gray-200 hover:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </button>
                </div>

                <!-- Likes -->
                <div class="px-4 py-2">
                    <p class="text-gray-200 text-sm font-semibold">
                        Liked by <span class="font-bold">{{ $post->user->name }}</span> and <span class="font-bold">others</span>
                    </p>
                </div>

                <!-- Description -->
                <div class="px-4 py-2">
                    <p class="text-gray-200">
                    <img class="inline-block h-6 w-6 rounded-full object-cover" 
                             src="{{ $post->user->profile_photo_url ?? '/placeholder.jpg' }}" >
                        <span class="font-semibold mr-2">{{ $post->user->name }}</span>
                        {{ $post->description }}
                    </p>
                </div>

                <!-- Date -->
                <div class="px-4 py-2">
                    <p class="text-gray-500 text-xs">
                        {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>

                <!-- Add Comment Section -->
                <div class="border-t border-gray-800 p-4">
                    <form class="flex items-center">
                        <input type="text" 
                               placeholder="Add a comment..." 
                               class="flex-1 bg-transparent border-none text-gray-200 focus:ring-0 placeholder-gray-500 text-sm">
                        <button type="submit" 
                                class="ml-2 text-blue-500 font-semibold text-sm">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
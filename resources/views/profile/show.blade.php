<x-app-layout>
    <div class="min-h-screen bg-gray-900">
        <div class="container mx-auto py-8">
            <div class="max-w-4xl mx-auto px-4">
                <!-- Header Section -->
                <div class="flex items-center justify-between mb-8" style="padding-left: 40px;">
                    <div class="flex items-center space-x-8">
                        <!-- Profile Picture -->
                        <div class="relative">
                            <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-800 border border-gray-700">
                                <img src="https://media.istockphoto.com/id/1437816897/photo/business-woman-manager-or-human-resources-portrait-for-career-success-company-we-are-hiring.jpg?s=612x612&w=0&k=20&c=tyLvtzutRh22j9GqSGI33Z4HpIwv9vL_MZw_xOE19NQ="
                                    alt="" class="w-full h-full object-cover">
                            </div>
                        </div>

                        <!-- Profile Info -->
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4">
                                <h1 class="text-2xl font-medium text-gray-100">{{ $user->profile->username}}</h1>
                                @Can('update', $user->profile)
                                <a href="{{ route('profile.edit', ['user' => $user->id]) }}"
                                    class="bg-gray-800 text-gray-300 px-4 py-2 rounded border border-gray-700 hover:bg-gray-700 transition">
                                    Edit profile
                                </a>
                                <button
                                    class="bg-gray-800 text-gray-300 px-4 py-2 rounded border border-gray-700 hover:bg-gray-700 transition">
                                    View archive
                                </button>
                                @endCan
                            </div>

                            <!-- Stats -->
                            <div class="flex space-x-8 text-gray-300">
                                <span><strong class="text-gray-100">{{ $user->posts()->count()}}</strong> posts</span>
                                <span><strong class="text-gray-100">967</strong> followers</span>
                                <span><strong class="text-gray-100">955</strong> following</span>
                            </div>

                            <!-- Bio -->
                            <div>
                                <h1 class="font-medium text-gray-100">{{$user->profile->title}}</h1>
                                <h2 class="font-medium text-gray-100">{{$user->profile->description}}</h2>
                                <h2 class="font-medium text-gray-100">{{$user->profile->url}}</h2>
                            </div>
                        </div>
                    </div>
                    @Can('update', $user->profile)
                    <!-- New Post Button -->
                    <div class="pt-8" style="padding-right: 40px;">
                        <a href="{{ route('posts.create') }}"
                            class="flex flex-col items-center justify-center w-24 h-24 rounded-lg bg-gray-800 text-gray-300 border border-gray-700 hover:bg-gray-700 transition">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span class="block mt-2">New</span>
                        </a>
                    </div>
                    @endCan
                </div>


                <div class="bg-gray-900 min-h-screen">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                        <!-- Navigation Tabs -->
                        <div class="border-b border-gray-700 mb-8">
                            <nav class="-mb-px flex justify-center space-x-8">
                                <a href="#"
                                    class="border-b-2 border-white py-4 px-1 inline-flex items-center text-sm font-medium text-white">
                                    <svg class="mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M22 2H2v20h20V2zM8 20H4v-4h4v4zm0-6H4v-4h4v4zm0-6H4V4h4v4zm6 12h-4v-4h4v4zm0-6h-4v-4h4v4zm0-6h-4V4h4v4zm6 12h-4v-4h4v4zm0-6h-4v-4h4v4zm0-6h-4V4h4v4z" />
                                    </svg>
                                    POSTS
                                </a>
                            </nav>
                        </div>


                        <!-- Image Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <!-- Grid Items -->
                            @foreach($user->posts as $post)
                            <div class="relative aspect-square">
                                <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                                    <img src="/storage/{{ $post-> image }}" alt="Post {{ $loop->iteration }}"
                                        class="object-cover w-full h-full">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>


</x-app-layout>
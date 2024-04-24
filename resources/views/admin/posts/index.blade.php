<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                投稿一覧
            </h2>
            <button type="button" onclick="location.href='{{ route('admin.posts.create') }}'" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規投稿</button>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts as $post)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container mx-auto flex px-5 py-10 md:flex-row flex-col items-center">
                            <div class="md:w-1/3 w-5/6 mb-10 md:mb-0">
                                <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                            </div>
                            <div class="md:w-2/3 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $post->header }}
                                </h1>
                                <p class="mb-8 leading-relaxed">{{ $post->body }}</p>
                                <div class="flex justify-end">
                                {{-- <button type="button" onclick="location.href='{{ route('admin.posts.show') }}'" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">記事を見る</button> --}}
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

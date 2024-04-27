<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            会員限定投稿詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font relative">
                        <span class="mt-3 ml-3 p-2 rounded-md bg-yellow-600 text-white">会員限定</span>
                        <div class="container px-5 py-10 mx-auto">
                          <div class="w-7/8 mx-auto">
                            <div class="p-2 w-full">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900 text-left px-3">{{ $post->header }}</h1>
                            </div>
                          </div>
                            <div class="w-7/8 mx-auto">
                                <div class="p-2 w-full">
                                    <div class="relative">
                                        <p class="w-full rounded text-base text-gray-700 py-1 px-3 leading-6">{{ \Carbon\Carbon::parse($post->posted_at)->format('Y年m月d日') }}</p>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                        <div class="w-1/2 mb-3">
                                        @if(!empty($post->thumnail))
                                            <img src="{{ asset('storage/posts/' . $post->thumnail) }}" alt="アイキャッチ画像">
                                        @else
                                            <img src="{{ asset('images/no_image.jpg') }}" alt="no image">
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <p class="w-full rounded text-base text-gray-700 py-1 px-3 leading-6 ">{{ $post->body }}</p>
                                    </div>
                                </div>
                                <div class="p-2 w-full mt-4">
                                    <button type="button" onclick="location.href='{{ route('user.posts.index')}}'" class="bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

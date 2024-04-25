<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-10 mx-auto">
                          <div class="flex flex-col text-center w-full mb-3">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">投稿編集</h1>
                          </div>
                          <x-auth-validation-errors class="mb-4" :errors="$errors" />
                          <form method="POST" action="{{ route('admin.posts.update', ['post' => $post->id ])}}" enctype="multipart/form-data">
                              @method('PATCH')
                              @csrf
                            <div class="w-7/8 mx-auto">
                                <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="header" class="leading-7 text-sm text-gray-600">題名</label>
                                        <input type="text" id="header" name="header" value="{{ $post->header }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <label for="body" class="leading-7 text-sm text-gray-600">本文</label>
                                    <textarea id="body" name="body" value="{{ $post->body }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $post->body }}</textarea>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                        <div class="w-1/2 mx-auto mb-3">
                                        @if(!empty($post->thumnail))
                                            <img src="{{ asset('storage/posts/' . $post->thumnail) }}" alt="アイキャッチ画像">
                                        @else
                                            <img src="{{ asset('images/no_image.jpg') }}" alt="no image">
                                        @endif
                                        </div>
                                        <div class="md:w-2/3 w-full">
                                            <label for="thumnail" class="leading-7 text-sm text-gray-600">アイキャッチ画像変更 <span class="text-red-400 ml-2">※画像を変更する場合のみ選択してください。</span></label>
                                            <input type="file" id="thumnail" name="thumnail" value="{{ $post->thumnail }}" accept="image/png,image/jpeg,image/jpg" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="p-2 sm:w-1/2 w-full">
                                        <div class="relative">
                                            <label for="for_user" class="leading-7 text-sm text-gray-600 mr-2">会員限定</label>
                                            <select name="for_user" class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-3 px-3 leading-6 transition-colors duration-200 ease-in-out w-full">
                                                <option value="0" @if($post->for_user === 0) { selected } @endif >限定にしない</option>
                                                <option value="1" @if($post->for_user === 1) { selected } @endif >限定にする</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="p-2 sm:w-1/2 w-full">
                                            <div class="relative">
                                                <label for="is_visible" class="leading-7 text-sm text-gray-600 mr-2">表示切替</label>
                                                <select name="is_visible" class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-3 px-3 leading-6 transition-colors duration-200 ease-in-out w-full">
                                                    <option value="1" @if($post->is_visible === 1) { selected } @endif >表示する</option>
                                                    <option value="0" @if($post->is_visible === 0) { selected } @endif >表示しない</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                        <label for="posted_at" class="leading-7 text-sm text-gray-600">投稿日時</label>
                                        <input type="datetime-local" id="posted_at" name="posted_at" value="{{ $post->posted_at }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 w-full flex justify-around mt-4">
                                        <button type="button" onclick="location.href='{{ route('admin.posts.index')}}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                        <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

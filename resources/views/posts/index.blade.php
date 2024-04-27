<x-general-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight md:mb-0 mb-3">
            投稿一覧
        </h2>
        <form method="get" action="{{ route('user.posts.index') }}">
            <div class="sm:flex sm:justify-end items-center mb-3">
                <div class="flex items-center">
                    <div><input type="text" name="keyword" placeholder="キーワードを入力" class="rounded-sm border-gray-300"></div>
                    <div><button class="text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg text-center ml-3">検索</button></div>
                </div>
            </div>
            <div class="sm:flex sm:justify-end items-center">
                <div class="sm:mb-0 mb-5">
                    <div class="flex">
                        <div class="flex items-center mr-2">
                            <p class="text-sm mr-2">表示順</p>
                            <select id="sort" name="sort" class="mr-3 rounded-sm border-gray-300">
                                <option value="{{ \Constant::SORT_ORDER['later']}}"
                                    @if(\Request::get('sort') === \Constant::SORT_ORDER['later'] )
                                    selected
                                    @endif>新しい順
                                </option>
                                <option value="{{ \Constant::SORT_ORDER['older']}}"
                                    @if(\Request::get('sort') === \Constant::SORT_ORDER['older'] )
                                    selected
                                    @endif>古い順
                                </option>
                            </select>
                        </div>
                        <div class="flex items-center mr-3">
                            <p class="text-sm mr-2">表示順</p>
                            <select name="pagination" id="pagination" class="rounded-sm border-gray-300">
                                <option value="10"
                                @if(\Request::get('pagination') === '10')
                                selected
                                @endif>10件
                            </option>
                            <option value="20"
                                @if(\Request::get('pagination') === '20')
                                selected
                                @endif>20件
                            </option>
                            <option value="50"
                                @if(\Request::get('pagination') === '50')
                                selected
                                @endif>50件
                            </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-slot>

    <div class="py-12">

        <x-flash-message status="session('status')" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($posts->isEmpty())
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-gray-600">該当する投稿はありません。</p>
                </div>
            </div>
            @else
            @foreach ($posts as $post)
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mb-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="flex">
                            @if($post->is_visible)
                                <span class="p-2 rounded-md bg-blue-400 text-white">表示中</span>
                            @else
                                <span class="p-2 rounded-md bg-red-400 text-white">非表示</span>
                            @endif
                            @if($post->for_user)
                                <span class="ml-3 p-2 rounded-md bg-yellow-600 text-white">会員限定</span>
                            @endif
                        </div>
                        <div class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
                            <div class="md:w-1/3 w-5/6 mb-10 md:mb-0">
                                @if(!empty($post->thumnail))
                                    <img src="{{ asset('storage/posts/' . $post->thumnail) }}" alt="アイキャッチ画像">
                                @else
                                    <img src="{{ asset('images/no_image.jpg') }}" alt="no image">
                                @endif
                            </div>
                            <div class="md:w-2/3 lg:pl-24 md:pl-16">
                                <h1 class="title-font sm:text-xl text-2xl mb-4 font-medium text-gray-900">{{ $post->header }}
                                </h1>
                                <p class="mb-3 text-gray-400 text-sm">{{ \Carbon\Carbon::parse($post->posted_at)->format('Y年m月d日') }}</p>
                                <p class="body mb-8 leading-relaxed relative" style="white-space:pre-wrap;">{{ $post->body }}</p>
                                <div class="flex justify-end">
                                    <button type="button" onclick="location.href='{{ route('user.posts.show', ['post' => $post->id]) }}'" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">詳しく見る</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            @endforeach
            {{ $posts->appends([
                'sort' => \Request::get('sort'),
                'pagination' => \Request::get('pagination'),
            ])->links() }}
            @endif
        </div>
    </div>
    <script>
        const select = document.getElementById('sort');
        select.addEventListener('change', function(){
            this.form.submit();
        });
        const paginate = document.getElementById('pagination');
        paginate.addEventListener('change', function(){
            this.form.submit();
        });
    </script>
</x-general-layout>

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          ポートフォリオ詳細
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <section class="text-gray-600 body-font relative">

                    <div class="container px-5 mx-auto">
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                              <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $collection->title }}</div>
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="description" class="leading-7 text-sm text-gray-600">アプリ解説</label>
                              <div id="description" name="description" class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out break-words overflow-y-auto resize-y h-32">{{ $collection->description}}</div>
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="url_qiita" class="leading-7 text-sm text-gray-600">Qiita URL</label>
                              <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out min-h-10">{{ $collection->url_qiita }}
                              </div>
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="url_webapp" class="leading-7 text-sm text-gray-600">WebApp URL</label>
                              <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out min-h-10">{{ $collection->url_webapp }}</div>
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="url_github" class="leading-7 text-sm text-gray-600">GitHub URL</label>
                              <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out min-h-10">{{ $collection->url_github }}</div>
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="is_public" class="leading-7 text-sm text-gray-600">公開種別</label>
                              <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $collection->is_public_label }}</div>
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="position" class="leading-7 text-sm text-gray-600">表示優先度</label>
                              <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $collection->position_label }}</div>
                            </div>
                          </div>

                          {{-- 編集ボタン --}}
                          <form action="{{ route('collections.edit', ['collection' => $collection->id]) }}" method="get">
                          <div class="p-2 w-full">
                            <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集</button>
                          </div>
                          </form>
                          {{-- 削除ボタン --}}
                          <form action="{{ route('collections.destroy', ['collection' => $collection->id]) }}" method="post"
                            id="delete_{{ $collection->id }}">
                            @csrf
                            @method('DELETE')
                          <div class="p-2 w-full">
                            <a href="#" data-id="{{ $collection->id }}" onclick="deletePost(this)" 
                              class="flex mx-auto text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-pink-600 rounded text-lg">削除</a>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>

                  </section>
              </div>
          </div>
      </div>
  </div>
<script>
// 確認メッセージ 
function deletePost(e){
    'use strict'
    if(confirm('本当に削除していいですか？')){
        // e.dataset.idを使ってdata-idの値を取得
        // 取得した'delete_'+e.dataset.idを元にformのid="delete_X"を探して、該当formをsubmit()で送信
        document.getElementById('delete_' + e.dataset.id).submit()
    }
}
</script>
</x-app-layout>
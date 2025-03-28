<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          技術タグ新規作成
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">

                {{-- フォーム --}}
                <section class="text-gray-600 body-font relative">
                  <form action="{{ route('technology-tags.store') }}" method="POST">
                    @csrf
                  <div class="container px-5 mx-auto">
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                      <div class="flex flex-wrap -m-2">
                        {{-- 技術タグの種類 --}}
                        <div class="p-2 w-full" id="tech_type_section">
                          <div class="relative">
                            <label class="leading-7 text-sm text-gray-600">▪️ 技術タグの種類</label>
                            <input type="radio" name="tech_type" value="0" class="cursor-pointer">言語
                            <input type="radio" name="tech_type" value="1" class="cursor-pointer">フレームワーク
                            <input type="radio" name="tech_type" value="2" class="cursor-pointer">ツール
                          </div>
                        </div>
                        {{-- 名前 --}}
                        <div class="p-2 w-full">
                          <div class="relative">
                            <label for="names" class="leading-7 text-sm text-gray-600">▪️ タグ<br>カンマ + 半角スペース区切りで、複数入力OK</label>
                            <input type="text" id="name" name="names" placeholder="例)PHP, HTML, CSS" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>
                        <div class="p-2 w-full">
                          <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規登録する</button>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form>
                </section>

              </div>
          </div>
      </div>
  </div>
</x-app-layout>
<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          技術タグ一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">

                  <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                    
                  {{-- collections.createへ戻るフォーム --}}
                  <a href="{{ route('collections.create') }}" class="leading-7 text-sm text-gray-600 underline hover:text-gray-900">ポートフォリオ新規登録へ戻る</a>

                    {{-- テーブル --}}
                    <table class="table-auto w-full text-left whitespace-no-wrap mt-6">
                      <thead>
                        <tr>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl"></th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl"></th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">タグ</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">種類</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach($technologyTags as $technologyTag)
                        <tr>
                          <form action="{{ route('technology-tags.edit', ['technology_tag' => $technologyTag->id]) }}">
                            <td class="border-t-2 border-gray-200 px-4 py-3">
                              <button class="text-blue-500">編集</button>
                            </td>
                          </form>
                          <td class="border-t-2 border-gray-200 px-4 py-3">
                            <a href="" class="text-blue-500">#</a>
                          </td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{ $technologyTag->name }}</td>
                          <td class="border-t-2 border-gray-200 px-4 py-3">{{ $typeLabels[$technologyTag->tech_type] }}</td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>

              </div>
          </div>
      </div>
  </div>
</x-app-layout>
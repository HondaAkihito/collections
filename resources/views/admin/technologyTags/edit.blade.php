<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            技術タグ編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- フォーム --}}
                    <section class="text-gray-600 body-font relative">
                        <form
                            action="{{ route('admin.technology-tags.update', ['technology_tag' => $technologyTag->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container px-5 mx-auto">
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        {{-- 技術タグの種類 --}}
                                        <div class="p-2 w-full" id="tech_type_section">
                                            <div class="relative">
                                                <label for="tech_type"
                                                    class="leading-7 text-sm text-gray-600">技術タグの種類</label>
                                                <select name="tech_type" id="tech_type"
                                                    class="rounded-md cursor-pointer">
                                                    <option value="">選択してください</option>
                                                    @foreach($typeLabels as $value => $label)
                                                        <option value="{{ $value }}"
                                                            {{ $technologyTag->tech_type == $value ? 'selected' : '' }}>
                                                            {{ $label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-input-error :messages="$errors->get('tech_type')" class="mt-2" />
                                            </div>
                                        </div>
                                        {{-- 名前 --}}
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="name"
                                                    class="leading-7 text-sm text-gray-600">技術タグ</label>
                                                <input type="text" id="name" name="name"
                                                    value="{{ $technologyTag->name }}" placeholder="例)PHP, HTML, CSS"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <button
                                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
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

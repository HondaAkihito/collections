<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          ポートフォリオ新規登録
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <section class="text-gray-600 body-font relative">

                    {{-- フォーム --}}
                    <form id="createForm" action="{{ route('collections.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="container px-5 mx-auto">
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                          <div class="p-2 w-full">
                            <div class="relative">
                              <x-input-error :messages="$errors->get('title')" class="mt-2" />
                              <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                              <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <x-input-error :messages="$errors->get('description')" class="mt-2" />
                              <label for="description" class="leading-7 text-sm text-gray-600">アプリ解説</label>
                              <textarea id="description" name="description" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('description') }}</textarea>
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <x-input-error :messages="$errors->get('url_qiita')" class="mt-2" />
                              <label for="url_qiita" class="leading-7 text-sm text-gray-600">Qiita URL</label>
                              <input type="url" id="url_qiita" name="url_qiita" value="{{ old('url_qiita') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <x-input-error :messages="$errors->get('url_webapp')" class="mt-2" />
                              <label for="url_webapp" class="leading-7 text-sm text-gray-600">WebApp URL</label>
                              <input type="url" id="url_webapp" name="url_webapp" value="{{ old('url_webapp') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <x-input-error :messages="$errors->get('url_github')" class="mt-2" />
                              <label for="url_github" class="leading-7 text-sm text-gray-600">GitHub URL</label>
                              <input type="url" id="url_github" name="url_github" value="{{ old('url_github') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <x-input-error :messages="$errors->get('is_public')" class="mt-2" />
                              <label for="is_public" class="leading-7 text-sm text-gray-600">公開種別</label>
                              <input type="radio" name="is_public" value="0" {{ old('is_public') == '0' ? 'checked' : '' }}>非公開
                              <input type="radio" name="is_public" value="1" {{ old('is_public') == '1' ? 'checked' : '' }}>一般公開
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <x-input-error :messages="$errors->get('position')" class="mt-2" />
                              <label for="position" class="leading-7 text-sm text-gray-600">表示優先度</label>
                              <select name="position" id="position" class="rounded-md">
                                <option value="">選択してください</option>
                                <option value="0" {{ old('position') == '0' ? 'selected' : '' }}>デフォルト</option>
                                <option value="1" {{ old('position') == '1' ? 'selected' : '' }}>1ページ目</option>
                                <option value="2" {{ old('position') == '2' ? 'selected' : '' }}>topページ</option>
                              </select>
                            </div>
                          </div>

                          <!-- 画像アップロード -->
                          <div class="p-2 w-full">
                            <div class="relative">
                                @if($errors->has('image_path'))
                                <x-input-error :messages="$errors->get('image_path')" class="mt-2" />
                                @elseif($errors->has('tmp_images'))
                                <x-input-error :messages="$errors->get('tmp_images')" class="mt-2" />
                                @endif
                                <label for="image_path" class="leading-7 text-sm text-gray-600">画像</label>
                                <!-- 見えない input -->
                                <input multiple type="file" id="image_path" name="image_path[]" class="hidden" accept="image/*">
                                <!-- セッションの画像データを送信 -->
                                @foreach(session('tmp_images', []) as $tmpImage)
                                    <input type="hidden" name="tmp_images[]" value="{{ $tmpImage }}">
                                @endforeach
                                @foreach(session('file_names', []) as $fileName)
                                    <input type="hidden" name="session_file_names[]" value="{{ $fileName }}">
                                @endforeach
                                <br>
                                <!-- カスタムアップロードボタン -->
                                <label for="image_path" class="file-upload-btn inline-block px-4 py-1 text-sm text-gray-800 bg-gray-100 border border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-200 active:bg-gray-300 transition">
                                  ファイルを選択
                                </label>
                                <!-- サムネイル一覧 -->
                                <div class="relative mt-4">
                                    <label class="leading-7 text-sm text-gray-600">選択した画像：</label>
                                    <div id="imagePreviewContainer" class="grid grid-cols-3 gap-3 md:grid-cols-4 lg:grid-cols-5 md:gap-4 w-full place-items-center">
                                      <!-- 画像プレビューがここに追加される -->
                                    </div>
                                </div>
                                <!-- 大きなプレビュー画像 -->
                                <div id="mainImageContainer" class="flex justify-center mt-4 hidden">
                                    <img id="mainImage" class="w-3/5 h-auto object-cover border rounded-lg" src="" alt="メイン画像">
                                </div>
                            </div>
                          </div>

                          <div class="w-full mt-8">
                              <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                  新規登録
                              </button>
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
                        
<script>
// --- UUID(一意の識別子)生成 (1回だけ定義)
window.generateUUID = function() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
};

// セッションから画像データを取得
let sessionImages = {!! json_encode(session('tmp_images', [])) !!}; 
let sessionFileNames = {!! json_encode(session('file_names', [])) !!};
let sessionImageOrder = {!! json_encode(session('image_order', [])) !!};
// ✅ セッション画像を position の昇順でソート
sessionImageOrder.sort((a, b) => a.position - b.position);

console.log("🔥 セッションから復元した画像リスト:", sessionImages);
console.log("🔥 セッションから復元したファイル名リスト:", sessionFileNames);
console.log("🔥 セッション画像順序:", sessionImageOrder);

// ⭐️ 画像プレビュー & 削除機能
document.addEventListener("DOMContentLoaded", function() { // これがないと、HTMLの読み込み前にJavaScriptが実行され、エラーになることがある
    // ✅ 変数の初期化
    let selectedFiles = []; // 選択した画像のデータを保持(JavaScriptでは、input type="file"のfilesを直接変更できないため、selectedFilesにデータを保持しておく)
    const mainImageContainer = document.getElementById("mainImageContainer"); // 「大きなプレビュー画像」div要素
    const mainImage = document.getElementById("mainImage"); // 「大きなプレビュー画像」img要素
    const imageInput = document.getElementById("image_path"); // <input type="file">
    const tmpImageInput = document.getElementById("tmp_image");
    const imagePreviewContainer = document.getElementById("imagePreviewContainer");
    let dataTransfer = new DataTransfer();

    // ✅ セッションから画像を復元
    if (sessionImages.length > 0) {
        console.log("セッションから画像を復元:", sessionImages);
        // sessionImages.forEach((sessionImage, index) => {
          sessionImageOrder.forEach((sessionImage, index) => {
            let sessionFileName = sessionFileNames[index] || "unknown";
            let fileName = sessionImage.fileName;
            let imageSrc = sessionImage.src;
            previewImages(imageSrc, fileName, true, null, null, index);
          });
    }

    imageInput.addEventListener("change", function(event) {
        console.log("画像選択イベント発火");
        const files = event.target.files;
        if (!files || files.length === 0) return;

        let newDataTransfer = new DataTransfer();
            // 既存のファイルを DataTransfer に追加（null でないことを確認）
        selectedFiles.forEach(fileObj => {
            if (fileObj.file) { // `file` が null でない場合のみ追加
              newDataTransfer.items.add(fileObj.file);
            }
        });

        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
              previewImages(e.target.result, file.name, false, newDataTransfer , file, null);
            };
            reader.readAsDataURL(file);
        });

        imageInput.files = newDataTransfer.files;

        console.log("🔥 `imageInput.files` の内容:", imageInput.files);
    });

    // ✅ プレビューを表示
    function previewImages(imageSrc, fileName, isSessionImage = false, dataTransfer = null, file = null, position) {
        const imageId = "image_" + generateUUID();
        fileName = fileName.trim(); // 空白削除(uniqueIdを生成時、無駄なスペースが混ざらないように)
        let uniqueId = generateUUID() + '_' + fileName; // UUID

        // 既存の DataTransfer が null の場合、新しく作成
        if (!dataTransfer) {
            dataTransfer = new DataTransfer();
        }

        // セッション画像なら storage パスを付与
        if (isSessionImage) {
            imageSrc = "/storage/" + imageSrc;
        } else if (file) {
            dataTransfer.items.add(file); // 新規アップロードの画像のみ追加
        }

        selectedFiles.push({ id: imageId, uniqueId, file: file, src: imageSrc });
        console.log("✅ 追加後の selectedFiles:", selectedFiles); // selectedFiles の状態を確認

        // サムネイルを表示する要素を作成
        const imageWrapper = document.createElement("div");
        imageWrapper.classList.add("relative", "w-24", "h-24");
        imageWrapper.dataset.imageId = imageId; // dataset にIDをセット
        imageWrapper.dataset.fileName = fileName;  // `fileName` をセット
        imageWrapper.dataset.uniqueId = uniqueId;  // `uniqueId` をセット

        // <img> タグを作成し、画像を設定する
        const img = document.createElement("img");
        img.src = imageSrc;
        img.classList.add("w-full", "h-full", "object-cover", "object-center", "rounded", "cursor-pointer");
        img.id = imageId;
        img.onclick = function() {
            changeMainImage(imageSrc);
        };

        // 削除ボタンの作成
        const removeButton = document.createElement("button");
        removeButton.textContent = "×";
        removeButton.classList.add("absolute", "top-0", "right-0", "bg-black", "bg-opacity-50", "text-white", "px-2", "py-1", "text-xs", "rounded-full", "hover:bg-opacity-70");
        removeButton.onclick = function(event) {
            event.preventDefault(); // ページのリロードを防ぐ
            console.log(`🛠 削除ボタンが押された - imageId: ${imageId}`);
            removeImage(imageId, imageSrc);
        };

        imageWrapper.appendChild(img); // img要素をimageWrapperに追加。これでimageWrapperの中に画像が表示される。
        imageWrapper.appendChild(removeButton); // 画像の横に削除ボタンが表示される
        imagePreviewContainer.appendChild(imageWrapper); // 画面上にプレビューが表示される

        // 追加ごとに大きなプレビューを追加画像に変更
        changeMainImage(imageSrc);
        mainImageContainer.classList.remove("hidden");

        // ✅ ファイルのアップロードがあった場合、 `imageInput.files` を更新
        if (!isSessionImage) {
            imageInput.files = dataTransfer.files; // ユーザーがアップロードしたファイルのリストをinput[type="file"]に反映させる
            console.log("🔥 `imageInput.files` の内容:", imageInput.files);
        }
    };

    // ✅ 画像を削除
    function removeImage(imageId, imageSrc) {
        console.log(`画像 ${imageId} を削除`);
        console.log("🔍 現在の selectedFiles:", selectedFiles); // 現在の selectedFiles を確認

        // 削除対象の画像情報を取得
        let removedImage = selectedFiles.find(image => image.id === imageId);

        if (!removedImage) {
            console.error(`❌ 削除対象の画像が見つかりません - imageId: ${imageId}`);
            return;
        }

        // `selectedFiles`から対象の画像以外で再構成(=対象画像を削除)
        selectedFiles = selectedFiles.filter(image => image.id !== imageId); // filter() = 配列の中身を条件で絞り込むメソッド | selectedFilesをimageに代入して、selectedFilesのidを取得しているイメージ
        // 🔍 削除後の selectedFiles を確認
        console.log("✅ 削除後の selectedFiles:", selectedFiles);

        // `DataTransfer`を作成し、削除後のリストをセット
        let dataTransfer = new DataTransfer();
        selectedFiles.forEach(image => {
            if (image.file) { // `file` が null でない場合のみ追加
              dataTransfer.items.add(image.file);
            }
        });

        // `input.files`を更新
        imageInput.files = dataTransfer.files;

        // DOMから該当の画像を削除
        const imageElement = document.getElementById(imageId);
        if (imageElement) {
            imageElement.parentElement.remove();
        }

        // メイン画像のリセット（リストの最初の画像をメインにする or 非表示）
        if (selectedFiles.length > 0) {
            changeMainImage(selectedFiles[0].src);
        } else {
            mainImage.src = "";
            mainImageContainer.classList.add("hidden");
        }

        // ✅ セッションの画像を削除するためにサーバーにリクエストを送る
        if (!removedImage.file) { // ファイルオブジェクトが null ならセッション画像
            removeSessionImage(removedImage.src);
            console.log("🚀 サーバーへ削除リクエスト:", imageSrc); // ✅
        }

        updateSessionImagesInput(); // ✅ フォームの <input> を更新
        updateImageOrder(); // ✅ 画像の並び順を更新 (★ここを追加！)
    }

    // ✅ セッション画像削除後のフォームの <input> を更新
    function updateSessionImagesInput() {
        let form = document.getElementById("createForm");

        if (!form) {
            console.error("❌ createForm が見つかりません！");
            return;
        }

        // `tmp_images[]` の既存 `hidden input` を削除
        document.querySelectorAll("input[name='tmp_images[]']").forEach(input => input.remove());

        let tmpImages = selectedFiles
            .filter(image => !image.file)
            .map(image => image.src.replace("/storage/", "")); // `storage/` を削除

        console.log("🔥 削除後の `tmp_images[]`:", tmpImages);
        
        if (tmpImages.length === 0) {
            console.log("⚠️ セッション画像がゼロなので、`tmp_images[]` を送信しない");
            return; // 🚀 ここで関数を終了する
        }

        tmpImages.forEach(imageSrc => {
            let hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "tmp_images[]";
            hiddenInput.value = imageSrc;
            form.appendChild(hiddenInput);
        });

        console.log("✅ `tmp_images[]` 更新後:", document.querySelectorAll("input[name='tmp_images[]']"));
    }

    function updateImageOrder() {
        saveImageOrder(); // `saveImageOrder()` を呼び出して並び順を更新
    }

    // ✅ メインプレビュー変更
    function changeMainImage(src) {
        console.log("🚀 修正前の削除リクエスト:", src);

        // ✅ 修正: `src` が `tmp/xxx.jpg` 形式なら `/storage/tmp/xxx.jpg` に変換
        if (src.startsWith("tmp/")) {
            src = "/storage/" + src;
        }

        // ✅ `collections/` が勝手に入っていたら削除
        if (src.includes("collections")) {
            src = src.replace("collections/", "");
        }

        mainImage.src = src; // メイン画像を変更 (mainImage.src = src)。
        mainImageContainer.classList.remove("hidden"); // メイン画像を変更 (mainImage.src = src)。
    }

    // ✅ セッション画像を削除するための関数
    function removeSessionImage(imageSrc) {
        fetch('/remove-session-image', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRFトークンを設定
            },
            body: JSON.stringify({ tmp_image: imageSrc })
        })
        .then(response => response.json())
        .then(data => {
            console.log("サーバーからの応答:", data.message);
        })
        .catch(error => {
            console.error("エラー:", error);
        });
    }
});
</script>

{{----------- サムネイル移動、順番確定 -----------}}
<!-- SortableJSのCDNを追加 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<script>
// // --- 画像の並び順を保存
function saveImageOrder() { // 画像の並び順を保存する関数
    let imageOrder = []; // 画像の順番を格納するための空配列を作成

    // 画像の順番を格納するための空配列へ順番に保存
    document.querySelectorAll("#imagePreviewContainer div").forEach((div, index) => { // #imagePreviewContainer内のすべての<div>(画像ラッパー)を取得 | indexは0から順番につく
        const fileName = div.dataset.fileName;
        const uniqueId = div.dataset.uniqueId;

        if (uniqueId) {
            imageOrder.push({fileName, uniqueId, position: index});
        }
    });

    console.log("🚀 送信する並び順:", imageOrder);

    // 既存のhidden inputを削除(重複を防いで、最新の画像順序データだけを送信)
    document.querySelectorAll("input[name='image_order']").forEach(input => input.remove());

    const form = document.getElementById("createForm");
    if (!form) {
        console.error("❌ フォームが見つかりません！");
        return;
    }

    // フォームにhidden inputを追加
    let hiddenInput = document.createElement("input");
    hiddenInput.type = "hidden";
    hiddenInput.name = "image_order";
    hiddenInput.value = JSON.stringify(imageOrder); // オブジェクト配列を文字列化 | valueは文字列しかセットできないので、オブジェクトを文字列にする必要がある
    form.appendChild(hiddenInput);

    console.log("✅ hidden input に保存:", hiddenInput.value);
}

// ----------- SortableJS(ドラッグ&ドロップ)を適用 ----------- 
document.addEventListener("DOMContentLoaded", function () {
  let imageOrderUpdated = false; // 🔹 `saveImageOrder()` が実行されたかどうかを管理する変数
  const imagePreviewContainer = document.getElementById("imagePreviewContainer");

  if (!imagePreviewContainer) {
      console.error("❌ imagePreviewContainer が見つかりません！");
      return;
  }

  // --- SortableJS(ドラッグ&ドロップ)を適用
  const sortable = new Sortable(imagePreviewContainer, { // new Sortable()を使ってimagePreviewContainer内の要素をドラッグ&ドロップ可能にする
      animation: 150, // スムーズなアニメーション
      ghostClass: "sortable-ghost", // ドラッグ中のスタイルを変更
      onEnd: function () { // onEndイベント = 要素の移動が確定したときに発火
          saveImageOrder();
          imageOrderUpdated = true; // 🔹 並び替えが行われたので true に設定
      },
  });

  // --- ✅ フォーム送信時に `image_order` を確実に更新
  document.getElementById("createForm").addEventListener("submit", function(event) {
      if (!imageOrderUpdated) {
          saveImageOrder(); // 🔹 並び替えが行われていない場合のみ実行
      }
  }, { once: true });
});
</script>
</x-app-layout>
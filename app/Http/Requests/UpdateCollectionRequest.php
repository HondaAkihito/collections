<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCollectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:50'],
            'technology_tag_ids' => ['nullable', 'array'],
            'technology_tag_ids.*' => ['integer', 'exists:technology_tags,id'], // 配列の中の各要素に対してこのバリデーションルールを適用
            'feature_tag_ids' => ['nullable', 'array'],
            'feature_tag_ids.*' => ['integer', 'exists:feature_tags,id'],
            'description' => ['nullable', 'string', 'max:10000'],
            'url_qiita' => ['nullable', 'url', 'max:500'],
            'url_webapp' => ['nullable', 'url', 'max:500'],
            'url_github' => ['nullable', 'url', 'max:500'],
            'url_youtube' => ['nullable', 'url', 'max:500'],
            'is_public' => ['required', 'boolean'],
            'position' => ['required', 'integer'],
            'image_path' => ['array'],
            'image_path.*' => ['image', 'mimes:jpeg,jpg,png,webp,avif', 'max:10240'], // 個々のファイル検証
            'delete_images' => ['array'],
            'private_memo' => ['nullable', 'string', 'max:10000'],
        ];
    }

    // ⭐️ カスタムバリデーション: 画像が1枚以上あるかをチェック
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $collection = $this->route('collection'); // モデル取得

            $hasNewImages = $this->hasFile('image_path'); // 新しい画像があるか
            $existingImageCount = $collection->collectionImages->count(); // 現在DBに保存されている画像の枚数
            $deleteImageIds = $this->input('delete_images', []); // 削除画像ID
            $remainingImages = $existingImageCount - count($deleteImageIds); // 削除後に、何枚の既存画像が残るかを計算(編集後に残る既存画像の枚数)

            // ✅ 新しい画像もなく、残る既存画像も0枚 → エラー
            if (!$hasNewImages && $remainingImages <= 0) {
                $validator->errors()->add('image_path', '画像は最低1枚必要です。');
            }
        });
    }
}

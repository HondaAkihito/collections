<?php

namespace App\Http\Controllers\PublicSite;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Service\PublicSite\CollectionService;


class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 🔹 データ取得
        $collections = Collection::where('is_public', 1)
        ->orderBy('created_at', 'desc')
        ->with([
            'collectionImages' => fn($query) => $query->orderBy('position', 'asc'),
          ])
        ->paginate(6);

        // 🔹 image_pathの最初を取得
        foreach($collections as $collection) {
            $collection->firstImage = optional($collection->collectionImages->first())->image_path; // optional(...) = 	nullでも安全にアクセス(エラーにならない)
        }

        return view('public_site.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // コレクション&画像&技術タグのテーブルを取得
        $collection = CollectionService::getCollectionWithRelations($id);

        // メイン画像
        $firstImage = $collection->collectionImages->first();
        $mainImagePath = $firstImage ? asset('storage/collection_images/' . $firstImage->image_path) : asset('storage/collection_images/noImage.jpg');

        return view('public_site.show', compact('collection', 'mainImagePath'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

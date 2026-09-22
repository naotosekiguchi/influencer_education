<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller {

    // バナー設定画面表示
    public function showBannerEdit() {
        $banners = Banner::all();
        return view('admin.banner_edit', compact('banners'));
    }

    public function update(Request $request) {

        // ① 削除処理
        $bannerIds = $request->input('banner_ids', []);
    
        Banner::whereNotIn('id', $bannerIds)->delete();
    
    
        // ② 画像差し替え処理
        $files = $request->file('banners', []);
    
        foreach ($files as $id => $file) {
    
            $fileName = $file->getClientOriginalName();
    
            $file->storeAs(
                'images/banner',
                $fileName,
                'public'
            );
    
            $imagePath = 'storage/images/banner/' . $fileName;
    
            Banner::where('id', $id)->update([
                'image' => $imagePath
            ]);
        }

        // ③新規追加処理
        $newBanners = $request->file('new_banners', []);

        foreach ($newBanners as $banner) {

            $fileName = $banner->getClientOriginalName();

            $banner->storeAs(
                'images/banner',
                $fileName,
                'public'
            );

            Banner::create([
                'image' => 'storage/images/banner/' . $fileName
            ]);
        }
    
        return redirect()
            ->route('admin.show.banner.edit')
            ->with('success', '登録しました。');
        }
}

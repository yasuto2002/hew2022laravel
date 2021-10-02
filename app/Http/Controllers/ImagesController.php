<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class ImagesController extends Controller
{
     public function create(Request $request)
  {
      $images = $request->allFiles();
    $images=$images['item_url'];
    // dd($images);
    //   dd($request->files-parameters::protected);
    //   $post = new Post;
    //   $form = $request->all();

    //   //s3アップロード開始
    //   $images = $request->files('item_url');
    //   dd($request);
       foreach($images as $image){
      // バケットの`myprefix`フォルダへアップロード
     Storage::disk('s3')->putFile('/hew', $image, 'public');
      }
    //   // アップロードした画像のフルパスを取得
    //   $post->image_path = Storage::disk('s3')->url($path);

    //   $post->save();

      return redirect('images');
  }
}

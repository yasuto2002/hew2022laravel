<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImgController extends Controller
{
    public function store(ItemRequest $request)
    {
        $disk = Storage::disk('s3');
        $images = $request->file('item_url');
        foreach ( $images as $image) {
            $path = $disk->putFile('itemImages', $image, 'public');
            $url[] = $disk->url($path);
        }

        return view('item.top');
    }
    public function index(Request $request){
        return view('s3up');
    }
     public function post(Request $request){
        return view('admin.imgup',['msg'=>$request->text]);
    }
    public function create(Request $request)
  {
    //   $post = new Post;
      $form = $request->all();

      //s3アップロード開始
      $image = $request->file('image');
      // バケットの`myprefix`フォルダへアップロード
     Storage::disk('s3')->putFile('/hew', $request->file('file'), 'public');
    //   // アップロードした画像のフルパスを取得
    //   $post->image_path = Storage::disk('s3')->url($path);

    //   $post->save();

      return redirect('img');
  }
}

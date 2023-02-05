<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\History;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function add()
    {
        return view('admin.news.create');
    }
    
    
    public function create(Request $request)//新しく追加
    {
        $this->validate($request, News::$rules);//Validationを行う（入力チェック）
        //Validationがエラーがあったときに次に進まないで、エラー表示しで戻る。
        $news = new News;//モデルクラスのインスタンスを作ってる
        $form = $request->all();//画面から送信されたデータがすべて配列になって代入される
        
        
        if (isset($form['image'])) { //image（画像が送信されてたら）があったら
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);//ファイル名のみ取得する
        } else {
            $news->image_path = null;
        }
        
        
        unset($form['_token']);//csrfトークンはデータベースに入れないので消しておく
        
        unset($form['image']);//ファイルそのものはDBに入れないので消しておく
        
        $news->fill($form);
       
        $news->save();
        
        return redirect('admin/news/create');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = News::where('title', $cond_title)->get();
        } else {
            $posts = News::all();
        }
        
        return view('admin.news.index', ['posts' =>$posts, 'cond_title' =>$cond_title]);
    }
    
    public function edit(Request $request)
    {
        $news = News::find($request->id);
        if (empty($news)) {
            abort(404);
        }
        return view('admin.news.edit',['news_form'=>$news]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, News::$rules);//Validation を行う
        
        $news = News::find($request->id);//更新対象のNewsのidを取得する
        
        $news_form = $request->all();
        
        if ($request->remove == 'true') { //imageの削除にチェック入ってたら
            $news_form['image_path'] = null; 
        } elseif ($request->file('image')) { //imageが送信されてたら（画像変更されたら）
            $path = $request->file('image')->store('public/image');
            $news_form['image_path'] = basename($path);
        } else {
            $news_form['image_path'] = $news->image_path;//変更なしなら
        }
        
        //データベースに入らない情報を削除
        unset($news_form['image']);
        unset($news_form['remove']);
        unset($news_form['_token']);
        
        $news->fill($news_form)->save(); //
        
        $history = new History();
        $history->news_id = $news->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/news');
    }
    
    public function delete(Request $request)
    {
        $news = News::find($request->id);
        
        $news->delete();
        
        return redirect('admin/news/');
    }
}

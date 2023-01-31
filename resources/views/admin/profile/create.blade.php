{{-- layouts/admin,blade.phpを読み込む--}}
@extends('layouts.profile')


{{-- admin.blade.php の@yield('titke')にニュースの新規作成を埋め込む--}}
@section('title','プロフィールの新規作成')


{{-- profile.blade.php　の@yield('content')に以下のタグを埋め込む  --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール</h2>
            </div>
        </div>
    </div>
@endsection
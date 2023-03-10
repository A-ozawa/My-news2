{{-- layouts/profile,blade.phpを読み込む--}}
@extends('layouts.profile')


{{-- admin.blade.php の@yield('titke')にニュースの新規作成を埋め込む--}}
@section('title','プロフィールの新規作成')


{{-- profile.blade.php　の@yield('content')に以下のタグを埋め込む  --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール</h2>
                <form action="{{route('admin.profile.create') }}" method="post"
                enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach    
                        </ul>
                    @endif
                    <div class="form-group row">
                        <lavel class="col-md-2">氏名</lavel>
                        
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <lavel class="col-md-2">性別</lavel>
                        
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender')}}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <lavel class="col-md-2">趣味</lavel>
                        
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ old('hobby')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <lavel class="col-md-2">自己紹介</lavel>
                        
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
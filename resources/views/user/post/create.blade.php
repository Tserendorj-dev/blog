@extends('layouts.main')

@section('content')
<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    @include('common.errors')
                    <p>Create Post</p>
                    <form action="/mypost/store" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="cat_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->cat_id }}">{{ $category->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input name="title" class="form-control" placeholder="タイトル">
                    </div>
                    <div class="form-group">
                        <label>画像</label>
                        <input type="file" name="pic_path" id="pic_path">
                    </div>
                    <div class="form-group">
                        <label>記事内容</label>
                        <textarea class="form-control" id="desc_text" name="desc_text" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>記事内容</label>
                        <textarea id="full_text" name="full_text"></textarea>
                        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'full_text', {
                                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                                filebrowserUploadMethod: 'form'
                            });
                        </script>
                    </div>
                    <div class="form-group">
                        <label>言語</label>
                        <select name="lang" class="form-control">
                            <option value="jp">日本語</option>
                            <option value="mn">モンゴル語</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Create</button>
                    <a href="/{{ app()->getLocale() }}/mypost" class="btn btn-default">戻る</a>
                </form>

                </div>
                

                <!-- ##### rightSide Start ##### -->
                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">
                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">
                            @include('rightSide')
                        </div>
                    </div>
                </div>
                <!-- ##### rightSide End ##### -->

            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
@endsection
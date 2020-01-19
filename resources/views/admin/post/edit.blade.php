@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">記事</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                記事更新
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                    @include('common.errors')
                <form action="{{ route('posts.update', 1) }}" method="POST">
                @csrf
                @method('PUT')
                    <input name="redirects_to" value="{{ URL::previous() }}" type="hidden">
                    <div class="form-group">
                        <label>カテゴリー名</label>
                        <select class="form-control" name="cat_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->cat_id }}" @if($post->cat_id == $category->cat_id )  selected @endif > {{ $category->cat_name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>記事タイトル</label>
                        <input name="title" value="{{ $post->title }}" class="form-control" placeholder="タイトル">
                    </div>
                    <div class="form-group">
                        <label>記事内容</label>
                        <textarea class="form-control" id="desc_text"" rows="3">{{ $post->desc_text }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>記事内容</label>
                        <div id="full_text">
                            <p>{{ $post->full_text }}</p>
                        </div>
                        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'full_text' );
                        </script>
                    </div>
                    <div class="form-group">
                        <label>言語</label>
                        <select name="lang" class="form-control">
                            <option value="jp" <?php if($post->lang=='jp'){echo "selected";} ?> >日本語</option>
                            <option value="mn" <?php if($post->lang=='mn'){echo "selected";} ?> >モンゴル語</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>表示・非表示</label>
                        <select name="is_visible" class="form-control">
                            <option value="1" <?php if($post->is_visible==1){echo "selected";} ?> >表示</option>
                            <option value="0" <?php if($post->is_visible==0){echo "selected";} ?> >非表示</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">更新</button>
                    <a href="{{ URL::previous() }}" class="btn btn-default">戻る</a>
                </form>
                    </div>
                </div>
                
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection
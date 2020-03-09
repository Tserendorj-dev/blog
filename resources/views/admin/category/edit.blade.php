@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">記事カテゴリー</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                カテゴリー更新
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                @include('common.errors')
                <form action="{{ route('categories.update', $category->cat_id) }}"" method="POST">
                @csrf
                @method('PATCH')
                <input name="redirects_to" value="{{ URL::previous() }}" type="hidden">
                    <div class="form-group">
                        <label>カテゴリー名</label>
                        <input name="cat_name" value="{{ $category->cat_name }}" class="form-control" placeholder="カテゴリー名">
                    </div>
                    <div class="form-group">
                        <label>言語</label>
                        <select name="lang" class="form-control">
                            <option value="jp" <?php if($category->lang=='jp'){echo "selected";} ?> >日本語</option>
                            <option value="mn" <?php if($category->lang=='mn'){echo "selected";} ?> >モンゴル語</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>表示・非表示</label>
                        <select name="is_visible" class="form-control">
                            <option value="1" <?php if($category->is_visible==1){echo "selected";} ?> >表示</option>
                            <option value="0" <?php if($category->is_visible==0){echo "selected";} ?> >非表示</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">更新</button>
                    <a href="{{ URL::previous() }}" class="btn btn-default">戻る</a>
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection
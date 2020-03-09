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
                カテゴリー登録
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                @include('common.errors')
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>カテゴリー名</label>
                        <input name="cat_name" class="form-control" placeholder="カテゴリー名">
                    </div>
                    <div class="form-group">
                        <label>言語</label>
                        <select class="form-control" name="lang">
                            <option value="jp">日本語</option>
                            <option value="mn">モンゴル語</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>表示・非表示</label>
                        <select class="form-control" name="is_visible">
                            <option value="1">表示</option>
                            <option value="0">非表示</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">新規登録</button>
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
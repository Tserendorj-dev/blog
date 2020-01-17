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
        <div style="padding-bottom:10px;text-align:right">
            <a href="/categories/create" class="btn btn-success">新規登録</a>
        </div>
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}  
            </div><br />
        @endif
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                検索
            </div>
            <div class="panel-body">
                <form action="\categories">
                       <table>
                        <tr>
                            <td><label>カテゴリー名</label></td>
                            <td style="padding-left:15px;"><label>言語</label></td>
                            <td style="padding-left:15px;"><label>表示・非表示</label></td>
                        </tr>
                        <tr>
                            <td>
                                <input name="cat_name" value="{{ isset(request()->cat_name)?request()->cat_name:'' }}" class="form-control" placeholder="カテゴリー名">
                            </td>
                            <td style="padding-left:15px;">
                                <select class="form-control" name="lang">
                                    <option value="" @if(request()->lang == '' )  selected @endif >全て</option>
                                    <option value="jp" @if(request()->lang == 'jp' )  selected @endif >日本語</option>
                                    <option value="mn" @if(request()->lang == 'mn' )  selected @endif >モンゴル語</option>
                                </select>
                            </td>
                            <td style="padding-left:15px;">
                                <select class="form-control" name="is_visible">
                                    <option value="" @if(request()->is_visible == '' )  selected @endif >全て</option>
                                    <option value="1" @if(request()->is_visible == '1' )  selected @endif >表示</option>
                                    <option value="0" @if(request()->is_visible == '0' )  selected @endif >非表示</option>
                                </select>
                            </td>
                        </tr>
                       </table>
                       <br>
                    <button type="submit" class="btn btn-default">検索</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                カテゴリー一覧
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">№</th>
                                <th>カテゴリー名</th>
                                <th>言語</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($catList as $cat)
                            <tr>
                                <td>{{ $loop->index + $catList->firstItem() }}</td>
                                <td>{{ $cat->cat_name }}</td>
                                <td>{{ $cat->lang }}</td>
                                <td width="20px;">
                                    @if ($cat->is_visible===0) 
                                    <a href="/catvisible/{{ $cat->cat_id }}" class="btn btn-warning">非表示</a>
                                    @elseif ($cat->is_visible===1)
                                    <a href="/catisvisible/{{ $cat->cat_id }}" class="btn btn-info">表示</a>
                                    @endif
                                </td>
                                <td width="20px;">
                                    <a href="{{ route('categories.edit', $cat->cat_id) }} " class="btn btn-primary">更新</a>
                                </td>
                                <td width="20px;">
                                    <form action="{{ route('categories.destroy', $cat->cat_id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onClick="deleteConfirm(event);return false;">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        {{ $catList->onEachSide(5)->links() }}
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection
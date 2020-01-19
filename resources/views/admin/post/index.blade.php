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
                <form action="\posts">
                       <table>
                        <tr>
                            <td><label>Бүлэг нэр</label></td>
                            <td style="padding-left:15px;"><label>Хэрэглэгч</label></td>
                            <td style="padding-left:15px;"><label>Гарчиг</label></td>
                            <td style="padding-left:15px;"><label>Хэл</label></td>
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="cat_id">
                                    <option value="" @if(request()->cat_id == '' )  selected @endif >全て</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->cat_id }}" @if(request()->cat_id == $category->cat_id )  selected @endif > {{ $category->cat_name }} </option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="padding-left:15px;">
                                <select class="form-control" name="user_id">
                                    <option value="" @if(request()->user_id == '' )  selected @endif >全て</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @if(request()->user_id == $user->id )  selected @endif > {{ $user->name }} </option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="padding-left:15px;">
                                <input name="title"" value="{{ isset(request()->title)?request()->title:'' }}" class="form-control" placeholder="タイトル">
                            </td>
                            <td style="padding-left:15px;">
                                <select class="form-control" name="lang">
                                    <option value="" @if(request()->lang == '' )  selected @endif >全て</option>
                                    <option value="jp" @if(request()->lang == 'jp' )  selected @endif >日本語</option>
                                    <option value="mn" @if(request()->lang == 'mn' )  selected @endif >モンゴル語</option>
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
                記事一覧
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">№</th>
                                <th>Бүлэг</th>
                                <th>Гарчиг</th>
                                <th>Хэрэглэгч</th>
                                <th>Хэл</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($postsList as $post)
                            <tr>
                                <td>{{ $loop->index + $postsList->firstItem() }}</td>
                                <td>{{ $post->category->cat_name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->lang }}</td>
                                <td width="20px;">
                                    @if ($post->is_visible===0) 
                                    <a href="/postvisible/{{ $post->post_id }}" class="btn btn-warning">非表示</a>
                                    @elseif ($post->is_visible===1)
                                    <a href="/postisvisible/{{ $post->post_id }}" class="btn btn-info">表示</a>
                                    @endif
                                </td>
                                <td width="20px;">
                                    <a href="{{ route('posts.edit', $post->post_id) }} " class="btn btn-primary">更新</a>
                                </td>
                                <td width="20px;">
                                    <form action="{{ route('posts.destroy', $post->post_id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onClick="deleteConfirm(event);return false;">削除</button>
                                    </form>
                                </td>
                            </tr>
                                @endforeach
                        </tbody>
                    </table>
                        {{ $postsList->onEachSide(5)->links() }}
                        
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
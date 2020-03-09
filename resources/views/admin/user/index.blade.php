@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">管理画面</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div style="padding-bottom:10px;text-align:right">
            <a href="/users/create" class="btn btn-success">新規登録</a>
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
                <form action="\users">
                       <table>
                        <tr>
                            <td><label>ユーザー名</label></td>
                            <td style="padding-left:15px;"><label>メール</label></td>
                            <td style="padding-left:15px;"><label>ユーザーレベル</label></td>
                        </tr>
                        <tr>
                            <td>
                                <input name="name" value="{{ isset(request()->name)?request()->name:'' }}" class="form-control" placeholder="ユーザー名">
                            </td>
                            <td style="padding-left:15px;">
                                <input name="email" value="{{ isset(request()->email)?request()->email:'' }}" class="form-control" placeholder="メール">
                            </td>
                            <td style="padding-left:15px;">
                                <select class="form-control" name="level">
                                    <option value="" @if(request()->level == '' )  selected @endif >全て</option>
                                    <option value="1" @if(request()->level == '1' )  selected @endif >管理ユーザー</option>
                                    <option value="2" @if(request()->level == '2' )  selected @endif >一般ユーザー</option>
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
                ユーザー一覧
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">№</th>
                                <th>ユーザー名</th>
                                <th>メール</th>
                                <th>ユーザーレベル</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($usersList as $user)
                            <tr>
                                <td>{{ $loop->index + $usersList->firstItem() }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->level===1) 
                                     管理者ユーザー
                                    @else
                                     一般ユーザー
                                    @endif
                                </td>
                                <td width="20px;"><a href="{{ route('users.edit', $user->id) }} " class="btn btn-primary">更新</a></td>
                                <td width="20px;">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onClick="deleteConfirm(event);return false;">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                    {{ $usersList->onEachSide(5)->links() }}    
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
@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">管理者画面</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                ユーザー更新
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                @include('common.errors')
                <form action="{{ route('users.update', $user->id) }}"" method="POST">
                @csrf
                @method('PATCH')
                <input name="redirects_to" value="{{ URL::previous() }}" type="hidden">
                    <div class="form-group">
                        <label>ユーザー名</label>
                        <input name="name" value="{{ $user->name }}" class="form-control" placeholder="ユーザー名">
                    </div>
                    <div class="form-group">
                        <label>メール</label>
                        <input name="email" value="{{ $user->email }}" class="form-control" placeholder="メール">
                    </div>
                    <div class="form-group">
                        <label>ユーザーレベル</label>
                        <select name="level" class="form-control">
                            <option value="1" <?php if($user->level=='1'){echo "selected";} ?> >管理者ユーザー</option>
                            <option value="2" <?php if($user->level=='2'){echo "selected";} ?> >一般ユーザー</option>
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
@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">評価</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div style="padding-bottom:10px;text-align:right">
            <a href="/rates/create" class="btn btn-success">新規登録</a>
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
                <form action="\rates">
                       <table>
                        <tr>
                            <td><label>評価名（日本語）</label></td>
                            <td style="padding-left:15px;"><label>評価名（モンゴル語）</label></td>
                        </tr>
                        <tr>
                            <td>
                                <input name="rate_name_jp" value="{{ isset(request()->rate_name_jp)?request()->rate_name_jp:'' }}" class="form-control" placeholder="評価名">
                            </td>
                            <td style="padding-left:15px;">
                                <input name="rate_name_mn" value="{{ isset(request()->rate_name_mn)?request()->rate_name_mn:'' }}" class="form-control" placeholder="評価名">
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
                評価一覧
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">№</th>
                                <th>評価名（日本語）</th>
                                <th>評価名（モンゴル語）</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($ratesList as $rate)
                            <tr>
                                <td>{{ $loop->index + $ratesList->firstItem() }}</td>
                                <td>{{ $rate->rate_name_jp }}</td>
                                <td>{{ $rate->rate_name_mn }}</td>
                                <td width="20px;">
                                    <a href="{{ route('rates.edit', $rate->rate_id) }} " class="btn btn-primary">更新</a>
                                </td>
                                <td width="20px;">
                                    <form action="{{ route('rates.destroy', $rate->rate_id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onClick="deleteConfirm(event);return false;">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        {{ $ratesList->onEachSide(1)->links() }}
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
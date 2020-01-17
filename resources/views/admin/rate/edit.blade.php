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
        <div class="panel panel-default">
            <div class="panel-heading">
                評価更新
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                @include('common.errors')
                <form action="{{ route('rates.update', $rate->rate_id) }}"" method="POST">
                @csrf
                @method('PATCH')
                <input name="redirects_to" value="{{ URL::previous() }}" type="hidden">
                    <div class="form-group">
                        <label>評価名（日本語）</label>
                        <input name="rate_name_jp" value="{{ $rate->rate_name_jp }}" class="form-control" placeholder="評価名">
                    </div>
                    <div class="form-group">
                        <label>評価名（モンゴル語）</label>
                        <input name="rate_name_mn" value="{{ $rate->rate_name_mn }}" class="form-control" placeholder="評価名">
                    </div>
                    <div class="form-group">
                        <label>評価値</label>
                        <input name="rate_value" value="{{ $rate->rate_value }}" class="form-control" placeholder="評価値">
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
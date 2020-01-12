@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Сайтын удирдлага</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Мэдээний бүлэг нэмэх
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                @include('common.errors')
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Бүлэг нэр</label>
                        <input name="cat_name" class="form-control" placeholder="Бүлэг нэр">
                    </div>
                    <div class="form-group">
                        <label>Хэл</label>
                        <select class="form-control" name="lang">
                            <option value="mn">MN</option>
                            <option value="en">EN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Харагдах</label>
                        <select class="form-control" name="is_visible">
                            <option value="1">Тийм</option>
                            <option value="0">Үгүй</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Нэмэх</button>
                    <a href="{{ URL::previous() }}" class="btn btn-default">Буцах</a>
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection
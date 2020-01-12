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
                Мэдээний бүлэг засах
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                @include('common.errors')
                <form action="{{ route('categories.update', $category->cat_id) }}"" method="POST">
                @csrf
                @method('PATCH')
                    <div class="form-group">
                        <label>Бүлэг нэр</label>
                        <input name="cat_name" value="{{ $category->cat_name }}" class="form-control" placeholder="Бүлэг нэр">
                    </div>
                    <div class="form-group">
                        <label>Хэл</label>
                        <select name="lang" class="form-control">
                            <option value="mn" <?php if($category->lang=='mn'){echo "selected";} ?> >MN</option>
                            <option value="en" <?php if($category->lang=='en'){echo "selected";} ?> >EN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Харагдах</label>
                        <select name="is_visible" class="form-control">
                            <option value="1">Тийм</option>
                            <option value="0">Үгүй</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Засах</button>
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
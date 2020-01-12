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
        <div style="padding-bottom:10px;text-align:right"><a href="/categories/create" class="btn btn-success">Шинээр нэмэх</a></div>
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}  
            </div><br />
        @endif
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Хайлт
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    @csrf
                       <table>
                        <tr>
                            <td><label>Бүлэг нэр</label></td>
                            <td style="padding-left:15px;"><label>Хэл</label></td>
                            <td style="padding-left:15px;"><label>Харагдах</label></td>
                        </tr>
                        <tr>
                            <td><input name="cat_name" class="form-control" placeholder="Бүлэг нэр"></td>
                            <td style="padding-left:15px;">
                                <select class="form-control" name="lang">
                                    <option value="">Бүгд</option>
                                    <option value="mn">MN</option>
                                    <option value="en">EN</option>
                                </select>
                            </td>
                            <td style="padding-left:15px;">
                                <select class="form-control" name="is_visible">
                                    <option value="1">Бүгд</option>
                                    <option value="1">Тийм</option>
                                    <option value="0">Үгүй</option>
                                </select>
                            </td>
                        </tr>
                       </table>
                       <br>
                    <button type="submit" class="btn btn-default">Хайх</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Мэдээний бүлэг жагсаалт
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">№</th>
                                <th>Бүлэг нэр</th>
                                <th>Хэл</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($catList as $cat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cat->cat_name }}</td>
                                <td width="20px;">{{ $cat->lang }}</td>
                                <td width="20px;">
                                    @if ($cat->is_visible===0) 
                                    <a href="/catvisible/{{ $cat->cat_id }}" class="btn btn-warning">Харагдахгүй</a>
                                    @elseif ($cat->is_visible===1)
                                    <a href="/catisvisible/{{ $cat->cat_id }}" class="btn btn-info">Харагдана</a>
                                    @endif
                                </td>
                                <td width="20px;"><a href="{{ route('categories.edit', $cat->cat_id) }} " class="btn btn-primary">Засах</a></td>
                                <td width="20px;">
                                    <form action="{{ route('categories.destroy', $cat->cat_id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onClick="deleteConfirm(event);return false;">Устгах</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Өмнөх</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Дараах</a></li>
                        </ul>
                    </nav>
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
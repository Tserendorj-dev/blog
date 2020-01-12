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
        <div style="padding-bottom:10px;text-align:right"><a href="/categories/create">Шинээр нэмэх</a></div>
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
                                <td width="20px;"><a href="">Харагдах</a></td>
                                <td width="20px;"><a href="{{ route('categories.edit', $cat->cat_id) }}">Засах</a></td>
                                <td width="20px;"><a href="">Устгах</a></td>
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
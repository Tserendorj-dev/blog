@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div style="padding-bottom:10px;text-align:right"><a href="">Шинээр нэмэх</a></div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Хэрэглэгч жагсаалт
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="10px">№</th>
                                <th>Нэр</th>
                                <th>Түвшин</th>
                                <th>Э-майл</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td width="20px;"><a href="">Харагдах</a></td>
                                <td width="20px;"><a href="">Засах</a></td>
                                <td width="20px;"><a href="">Устгах</a></td>
                            </tr>
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
@endsection
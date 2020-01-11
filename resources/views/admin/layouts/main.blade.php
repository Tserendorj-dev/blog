<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>БЛОГ.МН Удирдлага</title>
        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('../css/admin/bootstrap.min.css') }}" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="{{ asset('../css/admin/metisMenu.min.css') }}" rel="stylesheet">
        <!-- Timeline CSS -->
        <link href="{{ asset('../css/admin/timeline.css') }}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{ asset('../css/admin/startmin.css') }}" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="{{ asset('../css/admin/morris.css') }}" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="{{ asset('../css/admin/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">БЛОГ.МН</a>
                </div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="{{ route('web') }}"><i class="fa fa-home fa-fw"></i>Нүүр хуудас</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Профайл</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Тохиргоо</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out fa-fw"></i>{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Хайлт...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="{{ route('dashboard') }}" class="active"><i class="fa fa-dashboard fa-fw"></i>Сайтын удирдлага</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-table fa-fw"></i> Хэрэглэгч</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-edit fa-fw"></i> Мэдээний бүлэг</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-edit fa-fw"></i> Мэдээ</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-edit fa-fw"></i> Сэтгэгдэл</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-edit fa-fw"></i> Үнэлгээ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                @yield('content')
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/admin/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/admin/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/admin/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/admin/raphael.min.js"></script>
        <script src="../js/admin/morris.min.js"></script>
        <script src="../js/admin/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/admin/startmin.js"></script>

    </body>
</html>
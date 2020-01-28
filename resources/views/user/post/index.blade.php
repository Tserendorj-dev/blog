@extends('layouts.main')

@section('content')
<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <p>My Posts</p>
                    @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}  
                        </div><br />
                    @endif
                    <div style="padding-bottom:10px;text-align:right">
                        <a href="mypost/create" class="btn btn-success">Create post</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                        <th scope="col">№</th>
                        <th scope="col">Category</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created</th>
                        <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($myList as $list)
                            <tr>
                            <th scope="row">{{ $loop->index + $myList->firstItem() }}</th>
                            <td>{{ $list->category->cat_name }}</td>
                            <td>{{ $list->title }}</td>
                            <td>{{ $list->created_at }}</td>
                            <td><a href="mypost/edit/{{ $list->post_id }} " class="btn btn-primary">Edit</a></td>
                            <td>
                                <form action="/mypost/delete" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $list->post_id }}">
                                    <button class="btn btn-danger" type="submit" onClick="deleteConfirm(event);return false;">Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        {{ $myList->onEachSide(1)->links() }}
                    </nav>
                </div>
                

                <!-- ##### rightSide Start ##### -->
                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">
                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">
                            @include('rightSide')
                        </div>
                    </div>
                </div>
                <!-- ##### rightSide End ##### -->

            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
@endsection
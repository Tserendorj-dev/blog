@extends('layouts.main')

@section('content')
<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-10">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        
                        @foreach($postList as $post)
                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post mb-30">
                            <div class="post-data">
                                <a href="/{{ app()->getLocale() }}/post/list/{{ $post->cat_id }}" class="post-catagory">{{ $post->category->cat_name }}</a>
                                <a href="/{{ app()->getLocale() }}/post/view/{{ $post->post_id }}" class="post-title">
                                    <h6>{{ $post->title }}</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">{{ $post->user->name }}</a></p>
                                    <p class="post-excerp">{{ $post->desc_text }}</p>
                                    <!-- Post Like & Post Comment -->
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="/img/core-img/like.png" alt=""> <span>{{ $post->views }}</span></a>
                                        <a href="#" class="post-comment"><img src="/img/core-img/chat.png" alt=""> <span>{{ $post->comments->count() }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                        
                    </div>

                    <nav aria-label="Page navigation example">
                        {{ $postList->onEachSide(1)->links() }}
                    </nav>

                </div>

                <!-- ##### rightSide Start ##### -->
                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">
                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-10">
                            @include('rightSide')
                        </div>
                    </div>
                </div>
                <!-- ##### rightSide End ##### -->

            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
    <script>
    $(document).ready(function(){
                    $('.pagination>ul').addClass("pagination mt-50");
                    $('.pagination>li').addClass("page-item");
                    $('.pagination>li>a').addClass("page-link");
    });
    </script>
@endsection

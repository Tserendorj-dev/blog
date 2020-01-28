@extends('layouts.main')

@section('content')
<!-- ##### Featured Post Area Start ##### -->
<div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">

                        <!-- Single Featured Post -->
                        <div class="col-12 col-lg-7">
                            <div class="single-blog-post featured-post">
                                <div class="post-thumb">
                                    <a href="#"><img src="/img/bg-img/16.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">{{ $lastPosts[0]->category->cat_name }}</a>
                                    <a href="{{ app()->getLocale() }}/post/view/{{$lastPosts[0]->post_id}}" class="post-title"><h6>{{ $lastPosts[0]->title }}</h6></a>
                                    <div class="post-meta">
                                        <p class="post-author">By <a href="#">{{ $lastPosts[0]->user->name }}</a></p>
                                        <p class="post-excerp">{{ $lastPosts[0]->desc_text }}</p>
                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="/img/core-img/like.png" alt=""> <span>{{ $lastPosts[0]->views }}</span></a>
                                            <a href="#" class="post-comment"><img src="/img/core-img/chat.png" alt=""> <span>{{ $lastPosts[0]->commentsCount() }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <?php
                            $flg = true;
                            foreach($lastPosts as $last)
                                {
                                    if($flg) {$flg = false; continue;} 
                            ?>
                            <!-- Single Featured Post -->
                            <div class="single-blog-post featured-post-2">
                                <div class="post-thumb">
                                    <a href="#"><img src="/img/bg-img/17.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">{{ $last->category->cat_name }}</a>
                                    <div class="post-meta">
                                        <a href="{{ app()->getLocale() }}/post/view/{{ $last->post_id }}" class="post-title"><h6>{{ $last->title }}</h6></a>
                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="/img/core-img/like.png" alt=""> <span>{{ $last->views }}</span></a>
                                            <a href="#" class="post-comment"><img src="/img/core-img/chat.png" alt=""> <span>{{ $last->commentsCount() }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- ##### Right Start ##### -->
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Featured Post -->
                    @include('rightSide')
                </div>
                <!-- ##### Right End ##### -->

            </div>
        </div>
    </div>
    <!-- ##### Featured Post Area End ##### -->

@endsection
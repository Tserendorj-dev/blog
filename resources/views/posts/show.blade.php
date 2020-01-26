@extends('layouts.main')

@section('content')

<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                       <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post single-post">
                            <div class="post-data">
                                <a href="#" class="post-catagory">{{ $postItem->category->cat_name }}</a>
                                <a href="#" class="post-title">
                                    <h6>{{ $postItem->title }}</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">{{$postItem->user->name }}</a></p>
                                    <p>{!! $postItem->full_text !!}</p>
                                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center post-like--comments">
                                            <a href="#" class="post-like"><img src="/img/core-img/like.png" alt=""> <span>{{ $postItem->views }}</span></a>
                                            <a href="#" class="post-comment"><img src="/img/core-img/chat.png" alt=""> <span>{{ $postItem->commentsCount() }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="title">3 Comments</h5>
                            

                        @auth
                        <!-- ##### comment Start ##### -->
                        <div class="post-a-comment-area section-padding-10-0">
                            <h4>Leave a comment</h4>
                            <!-- Reply Form -->
                            <div class="contact-form-area">
                                <form action="{{ route('commentAdd') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $postItem->post_id }}">
                                    <input type="hidden" name="lang" value="jp">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <select name="rate_id" id="rate_id" class="form-control">
                                                @foreach($rates as $rate)
                                                    <option value="{{ $rate->rate_id }}">{{ $rate->rate_name_jp }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <textarea name="comment_text" class="form-control" id="comment_text" cols="30" rows="10" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- ##### comment End ##### -->
                        @endauth

                        <!-- Comment Area Start -->
                        <div class="comment_area">
                            @foreach($postItem->comments as $comment)
                            <ol>
                                <!-- Single Comment Area -->
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <a href="#" class="post-author">{{ $comment->user->name }}</a>
                                            <a href="#" class="post-date">{{ $comment->created_at }}</a>
                                            <p>{{ $comment->comment_text }}</p>
                                            <a href="#" onclick="showComment({{$comment->comment_id}})" class="post-author">Reply</a>
                                        </div>
                                    </div>
                                   
                                    @if ($comment->child)
                                        @foreach($comment->child as $child)
                                            <ol class="children">
                                            <li class="single_comment_area">
                                            <!-- Comment Content -->
                                            <div class="comment-content d-flex">
                                                <!-- Comment Meta -->
                                                <div class="comment-meta">
                                                    <a href="#" class="post-author">{{ $child->user->name }}</a>
                                                    <a href="#" class="post-date">{{ $child->created_at }}</a>
                                                    <p>{{ $child->comment_text }}</p>
                                                    <a href="#" onclick="showComment({{$child->comment_id}})" class="">Reply</a>
                                                       
                                                       <!-- child reply start-->
                                                       <div id="childComment{{$child->comment_id}}" style="display:none;" class="contact-form-area">
                                                       <form action="{{ route('commentAdd') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="parent_id" value="{{ $comment->comment_id }}">
                                                            <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                                                            <input type="hidden" name="lang" value="jp">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-6">
                                                                @if(Auth::user()->isUserComment($child->post_id) == '')
                                                                    <select name="rate_id" id="rate_id" class="form-control">
                                                                        @foreach($rates as $rate)
                                                                            <option value="{{ $rate->rate_id }}">{{ $rate->rate_name_jp }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                @else
                                                                <input type="hidden" name="rate_id" value="{{ Auth::user()->isUserComment($child->post_id)->rate_id }}">
                                                                @endif   
                                                                </div>
                                                                <div class="col-12">
                                                                    <textarea name="comment_text" class="form-control" id="comment_text" cols="30" rows="10" placeholder="Message"></textarea>
                                                                </div>
                                                                <div class="col-12 text-center">
                                                                    <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                       </div>
                                                       <!-- child reply end-->
                                                </div>
                                            </div>
                                                @if(child->commentSub(child->comment_id))
                                                    @foreach(child->commentSub(child->comment_id) as $subcomment)
                                                        <ol class="children">
                                                            <li class="single_comment_area">
                                                            <!-- Comment Content -->
                                                                <div class="comment-content d-flex">
                                                                    <!-- Comment Meta -->
                                                                    <div class="comment-meta">
                                                                        <a href="#" class="post-author">{{ $subcomment->user->name }}</a>
                                                                        <a href="#" class="post-date">{{ $subcomment->created_at }}</a>
                                                                        <p>{{ $subcomment->comment_text }}</p>
                                                                
                                                                    
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        
                                                    @endforeach
                                                @endif

                                        @endforeach
                                    @endif
                                </li>
                            </ol>
                            @endforeach
                        </div>
                    </div>
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
<script>
function showComment(id){
    document.getElementById('childComment'+id).style.display= "";
}
</script>
@endsection


<!-- Single Featured Post -->
@foreach($rightSide as $list)
<div class="single-blog-post small-featured-post d-flex">
    <div class="post-thumb">
        <a href="#"><img src="/img/bg-img/19.jpg" alt=""></a>
    </div>
    <div class="post-data">
        <a href="#" class="post-catagory">{{ $list->category->cat_name }}</a>
        <div class="post-meta">
            <a href="/{{ app()->getLocale() }}/post/view/{{ $list->post_id }}" class="post-title"><h6>{{ $list->title }}</h6></a>
            <p class="post-date"><span>{{ \Carbon\Carbon::parse($list->update_at)->format('h:m A')}}</span> | <span>{{ \Carbon\Carbon::parse($list->update_at)->toFormattedDateString()}}</span></p>
        </div>
    </div>
</div>
@endforeach
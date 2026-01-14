@extends(Config::theme() . 'layout.master')
<style>
    .sp_blog_item .sp_blog_thumb {
        height: 481px!important;
    }
    .sp_blog_title{
        text-align: center;
    }
    .sp_blog_btn{
        justify-content: center!important;
        font-size: 20px;

    }
</style>
@section('content')
<section class="blog-section sp_pt_120 sp_pb_120">
    <div class="container">
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-lg-7 text-center">--}}
{{--                <div class="sp_theme_top  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">--}}

{{--                    <h2 class="sp_theme_top_title">--}}
{{--                       {{$title}}--}}
{{--                    </h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="row gy-4 justify-content-center">

            @foreach ($team as $item)
                <div class="col-lg-4">
                    <div class="sp_blog_item">
                        <div class="sp_blog_thumb">
                            <img src="{{ Config::getFile('team', $item->content->image_one) }}"
                                 alt="blog thumb">
                        </div>
                        <div class="sp_blog_content">
                            <h4 class="sp_blog_title"><a href="#">
                                    {{ (optional($item->content)->member_name) }}
                                </a>
                            </h4>
                            <p class="sp_blog_btn">
                                {{ optional($item->content)->designation }}
                            </p>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- blog section end -->
@endsection


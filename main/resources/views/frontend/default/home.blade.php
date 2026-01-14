@extends(Config::theme() . 'layout.master')

@section('content')
{{--    <spline-viewer url="https://prod.spline.design/g1Fc17jReuwbI3rx/scene.splinecode"></spline-viewer>--}}
{{--    <spline-viewer url="https://prod.spline.design/g1Fc17jReuwbI3rx/scene.splinecode"></spline-viewer>--}}
{{--    <spline-viewer loading-anim-type="none" url="https://prod.spline.design/yy7XWeH2sIXh-P55/scene.splinecode"></spline-viewer>--}}

{{--<spline-viewer url="https://prod.spline.design/LjA6dMVxgtap2bFJ/scene.splinecode"></spline-viewer>--}}
{{--{{dd(Config::cssLib('frontend', 'lib/bootstrap.min.css'))}}--}}
    @foreach ($page->widgets as $section)

       <?= Section::render($section->sections) ?>

    @endforeach
{{--<section class="team-section sp_pt_120 sp_pb_120">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-lg-7 text-center">--}}
{{--                <div class="sp_theme_top  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">--}}
{{--                    <div class="sp_theme_top_caption"><i class="fas fa-bolt"></i> Our Partner</div>--}}
{{--                    <h2 class="sp_theme_top_title">Collaborative partner, shared success</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="sp_team_slider">--}}
{{--            <div class="sp_team_slide">--}}
{{--                    <div class="sp_team_item">--}}
{{--                        <div class="sp_team_thumb">--}}
{{--                            <div class="sp_team_thumb_inner">--}}
{{--                                <img src="{{ Config::getFile('partner', '642920c92c93a1680416969.jpg') }}" alt="image">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="sp_team_content">--}}
{{--                            <h4 class="name">{{ 'Quantum Solutions' }}</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            <div class="sp_team_slide">--}}
{{--                <div class="sp_team_item">--}}
{{--                    <div class="sp_team_thumb">--}}
{{--                        <div class="sp_team_thumb_inner">--}}
{{--                            <img src="{{ Config::getFile('partner', '6424023cc626e1680081468.jpg') }}" alt="image">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="sp_team_content">--}}
{{--                        <h4 class="name">{{ 'Horizon Innovations' }}</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="sp_team_slide">--}}
{{--                <div class="sp_team_item">--}}
{{--                    <div class="sp_team_thumb">--}}
{{--                        <div class="sp_team_thumb_inner">--}}
{{--                            <img src="{{ Config::getFile('partner', '64240168473be1680081256.jpg') }}" alt="image">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="sp_team_content">--}}
{{--                        <h4 class="name">{{ 'Nexus Dynamics' }}</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="sp_team_slide">--}}
{{--                <div class="sp_team_item">--}}
{{--                    <div class="sp_team_thumb">--}}
{{--                        <div class="sp_team_thumb_inner">--}}
{{--                            <img src="{{ Config::getFile('partner', '642920e7234d41680416999.jpg') }}" alt="image">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="sp_team_content">--}}
{{--                        <h4 class="name">{{ 'Unity Ventures' }}</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="sp_team_slide">--}}
{{--                <div class="sp_team_item">--}}
{{--                    <div class="sp_team_thumb">--}}
{{--                        <div class="sp_team_thumb_inner">--}}
{{--                            <img src="{{ Config::getFile('partner', '642920b8e82311680416952.jpg') }}" alt="image">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="sp_team_content">--}}
{{--                        <h4 class="name">{{ 'Grace Enterprises' }}</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- <section class="adventure_section">
	<div class="adventure_content">
    <div class="circle-container">
  <img src="{{ Config::getFile('partner', 'circle.png') }}" alt="image">
     </div>
	 <h3>Why trade with Doto</h3>
	<p>We analyzed the collective experience of millions of traders to bring you a powerful, user-friendly platform.</p> 
      <a href="{{ url('our/license') }}">License</a>
    </div>
</section> -->


{{--    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.0.17/build/spline-viewer.js"></script>--}}

@endsection

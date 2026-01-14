@extends(Config::theme() . 'layout.master')
<style>
    b {
        color: #ffff;
        font-size: 2.125rem;
    }
</style>
@section('content')
    <section class="about-section sp_pt_120 sp_pb_120">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <?= clean($details->content->description,'youtube') ?>
                </div>
            </div>
        </div>
    </section>
@endsection

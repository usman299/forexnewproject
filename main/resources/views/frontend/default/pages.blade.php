@extends(Config::theme() . 'layout.master')

@section('content')
    @if ($page->widgets)

@foreach ($page->widgets as $section)

    @if (!($section->page_id == 4 && $section->sections == 'overview'))
        <?= Section::render($section->sections) ?>
    @endif

@endforeach

    @endif
@endsection

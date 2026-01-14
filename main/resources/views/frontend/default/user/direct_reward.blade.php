@extends(Config::theme() . 'layout.auth')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="sp_site_card">
                <div class="card-header text-end">
{{--                    <form action="" method="get" class="row justify-content-md-end g-3">--}}
{{--                        <div class="col-auto">--}}
{{--                            <input type="text" name="trx" class="form-control me-2" placeholder="transaction id">--}}
{{--                        </div>--}}
{{--                        <div class="col-auto">--}}
{{--                            <input type="date" class="form-control me-3" placeholder="Search User" name="date">--}}
{{--                        </div>--}}
{{--                        <div class="col-auto">--}}
{{--                            <button type="submit" class="btn sp_theme_btn">{{ __('Search') }}</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table sp_site_table">
                            <thead>
                            <tr>
                                <th>{{ __('Trx') }}</th>
                                <th>{{ __('Unique ID') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Details') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Date') }}</th>
                            </thead>

                            <tbody>
                            @forelse($reward as $key => $deposit)
                                <tr>
                                    <td data-caption="{{ __('Trx') }}">{{ $deposit->trx }}</td>
                                    <td data-caption="{{ __('User') }}">
                                        <?php
                                        $text = $deposit->details;
                                        $pattern = '/added by (\d+)/';
                                        if (preg_match($pattern, $text, $matches)) {
                                            $userId = $matches[1]; // Extracted user ID
                                        } else {
                                            $userId = $deposit->user->username;
                                        }
                                        ?>
                                        {{ $userId }}</td>
                                    <td data-caption="{{ __('Amount') }}">{{ Config::formatter($deposit->amount) }}</td>
                                   <td data-caption="{{ __('Details') }}">{{ $deposit->details }}</td>
                                    <td data-caption="{{ __('Status') }}">
                                            <span class="sp_badge sp_badge_success">{{ __('Successfull') }}</span>
                                    </td>
                                    <td data-caption="{{ __('Payment Date') }}">
                                        {{ $deposit->created_at->format('Y-m-d') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="100%">
                                        {{ __('No Direct Reward  Found') }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>


                    </div>
                </div>


                @if ($reward->hasPages())
                    <div class="card-footer">
                        {{ $reward->links() }}
                    </div>
                @endif


            </div>

        </div>

    </div>
@endsection

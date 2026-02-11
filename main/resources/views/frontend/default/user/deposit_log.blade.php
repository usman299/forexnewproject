@extends(Config::theme() . 'layout.auth')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="sp_site_card">
                <div class="card-header text-end">
                    <form action="" method="get" class="row justify-content-md-end g-3">
                        <div class="col-auto">
                            <input type="text" name="trx" class="form-control me-2" placeholder="transaction id">
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control me-3" placeholder="Search User" name="date">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn sp_theme_btn">{{ __('Search') }}</button>
                        </div>
                    </form>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                       <table class="table sp_site_table">
    <thead>
        <tr>
            <th>{{ __('Trx') }}</th>
            <th>{{ __('USDT Trx') }}</th>
            <th>{{ __('User') }}</th>
            <th>{{ __('Gateway') }}</th>
            <th>{{ __('Network') }}</th>
            <th>{{ __('Address') }}</th>
            <th>{{ __('Amount') }}</th>
            <th>{{ __('Currency') }}</th>
            <th>{{ __('Charge') }}</th>
            <th>{{ __('Proof') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Status') }}</th>
        </tr>
    </thead>

    <tbody>
        @forelse($deposits as $key => $deposit)
            <tr>
                <td data-caption="Trx">{{ $deposit->trx }}</td>

                <td data-caption="USDT Trx">{{ $deposit->btrx_id }}</td>

                <td data-caption="User">
                    {{ $deposit->user->username }}
                </td>

                <td data-caption="Gateway">
                    {{ $deposit->gateway->name ?? 'Account Transfer' }}
                </td>

                {{-- Network column --}}
                <td data-caption="Network">
                    {{ $deposit->network ?? '-' }}
                </td>

                {{-- Address column --}}
               <td data-caption="Address">
    @if($deposit->random_address)
        <span
            style="cursor:pointer; color:blue; text-decoration:underline;"
            onclick="copyWithSwal('{{ $deposit->random_address }}')"
            title="Click to copy"
        >
            {{ \Illuminate\Support\Str::limit($deposit->random_address, 12, '...') }}
        </span>
    @else
        -
    @endif
</td>


                <td data-caption="Amount">
                    {{ Config::formatter($deposit->amount) }}
                </td>

                <td data-caption="Currency">
                    {{ Config::config()->currency }}
                </td>

                <td data-caption="Charge">
                    {{ Config::formatter($deposit->charge) }}
                </td>

                {{-- Payment Proof Image --}}
                <td data-caption="Proof">
                    @if($deposit->payment_proof)
                        <a href="{{  Config::getFile('admin', $deposit->payment_proof)  }}" target="_blank">
                            <img src="{{  Config::getFile('admin', $deposit->payment_proof)  }}"
                                 alt="Proof"
                                 style="max-width:60px; border-radius:4px;">
                        </a>
                    @else
                        <span>-</span>
                    @endif
                </td>

                <td data-caption="Date">
                    {{ $deposit->created_at->format('Y-m-d') }}
                </td>

                <td data-caption="Status">
                    @if ($deposit->status == 1)
                        <span class="sp_badge sp_badge_success">{{ __('Successful') }}</span>
                    @elseif($deposit->status == 2)
                        <span class="sp_badge sp_badge_warning">{{ __('Pending') }}</span>
                    @else
                        <span class="sp_badge sp_badge_danger">{{ __('Rejected') }}</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="100%">
                    {{ __('No Deposits Found') }}
                </td>
            </tr>
        @endforelse
    </tbody>
</table>



                    </div>
                </div>


                @if ($deposits->hasPages())
                    <div class="card-footer">
                        {{ $deposits->links() }}
                    </div>
                @endif


            </div>

        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function copyWithSwal(text) {
    navigator.clipboard.writeText(text).then(() => {
        Swal.fire({
            icon: 'success',
            title: 'Copied!',
            text: 'Address copied to clipboard',
            timer: 1500,
            showConfirmButton: false
        });
    }).catch(() => {
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: 'Copy failed'
        });
    });
}
</script>

@endsection

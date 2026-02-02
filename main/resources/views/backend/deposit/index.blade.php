@extends('backend.layout.master')

<style>
    button.btn.btn-sm.btn-outline-secondary.copy-btn {
    color: white;
}
.
</style>
@section('element')
    <div class="row">

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">

                <div class="card-header">
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="transaction id">
                            <input type="text" name="date" class="form-control form-control-sm datepicker" placeholder="dates" autocomplete="off">
                            <button class="btn btn-sm btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                
                

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
    <thead>
        <tr>
            <th>{{ __('TRX') }}</th>
            <th>{{ __('User') }}</th>
            <th>{{ __('USDT Trx') }}</th>
            <th>{{ __('Network') }}</th>
            <th>{{ __('Gateway') }}</th>
            <th>{{ __('Address') }}</th>
            <th>{{ __('Amount') }}</th>
            <th>{{ __('Charge') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($deposits as $key => $manual)
            <tr>
                <td>{{ $manual->trx }}</td>

                <td>
                    <a href="{{ route('admin.user.details', $manual->user->id) }}">
                        <span>{{ $manual->user->username }}</span>
                    </a>
                </td>

                {{-- USDT Trx with Copy --}}
                <td>
    <span id="trx-{{ $key }}"
          data-full="{{ $manual->btrx_id }}"
          style="
            display:inline-block;
            max-width:140px;
            overflow:hidden;
            text-overflow:ellipsis;
            white-space:nowrap;
            vertical-align:middle;
          ">
        {{ \Illuminate\Support\Str::limit($manual->btrx_id, 18, '...') }}
    </span>

    @if(!empty($manual->btrx_id))
        <button type="button"
                class="btn btn-sm btn-outline-secondary copy-btn"
                data-copy="trx-{{ $key }}">
            {{ __('Copy') }}
        </button>

        <small id="copied-trx-{{ $key }}" style="display:none; color:green; margin-left:5px;">
            Copied
        </small>
    @endif
</td>


                {{-- Network --}}
                <td>
                    {{ $manual->network ?? '-' }}
                </td>

                {{-- Gateway --}}
                <td>
                    {{ $manual->gateway->name ?? 'Account Transfer' }}
                </td>

                {{-- Address with Copy --}}
               <td style="max-width:200px;">

    {{-- Short visible text --}}
    <span id="addr-{{ $key }}"
          data-full="{{ $manual->random_address }}"
          style="
            display:inline-block;
            max-width:140px;
            overflow:hidden;
            text-overflow:ellipsis;
            white-space:nowrap;
            vertical-align:middle;
          ">
        {{ \Illuminate\Support\Str::limit($manual->random_address, 18, '...') }}
    </span>

    @if($manual->random_address)
        <button type="button"
                class="btn btn-sm btn-outline-secondary copy-btn"
                data-copy="addr-{{ $key }}">
            {{ __('Copy') }}
        </button>

        {{-- Small copied message --}}
        <small id="copied-{{ $key }}" style="display:none; color:green; margin-left:5px;">
            Copied
        </small>
    @endif

</td>


                <td>{{ Config::formatter($manual->amount) }}</td>

                <td>{{ Config::formatter($manual->charge) }}</td>

                <td>
                    {{ $manual->created_at->format('Y-m-d') }}
                </td>

                <td>
                    @if ($manual->status == 2)
                        <span class="badge badge-warning">{{ __('Pending') }}</span>
                    @elseif($manual->status == 1)
                        <span class="badge badge-success">{{ __('Approved') }}</span>
                    @elseif($manual->status == 3)
                        <span class="badge badge-danger">{{ __('Rejected') }}</span>
                    @endif
                </td>

                <td>
                    <a class="btn btn-sm btn-outline-primary details"
                       href="{{ route('admin.deposit.details', $manual->trx) }}">
                        <i class="far fa-eye"></i>
                    </a>

                    @if ($manual->status == 2)
                        <a class="btn btn-sm btn-outline-primary accept"
                           data-url="{{ route('admin.deposit.accept', $manual->trx) }}">
                            <i class="fas fa-check"></i>
                        </a>
                        
                        <a class="btn btn-sm btn-outline-danger reject"
                           data-url="{{ route('admin.deposit.reject', $manual->trx) }}">
                            <i class="fas fa-times"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="100%">{{ __('No Data Found') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>

                    </div>
                </div>
                @if ($deposits->hasPages())
                    {{ $deposits->links() }}
                @endif
            </div>
        </div>
    </div>


    <!-- Modal -->
   <!-- Accept Modal -->
<div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post" id="acceptForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Payment Accept') }}</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>{{ __('Are you sure to accept this payment request?') }}</p>

                    <div class="form-group">
                        <label>{{ __('Enter Accepted Amount') }}</label>
                        <input type="number"
                               name="amount"
                               class="form-control"
                               placeholder="Enter amount"
                               required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        {{ __('Close') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Accept') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Payment Reject') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <p>{{ __('Are you sure to reject this payment') }}?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Reject') }}</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('external-style')
    <link rel="stylesheet" href="{{ Config::cssLib('backend', 'daterangepicker.css') }}">
@endpush

@push('external-script')
    <script src="{{ Config::jsLib('backend', 'moment.js') }}"></script>
    <script src="{{ Config::jsLib('backend', 'daterangepicker.min.js') }}"></script>
@endpush


@push('script')
    <script>
        $(function() {
            'use strict'


            $('input[name="date"]').daterangepicker({

                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
                    'MM/DD/YYYY'));
            });



            $('.accept').on('click', function() {
                const modal = $('#accept');

                modal.find('form').attr('action', $(this).data('url'));
                modal.modal('show');
            })

            $('.reject').on('click', function() {
                const modal = $('#reject');

                modal.find('form').attr('action', $(this).data('url'));
                modal.modal('show');
            })

        })
        
    </script>
   <script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.copy-btn').forEach(function (btn) {

        btn.addEventListener('click', function () {

            let targetId = this.getAttribute('data-copy');
            let span = document.getElementById(targetId);

            if (!span) return;

            let fullText = span.getAttribute('data-full') ?? span.innerText;

            navigator.clipboard.writeText(fullText).then(() => {

                // Detect which copied message to show
                let key = targetId.replace('addr-', '').replace('trx-', '');

                let msg =
                    document.getElementById('copied-' + key) ||
                    document.getElementById('copied-trx-' + key);

                if (msg) {
                    msg.style.display = 'inline';

                    setTimeout(function () {
                        msg.style.display = 'none';
                    }, 1500);
                }

            }).catch(() => {
                alert('Copy failed');
            });

        });

    });

});
</script>

<script>
    $(document).on('click', '.accept', function () {
        let url = $(this).data('url');

        $('#acceptForm').attr('action', url);
        $('#accept').modal('show');
    });
</script>

@endpush

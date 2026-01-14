@extends('backend.layout.master')
@section('element')
    <div class="row withdraw-row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-right">
                    <form action="">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="Search Unique ID">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead>
                            <tr>
                                <th>{{ __('Sl') }}</th>
                                <th>{{ __('Receiver Unique ID') }}</th>
                                <th>{{ __('Sender Unique ID') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('trx') }}</th>
                                <th>{{ __('Date') }}</th>
                            </tr>

                            </thead>
                            <tbody>
                            @forelse ($data as $key => $profit)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $profit->user->username ?? ' '}}</td>
                                    <?php $user = \App\Models\User::where('id',$profit->rec_id)->first() ?>
                                    <td>{{ $user->username ?? ' '}}</td>
                                    <td>{{ number_format($profit->amount, 2) . ' ' . Config::config()->currency }}</td>
                                    <td>{{$profit->trx}}</td>
                                    <td>{{$profit->created_at->format('d, M Y H:i:s')}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="100%">{{ __('No Data Found') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($data->hasPages())
                        <div class="card-footer">
                            {{ $data->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection


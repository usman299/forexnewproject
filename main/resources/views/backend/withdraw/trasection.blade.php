@extends('backend.layout.master')
@section('element')
    <div class="row withdraw-row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header site-card-header justify-content-between">
{{--                    <div class="card-header-left">--}}
{{--                        <form method="GET" action="{{ route('admin.withdraw.search') }}">--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" class="form-control form-control-sm" placeholder="Search" name="search">--}}
{{--                                <div class="input-group-append">--}}
{{--                                    <button class="btn btn-sm btn-primary"><i class="fas fa-search"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                    <div class="card-header-right">
                        <button class="btn btn-sm btn-primary add">
                            <i class="fa fa-plus mr-2"></i>
                            {{ __('Percentage Commission') }}
                        </button>
                        <button class="btn btn-sm btn-primary sub">
                            <i class="fa fa-minus mr-2"></i>
                            {{ __('Percentage Delete') }}
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead>
                            <tr>
                                <th>{{ __('Sl') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Details') }}</th>
                                <th>{{ __('Charge Type') }}</th>
                                <th>{{ __('Status') }}</th>
                            </tr>

                            </thead>
                            <tbody>
                            @forelse ($data as $key => $profit)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $profit->user->username ?? ' '}}</td>
                                    <td>{{ number_format($profit->amount, 2) . ' ' . Config::config()->currency }}</td>
                                    <td>{{ $profit->details  }}</td>
                                    <td>{{ ucwords($profit->type) }}</td>
                                    <td>
                                        <div class="badge badge-success">{{ __('Delivered') }}</div>
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
                    @if ($data->hasPages())
                        <div class="card-footer">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($data->onFirstPage())
                                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $data->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                                        @if ($page == $data->currentPage())
                                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                        @elseif ($page >= $data->currentPage() - 2 && $page <= $data->currentPage() + 2)
                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                        @elseif ($page == $data->currentPage() - 3 || $page == $data->currentPage() + 3)
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($data->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $data->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    @endif
{{--                    @if ($data->hasPages())--}}
{{--                        <div class="card-footer">--}}
{{--                            {{ $data->links() }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{route('admin.percentage.store')}}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="">{{ __('Date Select') }} <span class="text-danger">*</span>
                                </label>
                                <input type="date"  name="date" class="form-control" required>
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label for="">{{ __('Add Percentage Digit') }} <span class="text-danger">*</span>
                                </label>
                                <input type="text"  name="percentage" class="form-control" required>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-sm btn-primary">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modelIdsub" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{route('admin.percentage.delete')}}" id="myForm" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label for="">{{ __('Date Select') }} <span class="text-danger">*</span>
                                </label>
                                <input type="date"  name="date" class="form-control" required>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="button" id="delete" class="btn btn-sm btn-primary">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


@push('script')
    <script>
        $(function() {
            'use strict'
            $('.add').on('click', function() {
                const modal = $('#modelId');
                modal.find('.modal-title').text("{{ __('Percentage Profit') }}")
                modal.modal('show');
            })
            $('.sub').on('click', function() {
                const modal = $('#modelIdsub');
                modal.find('.modal-title').text("{{ __('Percentage Delete') }}")
                modal.modal('show');
            })
            $('#delete').on('click', function() {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#myForm').submit();
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelled",
                            text: "Your imaginary data is safe :)",
                            icon: "error"
                        });
                    }
                });
            })
        })

    </script>
@endpush

@extends('backend.layout.master')
@section('element')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    @include('backend.users.tab_list')
                </div>
            </div>
            <div class="card">
                <div class="card-header site-card-header justify-content-between align-items-center">
                    <div class="card-header-left">
                        <form action="" method="get">
                            <div class="input-group flex-wrap user-search-area">
                                <input type="text" class="form-control form-control-sm" placeholder="username or email or phone" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div  class="card-header-right">
                        <button class="btn btn-sm btn-primary sendMail"><i class="las la-mail-bulk mr-2"></i>{{ __('Bulk Mail') }}</button>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead>
                                <tr>
                                    <th>{{ __('Sl') }}</th>
                                    <th>{{ __('Username') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Country') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $key => $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->address->country ?? 'N/A' }}</td>
                                        <td>
                                            @if ($user->status)
                                                <span class='badge badge-success'>{{ __('Active') }}</span>
                                            @else
                                                <span class='badge badge-danger'>{{ __('Inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.details', $user) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i></a>
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
                @if ($users->hasPages())
                    <div class="card-footer">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                {{-- Previous Page Link --}}
                                @if ($users->onFirstPage())
                                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $users->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                    @if ($page == $users->currentPage())
                                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                    @elseif ($page >= $users->currentPage() - 2 && $page <= $users->currentPage() + 2)
                                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @elseif ($page == $users->currentPage() - 3 || $page == $users->currentPage() + 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($users->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $users->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
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

{{--                @if ($users->hasPages())--}}
{{--                    <div class="card-footer" id="pagination">--}}
{{--                        {{ $users->links() }}--}}
{{--                    </div>--}}
{{--                @endif--}}
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="mail">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('admin.user.bulk') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Send Mail to user') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">{{ __('Subject') }}</label>
                            <input type="text" name="subject" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Message') }}</label>
                            <textarea name="message" id="" cols="30" rows="10" class="form-control summernote"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="las la-envelope"></i>
                            {{ __('Send Mail') }}</button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">{{ __('Close') }}</button>
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
            $('.sendMail').on('click', function(e) {
                e.preventDefault();
                const modal = $('#mail');
                modal.modal('show');
            })
        })
    </script>
@endpush

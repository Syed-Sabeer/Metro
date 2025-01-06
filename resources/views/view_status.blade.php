@extends('layouts.main')

@section('main-container')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mb-30">
                    <div class="card mt-30">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>View Status</h4>
                                </div>
                                <table class="table table-striped table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Status Name</th>
                                            <th>Status Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($status as $item)

                                            <tr>
                                                <td>{{ $item->status_name }}</td>
                                                <td>{{ $item->status_number }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('status.edit', $item->id) }}" class="btn btn-sm btn-warning me-2">
                                                            <i class="uil uil-edit" style="font-size: 12px;"></i>
                                                        </a>
                                                        <a href="{{ route('status.delete', $item->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="uil uil-trash-alt" style="font-size: 12px;"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- Add Pagination Here if Dynamic --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

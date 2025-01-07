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
                                    <h4>Email List</h4>
                                </div>
                                <table class="table table-striped table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Email Subject</th>
                                            <th>Email Description</th>
                                            <th>Identifier Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($emails as $email)
                                            <tr>
                                                <td>{{ $email->subject }}</td>
                                                <td>{{ $email->description }}</td>
                                                <td>{{ $email->identifier_name }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('emails.edit', $email->id) }}" class="btn btn-sm btn-warning me-2">
                                                            <i class="uil uil-edit" style="font-size: 12px;"></i>
                                                        </a>
                                                        <a href="{{ route('emails.destroy', $email->id) }}" id="delete" class="btn btn-sm btn-danger">
                                                            <i class="uil uil-trash-alt" style="font-size: 12px;"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No Emails Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- Add Pagination Here if Dynamic --}}
                                {{-- <div class="mt-3">
                                    {{ $emails->links() }}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

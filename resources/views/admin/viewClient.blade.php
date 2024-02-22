@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid"></div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">View Clients</h1>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Client Name</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Updated At</th>
                                    <th class="text-center">View</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client as $record)
                                    <tr>
                                        <td class="text-center">{{ $record->id }}</td>
                                        <td class="text-center">{{ $record->name }}</td>
                                        <td class="text-center">{{ $record->created_at->format('d-m-Y') }}</td>
                                        <td class="text-center">{{ $record->updated_at->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <a href="{{ Route('viewFullClient', ['id' => $record->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Full View</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ Route('client_update_form', ['id' => $record->id]) }}" class="btn btn-sm btn-warning"><i class="fa fa-pen"></i> Edit</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:;" class="btn btn-danger btn-sm delete-btn" data-url="{{ Route('client_delete', ['id' => $record->id]) }}"><i class="fa fa-trash"></i>
                                                Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
@endsection

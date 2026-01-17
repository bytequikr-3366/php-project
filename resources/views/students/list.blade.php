@extends('layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                    <!-- Breadcrumb -->
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active"><i class="bx bx-book-open"></i> {{ $title }}</li>
                        </ol>
                    </div>

                    <!-- Logout Button -->
                    <div>
                        @auth
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                        @endauth
                    </div>

                </div>
            </div>
        </div>

        <!-- content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header title_cardheader">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-6">
                                <h4 class="card-title ttle_head">{{ $title }}</h4>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6 float-end">
                                <a href="{{ route('students.create') }}" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-add-to-queue font-size-16 align-middle me-2"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Phone Number</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details_record as $student)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $student->name }}</td>
                                        <td class="text-center">{{ $student->email }}</td>
                                        <td class="text-center">{{ $student->phone }}</td>

                                        <td class="text-center">
                                            @if($student->status != 2)
                                            <!-- Edit -->
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-outline-info">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <!-- Delete -->
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>

                                            @else
                                            <span class="text-muted">Deleted</span>
                                            @endif
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
    </div>
</div>

@endsection

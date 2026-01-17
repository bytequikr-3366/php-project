@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">{{ isset($student) ? 'Edit Student' : 'Add Student' }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ isset($student) ? 'Edit Student' : 'Add New Student' }}</h4>
                    </div>
                    <div class="card-body p-4">
                        <form id="studentForm" action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @if(isset($student))
                            @method('PUT')
                            @endif

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="name" name="name" placeholder="Name" value="{{ isset($student) ? $student->name : old('name') }}"
                                               data-validation="required" data-validation-error-msg=" Name is required">
                                        <!-- Error message area -->
                                        <div id="name_error" class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" id="email" name="email" placeholder="email" value="{{ isset($student) ? $student->email : old('email') }}"
                                               data-validation="required" data-validation-error-msg="email is required">
                                        <!-- Error message area -->
                                        <div id="email_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="phone" name="phone" placeholder="Phone number" value="{{ isset($student) ? $student->phone : old('phone') }}"
                                               data-validation="required" data-validation-error-msg=" Phone is required">
                                        <!-- Error message area -->
                                        <div id="phone_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10">
                                    <div class="mt-4">
                                        <a href="{{route('students.index')}}" class="btn btn-primary waves-effect waves-light">
                                            <i class="bx bx-left-arrow-alt font-size-16 align-middle me-2"></i>Back to List
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mt-4 float-end">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            <i class="bx bx-check-double font-size-16 align-middle me-2"></i>{{ isset($student) ? 'Update' : 'Save' }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>



@endsection

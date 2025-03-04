@extends('layouts.admin')

@section('content')
    <!-- Main Content -->
    <div id="content">

        @include('partials.admin.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="font-weight-bold text-primary ">Category</h6>
                        <a class="btn btn-primary" href="{{route('category.create')}}">add</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>nama</th>
                                    <th>description</th>
                                    <th>status</th>
                                    <th>new arrival</th>
                                    <th>meta title</th>
                                    <th>meta descrip</th>
                                    <th>meta keyword</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{$category->nama}}</td>
                                        <td>{{$category->description}}</td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                    value="{{ $category->status ? $category->status : 1 }}" name="status"
                                                    {{ $category->status ? 'checked' : null }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                    value="{{ $category->new ? $category->new : 1 }}" name="new"
                                                    {{ $category->new ? 'checked' : null }}>
                                            </div>
                                        </td>
                                        <td>{{$category->meta_title}}</td>
                                        <td>{{$category->meta_descrip}}</td>
                                        <td>{{$category->meta_keywords}}</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection

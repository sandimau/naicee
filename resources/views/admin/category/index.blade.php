@extends('layouts.admin')

@section('content')
    <!-- Main Content -->
    <div id="content">

        @include('partials.admin.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="font-weight-bold text-primary ">Category</h6>
                        <a class="btn btn-primary" href="{{ route('category.create') }}">add</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>nama</th>
                                    <th>status</th>
                                    <th>new arrival</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            <a
                                                href="{{ route('category.show', $category->id) }}">{{ $category->nama }}</a>
                                        </td>
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
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-info btn-sm d-inline"><i class='bx bx-edit'></i></a>

                                            <a class="btn btn-danger btn-sm delete d-inline" href="{{url('admin/category/'.$category->id)}}">
                                                <i class='bx bx-trash'></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
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
@push('addons-script')
    <script>
        $('.delete').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $('#modal-hapus').find('form').attr('action',url);
            $('#modal-hapus').modal();
        });
    </script>

@endpush

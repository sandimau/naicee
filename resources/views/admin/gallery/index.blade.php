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
                        <h6 class="font-weight-bold text-primary ">Gallery</h6>
                        <a class="btn btn-primary" href="{{ route('gallery.create') }}">add</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>product</th>
                                    <th>images</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galleries as $no => $item)
                                    <tr>
                                        <td> {{ $item->product->nama }} </td>
                                        <td>
                                            <img src="{{ Storage::url($item->images) }}" alt="" style="height:150px"
                                                class="img-thumbnail">
                                        </td>
                                        <td>
                                            <a href="{{ route('gallery.edit', $item->id) }}"
                                                class="btn btn-info btn-sm d-inline"><i class='bx bx-edit'></i></a>

                                            <a class="btn btn-danger btn-sm delete d-inline"
                                                href="{{ url('admin/gallery/' . $item->id) }}">
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
            $('#modal-hapus').find('form').attr('action', url);
            $('#modal-hapus').modal();
        });
    </script>

@endpush

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
                        <h6 class="font-weight-bold text-primary ">product</h6>
                        <a class="btn btn-primary" href="{{ route('product.create') }}">add</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>nama</th>
                                    <th>category</th>
                                    <th>Qty</th>
                                    <th>original price</th>
                                    <th>selling price</th>
                                    <th>status</th>
                                    <th>new arrival</th>
                                    <th>trending</th>
                                    <th>detail</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <a
                                                href="{{ route('product.show', $product->id) }}">{{ $product->nama }}</a>
                                        </td>
                                        <td>{{ $product->category->nama }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>Rp. {{number_format($product->original_price, 0, ',', '.')}}</td>
                                        <td>Rp. {{number_format($product->selling_price, 0, ',', '.')}}</td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                    value="{{ $product->status ? $product->status : 1 }}" name="status"
                                                    {{ $product->status ? 'checked' : null }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                    value="{{ $product->new ? $product->new : 1 }}" name="new"
                                                    {{ $product->new ? 'checked' : null }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                    value="{{ $product->trending ? $product->trending : 1 }}" name="trending"
                                                    {{ $product->trending ? 'checked' : null }}>
                                            </div>
                                        </td>
                                        <td><a class="btn btn-info btn-sm d-inline" href="#">detail</a></td>
                                        <td>
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="btn btn-info btn-sm d-inline"><i class='bx bx-edit'></i></a>

                                            <a class="btn btn-danger btn-sm delete d-inline" href="{{url('admin/product/'.$product->id)}}">
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

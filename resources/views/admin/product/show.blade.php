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
                        <h6 class="font-weight-bold text-primary ">product</h6>
                        <a class="btn btn-primary" href="{{route('product.create')}}">add</a>
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
                                    <th>trending</th>
                                    <th>image</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>
                                            <a
                                                href="{{ route('product.show', $product->id) }}">{{ $product->nama }}</a>
                                        </td>
                                        <td>{{ $product->category->nama }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->original_price }}</td>
                                        <td>{{ $product->Selling_price }}</td>
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
                                                    value="{{ $product->trending ? $product->trending : 1 }}" name="trending"
                                                    {{ $product->trending ? 'checked' : null }}>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ Storage::url($product->images) }}" width="100px"
                                                class="img-thumbnail">
                                        </td>
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

@extends('layouts.admin')

@section('content')
    <!-- Main Content -->
    <div id="content">

        @include('partials.admin.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="user" action="{{route('gallery.update',$gallery->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group has-danger">
                                <label>gallery</label>
                                <select name="product_id" class="form-control">
                                    <option>-- pilih product -- </option>
                                    @foreach ($products as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $gallery->product_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>image</label>
                                <input type="file" name="images" class="form-control @error('images') is-invalid @enderror " >
                                @error('images')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit"
                                class="btn btn-rounded btn-success waves-effect waves-light m-r-10">Simpan</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection

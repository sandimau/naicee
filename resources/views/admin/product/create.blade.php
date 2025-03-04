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
                        <form class="form-material" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" value="{{ old('nama') }}"
                                    class="form-control @error('nama') is-invalid @enderror ">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group has-danger">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <option >-- pilih Category -- </option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }} >{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>small description</label>
                                <input type="text" name="small_desc" value="{{ old('small_desc') }}"
                                    class="form-control @error('small_desc') is-invalid @enderror ">
                                @error('small_desc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" cols="30" rows="10"
                                    class="form-control @error('description') is-invalid @enderror "></textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>original price</label>
                                <input type="number" name="original_price" value="{{ old('original_price') }}"
                                    class="form-control @error('original_price') is-invalid @enderror ">
                                @error('original_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>selling price</label>
                                <input type="number" name="selling_price" value="{{ old('selling_price') }}"
                                    class="form-control @error('selling_price') is-invalid @enderror ">
                                @error('selling_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>qty</label>
                                <input type="number" name="qty" value="{{ old('qty') }}"
                                    class="form-control @error('qty') is-invalid @enderror ">
                                @error('qty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="status">
                                <label class="form-check-label" for="inlineCheckbox1">status</label>
                            </div>
                            <div class="form-check form-check-inline mb-2">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1" name="new">
                                <label class="form-check-label" for="inlineCheckbox3">new</label>
                            </div>
                            <div class="form-check form-check-inline mb-2">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name="trending">
                                <label class="form-check-label" for="inlineCheckbox2">trending</label>
                            </div>
                            <div class="form-group">
                                <label>Meta title</label>
                                <input type="text" name="meta_title" value="{{ old('meta_title') }}"
                                    class="form-control @error('meta_title') is-invalid @enderror ">
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Meta keywords</label>
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}"
                                    class="form-control @error('meta_keywords') is-invalid @enderror ">
                                @error('meta_keywords')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Meta Description</label>
                                <input type="text" name="meta_descrip" value="{{ old('meta_descrip') }}"
                                    class="form-control @error('meta_descrip') is-invalid @enderror ">
                                @error('meta_descrip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit"
                                class="btn btn-rounded btn-success waves-effect waves-light m-r-10">Submit</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection

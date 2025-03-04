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
                        <form class="user" action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" value="{{$category->nama}}"
                                    class="form-control @error('nama') is-invalid @enderror" >
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" cols="30" rows="10"
                                    class="form-control @error('description') is-invalid @enderror ">{{$category->description}}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="status" {{ $category->status ? 'checked' : null }}>
                                <label class="form-check-label" for="inlineCheckbox1">status</label>
                            </div>
                            <div class="form-check form-check-inline mb-2">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name="new" {{ $category->new ? 'checked' : null }} >
                                <label class="form-check-label" for="inlineCheckbox2">new</label>
                            </div>

                            <div class="form-group">
                                <label>Meta title</label>
                                <input type="text" name="meta_title" value="{{$category->meta_title}}"
                                    class="form-control @error('meta_title') is-invalid @enderror ">
                                @error('meta_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Meta keywords</label>
                                <input type="text" name="meta_keywords" value="{{$category->meta_keywords}}"
                                    class="form-control @error('meta_keywords') is-invalid @enderror ">
                                @error('meta_keywords')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Meta Description</label>
                                <input type="text" name="meta_descrip" value="{{$category->meta_descrip}}"
                                    class="form-control @error('meta_descrip') is-invalid @enderror ">
                                @error('meta_descrip')
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

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
                        <form class="form-material" action="{{ route('gallery.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Product</span>
                                <v-select :value="selected" v-model="produks" style="width: 450px" :filterable="false"
                                    :options="options" @search="onSearch" @input="setProduct">
                                    @include('partials.admin.select')
                                </v-select>
                                <input type="hidden" name="product_id" v-model="idProduk">
                            </div>
                            <div class="form-group">
                                <label>image</label>
                                <input type="file" name="images"
                                    class="form-control @error('images') is-invalid @enderror ">
                                @error('images')
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

@push('addons-script')
    <script src="https://unpkg.com/vue-select@3.0.0"></script>
    <link rel="stylesheet" href="https://unpkg.com/vue-select@3.0.0/dist/vue-select.css">
    <script src="{{ asset('js/lodash-4.17.4.min.js') }}"></script>
    <script>
        Vue.component('v-select', VueSelect.VueSelect);
        new Vue({
            el: "#wrapper",
            data: {
                idProduk: '',
                produks: [],
                options: [],
            },
            methods: {
                setProduct(value) {
                    this.idProduk = value.id;
                },
                onSearch(search, loading) {
                    if (search.length) {
                        loading(true);
                        this.search(loading, search, this);
                    }
                },
                search: _.debounce((loading, search, vm) => {
                    fetch("{{ url('api/product?queryString=') }}" + `${escape(search)}`)
                        .then(res => {
                            // console.log(res.json());
                            res.json().then(json => (vm.options = json));
                            loading(false);
                        });
                }, 350),
            },
            computed: {}
        });
    </script>
@endpush

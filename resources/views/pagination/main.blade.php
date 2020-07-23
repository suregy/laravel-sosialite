<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Data</div>

                <div class="float-right m-2">
                    <butotn type="button" class="btn btn-primary btn-sm " onclick="add('{{ url('pagination/create') }}', 'GET') "><i class="fa fa-plus"></i> Add</butotn>
                    <button type="button" class="btn btn-warning btn-sm " onclick="edit('{{ url('pagination') }}', 'GET','product')"><i class="fa fa-pencil"></i> Edit</button>
                    <button type="button" class="btn btn-danger btn-sm " onclick="destroy('{{ url('pagination') }}', 'DELETE', 'product')"><i class="fa fa-trash"></i> Delete</button>
                </div>
                <div class="m-2">
                    <form id="form_search" class="form-inline">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                              <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Cari Nama" onkeyup="search('{{ url('pagination') }}', 'GET', 'table')">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                              <input type="text" name="price" id="price" class="form-control form-control-sm" placeholder="Cari Harga" onkeyup="search('{{ url('pagination') }}', 'GET', 'table')">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <select class="form-control form-control-sm" id="category" name="category" onchange="search('{{ url('pagination') }}', 'GET', 'table')">
                                    <option value="">Select Category</option>
                                    @foreach($category as $cat)
                                        <option value=" {{ $cat->id }} "> {{ $cat->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                    <div id="table">
                        @include('pagination.table')
                    </div>
                    <div class="loading mb-2">
                            <img src=" {{ url('image/load.gif') }} " alt="loading...." srcset="" style="widht: 20px; height: 20px;">
                            Loading...
                    </div>

            </div>
        </div>
    </div>
</div>

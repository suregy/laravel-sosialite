<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Destinasi</div>

                <div class="float-right m-2">
                    <butotn type="button" class="btn btn-primary btn-sm " onclick="add('{{ url('destinasi/create') }}', 'GET') "><i class="fa fa-plus"></i> Add</butotn>
                    <button type="button" class="btn btn-warning btn-sm " onclick="edit('{{ url('destinasi') }}', 'GET','destinasi')"><i class="fa fa-pencil"></i> Edit</button>
                    <button type="button" class="btn btn-danger btn-sm " onclick="destroy('{{ url('destinasi') }}', 'DELETE', 'destinasi')"><i class="fa fa-trash"></i> Delete</button>
                </div>
                <div class="m-2">
                    <form id="form_search" class="form-inline">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                              <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Cari Kota" onkeyup="search('{{ url('destinasi') }}', 'GET', 'table')">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                    <div id="table">
                        @include('admin.destinasi.table')
                    </div>
                    <div class="loading mb-2">
                            <img src=" {{ url('image/load.gif') }} " alt="loading...." srcset="" style="widht: 20px; height: 20px;">
                            Loading...
                    </div>

            </div>
        </div>
    </div>
</div>
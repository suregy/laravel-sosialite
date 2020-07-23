<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Baru Bus</div>
                    <div class="mx-3 ml-3">

                    <form id="form_save">
                        <div class="form-group">
                            <label for="Product Name">Nomor Polisis</label>
                            <input type="text" class="form-control" name="nopolisi" placeholder="D 4123 JF">
                        </div>
                        <div class="form-group">
                            <label for="Product Price">Jumlah Kursi</label>
                            <input type="text" class="form-control" name="jmlkursi" placeholder="45">
                        </div>
                        <div class="form-group">
                            <label for="Product Price">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Input Gambar">
                        </div>
                        <a href="{{ url('destinasi') }}">BACK</a>
                        <button type="button" class="btn btn-primary mb-3" onclick="save('{{ url('bus_store') }}', 'POST')"><i class="fa fa-check"></i> SAVE</button>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
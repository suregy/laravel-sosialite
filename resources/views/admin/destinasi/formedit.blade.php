<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Baru Destinasi</div>
                    <div class="mx-3 ml-3">

                    <form id="form_save">
                        <div class="form-group">
                            <label for="Product Name">Nama Pendek</label>
                            <input type="text" class="form-control" name="namapendek" placeholder="bdg" value=" {{ $datas->nama_pendek }} ">
                        </div>
                        <div class="form-group">
                            <label for="Product Price">Nama Panjang</label>
                            <input type="text" class="form-control" name="namapanjang" placeholder="Jakarta" value=" {{ $datas->nama_panjang }}">
                        </div>
                        <div class="form-group">
                            <label for="Product Price">Koordinat Lokasi</label>
                            <input type="text" class="form-control" name="koordinatlokasi" placeholder="6°54′53.08″S 107°36′35.32″E" value=" {{ $datas->kooridat_lokasi }}">
                        </div>
                        <a href="{{ url('destinasi') }}">BACK</a>
                        <button type="button" class="btn btn-primary mb-3" onclick="save('{{ url('destinasi/'.$datas->id) }}', 'POST', 'edit')"><i class="fa fa-check"></i> SAVE</button>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
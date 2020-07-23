<div class="load">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>
                <div class="checkbox">
                <input id="selectAllProduct" name="input[]" type="checkbox" value="" onclick="selectAll('selectAllProduct', 'destinasi')">
                <label for="selectAllProduct"></label>
                </div>
            </th>
            <th>Nama Pendek</th>
            <th>Nama Panjang</th>
            <th>Koordinat Lokasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $key=>$d)
            <tr>
                <td> {{ $datas->firstItem() + $key }} </td>
                <td> 
                    <div class="checkbox">
                    <input id="check{{ $d->id }}" name="destinasi" type="checkbox" value="{{ $d->id }}">
                    <label for="check{{ $d->id }}"></label>
                    </div>
                </td>
                <td> {{ $d->nama_pendek }} </td>
                <td> {{ $d->nama_panjang }} </td>
                <td> {{ $d->kooridat_lokasi }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="pagination justify-content-center">
    {{ $datas->onEachSide(1)->links() }}
</div>


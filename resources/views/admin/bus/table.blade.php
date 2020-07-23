<div class="load">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>
                <div class="checkbox">
                <input id="selectAllProduct" name="input[]" type="checkbox" value="" onclick="selectAll('selectAllProduct', 'bus')">
                <label for="selectAllProduct"></label>
                </div>
            </th>
            <th>Nomor Polisi</th>
            <th>Jumlah Kursi</th>
            <th>Gambar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $key=>$d)
            <tr>
                <td> {{ $datas->firstItem() + $key }} </td>
                <td> 
                    <div class="checkbox">
                    <input id="check{{ $d->id }}" name="bus" type="checkbox" value="{{ $d->id }}">
                    <label for="check{{ $d->id }}"></label>
                    </div>
                </td>
                <td> {{ $d->nopolisi }} </td>
                <td> {{ $d->jmlkursi }} </td>
                <td> <img src=" {{ url('image/bus/'.$d->gambar) }} " alt="" srcset="" class="img-thumbnail cstmb"> </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="pagination justify-content-center">
    {{ $datas->onEachSide(1)->links() }}
</div>


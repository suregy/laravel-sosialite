<div class="load">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>
                <div class="checkbox">
                <input id="selectAllProduct" name="input[]" type="checkbox" value="" onclick="selectAll('selectAllProduct', 'trip')">
                <label for="selectAllProduct"></label>
                </div>
            </th>
            <th>Titik awal</th>
            <th>Titik Akhir</th>
            <th>Tgl Berangkat</th>
            <th>Waktu Berangkat</th>
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
                <td> {{ $d->titikawal }} </td>
                <td> {{ $d->titikakhir }} </td>
                <td> {{ $d->tanggalberangkat }} </td>
                <td> {{ $d->waktukeberangkatan }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="pagination justify-content-center">
    {{ $datas->onEachSide(1)->links() }}
</div>


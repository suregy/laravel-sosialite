<div class="load">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>
                <div class="checkbox">
                <input id="selectAllProduct" name="input[]" type="checkbox" value="" onclick="selectAll('selectAllProduct', 'product')">
                <label for="selectAllProduct"></label>
                </div>
            </th>
            <th>Category</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datas as $key=>$d)
            <tr>
                <td> {{ $datas->firstItem() + $key }} </td>
                <td> 
                    <div class="checkbox">
                    <input id="check{{ $d->id }}" name="product" type="checkbox" value="{{ $d->id }}">
                    <label for="check{{ $d->id }}"></label>
                    </div>
                </td>
                <td> {{ $d->getCategory->name }} </td>
                <td> {{ $d->name }} </td>
                <td> {{ $d->price }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="pagination justify-content-center">
    {{ $datas->onEachSide(1)->links() }}
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Baru</div>
                    <div class="mx-3 ml-3">

                    <form id="form_save">
                        <div class="form-group">
                            <label for="category">Select Category</label>
                            <select class="form-control" name="category">
                                <option value="">select category</option>
                                @foreach($category as $cat)
                                <option value=" {{ $cat->id }} " {{ $datas->category === $cat->id ? 'selected' : '' }}> {{ $cat->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Product Name">Product Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{ $datas->name }}" >
                        </div>
                        <div class="form-group">
                            <label for="Product Price">Product Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Product Price" value="{{ $datas->price }}" >
                        </div>
                        <a href="{{ url('pagination') }}">BACK</a>
                        <button type="button" class="btn btn-primary mb-3" onclick="save('{{ url('pagination/'.$datas->id) }}', 'PATCH', 'edit')"><i class="fa fa-check"></i> SAVE</button>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
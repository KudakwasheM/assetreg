<div class="container">
    <form action="{{ route('assets.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="input-group col-4">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" id="name" required />
            </div>
            <div class="input-group col-4"><label for="">Make</label>
                <input type="text" class="form-control" name="make" id="make" required />
            </div>
            <div class="input-group col-4"><label for="">Model</label>
                <input type="text" class="form-control" name="model" id="model" required />
            </div>
        </div>
        <div class="row">
            <div class="input-group col-4">
                <label for="">Type</label>
                <input type="text" class="form-control" name="type" id="type" required />
            </div>
            <div class="input-group col-4"><label for="">Asset Tag</label>
                <input type="text" class="form-control" name="assettag" id="assettag" required />
            </div>
            <div class="input-group col-4"><label for="">Serial Number</label>
                <input type="text" class="form-control" name="serial" id="serial" required />
            </div>
        </div>
        <div class="row">
            <div class="input-group col-4">
                <label for="">Purchase Date</label>
                <input type="date" class="form-control" name="purchase_date" id="purchase_date" required />
            </div>
            <div class="input-group col-4"><label for="">Warranty ?</label>
                <select name="warranty" id="warranty" class="form-control">
                    <option value="">-- Select Warranty --</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <div class="input-group col-4"><label for="">Warranty Expiry</label>
                    <input type="date" class="form-control" name="warranty_expiry" id="warranty_expiry" required />
                </div>
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>

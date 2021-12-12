<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-header">
                        <h2>Sale Setting</h2>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>

                        @endif
                        <form action="" class="form" wire:submit.prevent="updateSale">
                            <div class="form-group">
                                <div class="row">
                                    <label for="" class=" col-md-4 text-right">Status</label>
                                    <div class="col-md-4">
                                        <select name="" id="" class="form-control" wire:model="status">
                                            <option value="0">Unactive</option>
                                            <option value="1">active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">

                                <div class="row">
                                    <label for="" class=" col-md-4 text-right">Sale Date</label>
                                    <div class="col-md-4">
                                        <input wire:model="sale_date" type="datetime-local" id="sale-date" class="col-md-4 form-control" placeholder="YYYY/MM/DD HH:MM:SS">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class=" col-md-4 control-label"></label>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

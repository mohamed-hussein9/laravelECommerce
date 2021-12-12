<div style="margin: 30px 0">
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="" style="margin: 0;padding:0">ADD Sliders</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.homesliders')}}" class="btn btn-primary pull-right">ALL Sliders</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="addslider">
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-4 control-label" >Title</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model="title">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-4 control-label" >Sub Title</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model="sub_title">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-4 control-label" >price</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" wire:model="price">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-4 control-label" >Link</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" wire:model="link">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-4 control-label" >Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" wire:model="image">
                                    @if ($image)
                                    <img src="{{$image->temporaryUrl()}}" alt="" width="120">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-4 control-label" >Status</label>
                                <div class="col-md-4">
                                   <select name="" id="" class="form-control" wire:model="status">
                                       <option value="1">active</option>
                                       <option value="0">Unactive</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-4 control-label" >Slide type</label>
                                <div class="col-md-4">
                                   <select name="" id="" class="form-control" wire:model="slider_type">
                                       <option value="rtl">right to left</option>
                                       <option value="center">center</option>
                                   </select>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="row">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">ADD</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>

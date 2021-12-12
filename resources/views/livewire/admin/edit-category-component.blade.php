<div style="padding: 30px 0">

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-defalt">

                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6"><h2 style="padding:0;margin:0;">EditCategory</h2></div>
                            <div class="col-md-6">
                                <a href="{{route('admin.caregories')}}" class="btn btn-primary pull-right"> All Categories</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="updatecategory">
                            <div class="form-group ">
                                <label class="col-md-4  control-label" >Category name :</label>
                                <div class="col-md-4">
                                    <input @error('name') style="border: 1px solid red" @enderror type="text" class="form-control " name="category_name" wire:model="name" wire:keyup="generateslug">
                                    @error('name')
                                        <div style="color: red">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4  control-label" >Category slug :</label>
                                <div class="col-md-4">
                                    <input @error('slug') style="border: 1px solid red" @enderror type="text" class="form-control" wire:model="slug">
                                    @error('slug')
                                        <div style="color: red">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="col-md-4"></label>
                                <div class="col-md-4">
                                    <button type="submit"  class="btn btn-success">SAVE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

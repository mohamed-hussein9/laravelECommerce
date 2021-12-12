<div>
    <div>
    <div class="container" style="padding: 30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-header">
                        <div class="row">
                            <div class="col-md-6"><h2 style="padding: 0;margin:0;">Edit Product</h2></div>
                            <div class="col-md-6 ">
                                <a href="{{route('admin.products')}}" class="btn btn-primary pull-right"> All products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>

                        @endif
                        @if (Session::has('errors'))
                        @foreach (Session::has('errors') as $item)
                            <div class="alert alert-success">{{$item}}</div>
                        @endforeach


                        @endif
                        <form action="" enctype="multipart/form-data" class="form-horizontal" wire:submit.prevent="updateproduct">
                            <div class="row form-group">
                                <label for="" class="col-md-4 control-label">Product name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Name"  wire:model="name" wire:keyup="generateslug">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-md-4 control-label">slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="slug" wire:model="slug">
                                    @error('slug')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                             <div class="row form-group">
                                <label for="" class="col-md-4 control-label">Short Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Short Description"wire:model="short_description" ></textarea>
                                    @error('short_description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-md-4 control-label">Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Description" wire:model="description"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-md-4 control-label">Regular Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Regular Price" wire:model="regular_price">
                                    @error('regular_price')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                             <div class="row form-group">
                                <label for="" class="col-md-4 control-label">sale Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="sale Price" wire:model="sale_price">
                                    @error('sale_price')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                             <div class="row form-group">
                                <label for="" class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="SKU" wire:model="sku">
                                    @error('sku')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                             <div class="row form-group">
                                <label for="" class="col-md-4 control-label">stock status</label>
                                <div class="col-md-4">
                                   <select class="form-control" id="" wire:model="stock_status">
                                       <option value="instock">instock</option>
                                       <option value="outofstock">outstock</option>
                                   </select>
                                   @error('stock_status')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                             <div class="row form-group">
                                <label for="" class="col-md-4 control-label">featured</label>
                                <div class="col-md-4">
                                   <select class="form-control" id="" wire:model="featured">
                                       <option value="0">no</option>
                                       <option value="1">yes</option>
                                   </select>

                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-md-4 control-label">quantity</label>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" placeholder="quantity" wire:model="quantity">
                                    @error('quantity')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="form-control input-file"  wire:model="image">
                                    
                                </div>

                            </div>
                            @if ($image)
                                <img src="{{$image->temporaryUrl()}}" alt="" width="120">

                                @endif
                            <div class="row form-group">
                                <label for="" class="col-md-4 control-label">Category</label>
                                <div class="col-md-4">
                                   <select class="form-control" id="" wire:model="category_id">
                                       <option value="0">Select Category</option>
                                       @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                       @endforeach
                                   </select>
                                   @error('category_id')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            @if (session('category_error'))
                                <div class="alert alert-danger">
                                    {{ session('category_error') }}
                                </div>
                            @endif
                            <div class="row form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                   <button class="btn btn-success" type="submit">Update</button>
                                </div>
                            </div>



                        </form>
                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

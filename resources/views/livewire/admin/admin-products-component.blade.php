<div  style="margin:30px 0;">
    <style>
        nav svg{}
        nav .hidden{
            display: block !important;
        }
    </style>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6"><h2>ALL Products</h2></div>
                    <div class="col-md-6">
                        <a href="{{route('admin.addproduct')}}" class="btn btn-primary pull-right" style="">ADD Product</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>#iD</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>publish Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td><img width="50" src="{{asset('assets/images/products/').'/'.$product->image}}" alt=""></td>
                            <td>{{$product->name}}</td>
                            <td>@if($product->stock_status==='instock') <p style="color: green;">{{$product->stock_status}}</p>   @else <p style="color: red;">{{$product->stock_status}}</p>    @endif</td>
                            <td>{{$product->regular_price}}</td>
                            <td>{{$product->sale_price}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>
                                <a href="{{ route('admin.editproduct',['slug'=>$product->slug])}}"><i class="fa fa-edit fa-2x"></i></a>
                                  <a href="#" onclick="confirm('Are yopu sure to delete this category') || event.stopImmediatePropagation()"  wire:click.prevent="delete({{$product->id}})"><i class="fa fa-times fa-2x text-danger text-center" style="margin-left: 10px"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>
</div>
</div>

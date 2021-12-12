<div class="container">
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6"><h2  style="padding:0;margin:0;">Categories</h2></div>
                    <div class="col-md-6"><a href="{{route('admin.addcategory')}}" class="btn btn-primary pull-right">Add Category</a></div>
                </div>

            </div>
            <div class="panel-body">
                @if (Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>

                @endif

                    <table class="table  table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}"><i class="fa fa-edit fa-2x"></i></a>
                                    <a href="#" onclick="confirm('Are yopu sure to delete this category') || event.stopImmediatePropagation()" wire:click.prevent="delete('{{$category->id}}')"><i class="fa fa-times fa-2x text-danger text-center" style="margin-left: 10px"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
            <div class="panel-footer">{{$categories->links()}}</div>
    </div>
</div>
</div>
</div>

<div style="margin: 30px 0">
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="" style="margin: 0;padding:0">All Sliders</h2>
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addslider')}}" class="btn btn-primary pull-right">ADD new Slider</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>sub Title</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach ($sliders as $slide)
                                <tr>
                                <td>{{$slide->id}}</td>
                                <td><img src="{{asset('assets/images/sliders/')}}/{{$slide->image}}" alt="" width="50px"></td>
                                <td>{{$slide->title}}</td>
                                <td>{{$slide->subtitle}}</td>
                                <td>{{$slide->price}}</td>
                                <td>
                                    <a href="{{route('admin.editslider',['id'=>$slide->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                    <a href="#" wire:click.prevent="delete({{$slide->id}})"><i class="fa fa-times fa-2x" style="margin-left: 10px"></i></a>
                                </td>
                                </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
</div>

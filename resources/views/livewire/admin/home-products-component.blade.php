<div style="margin: 30px 0">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-header">
                    <div class="row">
                        <div class="col-md-6"><h3> Chose Which of below Categories want to apear in home page</h3></div>

                    </div>
                </div>
                <div class="panel-body">
                    <div >
                        @foreach ($cat_showen as $key=>$cat_p)
                        @php
                            $cat_name= DB::select('select name from categories  where id = '.$cat_p);


                        @endphp
                            <span class="tags"><a href="#">{{$key+1}} - {{ $cat_name[0]->name}}</a> </span>
                        @endforeach
                    </div>
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>

                    @endif

                       <form action="" wire:submit.prevent="save">
                            @foreach ($categories as $category)
                            <div class="form-check">
                                <label class="form-check-label" for="check1">
                                    <input type="checkbox" class="form-check-input"  value="{{$category->id}}" wire:model="cat_showen" {{$category->nom_of_homeproducts>0 ? 'checked' : ''}}> {{$category->name}}
                                </label>
                            </div>
                            @endforeach
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                <label for="">Nomber of Products in each category :</label>
                                <input type="number" class="form-control" wire:model="nom_of_products">

                            </div>
                            </div>

                            <button type="submit" class="btn btn-primary " >Save</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<style>
    .tags a {
    display: inline-block;
    height: 24px;
    line-height: 24px;
    position: relative;
    margin: 0 16px 8px 0;
    padding: 0 10px 0 12px;
    background: #444444;
    -webkit-border-bottom-right-radius: 3px;
    border-bottom-right-radius: 3px;
    -webkit-border-top-right-radius: 3px;
    border-top-right-radius: 3px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.2);
    box-shadow: 0 1px 2px rgba(0,0,0,0.2);
    color: #fff;
    font-size: 12px;
    font-family: "Lucida Grande","Lucida Sans Unicode",Verdana,sans-serif;
    text-decoration: none;
    text-shadow: 0 1px 2px rgba(0,0,0,0.2);
    font-weight: bold;
    }
    .tags a:before {
    content: "";
    position: absolute;
    top:0;
    left: -12px;
    width: 0;
    height: 0;
    border-color: transparent #ff2832 transparent transparent;
    border-style: solid;
    border-width: 12px 12px 12px 0;
    }
</style>

@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                @if(session("status"))
                <div class="alert alert-primary" role="alert">

                    {{session("status")}}
                </div>
                @endif
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Yazar Düzenle</h4>
                        <p class="category">{{$data[0]['name']}}</p>
                    </div>
                    <div class="card-content">
                        <form enctype="multipart/form-data" action="{{route('admin.yazar.edit.post',['id'=>$data[0]['id']])}}" method="POST">
                            {{ csrf_field()}}
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">

                                        <input name="name" type="text" value="{{$data[0]['name']}}" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <!-- <label class="control-label">Yazar Resmi</label> -->
                                        @if($data[0]['image']!="")

                                        <img src="{{asset($data[0]['image'])}}" style="width:250px">
                                        @endif
                                        <input name="image" style="padding:1;opacity:1;position:inherit" type="file" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">

                                        <textarea name="bio" id="" cols="30" rows="10" class="form-control">{{$data[0]['bio']}}</textarea>
                                        <span class="material-input"></span>
                                    </div>
                                </div>



                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Yazar Düzenle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
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
                        <h4 class="title">Yazar</h4>
                        <p class="category">Yazar oluştur</p>
                    </div>
                    <div class="card-content">
                        <form enctype="multipart/form-data" action="{{route('admin.yazar.create.post')}}" method="POST">
                            {{ csrf_field()}}
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <!-- <label class="control-label">Yazar adı</label> -->
                                        <input name="name" type="text" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <!-- <label class="control-label">Yazar Resmi</label> -->
                                        <input name="image" style="padding:1;opacity:1;position:inherit" type="file" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <!-- <label class="control-label">Yazar Bio</label> -->
                                       <textarea name="bio" id="" cols="30" rows="10" class="form-control"></textarea>
                                        <span class="material-input"></span>
                                    </div>
                                </div>



                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Yazar ekle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
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
                        <h4 class="title">Slider</h4>
                        <p class="category">Slider oluştur</p>
                    </div>
                    <div class="card-content">
                        <form action="{{route('admin.slider.create.post')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                             
                                        <input style="opacity: 1; position: inherit;" name="image" type="file" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Slider ekle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
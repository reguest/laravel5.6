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
                        <h4 class="title">Kategoriler</h4>
                        <p class="category">Kategori oluştur</p>
                    </div>
                    <div class="card-content">
                        <form action="{{route('admin.kategori.create.post')}}" method="POST">
                            {{ csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Yayın evi adı</label>
                                        <input name="name" type="text" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Yayın nevi ekle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
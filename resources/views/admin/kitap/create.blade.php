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
                        <h4 class="title">Kitap Ekle</h4>
                        <p class="category">Kitap Oluştur</p>
                    </div>
                    <div class="card-content">
                        <form  enctype="multipart/form-data" action="{{route('admin.kitap.create.post')}}" method="POST">
                            {{ csrf_field()}}


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Kitap adı</label>
                                        <input name="name" type="text" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                  
                                        <input name="image" style="opacity: 1; position: inherit;" type="file" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Kitap fiyatı</label>
                                        <input name="fiyat" type="text" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        
                                        <select name="yazarid" class="form-control" id="">
                                           @foreach($yazar as $key => $value)
                                           <option value="{{$value['id']}}"> {{$value['name']}}</option>
                                           @endforeach
                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                       
                                        <select name="yayineviid" class="form-control" id="">
                                           @foreach($yayinevi as $key => $value)
                                           <option value="{{$value['id']}}"> {{$value['name']}}</option>
                                           @endforeach
                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label">Açıklama</label>
                                       text
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>




                            <button type="submit" class="btn btn-primary pull-right">Kitap ekle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
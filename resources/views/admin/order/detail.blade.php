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
                        <h4 class="title">Sipariş Detayı</h4>
                   
                    </div>
                    <div class="card-content">
                           
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label>Alıcı: {{ \App\User::getField($data[0]['userId'],"name") }}</label>
                                        
                                
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label>adres: {{ $data[0]['adres'] }}</label>
                                        
                                
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label>telefon: {{ $data[0]['telefon'] }}</label>
                                        
                                
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating is-empty">
                                        <label>Mesaj: {{ $data[0]['mesaj'] }}</label>
                                        
                                
                                    </div>
                                </div>
                            </div>
@foreach(json_decode($data[0]['json'],true) as $key =>$value)
<div class="row">
   <div class="col-md-12">
     <div class="form-group label-floating is-empty">
        <label>Kitap Adı: {{ $value['name'] }}</label>
        <br>
        <label>Kitap Fiyatı: {{ $value['fiyat'] }} TL</label>
                                        
                                
      </div>

    </div>
</div>
@endforeach
                            
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
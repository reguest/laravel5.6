@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <a href="{{route('admin.yayinevi.create.post')}}" class="btn btn-success ">Yeni Kategori Ekle</a>






                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Yayın Evleri</h4>
                        <p class="category">Yayın evleri listesi</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th>İsim</th>
                                    <th>düzenle</th>
                                    <th>sil</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key =>$value)
                                <tr>
                                    <td>{{$value['name']}}</td>
                                    <td> <a href="{{route('admin.yayinevi.edit',['id'=>$value['id']])}}">Düzenle</a> </td>
                                    <td> <a href="{{route('admin.yayinevi.delete',['id'=>$value['id']])}}">Sil</a></td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{$data->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
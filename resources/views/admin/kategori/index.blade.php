@extends('layouts.admin')
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <a href="{{route('admin.kategori.create.post')}}" class="btn btn-success ">Yeni Kategori Ekle</a>




                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Kategoriler</h4>
                        <p class="category">Kategoriler listesi</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table id="example" name="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                  
                                </tr>
                            </thead>
                        
                        </table>




                        <!-- <table class="table">
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
                                    <td> <a href="{{route('admin.kategori.edit',['id'=>$value['id']])}}">Düzenle</a> </td>
                                    <td> <a href="{{route('admin.kategori.delete',['id'=>$value['id']])}}">Sil</a></td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table> -->
                        {{$data->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


@section('footer')
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>


    $('#example').DataTable({
        lengthMenu:[[25,100,-1],[25,100,"All"]],
        processing:true,
        serverSide:true,
        ajax: {
            type:'POST',
            headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
            url:'{{route('admin.kategori.getData')}}',
        },
        columns: [
            { data: 'name' , name:'name' }
     
          /*  { data: 'edit', name:'edit',orderable:false,searchable:false },*/
            
        ]
    });

</script>

@endsection
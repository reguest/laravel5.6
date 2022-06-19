{{__('helper.welcome')}}
@lang('helper.welcome')  <!-- //dil dosyası çekme -->

<style>
    .password {
        border: 1px solid red;
    }
</style>




{!! Form::open(['url'=>'kitap/ekle','method'=>'POST']) !!}
{!! Form::label('name','Kitap ismi') !!}
{!! Form::password('password',['class'=>'password']) !!}
{!! Form::password('email',['class'=>'email']) !!}
{!! Form::close() !!}
<!-- <form action="{{route('kitap.ekle.post')}}" method="POST">
    {{csrf_field()}}
    kitap İsmi: </br>
    <input type="text" name="isim">
    </br></br>
    <button> ekle</button>
</form> -->
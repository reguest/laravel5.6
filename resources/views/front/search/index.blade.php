
@extends('layouts.app')
@section('content')

<!--product-starts-->
<div class="product">
	<div class="container">
		<div class="product-top">
		   @foreach($data->chunk(4) as $chunk)
			<div class="product-one">
			    @foreach($chunk as $key => $value)
				<div class="col-md-3 product-left">
					<div class="product-main simpleCart_shelfItem">
						<a href="{{ route('kitap.detay',['selflink'=>$value['selflink']]) }}" class="mask"><img class="img-responsive zoom-img" src="{{asset($value['image'])}}"
								alt="" /></a>
						<div class="product-bottom">
							<h3>{{ $value['name']}}</h3>
							<p>{{\App\Yazarlar::getField($value['yazarid'],'name')}}</p>
							<h4><a class="item_add" href="#"><i></i></a> <span class="item_price">{{ $value['fiyat']}}₺</span></h4>
						</div>
				    </div>
				</div>
				@endforeach
				{{$data->links()}}
				<div class="clearfix"></div>
			</div>
			@endforeach
			
		</div>
	</div> 
</div>
<!--product-end-->
<!--information-starts-->

@endsection

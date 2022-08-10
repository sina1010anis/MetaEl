@extends('Admin/Home')

@section('page')

<h2 class="my-font-IYM my-color-b-800 text-end p-4">{{$data->name}}</h2>
<div class="my-line"></div>
<p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{{$data->slug}} : slug </p>
<div class="my-line"></div>
<p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{{$data->description}} : description </p>
<div class="my-line"></div>
<p class="my-font-IYL my-f-13 my-color-b-500 text-center my-3" dir="rtl"><img style="width: 300px" src="{{url('image/product/'.$data->image)}}" alt="{{$data->name}}"> </p>
<div class="d-flex justify-content-center align-content-center">
@foreach ($data->images as $item)
    <span class="my-font-IYL my-f-13 my-color-b-500 my-3" dir="rtl"><img style="width: 100px" src="{{url('image/product/'.$item->image)}}" alt="{{$data->image}}"> </span>    
@endforeach
</div>
<div class="my-line"></div>
<p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{{$data->price}} : price </p>
<div class="my-line"></div>
<p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{{($data->status = 1) ? 'غیر فعال' : 'فعال'}} : status </p>
<div class="my-line"></div>
<p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{!! $data->description_a !!}</p>
<div class="my-line"></div>
<p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{{$data->sub_menu->name}} : menu </p>
<div class="my-line"></div>
<p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{{$data->created_at}} : created_at </p>
@endsection
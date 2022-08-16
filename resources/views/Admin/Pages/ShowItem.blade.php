@extends('Admin/Home')

@section('page')
    @if ($model == '\App\Models\Product') 
        {{ $model }}       
        <h2 class="my-font-IYM my-color-b-800 text-end p-4">{{$data->name}}</h2>
        <div class="my-line"></div>
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
        @endif
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{{$data->slug}} : slug </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{{$data->description}} : description </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-center my-3" dir="rtl"><img style="width: 300px" src="{{url('image/product/'.$data->image)}}" alt="{{$data->name}}"> </p>
        <div class="d-flex justify-content-center align-content-center">
        @foreach ($data->images as $item)
            <span class="my-font-IYL my-f-13 my-color-b-500 my-3" dir="rtl">
                <a href="{{ route('admin.delete.image.product' , ['id' => $item->id]) }}">
                    <img style="width: 100px" src="{{url('image/product/'.$item->image)}}" alt="{{$data->image}}">
                </a>
            </span>    
        @endforeach
        </div>
        <div class="d-flex justify-content-center align-content-center my-3">
            <form action="{{route('admin.product.image.upload' , ['id' => $data->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="image" id="inputGroupFile01">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Upload </button>
                </div>
            </form>
        </div>
        @error('file')
            <div class="alert alert-danger my-font-IYL my-f-13" dir="rtl">{{$message}}</div>
        @enderror
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{{$data->price}} : price </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{{($data->status = 1) ? 'غیر فعال' : 'فعال'}} : status </p>
        <div class="my-line"></div>
        <div class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{!! $data->description_a !!}</div>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{{$data->sub_menu->name}} : menu </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="rtl">{{$data->created_at}} : created_at </p>
    @endif
 
    @if ($model == '\App\Models\Address') 
        {{ $model }}       
        <h2 class="my-font-IYM my-color-b-800 text-end p-4">
            <p style="color:green" v-if="{{ $data->status}} == 1">فعال</p>
            <p style="color:red" v-if="{{ $data->status  }} == 0">غیر فعال</p>
        </h2>
        <div class="my-line"></div>
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
        @endif
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->city->name}} : City </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->state->name}} : State </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->location}} : Location </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->created_at}} : created_at </p>
    @endif
@endsection
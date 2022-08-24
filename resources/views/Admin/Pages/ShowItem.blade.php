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
        <h2 class="my-font-IYM my-color-b-800 text-end p-4">جزئیات محصول :</h2>
        <form method="post" action="{{ route('admin.edit.datail_product' , ['model' => '\App\Models\DatailProduct' , 'id' => $data->id , 'id_datail_product' => (!isset($data->datail_product[0])) ? 'Null' : $data->datail_product[0]->id])}}">
            @csrf
            <div class="my-5">
                <label for="send_price" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> هزینه ارسال</label>
                <input name="send_price" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="send_price" placeholder=" هزینه ارسال" value="{{ (!isset($data->datail_product[0])) ? Null :  $data->datail_product[0]->send_price }}">
            </div>
            <div class="my-5">
                <label for="send_time" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> زمان ارسال</label>
                <input name="send_time" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="send_time" placeholder=" زمان ارسال" value="{{ (!isset($data->datail_product[0])) ? Null :  $data->datail_product[0]->send_time }}">
            </div>
            <div class="my-5">
                <label for="weight" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">  وزن</label>
                <input name="weight" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="weight" placeholder="  وزن" value="{{ (!isset($data->datail_product[0])) ? Null :  $data->datail_product[0]->weight }}">
            </div>
            <button type="submit" class="btn btn-primary btn-lg p-4 my-font-IYL my-f-16 mt-5 w-100">تایید</button>
        </form>
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

    @if ($model == '\App\Models\Banner') 
        {{ $model }} 
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
        @endif   
        <h3 class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->name}} : Name </h3>
        <div class="my-line"></div>   
        <p class="my-font-IYL my-f-13 my-color-b-500 text-center my-3" dir="rtl"><img style="height: 90px" src="{{url('image/banner/'.$data->image)}}" alt="{{$data->name}}"> </p>
        <div class="my-line"></div>
        <a class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr" href="{{$data->url}}">{{$data->url}} : URL  </a> 
        <div class="my-line"></div>   
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->location}} : Location </p>
        <div class="my-line"></div>  
        <h5 class="my-font-IYL my-color-b-800 text-end p-4">
            <p style="color:green" v-if="{{ $data->status}} == 1">فعال</p>
            <p style="color:red" v-if="{{ $data->status  }} == 0">غیر فعال</p>
        </h5>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->created_at}} : created_at </p>
    @endif

    @if ($model == '\App\Models\Brand') 
        {{ $model }} 
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
        @endif   
        <h3 class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->name}} : Name </h3>
        <div class="my-line"></div>   
        <p class="my-font-IYL my-f-13 my-color-b-500 text-center my-3" dir="rtl"><img style="height: 90px" src="{{url('image/logo/'.$data->image)}}" alt="{{$data->name}}"> </p>
        <div class="my-line"></div>
        <a class="my-font-IYL my-f-13 my-color-b-500 text-end my-3 d-block" dir="rtl" href="{{$data->url}}">{{$data->url}} : URL  </a> 
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->created_at}} : created_at </p>
    @endif

    @if ($model == '\App\Models\Menu') 
        {{ $model }} 
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
        @endif   
        <h3 class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->name}} : Name </h3>
        <div class="my-line"></div>   
        <h2 class="my-font-IYM my-color-b-800 text-end p-4">
            <p style="color:green" v-if="{{ $data->status}} == 1">فعال</p>
            <p style="color:red" v-if="{{ $data->status  }} == 0">غیر فعال</p>
        </h2>
        <div class="my-line"></div>   

        <p class="my-font-IYL my-f-13 my-color-b-500 text-center my-3" dir="rtl"><img style="height: 90px" src="{{url('image/front/'.$data->image)}}" alt="{{$data->name}}"> </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr"><i class="{{$data->icon}}"></i> : Icon </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->created_at}} : created_at </p>
    @endif

    @if ($model == '\App\Models\Cart') 
        {{ $model }}      
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
        @endif 
        <h2 class="my-font-IYM my-color-b-800 text-end p-4">
            <p style="color:green" v-if="{{ $data->status}} == 1">فعال</p>
            <p style="color:red" v-if="{{ $data->status  }} == 0">غیر فعال</p>
        </h2>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->user->name}} : User </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{ $data->product->product->name . '->'. $data->product->name }} : Product </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->number}} : Number </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->total_price}} : Total Price </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->created_at}} : created_at </p>
    @endif

    @if ($model == '\App\Models\City') 
        {{ $model }}      
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
            <div class="my-line"></div>
        @endif 
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->name}} : Name </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->send_price}} : Send Price </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->created_at}} : created_at </p>
    @endif

    @if ($model == '\App\Models\CommentProduct') 
        {{ $model }}      
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
            <div class="my-line"></div>
        @endif 
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->subject}} : Subject </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->text}} : text  </p>
        <div class="my-line"></div>
        <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i><a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important" href="{{route('admin.show.data' , ['model' => '\App\Models\Product' , 'id' =>  $data->product->id ])}}">{{ $data->product->name }}</a></button>  
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->user->name}} : As  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">
            @if ($data->vote == 1)
                خوب است
            @endif
            @if ($data->vote == 2)
                نظری ندارم
            @endif
            @if ($data->vote == 3)
                خوب نیست 
            @endif
        </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->attr_comment[0]->step_1}} : طراحی  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->attr_comment[0]->step_2}} : کارایی  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->attr_comment[0]->step_3}} : کیفیت  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->attr_comment[0]->step_4}} : ارزش  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->created_at}} : created_at </p>
    @endif

    @if ($model == '\App\Models\DiscountCode') 
        {{ $model }}      
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
            <div class="my-line"></div>
        @endif 
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->description}} : Description </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->value}} : Value  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->code}} : Code  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{($data->user_id == 0 ) ? 'برای همه' : $data->user->name}} : As  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{($data->status == 0 ) ? 'غیر فعال' : 'فعال'}} : Status  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{($data->score == 0 ) ? ' رایگان' :$data->score}} : Score  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->created_at}} : created_at </p>
    @endif

    @if ($model == '\App\Models\factor') 
        {{ $model }}      
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
            <div class="my-line"></div>
        @endif 
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->user->name}} : User </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->Mobile}} : Mobile  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->total_price}} : Total Price  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->code_pay}} :  Code Pay  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->send_status}} :  Send Status  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->buy_status}} :  Buy Status  </p>
        <div class="my-line"></div>
        <h4 class="my-font-IYL my-color-b-500 text-end my-3" dir="lrt">Products  </h4>
        <br>
        @foreach ($data->product_factor as $item)
            <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i><a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important" href="{{route('admin.show.data' , ['model' => '\App\Models\Product' , 'id' =>  $item->price_product->product->id ])}}">{{ $item->price_product->product->name . ' -> ('.$item->price_product->name.')'.' Price :' .$item->price.' Number :'.$item->number }}</a></button>  <br><br>
        @endforeach
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->created_at}} : created_at </p>
    @endif

    @if ($model == '\App\Models\title_filter') 
        {{ $model }}      
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
            <div class="my-line"></div>
        @endif 
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->subject}} : Name </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->menu->name}} : Menu  </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">
        @foreach ($data->filter as $item)
            <span class="bg-info p-2 m-1">{{ $item->name  }}</span>
          @endforeach : Item Filter   
          <a class="btn btn-success my-font-IYM mx-3 btn-lg" href="{{ route('admin.new.data' , ['model' => '\App\Models\filter']) }}" > <i class="bi bi-plus-circle-dotted icon-set"></i> افزودن ایتم فیلتر</a>
        </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->created_at}} : created_at </p>
    @endif

    @if ($model == '\App\Models\Item') 
        {{ $model }}      
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
            <div class="my-line"></div>
        @endif 
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->name}} : Name </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->description}} : Description </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-center my-3" dir="rtl"><img style="width: 90px" src="{{url('image/front/'.$data->image)}}" alt="{{$data->name}}"> </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->location}} : Location </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->created_at}} : created_at </p>
    @endif
@endsection
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
        <h2 class="my-font-IYM my-color-b-800 text-end p-4">: جزئیات محصول </h2>
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
        <br>
        <br>
        <h2 class="my-font-IYM my-color-b-800 text-end p-4">:مشخصات فیلتر محصول </h2>
        <x-page-edit :name="$data->name" title=" ویرایش فیلتر" :url="route('admin.edit.filter' , ['model' => $model , 'id' => $data->id ])">
            <x-slot:form>
                @foreach ($data->filter as $item)
                    <div class=" mb-5">
                        <label for="filter_id" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">  {{ $item->title_filter->subject  }} : {{ ($item->filter) ? $item->filter->name : null  }}</label>
                        <select name="{{ $item->id }}" class="form-select form-select-lg" id="filter_id" aria-label="Default select example">
                            @foreach ($filter_all->where('title_filter_id',$item->title_filter->id) as $filter)
                                <option value="{{ $filter->id }}">{{ $filter->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endforeach
            </x-slot:form>
        </x-page-edit>  
        <div class="my-line"></div>
        <br>
        <br>
        <h2 class="my-font-IYM my-color-b-800 text-end p-4">:چند قیمته  </h2>
        @foreach ($data->price_product as $item)
            <a href="{{ route('admin.delete.data' , [ 'model' => '\App\Models\PriceProduct' , 'id' => $item->id]) }}">
                <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$item->price}} : {{ $item->name }} </p>
            </a>
        @endforeach
        <x-page-edit :name="$data->name" title=" افزودن قیمت" :url="route('admin.new.data.post' , ['model' => '\App\Models\PriceProduct' , 'type' => 'null'])">            
            <x-slot:form>
                <div class="my-5">
                    <input name="product_id" type="hidden" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="product_id" placeholder="  وزن" value="{{ $data->id }}">
                </div>
                <div class="my-5">
                    <label for="name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">   نام قیمت</label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="name" placeholder=" نام قیمت" value="">
                </div>
                <div class="my-5">
                    <label for="price" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">قمیت </label>
                    <input name="price" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="price" placeholder="  قیمت" value="">
                </div>
            </x-slot:form>
        </x-page-edit>  
        <div class="my-line"></div>
        <br>
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
        <div class="my-line"></div>
        <br>
        <br>
        <h2 class="my-font-IYM my-color-b-800 text-end p-4">:مشخصات فیلتر محصول </h2>
        @foreach ($data->reply_comment as $item)
            <a href="{{route('admin.delete.data' , ['model' => '\App\Models\ReplyComment' , 'id' => $item->id])}}">
                <div class="my-bg-b-600 my-3 border-2 p-2" dir="rtl">
                    <p class="my-font-IYM my-f-15 my-color-b-800">
                        {{ $item->text }}
                    </p>
                    <p class="my-font-IYL my-f-12 my-color-b-500">
                        {{ $item->user->name }}
                    </p>
                </div> 
            </a>   
        @endforeach
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

    @if ($model == '\App\Models\Slider') 
        {{ $model }}      
        @if (session('msg'))
            <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
            <div class="my-line"></div>
        @endif 
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->subject}} : Subject </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->description}} : Description </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-center my-3" dir="rtl"><img style="height: 150px" src="{{url('image/front/'.$data->image)}}" alt="{{$data->name}}"> </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{$data->url}} : Location </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="ltr">{{($data->status == 1) ? 'فعال' : 'غیر فعال'}} : Status </p>
        <div class="my-line"></div>
        <p class="my-font-IYL my-f-13 my-color-b-500 text-end my-3" dir="lrt">{{$data->created_at}} : created_at </p>
    @endif
@endsection
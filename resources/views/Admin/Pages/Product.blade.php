@extends('Admin/Home')

@section('page')
  @if ($model == '\App\Models\Product')
      {{ $model }}
      <x-page-view name="محصولات" :model="$model">
        <x-slot:table>
          <thead class="table-light">
            <tr>
              <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">نام</th>
              <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">توضیحات</th>
              <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">قیمت</th>
              <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">فعالیت ها</th>
            </tr>
          </thead>
          <tbody>
            @if (session('data_search'))
                @foreach (session('data_search') as $item)
                    <tr class="my-f-13 my-color-b-600 my-font-IYL">
                        <td>{{$item->name}}</td>
                        <td>{{Str::limit($item->description, 80, '...')}}</td>
                        <td>{{$item->price}}</td>
                        <td>
                            <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach ($data as $item)
                    <tr class="my-f-13 my-color-b-600 my-font-IYL">
                        <td>{{$item->name}}</td>
                        <td>{{Str::limit($item->description, 80, '...')}}</td>
                        <td>{{$item->price}}</td>
                        <td >
                          <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                        </td>
                    </tr>
                @endforeach
            @endif
          </tbody>
          <div class="d-flex justify-content-center align-content-center my-5">
            {{$data->links()}}
          </div>
        </x-slot:table>
      </x-page-view>
  @endif

  @if ($model == '\App\Models\Menu')
    {{ $model }}
    <x-page-view name="منو اصلی" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">نام</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">عکس</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">ایکون</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> وضعیت</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                  <td>{{$item->name}}</td>
                  <td>
                    <img style="width: 200px" src="{{ url('image/front/'.$item->image) }}" alt="">
                  </td>
                  <td><i class="{{ $item->icon }}"></i></td>
                  <td>
                    <p style="color:green" v-if="{{ $item->status == 1 }}">فعال</p>
                    <p style="color:red" v-if="{{ $item->status == 0 }}">غیر فعال</p>
                  </td>
                  <td>
                    <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                  </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <td>{{$item->name}}</td>
            <td>
              <img style="width: 200px" src="{{ url('image/front/'.$item->image) }}" alt="">
            </td>
            <td><i class="{{ $item->icon }}"></i></td>
            <td>
              @if ($item->status)
                <p style="color:green">فعال</p>
              @else
                <p style="color:red">غیر فعال</p> 
              @endif
            </td>
            <td>
              <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
            </td>
        </tr>
          @endforeach
      @endif
        </tbody>
        <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div>
      </x-slot:table>
    </x-page-view>
  @endif

  @if ($model == '\App\Models\Address')
    {{ $model }}
    <x-page-view name="ادرس ها" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">وضعیت</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">استان</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">شهر</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> ادرس</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                <td>
                  <p style="color:green" v-if="{{ $item->status}} == 1">فعال</p>
                  <p style="color:red" v-if="{{ $item->status  }} == 0">غیر فعال</p>
                </td>
                <td>{{$item->city->name}}</td>
                <td>{{$item->state->name}}</td>
                <td>{{$item->location}}</td>
                <td>
                  <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <td>
              <p style="color:green" v-if="{{ $item->status}} == 1">فعال</p>
              <p style="color:red" v-if="{{ $item->status  }} == 0">غیر فعال</p>
            </td>
            <td>{{$item->city->name}}</td>
            <td>{{$item->state->name}}</td>
            <td>{{$item->location}}</td>
            <td>
              <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
            </td>
        </tr>
          @endforeach
      @endif
        </tbody>
        <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div>
      </x-slot:table>
    </x-page-view>
  @endif

  @if ($model == '\App\Models\Banner')
    {{ $model }}
    <x-page-view name=" بنرها" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">نام</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">عکس</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">ادرس</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> مکان</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> وضعیت</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                <td>{{$item->name}}</td>
                  <td>
                    <img style="width: 200px" src="{{ url('image/banner/'.$item->image) }}" alt="{{ $item->name }}">
                  </td>
                  <td>{{ $item->url }}</td>
                  <td>{{ $item->location }}</td>
                  <td>
                    <p style="color:green" v-if="{{ $item->status}} == 1">فعال</p>
                    <p style="color:red" v-if="{{ $item->status  }} == 0">غیر فعال</p>
                  </td>
                  <td>
                    <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <td>{{$item->name}}</td>
            <td>
              <img style="width: 200px" src="{{ url('image/banner/'.$item->image) }}" alt="{{ $item->name }}">
            </td>
            <td>{{ $item->url }}</td>
            <td>{{ $item->location }}</td>
            <td>
              <p style="color:green" v-if="{{ $item->status}} == 1">فعال</p>
              <p style="color:red" v-if="{{ $item->status  }} == 0">غیر فعال</p>
            </td>
            <td>
              <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
          </td>
        </tr>
          @endforeach
      @endif
        </tbody>
        <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div>
      </x-slot:table>
    </x-page-view>
  @endif

  @if ($model == '\App\Models\Brand')
    {{ $model }}
    <x-page-view name=" برندها" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">نام</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">عکس</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">ادرس</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                <td>{{$item->name}}</td>
                  <td>
                    <img style="width: 200px" src="{{ url('image/logo/'.$item->image) }}" alt="{{ $item->name }}">
                  </td>
                  <td>{{ $item->url }}</td>
                  <td>
                    <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <td>{{$item->name}}</td>
              <td>
                <img style="height: 70px" src="{{ url('image/logo/'.$item->image) }}" alt="{{ $item->name }}">
              </td>
              <td>{{ $item->url }}</td>
              <td>
                <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
            </td>
          </tr>
          @endforeach
      @endif
        </tbody>
        <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div>
      </x-slot:table>
    </x-page-view>
  @endif

  @if ($model == '\App\Models\Cart')
    {{ $model }}
    <x-page-view name=" سبدخرید" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">کاربر</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">محصول</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">تعداد</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">جمع قیمت</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                <td>{{$item->user->name}}</td>
                <td>
                  <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i><a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important" href="{{route('admin.show.data' , ['model' => '\App\Models\Product' , 'id' =>  $item->product->id ])}}">{{ $item->product->product->name }} -> {{ $item->product->name }}</a></button>
                </td>
                <td>{{$item->number}}</td>
                <td>{{$item->total_price}}</td>
                <td>
                  <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <td>{{$item->user->name}}</td>
            <td>
              <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i><a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important" href="{{route('admin.show.data' , ['model' => '\App\Models\Product' , 'id' =>  $item->product->id ])}}"> {{ $item->product->product->name }} -> {{ $item->product->name }}</a></button>
            </td>
            <td>{{$item->number}}</td>
            <td>{{$item->total_price}}</td>
            <td>
              <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
            </td>
          </tr>
          @endforeach
      @endif
        </tbody>
        <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div>
      </x-slot:table>
    </x-page-view>
  @endif

  @if ($model == '\App\Models\City')
    {{ $model }}
    <x-page-view name=" استان ها" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">نام</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">هزینه ارسال</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                <td>{{$item->name}}</td>
                <td>{{$item->send_price}}</td>
                <td>
                  <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <td>{{$item->name}}</td>
            <td>{{$item->send_price}}</td>
            <td>
              <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
            </td>
          </tr>
          @endforeach
      @endif
        </tbody>
        <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div>
      </x-slot:table>
    </x-page-view>
  @endif

  @if ($model == '\App\Models\CommentProduct')
    {{ $model }}
    <x-page-view name="  کامنت های محصولات" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">موضوع</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">متن پیام </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> برای </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> از طرف </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                <td>{{ Str::limit($item->subject, 10, '...') }}</td>
                <td>{{ Str::limit($item->text, 20, '...') }}</td>
                <td>
                  <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i><a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important" href="{{route('admin.show.data' , ['model' => '\App\Models\Product' , 'id' =>  $item->product->id ])}}">{{ $item->product->name }}</a></button>  
                </td>
                <td>{{$item->user->name}}</td>
                <td>
                  <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <td>{{$item->subject}}</td>
            <td>{{ Str::limit($item->text, 40, '...') }}</td>
            <td>
              <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i><a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important" href="{{route('admin.show.data' , ['model' => '\App\Models\Product' , 'id' =>  $item->product->id ])}}">{{ $item->product->name }}</a></button>  
            </td>
            <td>{{$item->user->name}}</td>
            <td>
              <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
            </td>
          </tr>
          @endforeach
      @endif
        </tbody>
        <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div>
      </x-slot:table>
    </x-page-view>
  @endif
  
  @if ($model == '\App\Models\DiscountCode')
    {{ $model }}
    <x-page-view name="  کامنت های محصولات" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">توضیحات</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> مقدار </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> کد </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">  برای </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">  وضعیت </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">  امتیاز </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                <td>{{ Str::limit($item->description, 10, '...') }}</td>
                <td>{{$item->value}}</td>
                <td>{{$item->code}}</td>
                <td>{{($item->user_id == Null ) ? 'برای همه' : $item->user->name}}</td>
                <td>{{($item->status == 0 ) ? 'غیر فعال' : 'فعال'}}</td>
                <td>{{($item->score == 0 ) ? ' رایگان' :$item->score}}</td>
                <td>
                  <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <tr class="my-f-13 my-color-b-600 my-font-IYL">
              <td>{{ Str::limit($item->description, 10, '...') }}</td>
              <td>{{$item->value}}</td>
              <td>{{$item->code}}</td>
              <td>{{($item->user_id == Null ) ? 'برای همه' : $item->user->name}}</td>
              <td>{{($item->status == 0 ) ? 'غیر فعال' : 'فعال'}}</td>
              <td>{{($item->score == 0 ) ? ' رایگان' :$item->score}}</td>
                <td>
                  <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
            </tr>
          </tr>
          @endforeach
      @endif
        </tbody>
        <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div>
      </x-slot:table>
    </x-page-view>
  @endif

  @if ($model == '\App\Models\factor')
    {{ $model }}
    <x-page-view name="    فاکتور ها" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> شناسه پرداخت</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> وضعیت پرداخت </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> وضعیت ارسال </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">شماره موبایل </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                <td>{{$item->code_pay}}</td>
                <td>{{$item->buy_status}}</td>
                <td>{{$item->send_status}}</td>
                <td>{{$item->mobile}}</td>
                <td>
                  <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <td>{{$item->code_pay}}</td>
            <td>{{$item->buy_status}}</td>
            <td>{{$item->send_status}}</td>
            <td>{{$item->mobile}}</td>
            <td>
              <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
            </td>
          </tr>
          @endforeach
      @endif
        </tbody>
        <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div>
      </x-slot:table>
    </x-page-view>
  @endif

  @if ($model == '\App\Models\title_filter')
    {{ $model }}
    <x-page-view name="    فیلتر ها" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> نام فیلتر</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> منو مورد نظر </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> مقدار های فیلتر </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                <td>{{$item->subject}}</td>
                <td>{{$item->menu->name}}</td>
                <td>
                  @foreach ($item->filter as $data)
                    <span class="bg-info p-2 m-1">{{ $data->name  }}</span>
                  @endforeach
                </td>
                <td>
                  <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <td>{{$item->subject}}</td>
            <td>{{$item->menu->name}}</td>
            <td>
              @foreach ($item->filter as $data)
                <span class="bg-info p-2 m-1">{{ $data->name  }}</span>
              @endforeach
            </td>
            <td>
              <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
            </td>
          </tr>
          @endforeach
      @endif
        </tbody>
        {{-- <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div> --}}
      </x-slot:table>
    </x-page-view>
  @endif

  @if ($model == '\App\Models\Item')
    {{ $model }}
    <x-page-view name="    ایتم ها" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> نام </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">   توضیحات </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">   عکس </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> محل</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت ها</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>
                  <img style="width: 90px" src="{{ url('/image/front/'.$item->image) }}" alt="{{ $item->name }}">
                </td>
                <td>{{$item->location}}</td>
                <td>
                  <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>
              <img style="width: 90px" src="{{ url('image/front/'.$item->image) }}" alt="{{ $item->name }}">
            </td>
            <td>{{$item->location}}</td>
            <td>
              <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
            </td>
          </tr>
          @endforeach
      @endif
        </tbody>
        {{-- <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div> --}}
      </x-slot:table>
    </x-page-view>
  @endif

  @if ($model == '\App\Models\Slider')
    {{ $model }}
    <x-page-view name="    اسلایدر ها" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> موضوع </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">   توضیحات </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">   عکس </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> ادرس</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> وضعیت</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت ها</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                <td>{{$item->subject}}</td>
                <td>{{Str::limit($item->description, 35, '...') }}</td>
                <td>
                  <img style="width: 90px" src="{{ url('/image/front/'.$item->image) }}" alt="{{ $item->subject }}">
                </td>
                <td>{{$item->url}}</td>
                <td>{{ ($item->status == 1) ? 'فعال' : 'غیر فعال' }}</td>

                <td>
                  <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
            <tr class="my-f-13 my-color-b-600 my-font-IYL">
              <td>{{$item->subject}}</td>
              <td>{{Str::limit($item->description, 35, '...') }}</td>
              <td>
                <img style="width: 90px" src="{{ url('/image/front/'.$item->image) }}" alt="{{ $item->subject }}">
              </td>
              <td>{{$item->url}}</td>
              <td>{{ ($item->status == 1) ? 'فعال' : 'غیر فعال' }}</td>

              <td>
                <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
              </td>
            </tr>
          @endforeach
      @endif
        </tbody>
        {{-- <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div> --}}
      </x-slot:table>
    </x-page-view>
  @endif

  @if ($model == '\App\Models\User')
    {{ $model }}
    <x-page-view name="    کاربر ها" :model="$model">
      <x-slot:table>
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> نام </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">   ایمیل </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">   امتیاز </th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> موبایل</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> ادرس</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col"> فعالیت ها</th>
          </tr>
        </thead>
        <tbody>
          @if (session('data_search'))
          @foreach (session('data_search') as $item)
              <tr class="my-f-13 my-color-b-600 my-font-IYL">
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->score}}</td>
                <td>{{$item->mobile}}</td>
                <td>
                  <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i><a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important" href="{{route('admin.show.data' , ['model' => '\App\Models\Address' , 'id' =>  $item->address_id ])}}">ادرس ثبت شده</a></button>
                </td>
                <td>
                  <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
                </td>
              </tr>
          @endforeach
      @else
          @foreach ($data as $item)
            <tr class="my-f-13 my-color-b-600 my-font-IYL">
              <td>{{$item->name}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->score}}</td>
              <td>{{$item->mobile}}</td>
              <td>
                <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i><a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important" href="{{route('admin.show.data' , ['model' => '\App\Models\Address' , 'id' =>  $item->address_id ])}}">ادرس ثبت شده</a></button>
              </td>
              <td>
                <x-page-btn :model="$model" :id="$item->id"></x-page-btn>
              </td>
            </tr>
          @endforeach
      @endif
        </tbody>
        {{-- <div class="d-flex justify-content-center align-content-center my-5">
          {{$data->links()}}
        </div> --}}
      </x-slot:table>
    </x-page-view>
  @endif

@endsection

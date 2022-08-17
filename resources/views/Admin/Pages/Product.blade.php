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
@endsection

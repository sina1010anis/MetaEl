@extends('Admin/Home')

@section('page')
  @if ($model == '\App\Models\Product')
    {{ $model }}
    <div class="d-flex justify-content-end border-bottom py-4">
        <button class="btn btn-danger my-font-IYM mx-3 btn-lg"> <i class="bi bi-trash3 icon-set"></i> خالی کردن </button>
        <button class="btn btn-success my-font-IYM mx-3 btn-lg"> <i class="bi bi-plus-circle-dotted icon-set"></i> افزودن محصول</button>
        <h3 class="my-font-IYM text-end mx-3">محصولات</h3>
    </div>
    <br>
    <br>
    <br>
    @if (session('msg'))
        <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
    @endif
    <br>
    <br>
    <form action="{{route('admin.search.product' , ['model' => $model])}}" method="post">
      @csrf
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></span>
        <input type="text" class="form-control my-font-IYL " name="text_search" placeholder="پیدا کردن بر اسا نام">
      </div>
    </form>
    <br>
    <br>
    <br>
    <table class="table" style="direction: rtl!important">
      
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
                          <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i><a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important" href="{{route('admin.show.data' , ['model' => $model , 'id' => $item->id])}}"> مشاهده</a></button>
                          <button class="btn btn-info"> <i class="bi bi-pencil-square icon-set"></i>  <a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important"  href="{{route('admin.edit.data' , ['model' => $model , 'id' => $item->id])}}">ویرایش</a></button>
                          <button class="btn btn-danger"> <i class="bi bi-trash3 icon-set"></i> <a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important"  href="{{route('admin.delete.data' , ['model' => $model , 'id' => $item->id])}}">حذف</a></button>
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
                          <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i> <a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important"  href="{{route('admin.show.data' , ['model' => $model , 'id' => $item->id])}}">مشاهده</a></button>
                          <button class="btn btn-info"> <i class="bi bi-pencil-square icon-set"></i> <a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important"  href="{{route('admin.edit.data' , ['model' => $model , 'id' => $item->id])}}">ویرایش</a></button>
                          <button class="btn btn-danger"> <i class="bi bi-trash3 icon-set"></i> <a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important"  href="{{route('admin.delete.data' , ['model' => $model , 'id' => $item->id])}}">حذف</a></button>
                      </td>
                  </tr>
              @endforeach
          @endif
        </tbody>
      </table>
      <div class="d-flex justify-content-center align-content-center my-5">
        {{$data->links()}}
      </div>
    @endif


    @if ($model == '\App\Models\Menu')
    {{ $model }}
    <div class="d-flex justify-content-end border-bottom py-4">
        <button class="btn btn-danger my-font-IYM mx-3 btn-lg"> <i class="bi bi-trash3 icon-set"></i> خالی کردن </button>
        <button class="btn btn-success my-font-IYM mx-3 btn-lg"> <i class="bi bi-plus-circle-dotted icon-set"></i> افزودن منو</button>
        <h3 class="my-font-IYM text-end mx-3">منو اصلی</h3>
    </div>
    <br>
    <br>
    <br>
    @if (session('msg'))
        <div class="alert alert-success my-font-IYL my-f-13" dir="rtl">{{session('msg')}}</div>
    @endif
    <br>
    <br>
    <form action="{{route('admin.search.product' , ['model' => $model])}}" method="post">
      @csrf
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></span>
        <input type="text" class="form-control my-font-IYL " name="text_search" placeholder="پیدا کردن بر اسا نام">
      </div>
    </form>
    <br>
    <br>
    <br>
    <table class="table" style="direction: rtl!important">
      
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
                        <img src="{{ url('image/front/'.$item->image) }}" alt="">
                      </td>
                      <td><i class="{{ $item->icon }}"></i></td>
                      <td>
                        <p style="color:green" v-if="{{ $item->status == 1 }}">فعال</p>
                        <p style="color:red" v-if="{{ $item->status == 0 }}">غیر فعال</p>
                      </td>
                      <td>
                          <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i><a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important" href="{{route('admin.show.data' , ['model' => $model , 'id' => $item->id])}}"> مشاهده</a></button>
                          <button class="btn btn-info"> <i class="bi bi-pencil-square icon-set"></i>  <a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important"  href="{{route('admin.edit.data' , ['model' => $model , 'id' => $item->id])}}">ویرایش</a></button>
                          <button class="btn btn-danger"> <i class="bi bi-trash3 icon-set"></i> <a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important"  href="{{route('admin.delete.data' , ['model' => $model , 'id' => $item->id])}}">حذف</a></button>
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
                    <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i><a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important" href="{{route('admin.show.data' , ['model' => $model , 'id' => $item->id])}}"> مشاهده</a></button>
                    <button class="btn btn-info"> <i class="bi bi-pencil-square icon-set"></i>  <a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important"  href="{{route('admin.edit.data' , ['model' => $model , 'id' => $item->id])}}">ویرایش</a></button>
                    <button class="btn btn-danger"> <i class="bi bi-trash3 icon-set"></i> <a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important"  href="{{route('admin.delete.data' , ['model' => $model , 'id' => $item->id])}}">حذف</a></button>
                </td>
            </tr>
              @endforeach
          @endif
        </tbody>
      </table>
      <div class="d-flex justify-content-center align-content-center my-5">
        {{$data->links()}}
      </div>
    @endif
@endsection

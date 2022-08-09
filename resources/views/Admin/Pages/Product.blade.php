@extends('Admin/Home')

@section('page')
    <div class="d-flex justify-content-end border-bottom py-4">
        <button class="btn btn-danger my-font-IYM mx-3 btn-lg"> <i class="bi bi-trash3 icon-set"></i> خالی کردن </button>
        <button class="btn btn-success my-font-IYM mx-3 btn-lg"> <i class="bi bi-plus-circle-dotted icon-set"></i> افزودن محصول</button>
        <h3 class="my-font-IYM text-end mx-3">محصولات</h3>
    </div>
    <br>
    <br>
    <br>
    <form action="{{route('admin.search.product' , ['model' => \App\Models\Product::class])}}" method="post">
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
                      <td>@mdo</td>
                      <td>
                          <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i> مشاهده</button>
                          <button class="btn btn-info"> <i class="bi bi-pencil-square icon-set"></i> ویرایش</button>
                          <button class="btn btn-danger"> <i class="bi bi-trash3 icon-set"></i> حذف</button>
                      </td>
                  </tr>
              @endforeach
          @else
              @foreach ($data as $item)
                  <tr class="my-f-13 my-color-b-600 my-font-IYL">
                      <td>{{$item->name}}</td>
                      <td>{{Str::limit($item->description, 80, '...')}}</td>
                      <td>@mdo</td>
                      <td>
                          <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i> مشاهده</button>
                          <button class="btn btn-info"> <i class="bi bi-pencil-square icon-set"></i> ویرایش</button>
                          <button class="btn btn-danger"> <i class="bi bi-trash3 icon-set"></i> حذف</button>
                      </td>
                  </tr>
              @endforeach
          @endif
        </tbody>
      </table>
      <div class="d-flex justify-content-center align-content-center my-5">
        {{$data->links()}}
      </div>
@endsection

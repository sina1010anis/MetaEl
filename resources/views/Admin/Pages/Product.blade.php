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
    <table class="table" style="direction: rtl!important">
        <thead class="table-light">
          <tr>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">ردیف</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">نام</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">توضیحات</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">برسی</th>
            <th class="my-f-15 my-font-IYM my-color-b-800" scope="col">فعالیت ها</th>
          </tr>
        </thead>
        <tbody>
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <th >1</th>
            <td>محصول یک</td>
            <td>محصول یک محصول یک محصول یک محصول یک محصول یک محصول یک</td>
            <td>@mdo</td>
            <td>
                <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i> مشاهده</button>
                <button class="btn btn-info"> <i class="bi bi-pencil-square icon-set"></i> ویرایش</button>
                <button class="btn btn-danger"> <i class="bi bi-trash3 icon-set"></i> حذف</button>
            </td>
          </tr>
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <th >2</th>
            <td>محصول دو</td>
            <td>محصول دو محصول دو محصول دو محصول دو محصول دو محصول دو</td>
            <td>@fat</td>
          </tr>
          <tr class="my-f-13 my-color-b-600 my-font-IYL">
            <th>3</th>
            <td>محصول سه</td>
            <td>محصول سه محصول سه محصول سه محصول سه محصول سه محصول سه</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
@endsection
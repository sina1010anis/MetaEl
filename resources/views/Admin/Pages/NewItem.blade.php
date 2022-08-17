@extends('Admin/Home')

@section('page')
{{ $model }}
    @if ($model == '\App\Models\Product')
        <x-page-new name="محصول" :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => '\image\product'])">
            <x-slot:form>
                <div class="my-5">
                    <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">نام محصول</label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="edit_name" placeholder="نام محصول">
                </div>
                <div class="mb-5">
                    <label for="edit_description" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">توضیحات تکمیلی</label>
                    <textarea name="description" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" style="height: 200px!important;max-height: 250px!important;width: 100%;max-width: 100%;min-width: 100%;min-height: 100px" id="edit_description" placeholder="توضیحات تکمیلی"></textarea>
                </div>
                <div class="mb-5">
                    <label for="edit_price" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> قیمت</label>
                    <input type="text" name="price" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="edit_price" placeholder="قیمت ">
                </div>
                <div class=" mb-5">
                    <label for="status" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">  وضعیت</label>
                    <select name="status" class="form-select form-select-lg" id="status" aria-label="Default select example">
                        <option checked value="0">فعال</option>
                        <option value="1">غیر فعال</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">اپلود عکس  پیشفرض</label>
                    <input class="form-control" name="image" type="file" id="image">
                  </div>
                <div class="mb-5">
                    <label for="edit_description_a" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">توضیحات اصلی</label>
                    <textarea name="description_a" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" style="height: 200px!important;max-height: 250px!important;width: 100%;max-width: 100%;min-width: 100%;min-height: 100px" id="edit_description_a" placeholder="توضیحات اصلی"></textarea>
                </div>
                <div>
                    <label for="menu_a" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> منو اصلی</label>
                    <select v-model="id_menu" class="form-select form-select-lg" id="menu_a" aria-label="Default select example">
                        <option :value="null" v-if="id_menu == null">یک مقدار انتخاب کنید</option>
                        @foreach ($menu_all as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div v-if="id_menu != null">
                    <label for="menu_a" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> زیر منو</label>
                    <select v-model="id_sub_menu" name="sub_menu_id" class="form-select form-select-lg" id="menu_a" aria-label="Default select example">
                        <option :value="null" v-if="id_sub_menu == null">یک مقدار انتخاب کنید</option>
                        @foreach ($sub_menu_all as $item)
                            <option v-if="{{ $item->b_menu_id }} == id_menu" value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </x-slot:form>
        </x-page-new>
    @endif

    @if ($model == '\App\Models\Address')
        <x-page-new name="ادرس" :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => null])">
            <x-slot:form>
                <div class="my-5">
                    <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">وضعیت</label>
                    <select name="status" class="form-select form-select-lg" id="edit_name" aria-label="Default select example">
                        <option checked value="0">غیر فعال</option>
                        <option  value="1">فعال</option>
                    </select>
                </div>
                <div class="my-5">
                    <label for="edit_city" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">استان</label>
                    <select name="city_id" v-model="id_all" class="form-select form-select-lg" id="edit_city" aria-label="Default select example">
                        <option checked :value="null">یک مقدار انتخاب کنید</option>
                        @foreach ($city_all as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>    
                        @endforeach
                    </select>
                </div>
                <div class="my-5" v-if="id_all != null">
                    <label for="edit_state" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">شهر</label>
                    <select name="state_id" class="form-select form-select-lg" id="edit_state" aria-label="Default select example">
                        <option checked :value="null">یک مقدار انتخاب کنید</option>
                        @foreach ($state_all as $item)
                            <option v-if="id_all != null && {{ $item->city_id }} == id_all" value="{{ $item->id }}">{{ $item->name }}</option>    
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <label for="location" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> ادرس</label>
                    <textarea name="location" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" style="height: 200px!important;max-height: 250px!important;width: 100%;max-width: 100%;min-width: 100%;min-height: 100px" id="location" placeholder=" location"></textarea>
                </div>
            </x-slot:form>
        </x-page-new>
    @endif

    @if ($model == '\App\Models\Banner')
    <x-page-new name="بنر" :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => '\image\banner'])">
        <x-slot:form>
            <div class="my-5">
                <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">وضعیت</label>
                <select name="status" class="form-select form-select-lg" id="edit_name" aria-label="Default select example">
                    <option checked value="1">فعال</option>
                    <option value="0">غیر فعال</option>
                </select>
            </div>
            <div class="my-5">
                <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">نام بنر</label>
                <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="edit_name" placeholder="نام بنر">
            </div>
            <div class="my-5">
                <label for="url" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">ادرس بنر</label>
                <input name="url" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="url" placeholder="ادرس بنر" >
            </div>
            <div class="my-5">
                <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">وضعیت</label>
                <select name="location" class="form-select form-select-lg" id="edit_name" aria-label="Default select example">
                    <option value="start">اول سایت</option>
                    <option value="center">میانه سایت</option>
                    <option value="end">انتها سایت</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">اپلود عکس  </label>
                <input class="form-control" name="image" type="file" id="image">
              </div>
        </x-slot:form>
    </x-page-new>
    @endif
@endsection
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
        <x-page-new name="ادرس" :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => 'null'])">
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

    @if ($model == '\App\Models\Brand')
        <x-page-new name="برند" :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => '\image\logo'])">
            <x-slot:form>
                <div class="my-5">
                    <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">نام برند</label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="edit_name" placeholder="نام برند">
                </div>
                <div class="my-5">
                    <label for="url" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">ادرس برند</label>
                    <input name="url" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="url" placeholder="ادرس برند" >
                </div>
                <div class="mb-3">
                    <label for="image" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">اپلود عکس  </label>
                    <input class="form-control" name="image" type="file" id="image">
                </div>
            </x-slot:form>
        </x-page-new>
    @endif

    @if ($model == '\App\Models\Menu')
        <x-page-new name="برند" :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => '\image\front'])">
            <x-slot:form>
                <div class="my-5">
                    <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">نام منو</label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="edit_name" placeholder="نام برند">
                </div>
                <div class="my-5">
                    <label for="icon" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">ایکون منو</label>
                    <input name="icon" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="icon" placeholder="ایکون منو" >
                </div>
                <div class="mb-3">
                    <label for="image" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">اپلود عکس  </label>
                    <input class="form-control" name="image" type="file" id="image">
                </div>
                <div class=" mb-5">
                    <label for="status" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">  وضعیت</label>
                    <select name="status" class="form-select form-select-lg" id="status" aria-label="Default select example">
                        <option checked value="1">فعال</option>
                        <option value="0">غیر فعال</option>
                    </select>
                </div>
            </x-slot:form>
        </x-page-new>
    @endif

    @if ($model == '\App\Models\Cart')
        <x-page-new name="سبد خرید" :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => 'null'])">
            <x-slot:form>
                <div class="my-5">
                    <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">وضعیت</label>
                    <select name="status" class="form-select form-select-lg" id="edit_name" aria-label="Default select example">
                        <option checked value="0">غیر فعال</option>
                        <option  value="1">فعال</option>
                    </select>
                </div>
                <div class="my-5">
                    <label for="total_price" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">جمع قیمت </label>
                    <input name="total_price" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="total_price" placeholder="جمع قیمت ">
                </div>
                <div class="my-5">
                    <label for="number" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">تعداد  </label>
                    <input name="number" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="number" placeholder=" تعداد ">
                </div>
                <div class="my-5">
                    <label for="product_id" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">محصول</label>
                    <select name="size_product_id" class="form-select form-select-lg" id="product_id" aria-label="Default select example">
                        <option checked :value="null">یک مقدار انتخاب کنید</option>
                        @foreach ($product_size_all as $item)
                            <option value="{{ $item->id }}">{{ $item->product->name .'->'. $item->name }}</option>    
                        @endforeach
                    </select>
                </div>
                <div class="my-5">
                    <label for="user_id" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">گاربر</label>
                    <select name="user_id" class="form-select form-select-lg" id="user_id" aria-label="Default select example">
                        <option checked :value="null">یک مقدار انتخاب کنید</option>
                        @foreach ($user_all as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>    
                        @endforeach
                    </select>
                </div>
            </x-slot:form>
        </x-page-new>
    @endif

    @if ($model == '\App\Models\City')
        <x-page-new name=" افزودن استان " :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => 'null'])">
            <x-slot:form>
                <div class="my-5">
                    <label for="name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> نام استان </label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="name" placeholder=" نام استان ">
                </div>
                <div class="my-5">
                    <label for="send_price" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">هزینه ارسال  </label>
                    <input name="send_price" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="send_price" placeholder=" هزینه ارسال ">
                </div>
            </x-slot:form>
        </x-page-new>
    @endif

    @if ($model == '\App\Models\CommentProduct')
        <x-page-new name=" افزودن استان " :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => 'null'])">
            <x-slot:form>
                <div class="my-5">
                    <label for="subject" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> موضوع</label>
                    <input name="subject" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="subject" placeholder=" موضوع">
                </div>
                <div class="mb-5">
                    <label for="text" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> متن</label>
                    <textarea name="text" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" style="height: 200px!important;max-height: 250px!important;width: 100%;max-width: 100%;min-width: 100%;min-height: 100px" id="text" placeholder=" text"></textarea>
                </div>
                <div class="my-5">
                    <label for="vote" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">نظر کلی</label>
                    <select name="vote" class="form-select form-select-lg" id="vote" aria-label="Default select example">
                        <option checked value="1"> راضی</option>
                        <option  value="2">بی نظر</option>
                        <option  value="3"> ناراضی</option>
                    </select>
                </div>
                <div class="my-5">
                    <label for="product_id" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">محصول</label>
                    <select name="product_id" class="form-select form-select-lg" id="product_id" aria-label="Default select example">
                        <option checked :value="null">یک مقدار انتخاب کنید</option>
                        @foreach ($product_all as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>    
                        @endforeach
                    </select>
                </div>
                <div class="my-5">
                    <label for="user_id" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">کاربر</label>
                    <select name="user_id" class="form-select form-select-lg" id="user_id" aria-label="Default select example">
                        <option checked :value="null">یک مقدار انتخاب کنید</option>
                        @foreach ($user_all as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>    
                        @endforeach
                    </select>
                </div>
            </x-slot:form>
        </x-page-new>
    @endif

    @if ($model == '\App\Models\DiscountCode')
        <x-page-new name=" افزودن استان " :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => 'null'])">
            <x-slot:form>
                <div class="my-5">
                    <label for="description" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> توضیحات</label>
                    <input name="description" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="description" placeholder=" توضیحات" value="">
                </div>
                <div class="my-5">
                    <label for="value" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> مقدار</label>
                    <input name="value" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="value" placeholder=" مفدار" value="">
                </div>      
                <div class="my-5">
                    <label for="code" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> کد</label>
                    <input name="code" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="code" placeholder=" کد" value="">
                </div>      
                <div class="my-5">
                    <label for="score" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> امتیاز</label>
                    <input name="score" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="score" placeholder=" امتیاز" value="">
                </div>                                        
                <div class=" mb-5">
                    <label for="status" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">  وضعیت</label>
                    <select name="status" class="form-select form-select-lg" id="status" aria-label="Default select example">
                        <option checked value="1">فعال</option>
                        <option value="0">غیر فعال</option>
                    </select>
                </div>
                <div class="my-5">
                    <label for="user_id" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">کاربر</label>
                    <select name="user_id" class="form-select form-select-lg" id="user_id" aria-label="Default select example">
                        <option checked value="0">فعال برای همه</option>
                        @foreach ($user_all as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>    
                        @endforeach
                    </select>
                </div>
            </x-slot:form>
        </x-page-new>
    @endif    

    @if ($model == '\App\Models\factor' or $model == '\App\Models\Item')
        {{ $model }}
        <x-page-new name=" افزودن استان " :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => 'null'])">
            <x-slot:form>
                <p class="my-font-IYL my-f-15 " style="color:red;"> این بخش قابل افزودن نمی باشد</p>
            </x-slot:form>
        </x-page-edit>
    @endif

    @if ($model == '\App\Models\filter')
        <x-page-new name=" افزودن فیلتر " :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => 'null'])">
            <x-slot:form>
                <div class="my-5">
                    <label for="name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> نام</label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="name" placeholder=" نام" value="">
                </div>
                <div class="my-5">
                    <label for="title_filter_id" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">منو اصلی</label>
                    <select name="title_filter_id" class="form-select form-select-lg" id="title_filter_id" aria-label="Default select example">
                        <option checked value="0">فعال برای همه</option>
                        @foreach ($title_filter_all as $data)
                            <option value="{{ $data->id }}">{{ $data->subject }}</option>    
                        @endforeach
                    </select>
                </div>
            </x-slot:form>
        </x-page-edit>
    @endif

    @if ($model == '\App\Models\title_filter')
        <x-page-new name=" افزودن فیلتر " :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' => 'null'])">
            <x-slot:form>
                <div class="my-5">
                    <label for="subject" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> موضوع</label>
                    <input name="subject" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="subject" placeholder=" موضوع" value="">
                </div>
                <div class="my-5">
                    <label for="b_menu_id" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">منو</label>
                    <select name="b_menu_id" class="form-select form-select-lg" id="b_menu_id" aria-label="Default select example">
                        {{-- <option checked value="0">فعال برای همه</option> --}}
                        @foreach ($menu_all as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>    
                        @endforeach
                    </select>
                </div>
            </x-slot:form>
        </x-page-edit>
    @endif

    @if ($model == '\App\Models\Slider')
        <x-page-new name=" افزودن اسلایدر " :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' =>  '\image\front'])">
            <x-slot:form>
                <div class="my-5">
                    <label for="name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> نام</label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="name" placeholder=" نام">
                </div>
                <div class="my-5">
                    <label for="subject" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> موضوع</label>
                    <input name="subject" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="subject" placeholder=" موضوع">
                </div>
                <div class="mb-5">
                    <label for="edit_description" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">توضیحات تکمیلی</label>
                    <textarea name="description" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" style="height: 200px!important;max-height: 250px!important;width: 100%;max-width: 100%;min-width: 100%;min-height: 100px" id="edit_description" placeholder="توضیحات تکمیلی"></textarea>
                </div>
                <div class="my-5">
                    <label for="image" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> عکس</label>
                    <input name="image" type="file" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="image" placeholder=" عکس">
                </div>
                <div class="my-5">
                    <label for="url" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> ادرس</label>
                    <input name="url" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="url" placeholder=" ادرس">
                </div>
                <div class=" mb-5">
                    <label for="status" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">  وضعیت</label>
                    <select name="status" class="form-select form-select-lg" id="status" aria-label="Default select example">
                            <option checked value="1">فعال</option>
                            <option value="0">غیر فعال</option>
                    </select>
                </div>
            </x-slot:form>
        </x-page-edit>
    @endif

    @if ($model == '\App\Models\User')
        <x-page-new name=" افزودن کاربر " :model="$model" :url="route('admin.new.data.post' , ['model' => $model , 'type' =>  'null'])">
            <x-slot:form>
                <div class="my-5">
                    <label for="name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> نام</label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="name" placeholder=" نام">
                </div>
                <div class="my-5">
                    <label for="mobile" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> شماره موبایل</label>
                    <input name="mobile" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="mobile" placeholder=" شماره موبایل">
                </div>
                <div class="my-5">
                    <label for="email" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> ایمیل</label>
                    <input name="email" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="email" placeholder=" ایمیل">
                </div>
                <div class="my-5">
                    <label for="password" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> رمز عبور</label>
                    <input name="password" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="password" placeholder=" رمز عبور">
                </div>
            </x-slot:form>
        </x-page-edit>
    @endif
@endsection
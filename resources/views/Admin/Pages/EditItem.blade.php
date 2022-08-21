@extends('Admin/Home')

@section('page')
    @if ($model == '\App\Models\Product')
        {{ $model }}
        <x-page-edit :name="$data->name" title="ویرایش محصولات" :url="route('admin.edit.data.post' , ['model' => $model , 'id' => $data->id ])">
            <x-slot:form>
                <div class="my-5">
                    <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">نام محصول</label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="edit_name" placeholder="نام محصول" value="{{ $data->name }}">
                </div>
                <div class="mb-5">
                    <label for="edit_description" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">توضیحات تکمیلی</label>
                    <textarea name="description" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" style="height: 200px!important;max-height: 250px!important;width: 100%;max-width: 100%;min-width: 100%;min-height: 100px" id="edit_description" placeholder="توضیحات تکمیلی">{{ $data->description }}</textarea>
                </div>
                <div class="mb-5">
                    <label for="edit_price" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> قیمت</label>
                    <input type="text" name="price" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="edit_price" placeholder="قیمت " value="{{ $data->price }}">
                </div>
                <div class=" mb-5">
                    <label for="status" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">  وضعیت</label>
                    <select name="status" class="form-select form-select-lg" id="status" aria-label="Default select example">
                        @if ($data->status == 0)
                            <option checked value="0">فعال</option>
                            <option value="1">غیر فعال</option>
                            @else
                            <option checked value="1">غیر فعال</option>
                            <option  value="0">فعال</option>
                        @endif
                    </select>
                </div>
                <div class="mb-5">
                    <label for="edit_description_a" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">توضیحات اصلی</label>
                    <textarea name="description_a" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" style="height: 200px!important;max-height: 250px!important;width: 100%;max-width: 100%;min-width: 100%;min-height: 100px" id="edit_description_a" placeholder="توضیحات اصلی">{{ $data->description_a }}</textarea>
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
        </x-page-edit>
    @endif


    @if ($model == '\App\Models\Address')
        {{ $model }}
        <x-page-edit :name="$data->name" title="ویرایش ادرس" :url="route('admin.edit.data.post' , ['model' => $model , 'id' => $data->id ])">
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
                    <textarea name="location" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" style="height: 200px!important;max-height: 250px!important;width: 100%;max-width: 100%;min-width: 100%;min-height: 100px" id="location" placeholder=" location">{{ $data->location }}</textarea>
                </div>
            </x-slot:form>
        </x-page-edit>
    @endif


    @if ($model == '\App\Models\Banner')
        {{ $model }}
        <x-page-edit :name="$data->name" title="ویرایش بنر" :url="route('admin.edit.data.post' , ['model' => $model , 'id' => $data->id ])">
            <x-slot:form>
                <div class="my-5">
                    <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">وضعیت</label>
                    <select name="status" class="form-select form-select-lg" id="edit_name" aria-label="Default select example">
                        @if ($data->status == 1)
                        <option checked value="1">فعال</option>
                        <option value="0">غیر فعال</option>
                        @else
                        <option checked value="0">غیر فعال</option>
                        <option  value="1">فعال</option>
                    @endif
                    </select>
                </div>
                <div class="my-5">
                    <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">نام بنر</label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="edit_name" placeholder="نام محصول" value="{{ $data->name }}">
                </div>
                <div class="my-5">
                    <label for="url" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">ادرس بنر</label>
                    <input name="url" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="url" placeholder="نام محصول" value="{{ $data->url }}">
                </div>
                <div class="my-5">
                    <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">وضعیت</label>
                    <select name="location" class="form-select form-select-lg" id="edit_name" aria-label="Default select example">
                        <option @if($data->location == 'start') checked @endif value="start">اول سایت</option>
                        <option @if($data->location == 'center') checked @endif value="center">میانه سایت</option>
                        <option @if($data->location == 'end') checked @endif value="end">انتها سایت</option>
                    </select>
                </div>
            </x-slot:form>
        </x-page-edit>
    @endif

    @if ($model == '\App\Models\Brand')
        {{ $model }}
        <x-page-edit :name="$data->name" title=" ویرایش برند" :url="route('admin.edit.data.post' , ['model' => $model , 'id' => $data->id ])">
            <x-slot:form>
                <div class="my-5">
                    <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">نام برند</label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="edit_name" placeholder="نام محصول" value="{{ $data->name }}">
                </div>
                <div class="my-5">
                    <label for="url" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">ادرس برند</label>
                    <input name="url" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="url" placeholder="نام محصول" value="{{ $data->url }}">
                </div>
            </x-slot:form>
        </x-page-edit>
    @endif

    @if ($model == '\App\Models\Menu')
        {{ $model }}
        <x-page-edit :name="$data->name" title=" ویرایش منو اصلی" :url="route('admin.edit.data.post' , ['model' => $model , 'id' => $data->id ])">
            <x-slot:form>
                <div class="my-5">
                    <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">نام منو</label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="edit_name" placeholder="نام محصول" value="{{ $data->name }}">
                </div>
                <div class="my-5">
                    <label for="icon" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">ایکون منو</label>
                    <input name="icon" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="icon" placeholder="ایکون منو" value="{{ $data->icon }}">
                </div>
                <div class=" mb-5">
                    <label for="status" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">  وضعیت</label>
                    <select name="status" class="form-select form-select-lg" id="status" aria-label="Default select example">
                        @if ($data->status == 1)
                            <option checked value="1">فعال</option>
                            <option value="0">غیر فعال</option>
                            @else
                            <option checked value="0">غیر فعال</option>
                            <option  value="1">فعال</option>
                        @endif
                    </select>
                </div>
            </x-slot:form>
        </x-page-edit>
    @endif

    @if ($model == '\App\Models\Cart')
        {{ $model }}
        <x-page-edit :name="$data->name" title=" ویرایش سبد خرید" :url="route('admin.edit.data.post' , ['model' => $model , 'id' => $data->id ])">
            <x-slot:form>
                <p class="my-font-IYL my-f-15 " style="color:red;"> این بخش قابل ویرایش نمی باشد</p>
            </x-slot:form>
        </x-page-edit>
    @endif

    @if ($model == '\App\Models\City')
        {{ $model }}
        <x-page-edit :name="$data->name" title="   ویرایش شهر" :url="route('admin.edit.data.post' , ['model' => $model , 'id' => $data->id ])">
            <x-slot:form>
                <div class="my-5">
                    <label for="edit_name" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">نام استان</label>
                    <input name="name" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="edit_name" placeholder="نام استان" value="{{ $data->name }}">
                </div>
                <div class="my-5">
                    <label for="price" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">هزینه ارسال </label>
                    <input name="send_price" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="price" placeholder="هزینه ارسال " value="{{ $data->send_price }}">
                </div>  
            </x-slot:form>
        </x-page-edit>
    @endif

    @if ($model == '\App\Models\CommentProduct')
        {{ $model }}
        <x-page-edit :name="$data->subject" title="   ویرایش کامنت محصولات" :url="route('admin.edit.data.post' , ['model' => $model , 'id' => $data->id ])">
            <x-slot:form>
                <div class="my-5">
                    <label for="subject" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> موضوع</label>
                    <input name="subject" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="subject" placeholder=" موضوع" value="{{ $data->subject }}">
                </div>
                <div class="mb-5">
                    <label for="text" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> متن</label>
                    <textarea name="text" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" style="height: 200px!important;max-height: 250px!important;width: 100%;max-width: 100%;min-width: 100%;min-height: 100px" id="text" placeholder=" text">{{ $data->text }}</textarea>
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
        </x-page-edit>
    @endif


    @if ($model == '\App\Models\DiscountCode')
        {{ $model }}
        <x-page-edit :name="$data->subject" title="   ویرایش کدهای تخفیف" :url="route('admin.edit.data.post' , ['model' => $model , 'id' => $data->id ])">
            <x-slot:form>
                <div class="my-5">
                    <label for="description" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> توضیحات</label>
                    <input name="description" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="description" placeholder=" توضیحات" value="{{ $data->description }}">
                </div>
                <div class="my-5">
                    <label for="value" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> مقدار</label>
                    <input name="value" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="value" placeholder=" مفدار" value="{{ $data->value }}">
                </div>      
                <div class="my-5">
                    <label for="code" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> کد</label>
                    <input name="code" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="code" placeholder=" کد" value="{{ $data->code }}">
                </div>      
                <div class="my-5">
                    <label for="score" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14"> امتیاز</label>
                    <input name="score" type="text" class="form-control my-font-IYL my-color-b-700 my-f-14" dir="rtl" id="score" placeholder=" امتیاز" value="{{ $data->score }}">
                </div>                                        
                <div class=" mb-5">
                    <label for="status" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">  وضعیت</label>
                    <select name="status" class="form-select form-select-lg" id="status" aria-label="Default select example">
                        @if ($data->status == 1)
                            <option checked value="1">فعال</option>
                            <option value="0">غیر فعال</option>
                            @else
                            <option checked value="0">غیر فعال</option>
                            <option  value="1">فعال</option>
                        @endif
                    </select>
                </div>
                <div class="my-5">
                    <label for="user_id" dir="rtl" style="width: 100%" class="text-end  form-label my-font-IYL my-color-b-700 my-f-14">کاربر</label>
                    <select name="user_id" class="form-select form-select-lg" id="user_id" aria-label="Default select example">
                        {{-- <option checked value="0">فعال برای همه</option> --}}
                        @foreach ($user_all as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>    
                        @endforeach
                    </select>
                </div>
            </x-slot:form>
        </x-page-edit>
    @endif

    @if ($model == '\App\Models\factor')
        {{ $model }}
        <x-page-edit :name="$data->name" title=" ویرایش فاکتور" :url="route('admin.edit.data.post' , ['model' => $model , 'id' => $data->id ])">
            <x-slot:form>
                <p class="my-font-IYL my-f-15 " style="color:red;"> این بخش قابل ویرایش نمی باشد</p>
            </x-slot:form>
        </x-page-edit>
    @endif
@endsection

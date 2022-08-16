<div>
    <div class="d-flex justify-content-end border-bottom py-4">
        <button class="btn btn-danger my-font-IYM mx-3 btn-lg"> <i class="bi bi-trash3 icon-set"></i> خالی کردن </button>
        <a class="btn btn-success my-font-IYM mx-3 btn-lg" href="{{ route('admin.new.data' , ['model' => $model]) }}" > <i class="bi bi-plus-circle-dotted icon-set"></i> افزودن جدید</a>
        <h3 class="my-font-IYM text-end mx-3">{{ $name }}</h3>
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
        {{ $table }}
    </table>
</div>
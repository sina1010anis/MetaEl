<div>
    <div class="text-end">
        <h3 class="my-font-IYM my-color-800 p-3">{{ $title }}</h3>
        <h4 class="my-font-IYM text-info p-3">{{ $name }} : نام محصول </h4>
    </div>
    <div class="view-form">
        <form action="{{ $url }}" method="post" enctype="multipart/form-data">
            @csrf
                {{ $form }}
                <button type="submit" class="btn btn-primary btn-lg p-4 my-font-IYL my-f-16 mt-5 w-100">تایید</button>
        </form>
    </div>
</div>
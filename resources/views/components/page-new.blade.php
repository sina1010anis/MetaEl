<div>
    <h3 class="my-font-IYM text-end mx-3">{{ $name }} : اضافه کردن  </h3>

    <div class="view-form">
        <form action="{{ $url }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ $form }}
            <button type="submit" class="btn btn-primary btn-lg p-4 my-font-IYL my-f-16 mt-5 w-100 my-4">تایید</button>
    </form>
</div>
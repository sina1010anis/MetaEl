<div>
    <button class="btn btn-success"> <i class="bi bi-eye icon-set"></i><a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important" href="{{route('admin.show.data' , ['model' => $model , 'id' => $id])}}"> مشاهده</a></button>
    <button class="btn btn-info"> <i class="bi bi-pencil-square icon-set"></i>  <a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important"  href="{{route('admin.edit.data' , ['model' => $model , 'id' => $id])}}">ویرایش</a></button>
    <button class="btn btn-danger"> <i class="bi bi-trash3 icon-set"></i> <a style="text-decoration: none!important ; color:rgb(236, 236, 236)!important"  href="{{route('admin.delete.data' , ['model' => $model , 'id' => $id])}}">حذف</a></button>
</div>
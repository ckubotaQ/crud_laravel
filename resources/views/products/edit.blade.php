section para editar productos
<form action="{{url('/productos/'.$product->id)}}" method="post" enctype="multipart/form-data" >
{{csrf_field()}}
{{method_field('PATCH')}}
<label for="Name">{{"Nombre"}}</label>
<input type="text" name="NameProduct" id="NameProduct" value="{{$product->NameProduct}}">


<label for="Name">{{"Foto"}}</label>
<br/>
<img src="{{asset('storage').'/'.$product->PhotoGraphy}}" alt="" width="200" height="200">
<br/>
<input type="file" name="PhotoGraphy" id="PhotoGraphy" value="">
<br/>
<input type="submit" value="Editar">

</form>
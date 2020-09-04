Section para crear productos
<form action="{{url('/productos')}}" method="post" enctype="multipart/form-data" >
{{csrf_field()}}
<label for="Name">{{"Nombre"}}</label>
<input type="text" name="NameProduct" id="NameProduct" value="">
<label for="Name">{{"Foto"}}</label>
<input type="file" name="PhotoGraphy" id="PhotoGraphy" value="">

<input type="submit" value="Agregar">
<a href="{{url('productos')}}">Regresar</a>



</form>
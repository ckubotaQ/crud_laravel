Section para crear productos
<form action="{{url('/productos')}}" method="post" enctype="multipart/form-data" >
{{csrf_field()}}
<label for="Name">{{"Nombre"}}</label>
<input type="text" name="Name" id="Name" value="">
<input type="submit" value="Add">




</form>
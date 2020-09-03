inicio (Despliegue de los datos))
<table class="table table-dark">
<thead class="thead-table-dark">
<tr class="">
    <th>#</th>
    <th>Foto</th>
    <th>Nombre</th>
    <th>Acciones</th>
</tr>



</thead>


<tbody>
@foreach($products as $Product)
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$Product->PhotoGraphy}}</td>
    <td>{{$Product->NameProduct}}</td>
    <td>  <a href="{{url('/productos/'.$Product->id.'/edit')}}">
Editar</a> | 

   <form method="post" action="{{url('/productos/'.$Product->id)}}">
      {{csrf_field()}} 
      {{method_field('DELETE')}}
      <button type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
   </form>

    </td>
</tr>
@endforeach
</tbody>
</table>
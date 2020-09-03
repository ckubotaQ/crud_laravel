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
    <td>Editar | Borrar</td>
</tr>
@endforeach
</tbody>
</table>
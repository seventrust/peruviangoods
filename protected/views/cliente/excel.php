<table>
    <tr>
        <th>Id</th>
        <th>CodCliente</th>
        <th>Descripcion</th>
    </tr>
<?php foreach ($model as $data):?>
    <tr>
        <td><?php echo $data->Id;?></td>
        <td><?php echo $data->CodCliente;?></td>
        <td><?php echo $data->Descripcion;?></td>
    </tr>
<?php endforeach;?>

</table>

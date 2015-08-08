<div class="form">
        
<?php echo CHtml::beginForm(); ?>
<?php 
/*reformat array of models for errorSummary*/
$array_of_models=array();
foreach($models as $q=>$mgroup) {
        $array_of_models[]=$models[$q]['model'];
        $array_of_models[]=$models[$q]['model_detalle'];       
}
?>

<?php echo CHtml::errorSummary($array_of_models); ?>

<table>
<tr><th>Nro</th><th>CodProducto</th><th>Cantidad</th><th>Precio</th><th>SubTotal</th></tr>
        <?php foreach($models as $i=>$mgroup):?>
        <tr>
        <td><?php echo CHtml::activeTextField($mgroup['model'],"[$i]NumCompra"); ?></td>        
        <td><?php echo CHtml::activeTextField($mgroup['model_detalle'],"[$i]CodProducto"); ?></td>
        <td><?php echo CHtml::activeTextField($mgroup['model_detalle'],"[$i]Cantidad"); ?></td>
        <td><?php echo CHtml::activeTextField($mgroup['model_detalle'],"[$i]Precio"); ?></td>
        <td><?php echo CHtml::activeTextField($mgroup['model_detalle'],"[$i]SubTotal"); ?></td>
    <td></td>   
        </tr>
        <?php endforeach; ?>
</table>
 
<?php echo CHtml::submitButton('Save'); ?>
<?php echo CHtml::endForm(); ?>

</div>><!-- form -->

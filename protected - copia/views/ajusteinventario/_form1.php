<div class="form">
<?php echo CHtml::beginForm(); ?>
<table>
<tr><th>Name</th><th>Price</th><th>Count</th><th>Description</th></tr>
<?php foreach($model as $i=>$model): ?>
<tr>
<td><?php echo CHtml::activeTextField($model,"[$i]Id"); ?></td>
<td><?php echo CHtml::activeTextField($model,"[$i]Fecha"); ?></td>
<td><?php echo CHtml::activeTextField($model,"[$i]CodBodega"); ?></td>
<td><?php echo CHtml::activeTextArea($model,"[$i]descripcion"); ?></td>
</tr>
<?php endforeach; ?>
</table>
 
<?php echo CHtml::submitButton('Save'); ?>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
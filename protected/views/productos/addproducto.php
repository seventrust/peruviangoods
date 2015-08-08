<h1>Crear Nuevo Producto</h1>
<p>
<?php echo CHtml::link("Volver Atrás",Yii::app()->request->baseUrl."/productos",array("title"=>"Volver Atrás","id"=>"enlace"));?>
</p>
<?php echo CHtml::beginForm('','post',array("name"=>"form","id"=>"form"));?>

<?php //echo CHtml::errorSummary($model); ?>

    <p>
        Indique el Código del Producto 
        <?php 
        echo CHtml::activeTextField($model,'CodProducto',array("id"=>"CodProducto","class"=>"campos"));
        echo CHtml::error($model,'CodProducto'); ?>
       <hr /> 
    </p>
     <p>

    <p>
        Indique la Descripción del Producto 
        <?php 
        echo CHtml::activeTextField($model,'Descripcion',array("id"=>"Descripcion","class"=>"campos"));
        echo CHtml::error($model,'Descripcion'); ?>
       <hr /> 
    </p>
    <p>
        Indique la Unidad de Medida del Producto 
        <?php 
        echo CHtml::activeTextField($model,'UniMedida',array("id"=>"UniMedida","class"=>"campos"));
        echo CHtml::error($model,'UniMedida'); ?>
       <hr /> 
    </p>
    
    
     <p>
        Indique la Cantidad  
        <?php 
        echo CHtml::activeTextField($model,'CanExistencia',array("id"=>"CanExistencia","class"=>"campos"));
        echo CHtml::error($model,'CanExistencia'); ?>
       <hr /> 
    </p>

    <p>
        Indique el Precio de Compra
        <?php 
        echo CHtml::activeTextField($model,'PreCompra',array("id"=>"PreCompra","class"=>"campos"));
        echo CHtml::error($model,'PreCompra'); ?>
       <hr /> 
    </p>
    
    <p>
        Indique el Precio de Venta
        <?php 
        echo CHtml::activeTextField($model,'PreVenta',array("id"=>"PreVenta","class"=>"campos"));
        echo CHtml::error($model,'PreVenta'); ?>
       <hr /> 
    </p>
    <p>
     <?php echo CHtml::submitButton('submit',array("class"=>"aer","value"=>"Enviar","title"=>"Enviar")); ?>
    </p>
 
    
<?php echo CHtml::endForm();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/application.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
        
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">
        


</head>

<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo $this->createAbsoluteUrl('//'); ?>"><?php echo CHtml::encode(Yii::app()->name); ?></a>
				<div id="menu-top">
                                  <div class="btn-toolbar">
                                        
                                        <?php
                                        $this->widget('bootstrap.widgets.TbNavbar', array(
                                            
                                            'items' => array(
                                                array(
                                                    'class' => 'bootstrap.widgets.TbMenu',
                                                    'submenuHtmlOptions' => array('class' => 'multi-level'),  
                                                    'items' => array(
                                                            array('label' => 'Maestros', 'url' => '#', 'itemOptions' =>   array('class' => 'dropdown-submenu'),
                                                                'items'=>array(
                                                                    array('label'=>'Productos', 'url'=>array('productos/create')),
                                                                    array('label'=>'Bodegas', 'url'=>array('bodega/create')),
                                                                    array('label'=>'Categoria de productos', 'url'=>array('categoria/create')),
                                                                    array('label'=>'Clientes', 'url'=>array('cliente/create')),
                                                                    array('label'=>'Proveedores', 'url'=>array('proveedor/create')),
                                                                    array('label'=>'Tipo Cliente', 'url'=>array('cliente/create')),
                                                                    array('label'=>'Usuarios', 'url'=>array('usuario/create')),
                                                                    array('label'=>'Medida', 'url'=>array('medida/create')),
                                                                    array('label'=>'Categoria Producto', 'url'=>array('categoria/create')),
                                                                )),
                                                            array('label' => 'Compras', 'url' => '#', 'itemOptions' =>   array('class' => 'dropdown-submenu'),
                                                                'items'=>array(
                                                                    array('label'=>'Crear', 'url'=>array('compra/create')),
                                                                    array('label'=>'Administrar', 'url'=>array('compra/admin')),
                                                                )),
                                                            array('label' => 'Ventas', 'url' => '#', 'itemOptions' =>   array('class' => 'dropdown-submenu'),
                                                                'items'=>array(
                                                                    array('label'=>'Crear', 'url'=>array('Venta/create')),
                                                                    array('label'=>'Administrar', 'url'=>array('Venta/admin')),
                                                                )),
                                                            array('label' => 'Kardex', 'url' => '#', 'itemOptions' =>   array('class' => 'dropdown-submenu'),
                                                                'items'=>array(
//                                                                    array('label'=>'Crear', 'url'=>array('kardex/create')),
                                                                    array('label'=>'Administrar', 'url'=>array('kardex/admin')),
                                                                )),
                                                            array('label' => 'Login', 'url' => '#', 'itemOptions' =>   array('class' => 'dropdown-submenu'),
                                                                'items'=>array(
//                                                                    array('label'=>'Crear', 'url'=>array('kardex/create')),
                                                                    array('label'=>'Iniciar', 'url'=>array('site/login')),
                                                                )),

                                                                   

                                                                ),
                                                            ),
                                                      
                                                
                                        
                                           
                                        ),
                                            ));
                                        ?>
                                    </div>
                                </div>
                               
				<?php // $this->widget('zii.widgets.CMenu',array(
//					'items'=>array(
//						array('label'=>Yii::app()->user->name, 'url'=>array('site/profile'), 'visible'=>!Yii::app()->user->isGuest),
//						array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn'))
//					),
//					'htmlOptions'=>array(
//						'class'=>'nav pull-right',
//					),
//				)); ?>
			</div>
		</div>
	</div>
	
<!--	<div class="container">
	<?php // if(isset($this->breadcrumbs)):?>
		<?php // $this->widget('BBreadcrumbs', array(
//			'links'=>$this->breadcrumbs,
//			'separator'=>' / ',
//		)); ?> breadcrumbs 
	<?php // endif?>
	</div>-->
	
	<?php echo $content; ?>
    

	
	<footer class="footer">
		<div class="container">
			<p>Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
			All Rights Reserved.<br/>
			<?php echo Yii::powered(); ?></p>
		</div>
	</footer>
	
</body>
</html>

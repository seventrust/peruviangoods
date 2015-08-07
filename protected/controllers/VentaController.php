<?php

class VentaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'autocomplete', 'admin', 'autocompletel', 'create1'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
//	public function actionCreate()
//	{
//            $a=new Venta;
//            $b=new Detalleventa;
//            $this->performAjaxValidation(array($a,$b));
//            if(isset($_POST['Venta'],$_POST['Detalleventa']))
//            {
//                $a->attributes=$_POST['Venta'];
//                $b->attributes=$_POST['Detalleventa'];
//                
//                if($a->save()){
//                    $b->NumVenta=$a->NumVenta;
//                    $b->save();
//                    $this->redirect(array('view','id'=>$a->NumVenta));
//                
//                    }
//                }
//            $this->render('create',array('a'=>$a,'b'=>$b));
//	}
        
        public function actionCreate() {
            Yii::import('ext.multimodelform.MultiModelForm');
            $model = new Venta();
            $member = new Detalleventa();
            $producto = new Producto();
            $cliente = new Cliente();
            $validatedMembers = array();  //ensure an empty array

            if(isset($_POST['Venta']))
            {
                $model->attributes=$_POST['Venta'];
                if( //validate detail before saving the master
                    MultiModelForm::validate($member,$validatedMembers,$deleteItems) &&
                    $model->save()
                   )
                   {    
                        
                        //the value for the foreign key 'groupid'
                        $masterValues = array ('NumVenta'=>$model->NumVenta);
                        if (MultiModelForm::save($member,$validatedMembers,$deleteMembers,$masterValues)){
                           
                           $numdocumento=$_POST['Venta']['NumVenta'];
                           $codigo = $_POST['Detalleventa']['CodProducto'];
                           $cantidad = $_POST['Detalleventa']['Cantidad'];
                           $saldoanterior=$_POST['Detalleventa']['Saldo'];
                           $precio=$_POST['Detalleventa']['Precio'];
                           $subtotal=$_POST['Detalleventa']['Subtotal'];
                           
                           for($i=0; $i<count($codigo); $i++)
                           {
                               $saldoactual[$i]=$saldoanterior[$i]-$cantidad[$i];
                               
                               
                                Yii::app()->db->createCommand('update productos set CanExistencia = (CanExistencia - '.$cantidad[$i].') where CodProducto = "'.$codigo[$i].'"')->query();
                               
                                Yii::app()->db->createCommand('insert into kardex (NumDocumento, CodProducto, TipoMovimiento, Cantidad, SaldoAnterior, SaldoActual, Precio, Subtotal,Usuario)'
                                                            . ' Values('.$numdocumento.',"'.$codigo[$i].'","venta",'.$cantidad[$i].','.$saldoanterior[$i].','.$saldoactual[$i].','.$precio[$i].','.$subtotal[$i].',"'.Yii::app()->user->name.'")')->query();
//                                                                 
//                            $codigo = $_POST['Detalleventa']['CodProducto'];
//                            $final = $_POST['Detalleventa']['Cantidad'];
//                            for($i=0; $i<count($codigo); $i++)
//                            {
//                               
//
//                            // Yii::app()->db->createCommand('update productos set CanExistencia = (CanExistencia - '.$final[$i].') where CodProducto = "'.$codigo[$i].'"')->query();
                          }
                            $this->redirect(array('view','id'=>$model->NumVenta));
                           
                     }
                    }
                   }

            $this->render('create2',array(
                'model'=>$model,
                //submit the member and validatedItems to the widget in the edit form
                'member'=>$member,
                'validatedMembers' => $validatedMembers,
                'cliente' => $cliente,
               
            ));
            }

            /**
             * Updates a particular model.
             * If update is successful, the browser will be redirected to the 'view' page.
             * @param integer $id the ID of the model to be updated
             */
            public function actionUpdate($id)
            {
                    $model=$this->loadModel($id);

                    // Uncomment the following line if AJAX validation is needed
                    // $this->performAjaxValidation($model);

                    if(isset($_POST['Venta']))
                    {
                            $model->attributes=$_POST['Venta'];
                            if($model->save())
                                    $this->redirect(array('view','id'=>$model->Fecha));
                    }

                    $this->render('update',array(
                            'model'=>$model,
                    ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Venta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        public function actionAutoComplete() {
           
            $criteria = new CDbCriteria;
            $criteria->compare('LOWER(Descripcion)', strtolower($_GET['term']), true);
//          $criteria->compare('LOWER(CodProducto)', strtolower($_GET['term']), true, 'OR');
            $criteria->order = 'Descripcion';
            $criteria->limit = 30; 
            $data = Producto::model()->findAll($criteria);

            if (!empty($data))
            {
             $arr = array();
             foreach ($data as $item) {
              $arr[] = array(
                'id' => $item->CodProducto,
                'value' => $item->Descripcion,
                'precio' => $item->PreCompra,
                'label' => $item->Descripcion,
                'saldo' => $item->CanExistencia,
                'unidad'=> $item->UniMedida,
                
              );
             }
            }
            else
            {
             $arr = array();
             $arr[] = array(
              'id' => '',
              'value' => 'No se han encontrado resultados para su búsqueda',
              'label' => 'No se han encontrado resultados para su búsqueda',
             );
         }

         echo CJSON::encode($arr);
            
            
            /* $res = array();

            if (isset($_POST['term']))
            {
               $criteria = new CDbCriteria();
                $criteria->addSearchCondition('Descripcion', $_GET['term']);
                $models = Producto::model()->findAll($criteria);
                
                $qtxt = "SELECT Descripcion, CodProducto, PreCompra FROM productos WHERE Descripcion LIKE :descripcion LIMIT 5";
                $command = Yii::app()->db->createCommand($qtxt);
                $command->bindValue(":descripcion", '%'.$_POST['term'].'%', PDO::PARAM_STR);
                $res = $command->queryRow($fetchAssociative = true);

            }
            echo CJSON::encode($res);
            Yii::app()->end();

        */
        }
        
        public function actionAutoCompletel() {
           
            $criteria = new CDbCriteria;
            $criteria->compare('LOWER(CodCliente)', strtolower($_GET['term']), true);
//          $criteria->compare('LOWER(CodProducto)', strtolower($_GET['term']), true, 'OR');
            $criteria->order = 'CodCliente';
            $criteria->limit = 30; 
            $data = Cliente::model()->findAll($criteria);

            if (!empty($data))
            {
             $arr = array();
             foreach ($data as $item) {
              $arr[] = array(
                'id' => $item->CodCliente,
                'value' => $item->CodCliente,
                'label' => $item->CodCliente,
                'direccion' => $item->Direccion,
                'nombre'=> $item->Descripcion,
                'telefono'=> $item->Telefono,
                
                
              );
             }
            }
            else
            {
             $arr = array();
             $arr[] = array(
              'id' => '',
              'value' => 'No se han encontrado resultados para su búsqueda',
              'label' => 'No se han encontrado resultados para su búsqueda',
             );
         }

         echo CJSON::encode($arr);
        }
        public function actionBatchUpdate()
            {
                // retrieve items to be updated in a batch mode
                // assuming each item is of model class 'Item'
            $items = new Venta;
                $items=$this->getItemsToUpdate();
                if(isset($_POST['Venta']))
                {
                    $valid=true;
                    foreach($items as $i=>$item)
                    {
                        if(isset($_POST['Venta'][$i]))
                            $item->attributes=$_POST['Venta'][$i];
                        $valid=$item->validate() && $valid;
                    }
                    
                }
                // displays the view to collect tabular input
                $this->render('create',array('items'=>$items));
            }
        
        

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Venta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Venta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Venta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='venta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
       
}

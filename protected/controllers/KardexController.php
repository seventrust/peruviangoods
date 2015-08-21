<?php

class KardexController extends Controller
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
		);
	}
        
        public function behaviors()
        {
            return array(
                'eexcelview'=>array(
                    'class'=>'ext.eexcelview.EExcelBehavior',
                ),
                'exportableGrid' => array(
                    'class' => 'application.components.ExportableGridBehavior',
                    'filename' => 'Movimiento_Por_Fecha.csv',
                    'csvDelimiter' => ';', //i.e. Excel friendly csv delimiter
                )
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
				'actions'=>array('create','update', 'admin', 'toexcel'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin','gri'),
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
//		$model=new Kardex;
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['Kardex']))
//		{
//			$model->attributes=$_POST['Kardex'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->Id));
//		}
//
//		$this->render('create',array(
//			'model'=>$model,
//		));
//	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
//	public function actionUpdate($id)
//	{
//		$model=$this->loadModel($id);
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['Kardex']))
//		{
//			$model->attributes=$_POST['Kardex'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->Id));
//		}
//
//		$this->render('update',array(
//			'model'=>$model,
//		));
//	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
//	public function actionDelete($id)
//	{
//		if(Yii::app()->request->isPostRequest)
//		{
//			// we only allow deletion via POST request
//			$this->loadModel($id)->delete();
//
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
//		}
//		else
//			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//	}

	/**
	 * Lists all models.
	 */
//	public function actionIndex()
//	{
////		$dataProvider=new CActiveDataProvider('Kardex');
////		$this->render('index',array(
////			'dataProvider'=>$dataProvider,
////		));
//                $model=new Kardex('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['Kardex'])){
//			$model->attributes=$_GET['Kardex'];}
//                 if ($this->isExportRequest()) { //<==== [[ADD THIS BLOCK BEFORE RENDER]]
//                    //set_time_limit(0); //Uncomment to export lage datasets
//                    //Add to the csv a single line of text
//                    $this->exportCSV(array('VENTAS FILTRADAS POR:'), null, false);
//                    //Add to the csv a single model data with 3 empty rows after the data
//                    $this->exportCSV($model, array_keys($model->attributeLabels()), false, 3);
//                    //Add to the csv a lot of models from a CDataProvider
//                    $this->exportCSV($model->search(), array(
//                        'NumDocumento',
//                        'Fecha',
//                        'CodProducto',
//                        'Descripcion',
//                        'UniMedida',
//                        'SaldoAnterior', 
//                        'SaldoActual',
//                        'Precio',
//                        'Usuario'
//                        ));
//                }   
//                $this->render('admin',array(
//			'model'=>$model,
//		));
//                
//	}
//        
//        public function actionToExcel() {
//            
//                    // Load data (scoped)
//            $dataProvider=new CActiveDataProvider('Kardex', array(
//            'criteria'=>array(
//                'condition'=>'NumDocumento=55',
//                'order'=>'Fecha DESC',
//                )));
//            
//
//                // Export it
//            $this->toExcel($dataProvider,
//                array(
//                    'NumDocumento',
//                    'Fecha',
//                    'CodProducto',
//                    'TipoMovimiento',
//                    'SaldoAnterior',
//                    'Cantidad',
//                    'SaldoActual',
//                    'Usuario',
//                    
//                ),
//                'Test File',
//                array(
//                    'creator' => 'Zen',
//                ),
//                'Excel5'
//            );
//
//        }

        /**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            //////******** Ojo aquí es donde se arma el documento **************//////////
            //
//		yii::app()->request->sendFile("test.xls", "<table><tr>test <td></td><td></td></tr></table>");
                $model=new Kardex('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Kardex'])){
                $model->attributes=$_GET['Kardex'];
                
                $producto=new Productos();
                
                }
                if ($this->isExportRequest()) {
                    
                    $this->exportCSV(array('Kardex al:'), null, false);
                    //Add to the csv a single model data with 3 empty rows after the data
                    $this->exportCSV($model, array_keys($model->attributeLabels()), false, 3);
                   
                    //Add to the csv a lot of models from a CDataProvider
                    $this->exportCSV($model->search(), array(
                        'Rut',
                        'NumDocumento',
                        'Fecha',
                        'TipoMovimiento',
                        'CodProducto',
                        'Descripcion',
                        'UniMedida',
                        'SaldoAnterior',
                        'Cantidad',
                        'SaldoActual',
                        'Precio',
                        'Iva',
                        'Subtotal',
                        'Usuario',
                        ));
                }
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Kardex::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kardex-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionExcel()
        {       
                $d = $_SESSION['kardex.excel'];      
                $this->toExcel($d, array(
                        'id',
                        'Fecha',
                        'NumDocumento',
                        'CodProducto',
                        'TipoMovimiento',
                ),
                time());
        }
}

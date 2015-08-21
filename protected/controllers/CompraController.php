<?php
  
class CompraController extends Controller
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
                'actions'=>array('index','view','autocomplete','autocompletel'),
                'users'=>array('*'),
            ),
                      
                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update','autocomplete','autocompletel'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete','autocomplete','autocompletel'),
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
  
  
    public function actionCreate()
    {      
            Yii::import('ext.multimodelform.MultiModelForm');
            $model = new Compra();
            $member = new Detallecompra();
            $producto=new Productos();
            $proveedor=new Proveedor();
            $forma = new Formapago();
            $validatedMembers = array();  //ensure an empty array

            if(isset($_POST['Compra']))
            {
                $model->attributes=$_POST['Compra'];
                
                if(
                    MultiModelForm::validate($member,$validatedMembers,$deleteItems) &&
                    $model->save())
                   {
                        $masterValues = array ('NumCompra'=>$model->NumCompra);
                    if 
                         (MultiModelForm::save($member,$validatedMembers,$deleteMembers,$masterValues)){
//                        $this->redirect(array('view','id'=>$model->Id));
                           
                           $usuario=$_POST['Compra']['Usuario'];
                           $numdocumento=$_POST['Compra']['NumCompra'];
                           $forpago=$_POST['Compra']['ForPago'];
                           $rut=$_POST['Compra']['CodProveedor'];
                           $codigo = $_POST['Detallecompra']['CodProducto'];
                           $descripcion = $_POST['Detallecompra']['Descripcion'];
                           $cantidad = $_POST['Detallecompra']['Cantidad'];
                           $saldoanterior=$_POST['Detallecompra']['Saldo'];
                           $precio=$_POST['Detallecompra']['Precio'];
                           $subtotal=$_POST['Detallecompra']['Subtotal'];
                           $iva=$_POST['Detallecompra']['Iva'];
                           $medida=$_POST['Detallecompra']['UniMedida'];
                           
                           for($i=0; $i<count($codigo); $i++)
                           {
                               $saldoactual[$i]=$saldoanterior[$i]+$cantidad[$i];
                               
                               
//                                Yii::app()->db->createCommand('update productos set CanExistencia = (CanExistencia + '.$cantidad[$i].'),PreCompra where CodProducto = "'.$codigo[$i].'"')->query();
                               Yii::app()->db->createCommand('update productos set CanExistencia = (CanExistencia + '.$cantidad[$i].'),PreCompra='.$precio[$i].',Iva='.$iva[$i].' where CodProducto = "'.$codigo[$i].'"')->query();
                               
                                yii::app()->db->createCommand('insert into kardex (Rut,ForPago,NumDocumento, CodProducto,Descripcion,UniMedida, TipoMovimiento, Cantidad, SaldoAnterior, SaldoActual, Precio,Iva, Subtotal,Usuario)'
                                                            . ' Values("'.$rut.'",'.$forpago.','.$numdocumento.',"'.$codigo[$i].'","'.$descripcion[$i].'","'.$medida[$i].'","compra",'.$cantidad[$i].','.$saldoanterior[$i].','.$saldoactual[$i].','.$precio[$i].','.$iva[$i].','.$subtotal[$i].',"'.$usuario.'")')->query();
//                                                                 
//                                yii::app()->db->createCommand('insert into kardex (Fecha,NumDocumento, CodProducto, TipoMovimiento, Cantidad, SaldoAnterior, SaldoActual, Precio, Subtotal)'
//                                                            . ' Values(today,'.$numdocumento.','.$codigo[$i].',"compra",'.$cantidad[$i].','.$saldoanterior[$i].','.$saldoactual[$i].','.$precio[$i].','.$subtotal[$i].')')->query();
//                                                                 
                           }
//                            $this->redirect(array('view','id'=>$model->NumCompra));
//                           $this->redirect(array('view','NumCompra'=>$model->NumCompra));
//                          $this->render('admin',array('model'=>$model,));
                           $this->redirect(array('view','id'=>$model->Id, ));
                     }
                    }   
                    
            }

            $this->render('create',array(
                'model'=>$model,
                //submit the member and validatedItems to the widget in the edit form
                'member'=>$member,
                'producto'=>$producto,
                'proveedor'=>$proveedor,
                'forma'=>$forma,
                'validatedMembers' => $validatedMembers,
            ));
    }
    
     public function actionUpdate($id)
        {
//                $model=$this->loadModel($id); 
                $member = new Detallecompra();
                
                    if(isset($_POST['Detallecompra']))
                        {
                        $cantidad_inicial=$member->Cantidad;
                        $member->attributes=$_POST['Detallecompra'];
                                                //$cantidadinicial = $model->Cantidad;
                                                //SaldoAct = salcdo actua;l - cantidad incial
                        if($member->save()){   
                                        $criteria=new CDbCriteria;                                              
                                        $criteria->condition='CodProducto=:CodProducto';  
                                        $criteria->params=array(':CodProducto'=>$model->CodProducto);
                                        $objProducto = Productos::model()->find($criteria);
                                        $objProducto->CanExistencia = $objProducto->CanExistencia + $member->Cantidad;
                                        
                                        $objProducto->save();
//                                        $this->redirect(array('view', 'id' => $model->Id));
                                       
                        }
                                                                                
                        } 
                $this->render('update',array(
                        'model'=>$model
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
        $dataProvider=new CActiveDataProvider('Compra');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }
  
    /**
     * Manages all models.
     */
    public function actionAdmin()
    {     
        $model=new Compra('search');
        $model->unsetAttributes();
              
        if(isset($_GET['Compra']))
            $model->attributes=$_GET['Compra'];
        $this->render('admin',array(
            'model'=>$model,
        ));
    }
  
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Compra the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Compra::model()->findByPk($id);
                $model_detalle=$model->Id;
                  
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
  
    /**
     * Performs the AJAX validation.
     * @param Compra $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='compra-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
                
        public function actionAutocomplete($term) 
        {
            $criteria = new CDbCriteria;
            $criteria->compare('LOWER(Descripcion)', strtolower($_GET['term']), true);
            $criteria->order = 'Descripcion';
            $criteria->limit = 30; 
            $data = Productos::model()->findAll($criteria);
  
            if (!empty($data))
            {
             $arr = array();
             foreach ($data as $item) {
              $arr[] = array(
                  'id' => $item->CodProducto,
                  'value' => $item->Descripcion,
                  'label' => $item->Descripcion,
                  'Precio' => $item->PreCompra,
                  'UniMedida'=>$item->UniMedida,
                  'Saldo'=>$item->CanExistencia,
                  'Iva'=>$item->Iva,
                  
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
          public function actionAutoCompletel() {
           
            $criteria = new CDbCriteria;
            $criteria->compare('LOWER(CodProveedor)', strtolower($_GET['term']), true);
//          $criteria->compare('LOWER(CodProducto)', strtolower($_GET['term']), true, 'OR');
            $criteria->order = 'CodProveedor';
            $criteria->limit = 30; 
            $data = Proveedor::model()->findAll($criteria);

            if (!empty($data))
            {
             $arr = array();
             foreach ($data as $item) {
              $arr[] = array(
                'id' => $item->CodProveedor,
                'value' => $item->CodProveedor,
                'label' => $item->CodProveedor,
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
        
            
//        public function actionAutocompleteProveedor($term) 
//        {
//            $criteria = new CDbCriteria;
//            $criteria->compare('LOWER(Proveedor)', strtolower($_GET['term']), true);
//            $criteria->order = 'Proveedor';
//            $criteria->limit = 30; 
//            $data = Proveedor::model()->findAll($criteria);
//  
//            if (!empty($data))
//            {
//             $arr = array();
//             foreach ($data as $item) {
//              $arr[] = array(
//                'id' => $item->CodProveedor,
//                'value' => $item->Descripcion,
//                'label' => array($item->Descripcion, $item->CodProveedor),
//                
//              );
//             }
//            }
//            else
//            {
//             $arr = array();
//             $arr[] = array(
//              'id' => '',
//              'value' => 'No se han encontrado resultados para su búsqueda',
//              'label' => 'No se han encontrado resultados para su búsqueda',
//             );
//         }
//  
//         echo CJSON::encode($arr);
//        }
//            
//         public function actionBatchCreate() {
//            $models=array();
//            $models[] = Compra::model();
//                  
////                , Detallecompra::model();
////                array('model'=>new Compra,'model_detalle'=>new Detallecompra);
////                $models[] = array('model'=>new Compra,'model_detalle'=>new Detallecompra);                              
//          
//            if (isset($_POST['Compra'])) {
//                $valid=true;
//                foreach ($_POST['Compra'] as $j=>$model) {
//                    if (isset($_POST['Compra'][$j])) {
//                        //$models[$j]=new ServTransact; // if you had static model only
////                        $models[$j]['model']->attributes=$model;    
//                        $models[$j]=new Compra() ;
//                        $models[$j]->attributes=$model;
//                        $valid=$models[$j]->validate() && $valid;                             
//                    }
//                }
////                foreach ($_POST['Detallecompra'] as $j=>$model) {
////                    if (isset($_POST['Detallecompra'][$j])) {
////                        $models[$j]['model_detalle']->attributes=$model;                               
////                        $valid=$models[$j]['model_detalle']->validate() && $valid;                                     
////                    }
////                }                       
//                          
//                if ($valid) {
//                    $i=0;
//                                  
//                    while (isset($models[$i])) {
//                        $models[$i++]->save(false);// models have already been validated
////                                print_r($models[$i]->attributes); 
////                        error_log('THIS IS YOUR FK: '.$models[$i]->SessionNum);                                 
////                                        $i++;           
//                    }
//  
//                    // anything else that you want to do, for example a redirect to admin page
//                    $this->redirect(array('compra/admin'));
//                }
//            }
//                  
//            $this->render('_form3',array('models'=>$models));
//}
//  
//    public function actionAddNew($id)
//        {
//                        $model=new StudentSubjectDetail;
//            $studentsubject = StudentSubject::model()->findByAttributes(array('student_subject_id'=>$id));
//            $subjectschedules = SubjectSchedule::model()->findAllByAttributes(array('period_id'=>$studentsubject->period_id));
//            // Uncomment the following line if AJAX validation is needed
//            // $this->performAjaxValidation($model);
//            if(isset($_POST['SubjectSchedule'])){
//                foreach ($subjectschedules as $subject) {
//                    /*
//                     * LINE BERIKUT ERROR : Illegal offset type in isset or empty
//                     */
//                    if (isset($_POST['SubjectSchedule'][$subject])) {
//  
//                        $tmpSubjectSchedule = new SubjectSchedule;
//                        $tmpSubjectSchedule->attributes=$_POST['SubjectSchedule'][$subject];
//                        $OK=$tmpSubjectSchedule->check;
//                        $TOK=$tmpSubjectSchedule->staff_id;
//                        if($tmpSubjectSchedule->check==1){
//                            $model->student_subject_id = $id;
//                            $model->subject_id = $tmpSubjectSchedule->subject_id;
//                            $model->staff_id = $tmpSubjectSchedule->staff_id;
//                            $model->description = $tmpSubjectSchedule->check;
//                            $model->save();
//                        }                            
//  
//                    }
//                }
//  
//                $this->redirect(array('view','id'=>$model->student_subject_detail_id));
//            }
//  
//            $this->render('addnew',array(
//                'model'=>$model,
//                'studentsubject'=>$studentsubject,
//                'subjectschedules'=>$subjectschedules
//            ));
//        }       
//  
}
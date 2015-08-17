<?php

class ClientesController extends Controller
{
	
	public function actionIndex()
	{
		$model=new Clientes();
                $datos=$model->getClientes();
		$this->render('index',compact("datos"));
       
	}
        
//        public function actionAdd()
//	{
//    	$model=new Bodegas();
//        
//        if(isset($_POST["Bodegas"]))
//        {
//            $model->attributes=$_POST['Bodegas'];
//            if($model->validate())
//            {
//               $guardar=$model->insert();
//               if($guardar)
//               {
//                    Yii::app()->user->setFlash('mensaje','El registro se ha creado exitosamente');
//                $this->redirect(Yii::app()->request->baseUrl."/bodegas");
//               }else
//               {
//                Yii::app()->user->setFlash('mensaje','Se ha producido un error, por favor intente más tarde');
//                $this->refresh();
//               }
//            }
//        }
        
//		$this->render('addproducto',compact("model"));
	}
	
//}
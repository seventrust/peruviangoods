<?php

class Bodegas extends CActiveRecord
{
    private $connection;
    public $CodBodega;
    public $Descripcion;
    public $Direccion;
    public $Estatus;
   
    public function __construct()
    {
        //Yii::app()->db->connectionString
        $this->connection=new CDbConnection(Yii::app()->db->connectionString,Yii::app()->db->username,Yii::app()->db->password);
        $this->connection->active=true;
    }
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getBodegas()
    {
        
        $sql="SELECT CodBodega, Descripcion, Direccion, Estatus FROM bodega;";
        $rows=$this->connection->createCommand($sql)->queryAll();
        return $rows;
        
    }
    
    
    
//    public function insert()
//    {
//        $sql="INSERT INTO bodega(CodBodega, Descripcion, Direccion, Estatus) "
//                . " VALUES(?,?,?,?,?,?)";
//        $command=$this->connection->createCommand($sql);
//        
//        $command-> bindValue(1,$_POST["productos"]["CodProducto"],PDO::PARAM_STR);
//       
//        $command-> bindValue(2,$_POST["productos"]["Descripcion"],PDO::PARAM_STR);
//        
//        $command-> bindValue(3,$_POST["productos"]["UniMedida"],PDO::PARAM_STR);
//        
//        $command-> bindValue(4,$_POST["productos"]["CanExistencia"],PDO::PARAM_STR);
//        
//        $command-> bindValue(5,$_POST["productos"]["PreCompra"],PDO::PARAM_STR);
//        
//        $command-> bindValue(6,$_POST["productos"]["PreVenta"],PDO::PARAM_STR);
//     
//        $command->execute();
//        return true;
//    }
}
<?php

/**
 * This is the model class for table "bodega".
 *
 * The followings are the available columns in table 'bodega':
 * @property string $CodBodega
 * @property string $Descripcion
 * @property string $Direccion
 * @property string $Estatus
 */
class Bodega extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bodega';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CodBodega, Descripcion, Direccion', 'required'),
			array('CodBodega', 'length', 'max'=>10),
			array('Descripcion', 'length', 'max'=>100),
			array('Direccion', 'length', 'max'=>200),
//			array('Estatus', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CodBodega, Descripcion, Direccion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CodBodega' => 'Código',
			'Descripcion' => 'Descripción',
			'Direccion' => 'Dirección',
//			'Estatus' => 'Estatus',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('CodBodega',$this->CodBodega,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('Direccion',$this->Direccion,true);
//		$criteria->compare('Estatus',$this->Estatus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Bodega the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function buscarBodega($bodega){
		
		$datos = array();
		
		$sql = "SELECT id, CodBodega,Descripcion, Direccion FROM bodega WHERE Descripcion like '%".$bodega."%' and Estatus '1'";
			
		$resultado = mysql_query($sql);
		
		while($row = mysql_fetch_array($resultado)){
			
			$datos[] = array('value' => $row['descripcion'],
							'id' => $row['id'],
							'CodBodega' => $row['CodBodega']);
			
		
			
		}
		return $datos;
	}
        
        public function getMenuBodega() {
            return CHtml::listData(Bodega::model()->findAll(),'CodBodega','Descripcion');
        }

}
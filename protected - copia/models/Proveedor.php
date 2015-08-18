<?php

/**
 * This is the model class for table "proveedor".
 *
 * The followings are the available columns in table 'proveedor':
 * @property integer $Id
 * @property string $CodProveedor
 * @property string $Descripcion
 * @property string $Direccion
 * @property string $Estatus
 */
class Proveedor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proveedor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CodProveedor, Descripcion, Direccion', 'required'),
			array('CodProveedor', 'length', 'max'=>10),
			array('Descripcion', 'length', 'max'=>50),
			array('Direccion', 'length', 'max'=>100),
			array('Estatus', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, CodProveedor, Descripcion, Direccion, Estatus', 'safe', 'on'=>'search'),
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
			'Id' => 'ID',
			'CodProveedor' => 'Cod Proveedor',
			'Descripcion' => 'Descripcion',
			'Direccion' => 'Direccion',
			'Estatus' => 'Estatus',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('CodProveedor',$this->CodProveedor,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('Direccion',$this->Direccion,true);
		$criteria->compare('Estatus',$this->Estatus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proveedor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getMenuProveedor() {
//            return CHtml::listData(Bodega::model()->findAll('estatus=?',array(1)),'Id','selectName');
            return CHtml::listData(Proveedor::model()->findAll(),'Id','CodProveedor','Descripcion');
            
        }
}

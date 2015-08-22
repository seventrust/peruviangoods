<?php

/**
 * This is the model class for table "ajusteinventario".
 *
 * The followings are the available columns in table 'ajusteinventario':
 * @property integer $Id
 * @property string $Fecha
 * @property string $Descripcion
 * @property string $Tipo
 * @property integer $campo1
 * @property integer $campo2
 * @property integer $campo3
 */
class Ajusteinventario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ajusteinventario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Fecha, Descripcion, Tipo, CodBodega', 'required'),
//			array('campo2, campo3', 'numerical', 'integerOnly'=>true),
			array('Descripcion', 'length', 'max'=>200),
			array('Tipo', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Fecha, Descripcion, Tipo, CodBodega', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
        return array(
                    'FK_rel_ajuste_detalleajuste' => array(self::BELONGS_TO, 'ajusteinventario', 'Id'),
        );

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'Numero',
			'Fecha' => 'Fecha',
			'Descripcion' => 'Descripcion',
			'Tipo' => 'Tipo',
			'CodBodega' => 'CodBodega',
//			'campo2' => 'Campo2',
//			'campo3' => 'Campo3',
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
		$criteria->compare('Fecha',$this->Fecha,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('Tipo',$this->Tipo,true);
		$criteria->compare('CodBodega',$this->CodBodega);
//		$criteria->compare('campo2',$this->campo2);
//		$criteria->compare('campo3',$this->campo3);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ajusteinventario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function getMenuBodega() {
//            return CHtml::listData(Bodega::model()->findAll('estatus=?',array(1)),'Id','selectName');
            return CHtml::listData(Bodega::model()->findAll(),'CodBodega','Descripcion');
        }
        
        public function getMenuCategoria() {
            return CHtml::listData(Tipoajuste::model()->findAll(),'Id','Descripcion');
        }
        
        public function getMenuProducto() {
            return CHtml::listData(Productos::model()->findAll(),'Id','Descripcion');
        }
}

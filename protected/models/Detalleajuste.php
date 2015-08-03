<?php

/**
 * This is the model class for table "detalleajuste".
 *
 * The followings are the available columns in table 'detalleajuste':
 * @property integer $Id
 * @property integer $IdAjuste
 * @property integer $Item
 * @property string $CodProducto
 * @property integer $CantTeorica
 * @property integer $CantFisica
 * @property integer $Campo1
 * @property integer $campo2
 */
class Detalleajuste extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalleajuste';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdAjuste, Item, CodProducto, CantTeorica, CantFisica, Campo1, campo2', 'required'),
			array('IdAjuste, Item, CantTeorica, CantFisica, Campo1, campo2', 'numerical', 'integerOnly'=>true),
			array('CodProducto', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, IdAjuste, Item, CodProducto, CantTeorica, CantFisica, Campo1, campo2', 'safe', 'on'=>'search'),
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
			'IdAjuste' => 'Id Ajuste',
			'Item' => 'Item',
			'CodProducto' => 'Cod Producto',
			'CantTeorica' => 'Cant Teorica',
			'CantFisica' => 'Cant Fisica',
			'Campo1' => 'Campo1',
			'campo2' => 'Campo2',
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
		$criteria->compare('IdAjuste',$this->IdAjuste);
		$criteria->compare('Item',$this->Item);
		$criteria->compare('CodProducto',$this->CodProducto,true);
		$criteria->compare('CantTeorica',$this->CantTeorica);
		$criteria->compare('CantFisica',$this->CantFisica);
		$criteria->compare('Campo1',$this->Campo1);
		$criteria->compare('campo2',$this->campo2);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detalleajuste the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

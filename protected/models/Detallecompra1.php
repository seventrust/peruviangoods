<?php

/**
 * This is the model class for table "detallecompra".
 *
 * The followings are the available columns in table 'detallecompra':
 * @property integer $Item
 * @property string $NumCompra
 * @property string $CodProducto
 * @property string $Cantidad
 * @property string $Precio
 * @property string $UniMedida
 * @property string $Descuento
 * @property string $Exento
 * @property string $SubTotal
 */
class Detallecompra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detallecompra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CodProducto, Cantidad, Precio, UniMedida, Descuento, Exento, SubTotal', 'required'),
			array('Item', 'numerical', 'integerOnly'=>true),
			array('NumCompra, CodProducto, Cantidad, Precio, UniMedida, Descuento, Exento, SubTotal', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Item, NumCompra, CodProducto, Cantidad, Precio, UniMedida, Descuento, Exento, SubTotal', 'safe', 'on'=>'search'),
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
//                    'Compras' => array(self::HAS_MANY, 'compra', 'NumCompra', 'together'=>true ),
//                       'productos'=>array(self::HAS_ONE,'Productos','CodProducto'),
                       'NumCompra' => array(self::BELONGS_TO, 'Compra', 'NumCompra'),
                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Item' => 'Item',
			'NumCompra' => 'Num Compra',
			'CodProducto' => 'Cod Producto',
			'Cantidad' => 'Cantidad',
			'Precio' => 'Precio',
			'UniMedida' => 'Uni Medida',
			'Descuento' => 'Descuento',
			'Exento' => 'Exento',
			'SubTotal' => 'Sub Total',
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

		$criteria->compare('Item',$this->Item);
		$criteria->compare('NumCompra',$this->NumCompra,true);
		$criteria->compare('CodProducto',$this->CodProducto,true);
		$criteria->compare('Cantidad',$this->Cantidad,true);
		$criteria->compare('Precio',$this->Precio,true);
		$criteria->compare('UniMedida',$this->UniMedida,true);
		$criteria->compare('Descuento',$this->Descuento,true);
		$criteria->compare('Exento',$this->Exento,true);
		$criteria->compare('SubTotal',$this->SubTotal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
                
                
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detallecompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

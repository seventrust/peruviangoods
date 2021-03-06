<?php

/**
 * This is the model class for table "detalleventa".
 *
 * The followings are the available columns in table 'detalleventa':
 * @property integer $Item
 * @property string $NumVenta
 * @property string $CodProducto
 * @property string $Descripcion
 * @property string $Cantidad
 * @property string $Precio
 * @property string $UniMedida
 * @property string $Descuento
 * @property string $Exento
 * @property string $Subtotal
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
			array('CodProducto, Descripcion, Cantidad', 'required'),
			array('Item', 'numerical', 'integerOnly'=>true),
			array('NumCompra, Cantidad, Precio, UniMedida,Iva, Descuento, Exento, Subtotal,Saldo', 'length', 'max'=>20),
                        array('CodProducto','length','max'=>40),
			array('Descripcion', 'length', 'max'=>200),

                        // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Item, NumCompra, CodProducto, Cantidad, Precio, UniMedida,Iva, Descuento, Exento, Subtotal,Saldo', 'safe', 'on'=>'search'),
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
                    'NumCompra' => array(self::BELONGS_TO, 'Compra', 'NumCompra'),
                    'Compras' => array(self::HAS_MANY, 'compra', 'NumCompra'),
                    'productos'=>array(self::HAS_MANY,'Productos','CodProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Item' => 'Item',
			'NumCompra' => 'Compra Número',
			'CodProducto' => 'Codigo',
                        'Descripcion' => 'Descripcion',
			'Cantidad' => 'Cantidad',
			'Precio' => 'Precio',
			'UniMedida' => 'Medida',
			'Descuento' => 'Descuento',
                        'Iva'=>'Iva',
			'Exento' => 'Exento',
			'Subtotal' => 'Subtotal',
                        'Saldo'=>'Saldo',
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
                $criteria->compare('Iva',$this->Iva,true);
		$criteria->compare('Descuento',$this->Descuento,true);
		$criteria->compare('Exento',$this->Exento,true);
		$criteria->compare('Subtotal',$this->Subtotal,true);
                $criteria->compare('Saldo',$this->Saldo,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detalleventa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

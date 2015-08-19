<?php

/**
 * This is the model class for table "venta".
 *
 * The followings are the available columns in table 'venta':
 * @property string $NumVenta
 * @property string $CodProveedor
 * @property string $CodBodega
 * @property string $Fecha
 * @property string $Vencimiento
 * @property string $ForPago
 * @property string $TotExento
 * @property string $TotDescuento
 * @property string $TotNeto
 * @property string $TotIva
 * @property string $TotImpuesto
 * @property string $TotRetencion
 * @property string $Total
 */
class Compra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'compra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('NumCompra, CodBodega, Fecha, Vencimiento, ForPago, TotExento, TotDescuento, TotNeto,  Total', 'required'),
                    array('NumCompra, CodProveedor, CodBodega, ForPago, TotExento, TotDescuento, TotNeto, TotIva, TotImpuesto, TotRetencion, Total,Usuario', 'length', 'max'=>120),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('NumCompra, CodProveedor, CodBodega, Fecha, Vencimiento, ForPago, TotExento, TotDescuento, TotNeto, TotIva, TotImpuesto, TotRetencion, Total,Usuario', 'safe', 'on'=>'search'),
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
                    'detallecompras' => array(self::HAS_MANY, 'Detallecompra', 'NumCompra'),
//                    'Detalle' => array(self::HAS_MANY, 'Detallecompra', 'NumCompra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
                    
                        'NumCompra' => 'Numero Factura',
                        'CodProveedor' => 'RUT',
                        'CodBodega' => 'CodBodega',
                        'Fecha' => 'Fecha',
                        'Vencimiento' => 'Vencimiento',
                        'ForPago' => 'For Pago',
                        'TotExento' => 'Total Exento',
                        'TotDescuento' => 'Total Descuento',
                        'TotNeto' => 'Total Neto',
                        'TotIva' => 'Total Iva',
                        'TotImpuesto' => 'Total Impuesto',
                        'TotRetencion' => 'Total Retencion',
                        'Total' => 'Gran Total',
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

//		$criteria=new CDbCriteria;

		 $criteria=new CDbCriteria;
                $criteria->compare('NumCompra',$this->NumCompra,true);
                $criteria->compare('CodProveedor',$this->CodProveedor,true);
                $criteria->compare('CodBodega',$this->CodBodega,true);
                $criteria->compare('Fecha',$this->Fecha,true);
                $criteria->compare('Vencimiento',$this->Vencimiento,true);
                $criteria->compare('ForPago',$this->ForPago,true);
                $criteria->compare('TotExento',$this->TotExento,true);
                $criteria->compare('TotDescuento',$this->TotDescuento,true);
                $criteria->compare('TotNeto',$this->TotNeto,true);
                $criteria->compare('TotIva',$this->TotIva,true);
                $criteria->compare('TotImpuesto',$this->TotImpuesto,true);
                $criteria->compare('TotRetencion',$this->TotRetencion,true);
                $criteria->compare('Total',$this->Total,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Venta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

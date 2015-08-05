<?php

/**
 * This is the model class for table "kardex".
 *
 * The followings are the available columns in table 'kardex':
 * @property integer $Id
 * @property string $Fecha
 * @property string $NumDocumento
 * @property string $CodProducto
 * @property string $TipoMovimiento
 * @property string $Cantidad
 * @property string $SaldoAnterior
 * @property string $SaldoActual
 * @property string $Precio
 * @property string $Subtotal
 * @property string $Usuario
 */
class Kardex extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kardex';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NumDocumento, CodProducto, TipoMovimiento, Cantidad, SaldoAnterior, SaldoActual, Precio, Subtotal, Usuario', 'required'),
			array('NumDocumento, CodProducto, Usuario', 'length', 'max'=>20),
			array('TipoMovimiento, Cantidad, SaldoAnterior, SaldoActual, Precio, Subtotal', 'length', 'max'=>10),
			array('Fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Fecha, NumDocumento, CodProducto, TipoMovimiento, Cantidad, SaldoAnterior, SaldoActual, Precio, Subtotal, Usuario', 'safe', 'on'=>'search'),
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
			'Fecha' => 'Fecha',
			'NumDocumento' => 'Num Documento',
			'CodProducto' => 'Cod Producto',
			'TipoMovimiento' => 'Tipo Movimiento',
			'Cantidad' => 'Cantidad',
			'SaldoAnterior' => 'Saldo Anterior',
			'SaldoActual' => 'Saldo Actual',
			'Precio' => 'Precio',
			'Subtotal' => 'Subtotal',
			'Usuario' => 'Usuario',
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
		$criteria->compare('NumDocumento',$this->NumDocumento,true);
		$criteria->compare('CodProducto',$this->CodProducto,true);
		$criteria->compare('TipoMovimiento',$this->TipoMovimiento,true);
		$criteria->compare('Cantidad',$this->Cantidad,true);
		$criteria->compare('SaldoAnterior',$this->SaldoAnterior,true);
		$criteria->compare('SaldoActual',$this->SaldoActual,true);
		$criteria->compare('Precio',$this->Precio,true);
		$criteria->compare('Subtotal',$this->Subtotal,true);
		$criteria->compare('Usuario',$this->Usuario,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kardex the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

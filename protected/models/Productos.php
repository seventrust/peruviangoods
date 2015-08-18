<?php

/**
 * This is the model class for table "productos".
 *
 * The followings are the available columns in table 'productos':
 * @property string $Id
 * @property string $CodProducto
 * @property string $Descripcion
 * @property string $UniMedida
 * @property integer $CanExistencia
 * @property string $PreCompra
 * @property string $PreVenta
 * @property string $PreVenta1
 * @property string $Foto
 * @property string $CodCategoria
 * @property string $Estatus
 * @property string $CodProveedor
 */
class Productos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CodProducto, Descripcion, UniMedida, CodCategoria', 'required'),
			array('CanExistencia', 'numerical', 'integerOnly'=>true),
			array('Id, CodProveedor', 'length', 'max'=>20),
			array('CodProducto', 'length', 'max'=>40),
			array('Descripcion', 'length', 'max'=>200),
			array('UniMedida, PreCompra, PreVenta, PreVenta1, CodCategoria', 'length', 'max'=>10),
			array('Estatus', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, CodProducto, Descripcion, UniMedida, CanExistencia, PreCompra, PreVenta, PreVenta1, Foto, CodCategoria, Estatus, CodProveedor', 'safe', 'on'=>'search'),
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
                    'codigo' => array(self::HAS_MANY, 'Detalleventa', 'CodProducto'),
                    
                    'nomenclatura' => array(self::HAS_MANY, 'Kardex', 'CodProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'CodProducto' => 'Cod Producto',
			'Descripcion' => 'Descripcion',
			'UniMedida' => 'Uni Medida',
			'CanExistencia' => 'Can Existencia',
			'PreCompra' => 'Pre Compra',
			'PreVenta' => 'Pre Venta',
			'PreVenta1' => 'Pre Venta1',
			'Foto' => 'Foto',
			'CodCategoria' => 'Cod Categoria',
			'Estatus' => 'Estatus',
			'CodProveedor' => 'Cod Proveedor',
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

		$criteria->compare('Id',$this->Id,true);
		$criteria->compare('CodProducto',$this->CodProducto,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('UniMedida',$this->UniMedida,true);
		$criteria->compare('CanExistencia',$this->CanExistencia);
		$criteria->compare('PreCompra',$this->PreCompra,true);
		$criteria->compare('PreVenta',$this->PreVenta,true);
		$criteria->compare('PreVenta1',$this->PreVenta1,true);
		$criteria->compare('Foto',$this->Foto,true);
		$criteria->compare('CodCategoria',$this->CodCategoria,true);
		$criteria->compare('Estatus',$this->Estatus,true);
		$criteria->compare('CodProveedor',$this->CodProveedor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Productos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

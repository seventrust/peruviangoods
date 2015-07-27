<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property string $CodProducto
 * @property string $Descripcion
 * @property string $UniMedida
 * @property integer $CanExistencia
 * @property string $PreCompra
 * @property string $PreVenta
 */
class Producto extends CActiveRecord
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
			array('CodProducto, Descripcion, UniMedida, CanExistencia, PreCompra, PreVenta', 'required'),
			array('CanExistencia', 'numerical', 'integerOnly'=>true),
			array('CodProducto', 'length', 'max'=>20),
			array('Descripcion', 'length', 'max'=>200),
			array('UniMedida, PreCompra, PreVenta', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CodProducto, Descripcion, UniMedida, CanExistencia, PreCompra, PreVenta', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
//            Admin productos
		return array(
			'CodProducto' => 'Código',
			'Descripcion' => 'Descripcion',
			'UniMedida' => 'Unidad Medida',
			'CanExistencia' => 'Cantidad',
			'PreCompra' => 'Precio Compra',
			'PreVenta' => 'Precio Venta',
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

		$criteria->compare('CodProducto',$this->CodProducto,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
}

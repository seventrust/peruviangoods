<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $Id
 * @property string $CodCliente
 * @property string $Descripcion
 * @property string $Fantasia
 * @property string $Giro
 * @property string $Direccion
 * @property string $Telefono
 * @property string $Fax
 * @property string $Correo
 * @property string $Contacto
 * @property string $Observaciones
 * @property integer $IdTipo
 * @property string $Estatus
 */
class Cliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CodCliente, Descripcion, Fantasia, Giro, Direccion, Telefono, Fax, Correo, Contacto, Observaciones, IdTipo', 'required'),
			array('IdTipo', 'numerical', 'integerOnly'=>true),
			array('CodCliente', 'length', 'max'=>10),
			array('Descripcion, Fantasia, Giro, Observaciones', 'length', 'max'=>200),
			array('Direccion, Correo, Contacto', 'length', 'max'=>100),
			array('Telefono', 'length', 'max'=>50),
			array('Fax', 'length', 'max'=>20),
			array('Estatus', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, CodCliente, Descripcion, Fantasia, Giro, Direccion, Telefono, Fax, Correo, Contacto, Observaciones, IdTipo, Estatus', 'safe', 'on'=>'search'),
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
			'CodCliente' => 'Cod Cliente',
			'Descripcion' => 'Descripcion',
			'Fantasia' => 'Fantasia',
			'Giro' => 'Giro',
			'Direccion' => 'Direccion',
			'Telefono' => 'Telefono',
			'Fax' => 'Fax',
			'Correo' => 'Correo',
			'Contacto' => 'Contacto',
			'Observaciones' => 'Observaciones',
			'IdTipo' => 'Id Tipo',
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
		$criteria->compare('CodCliente',$this->CodCliente,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('Fantasia',$this->Fantasia,true);
		$criteria->compare('Giro',$this->Giro,true);
		$criteria->compare('Direccion',$this->Direccion,true);
		$criteria->compare('Telefono',$this->Telefono,true);
		$criteria->compare('Fax',$this->Fax,true);
		$criteria->compare('Correo',$this->Correo,true);
		$criteria->compare('Contacto',$this->Contacto,true);
		$criteria->compare('Observaciones',$this->Observaciones,true);
		$criteria->compare('IdTipo',$this->IdTipo);
		$criteria->compare('Estatus',$this->Estatus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $Id
 * @property string $CodUsuario
 * @property string $Nombre
 * @property string $Contrasena
 * @property string $Correo
 * @property string $Tipo
 * @property string $Departamento
 * @property string $Estatus
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CodUsuario, Nombre, Contrasena, Correo, Tipo, Departamento', 'required'),
			array('CodUsuario, Tipo, Departamento', 'length', 'max'=>10),
			array('Nombre', 'length', 'max'=>20),
			array('Contrasena', 'length', 'max'=>128),
			array('Correo', 'length', 'max'=>200),
			array('Estatus', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, CodUsuario, Nombre, Contrasena, Correo, Tipo, Departamento, Estatus', 'safe', 'on'=>'search'),
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
			'CodUsuario' => 'Cod Usuario',
			'Nombre' => 'Nombre',
			'Contrasena' => 'Contrasena',
			'Correo' => 'Correo',
			'Tipo' => 'Tipo',
			'Departamento' => 'Departamento',
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
		$criteria->compare('CodUsuario',$this->CodUsuario,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Contrasena',$this->Contrasena,true);
		$criteria->compare('Correo',$this->Correo,true);
		$criteria->compare('Tipo',$this->Tipo,true);
		$criteria->compare('Departamento',$this->Departamento,true);
		$criteria->compare('Estatus',$this->Estatus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

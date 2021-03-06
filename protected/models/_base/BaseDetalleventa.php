<?php

/**
 * This is the model base class for the table "detalleventa".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Detalleventa".
 *
 * Columns in table "detalleventa" available as properties of the model,
 * followed by relations of table "detalleventa" available as properties of the model.
 *
 * @property integer $Item
 * @property integer $NumVenta
 * @property string $CodProducto
 * @property string $Descripcion
 * @property integer $Cantidad
 * @property string $Precio
 * @property string $UniMedida
 * @property string $Descuento
 * @property string $Exento
 * @property double $Subtotal
 *
 * @property Venta $numVenta
 */
abstract class BaseDetalleventa extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'detalleventa';
    }

    public static function representingColumn() {
        return 'Descripcion';
    }

    public function rules() {
        return array(
            array('Item, NumVenta, CodProducto, Descripcion, Cantidad, Precio, UniMedida, Descuento, Exento, Subtotal', 'required'),
            array('Item, NumVenta, Cantidad', 'numerical', 'integerOnly'=>true),
            array('Subtotal', 'numerical'),
            array('CodProducto, Descripcion', 'length', 'max'=>200),
            array('Precio, UniMedida, Descuento, Exento', 'length', 'max'=>10),
            array('Item, NumVenta, CodProducto, Descripcion, Cantidad, Precio, UniMedida, Descuento, Exento, Subtotal', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'numVenta' => array(self::BELONGS_TO, 'Venta', 'NumVenta'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'Item' => Yii::t('app', 'Item'),
                'NumVenta' => Yii::t('app', 'Num Venta'),
                'CodProducto' => Yii::t('app', 'Cod Producto'),
                'Descripcion' => Yii::t('app', 'Descripcion'),
                'Cantidad' => Yii::t('app', 'Cantidad'),
                'Precio' => Yii::t('app', 'Precio'),
                'UniMedida' => Yii::t('app', 'Uni Medida'),
                'Descuento' => Yii::t('app', 'Descuento'),
                'Exento' => Yii::t('app', 'Exento'),
                'Subtotal' => Yii::t('app', 'Subtotal'),
                'numVenta' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('Item', $this->Item);
        $criteria->compare('NumVenta', $this->NumVenta);
        $criteria->compare('CodProducto', $this->CodProducto, true);
        $criteria->compare('Descripcion', $this->Descripcion, true);
        $criteria->compare('Cantidad', $this->Cantidad);
        $criteria->compare('Precio', $this->Precio, true);
        $criteria->compare('UniMedida', $this->UniMedida, true);
        $criteria->compare('Descuento', $this->Descuento, true);
        $criteria->compare('Exento', $this->Exento, true);
        $criteria->compare('Subtotal', $this->Subtotal);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
            'ActiveRecordRelation' => array(
                'class' => 'EActiveRecordRelationBehavior',
            ),
        ), parent::behaviors());
    }
}
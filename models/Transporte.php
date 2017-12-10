<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transporte".
 *
 * @property integer $id_transporte
 * @property string $transportar
 * @property integer $cantidad
 * @property integer $vales_gasolina
 * @property integer $importe
 * @property string $tipo_transporte
 * @property integer $anexo_3
 *
 * @property TipoTransporte $tipoTransporte
 * @property Anexo3Recurso $anexo3
 */
class Transporte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transporte';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transportar', 'cantidad', 'tipo_transporte', 'anexo_3'], 'required'],
            [['cantidad', 'vales_gasolina', 'importe', 'anexo_3'], 'integer'],
            [['transportar'], 'string', 'max' => 50],
            [['tipo_transporte'], 'string', 'max' => 10],
            [['tipo_transporte'], 'exist', 'skipOnError' => true, 'targetClass' => TipoTransporte::className(), 'targetAttribute' => ['tipo_transporte' => 'id_tipo_transporte']],
            [['anexo_3'], 'exist', 'skipOnError' => true, 'targetClass' => Anexo3Recurso::className(), 'targetAttribute' => ['anexo_3' => 'id_anexo_3_recurso']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_transporte' => 'Id Transporte',
            'transportar' => 'Transportar',
            'cantidad' => 'Cantidad',
            'vales_gasolina' => 'Vales Gasolina',
            'importe' => 'Importe',
            'tipo_transporte' => 'Tipo Transporte',
            'anexo_3' => '',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoTransporte()
    {
        return $this->hasOne(TipoTransporte::className(), ['id_tipo_transporte' => 'tipo_transporte']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnexo3()
    {
        return $this->hasOne(Anexo3Recurso::className(), ['id_anexo_3_recurso' => 'anexo_3']);
    }
}

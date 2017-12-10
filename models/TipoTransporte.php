<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_transporte".
 *
 * @property string $id_tipo_transporte
 * @property string $tipo_transporte
 *
 * @property Transporte[] $transportes
 */
class TipoTransporte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_transporte';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_transporte', 'tipo_transporte'], 'required'],
            [['id_tipo_transporte'], 'string', 'max' => 10],
            [['tipo_transporte'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_transporte' => 'Id Tipo Transporte',
            'tipo_transporte' => 'Tipo Transporte',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportes()
    {
        return $this->hasMany(Transporte::className(), ['tipo_transporte' => 'id_tipo_transporte']);
    }
}

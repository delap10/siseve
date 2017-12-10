<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_evento".
 *
 * @property string $id_tipo_evento
 * @property string $tipo_evento
 *
 * @property PortadaEvento[] $portadaEventos
 */
class TipoEvento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_evento'], 'required'],
            [['id_tipo_evento'], 'string', 'max' => 10],
            [['tipo_evento'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_evento' => 'Id Tipo Evento',
            'tipo_evento' => 'Tipo Evento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortadaEventos()
    {
        return $this->hasMany(PortadaEvento::className(), ['tipo_evento' => 'id_tipo_evento']);
    }
}

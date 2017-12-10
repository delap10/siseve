<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodos_escolares".
 *
 * @property string $periodo
 * @property string $identificacion_larga
 * @property string $identificacion_corta
 * @property string $status
 * @property string $fecha_inicio
 * @property string $fecha_termino
 *
 * @property PortadaEvento[] $portadaEventos
 */
class PeriodosEscolares extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodos_escolares';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['periodo', 'identificacion_larga', 'status'], 'required'],
            [['fecha_inicio', 'fecha_termino'], 'safe'],
            [['periodo'], 'string', 'max' => 5],
            [['identificacion_larga'], 'string', 'max' => 30],
            [['identificacion_corta'], 'string', 'max' => 12],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'periodo' => 'Periodo',
            'identificacion_larga' => 'Identificacion Larga',
            'identificacion_corta' => 'Identificacion Corta',
            'status' => 'Status',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_termino' => 'Fecha Termino',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortadaEventos()
    {
        return $this->hasMany(PortadaEvento::className(), ['periodo' => 'periodo']);
    }
}

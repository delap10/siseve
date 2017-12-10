<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "planes_de_estudio".
 *
 * @property string $plan_de_estudios
 * @property string $descripcion_del_plan
 * @property string $inicio_plan
 * @property string $fin_plan
 *
 * @property Alumnos[] $alumnos
 */
class PlanesDeEstudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'planes_de_estudio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plan_de_estudios'], 'required'],
            [['inicio_plan', 'fin_plan'], 'safe'],
            [['plan_de_estudios'], 'string', 'max' => 1],
            [['descripcion_del_plan'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'plan_de_estudios' => 'Plan De Estudios',
            'descripcion_del_plan' => 'Descripcion Del Plan',
            'inicio_plan' => 'Inicio Plan',
            'fin_plan' => 'Fin Plan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumnos::className(), ['plan_de_estudios' => 'plan_de_estudios']);
    }
}

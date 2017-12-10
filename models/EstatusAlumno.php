<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estatus_alumno".
 *
 * @property string $estatus
 * @property string $descripcion
 *
 * @property Alumnos[] $alumnos
 */
class EstatusAlumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estatus_alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estatus', 'descripcion'], 'required'],
            [['estatus'], 'string', 'max' => 3],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estatus' => 'Estatus',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumnos::className(), ['estatus_alumno' => 'estatus']);
    }
}

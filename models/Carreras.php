<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carreras".
 *
 * @property string $carrera
 * @property integer $reticula
 * @property string $nivel_escolar
 * @property string $clave_oficial
 * @property string $nombre_carrera
 * @property string $nombre_reducido
 * @property string $siglas
 * @property string $modalidad
 *
 * @property Alumnos[] $alumnos
 * @property NivelEscolar $nivelEscolar
 */
class Carreras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carreras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['carrera', 'reticula', 'nivel_escolar', 'clave_oficial', 'nombre_carrera', 'nombre_reducido', 'siglas'], 'required'],
            [['reticula'], 'integer'],
            [['carrera'], 'string', 'max' => 3],
            [['nivel_escolar', 'modalidad'], 'string', 'max' => 1],
            [['clave_oficial'], 'string', 'max' => 20],
            [['nombre_carrera'], 'string', 'max' => 80],
            [['nombre_reducido'], 'string', 'max' => 30],
            [['siglas'], 'string', 'max' => 10],
            [['nivel_escolar'], 'exist', 'skipOnError' => true, 'targetClass' => NivelEscolar::className(), 'targetAttribute' => ['nivel_escolar' => 'nivel_escolar']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'carrera' => 'Carrera',
            'reticula' => 'Reticula',
            'nivel_escolar' => 'Nivel Escolar',
            'clave_oficial' => 'Clave Oficial',
            'nombre_carrera' => 'Nombre Carrera',
            'nombre_reducido' => 'Nombre Reducido',
            'siglas' => 'Siglas',
            'modalidad' => 'Modalidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumnos::className(), ['carrera' => 'carrera']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivelEscolar()
    {
        return $this->hasOne(NivelEscolar::className(), ['nivel_escolar' => 'nivel_escolar']);
    }
}

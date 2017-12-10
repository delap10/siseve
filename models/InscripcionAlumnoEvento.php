<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inscripcion_alumno_evento".
 *
 * @property string $matricula_alumno
 * @property integer $evento
 * @property string $fecha_inscripcion
 *
 * @property Alumnos $matriculaAlumno
 * @property PortadaEvento $evento0
 */
class InscripcionAlumnoEvento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscripcion_alumno_evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula_alumno', 'evento'], 'required'],
            [['evento'], 'integer'],
            [['fecha_inscripcion'], 'safe'],
            [['matricula_alumno'], 'string', 'max' => 10],
            [['matricula_alumno'], 'exist', 'skipOnError' => true, 'targetClass' => Alumnos::className(), 'targetAttribute' => ['matricula_alumno' => 'no_de_control']],
            [['evento'], 'exist', 'skipOnError' => true, 'targetClass' => PortadaEvento::className(), 'targetAttribute' => ['evento' => 'id_portada_evento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'matricula_alumno' => 'Matricula Alumno',
            'evento' => 'Evento',
            'fecha_inscripcion' => 'Fecha Inscripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculaAlumno()
    {
        return $this->hasOne(Alumnos::className(), ['no_de_control' => 'matricula_alumno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvento0()
    {
        return $this->hasOne(PortadaEvento::className(), ['id_portada_evento' => 'evento']);
    }
}

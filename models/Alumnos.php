<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumnos".
 *
 * @property string $no_de_control
 * @property string $carrera
 * @property integer $reticula
 * @property string $especialidad
 * @property string $nivel_escolar
 * @property integer $semestre
 * @property string $estatus_alumno
 * @property string $plan_de_estudios
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $nombre_alumno
 * @property string $curp_alumno
 * @property string $fecha_nacimiento
 * @property string $sexo
 * @property string $tipo_ingreso
 * @property string $periodo_ingreso_it
 * @property string $ultimo_periodo_inscrito
 * @property string $correo_electronico
 * @property integer $nip
 * @property string $fecha_titulacion
 * @property string $opcion_titulacion
 * @property string $periodo_titulacion
 *
 * @property Carreras $carrera0
 * @property PlanesDeEstudio $planDeEstudios
 * @property EstatusAlumno $estatusAlumno
 * @property AsistenciaAlumno[] $asistenciaAlumnos
 * @property InscripcionAlumnoEvento[] $inscripcionAlumnoEventos
 */
class Alumnos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumnos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_de_control', 'plan_de_estudios', 'nombre_alumno', 'tipo_ingreso', 'periodo_ingreso_it'], 'required'],
            [['reticula', 'semestre', 'nip'], 'integer'],
            [['fecha_nacimiento', 'fecha_titulacion'], 'safe'],
            [['tipo_ingreso'], 'number'],
            [['no_de_control'], 'string', 'max' => 10],
            [['carrera', 'estatus_alumno'], 'string', 'max' => 3],
            [['especialidad', 'periodo_ingreso_it', 'ultimo_periodo_inscrito', 'periodo_titulacion'], 'string', 'max' => 5],
            [['nivel_escolar', 'plan_de_estudios', 'sexo'], 'string', 'max' => 1],
            [['apellido_paterno', 'apellido_materno'], 'string', 'max' => 45],
            [['nombre_alumno'], 'string', 'max' => 35],
            [['curp_alumno'], 'string', 'max' => 18],
            [['correo_electronico'], 'string', 'max' => 60],
            [['opcion_titulacion'], 'string', 'max' => 4],
            [['carrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carreras::className(), 'targetAttribute' => ['carrera' => 'carrera']],
            [['plan_de_estudios'], 'exist', 'skipOnError' => true, 'targetClass' => PlanesDeEstudio::className(), 'targetAttribute' => ['plan_de_estudios' => 'plan_de_estudios']],
            [['estatus_alumno'], 'exist', 'skipOnError' => true, 'targetClass' => EstatusAlumno::className(), 'targetAttribute' => ['estatus_alumno' => 'estatus']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'no_de_control' => 'No De Control',
            'carrera' => 'Carrera',
            'reticula' => 'Reticula',
            'especialidad' => 'Especialidad',
            'nivel_escolar' => 'Nivel Escolar',
            'semestre' => 'Semestre',
            'estatus_alumno' => 'Estatus Alumno',
            'plan_de_estudios' => 'Plan De Estudios',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'nombre_alumno' => 'Nombre Alumno',
            'curp_alumno' => 'Curp Alumno',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'sexo' => 'Sexo',
            'tipo_ingreso' => 'Tipo Ingreso',
            'periodo_ingreso_it' => 'Periodo Ingreso It',
            'ultimo_periodo_inscrito' => 'Ultimo Periodo Inscrito',
            'correo_electronico' => 'Correo Electronico',
            'nip' => 'Nip',
            'fecha_titulacion' => 'Fecha Titulacion',
            'opcion_titulacion' => 'Opcion Titulacion',
            'periodo_titulacion' => 'Periodo Titulacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarrera0()
    {
        return $this->hasOne(Carreras::className(), ['carrera' => 'carrera']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanDeEstudios()
    {
        return $this->hasOne(PlanesDeEstudio::className(), ['plan_de_estudios' => 'plan_de_estudios']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstatusAlumno()
    {
        return $this->hasOne(EstatusAlumno::className(), ['estatus' => 'estatus_alumno']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsistenciaAlumnos()
    {
        return $this->hasMany(AsistenciaAlumno::className(), ['matricula_alumno' => 'no_de_control']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcionAlumnoEventos()
    {
        return $this->hasMany(InscripcionAlumnoEvento::className(), ['matricula_alumno' => 'no_de_control']);
    }
}

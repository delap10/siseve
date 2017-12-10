<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portada_evento".
 *
 * @property integer $id_portada_evento
 * @property string $nombre_evento
 * @property string $fecha_registro
 * @property string $coordinador_evento
 * @property string $coordinador_operativo
 * @property string $encargado_informacion
 * @property string $lugar_evento
 * @property string $fecha_inicio_evento
 * @property string $fecha_termino_evento
 * @property string $hora_inicio_evento
 * @property string $hora_termino_evento
 * @property string $objetivo_evento
 * @property string $lema
 * @property integer $activo
 * @property string $estatus
 * @property string $correo_solicitante
 * @property string $tipo_evento
 * @property string $periodo
 *
 * @property Anexo1Difusion[] $anexo1Difusions
 * @property Anexo2Protocolo[] $anexo2Protocolos
 * @property Anexo3Recurso[] $anexo3Recursos
 * @property Anexo4Audiovisual[] $anexo4Audiovisuals
 * @property InscripcionAlumnoEvento[] $inscripcionAlumnoEventos
 * @property TipoEvento $tipoEvento
 * @property PeriodosEscolares $periodo0
 */
class PortadaEvento extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portada_evento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_evento', 'coordinador_evento', 'coordinador_operativo', 'lugar_evento', 'fecha_inicio_evento', 'fecha_termino_evento', 'hora_inicio_evento', 'hora_termino_evento', 'tipo_evento', 'periodo', 'correo_solicitante'], 'required'],
            [['fecha_registro', 'fecha_inicio_evento', 'fecha_termino_evento', 'hora_inicio_evento', 'hora_termino_evento'], 'safe'],
            [['objetivo_evento', 'lema'], 'string'],
            [['activo'], 'integer'],
            [['nombre_evento', 'coordinador_evento', 'coordinador_operativo', 'encargado_informacion'], 'string', 'max' => 100],
            [['correo_solicitante'], 'email'],
            [['lugar_evento'], 'string', 'max' => 50],
            [['estatus'], 'string', 'max' => 45],
            [['tipo_evento'], 'string', 'max' => 10],
            [['periodo'], 'string', 'max' => 5],
            [['tipo_evento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEvento::className(), 'targetAttribute' => ['tipo_evento' => 'id_tipo_evento']],
            [['periodo'], 'exist', 'skipOnError' => true, 'targetClass' => PeriodosEscolares::className(), 'targetAttribute' => ['periodo' => 'periodo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_portada_evento' => 'Id Portada Evento',
            'nombre_evento' => 'Nombre del evento',
            'fecha_registro' => 'Fecha de registro',
            'coordinador_evento' => 'Coordinador del evento',
            'coordinador_operativo' => 'Coordinador operativo',
            'encargado_informacion' => 'Encargado de proporcionar información',
            'lugar_evento' => 'Lugar',
            'fecha_inicio_evento' => 'Fecha de inicio',
            'fecha_termino_evento' => 'Fecha de término',
            'hora_inicio_evento' => 'Hora de inicio',
            'hora_termino_evento' => 'Hora de término',
            'objetivo_evento' => 'Objetivo del vento',
            'lema' => 'Lema',
            'activo' => 'Activo',
            'estatus' => 'Estatus',
            'correo_solicitante' => 'Correo del usuario solicitante',
            'tipo_evento' => 'Tipo Evento',
            'periodo' => 'Periodo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnexo1Difusions()
    {
        return $this->hasMany(Anexo1Difusion::className(), ['id_portada' => 'id_portada_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnexo2Protocolos()
    {
        return $this->hasMany(Anexo2Protocolo::className(), ['id_portada' => 'id_portada_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnexo3Recursos()
    {
        return $this->hasMany(Anexo3Recurso::className(), ['id_portada' => 'id_portada_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnexo4Audiovisuals()
    {
        return $this->hasMany(Anexo4Audiovisual::className(), ['id_portada' => 'id_portada_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcionAlumnoEventos()
    {
        return $this->hasMany(InscripcionAlumnoEvento::className(), ['evento' => 'id_portada_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoEvento()
    {
        return $this->hasOne(TipoEvento::className(), ['id_tipo_evento' => 'tipo_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodo0()
    {
        return $this->hasOne(PeriodosEscolares::className(), ['periodo' => 'periodo']);
    }
}

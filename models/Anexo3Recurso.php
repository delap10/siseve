<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anexo_3_recurso".
 *
 * @property integer $id_anexo_3_recurso
 * @property integer $colocar_letrero
 * @property integer $lona_presidium
 * @property string $organizacion_mesa
 * @property integer $repartir_invitacion
 * @property integer $cantidad_personas
 * @property integer $cantidad_mesas
 * @property integer $cantidad_sillas
 * @property string $color_paño
 * @property integer $cantidad_mesas_adicionales
 * @property integer $cantidad_sillas_adicionales
 * @property string $sonido_interno
 * @property string $instalacion
 * @property integer $cantidad_sillas_auditorio
 * @property integer $cantidad_mesas_refresco
 * @property string $barrer
 * @property string $aspirar
 * @property string $asear_banos
 * @property integer $limpiar_vidrios
 * @property integer $quitar_chicle
 * @property string $tintoreria
 * @property integer $recoger_basura
 * @property string $departamento
 * @property integer $id_portada
 *
 * @property Organigrama $departamento0
 * @property PortadaEvento $idPortada
 * @property Transporte[] $transportes
 */
class Anexo3Recurso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anexo_3_recurso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['colocar_letrero', 'lona_presidium', 'repartir_invitacion', 'cantidad_personas', 'cantidad_mesas', 'cantidad_sillas', 'cantidad_mesas_adicionales', 'cantidad_sillas_adicionales', 'cantidad_sillas_auditorio', 'cantidad_mesas_refresco', 'limpiar_vidrios', 'quitar_chicle', 'recoger_basura', 'id_portada'], 'integer'],
            [['organizacion_mesa'], 'string'],
            [['departamento', 'id_portada'], 'required'],
            [['color_paño'], 'string', 'max' => 30],
            [['sonido_interno', 'tintoreria'], 'string', 'max' => 45],
            [['instalacion', 'barrer', 'aspirar', 'asear_banos'], 'string', 'max' => 100],
            [['departamento'], 'string', 'max' => 6],
            [['departamento'], 'exist', 'skipOnError' => true, 'targetClass' => Organigrama::className(), 'targetAttribute' => ['departamento' => 'clave_area']],
            [['id_portada'], 'exist', 'skipOnError' => true, 'targetClass' => PortadaEvento::className(), 'targetAttribute' => ['id_portada' => 'id_portada_evento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_anexo_3_recurso' => 'Id Anexo 3 Recurso',
            'colocar_letrero' => 'Colocar Letrero',
            'lona_presidium' => 'Colocar lona para Presidium',
            'organizacion_mesa' => 'Organizacion Mesa',
            'repartir_invitacion' => 'Repartir Invitaciones',
            'cantidad_personas' => 'Personas',
            'cantidad_mesas' => 'Mesas',
            'cantidad_sillas' => 'Sillas',
            'color_paño' => 'Paño para Presidium',
            'cantidad_mesas_adicionales' => 'Mesas',
            'cantidad_sillas_adicionales' => 'Sillas',
            'sonido_interno' => 'Sonido Interno',
            'instalacion' => 'Instalacion',
            'cantidad_sillas_auditorio' => 'Sillas para Auditorio',
            'cantidad_mesas_refresco' => 'Mesas para servir refresco',
            'barrer' => 'Barrer',
            'aspirar' => 'Aspirar',
            'asear_banos' => 'Aseo de baños',
            'limpiar_vidrios' => 'Limpiar Vidrios',
            'quitar_chicle' => 'Trapear y quitar chicles',
            'tintoreria' => 'Enviar a la tintorería',
            'recoger_basura' => 'Recoger basura de Cestos que se localizan en pasillos que comunican al evento',
            'departamento' => '',
            'id_portada' => '',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento0()
    {
        return $this->hasOne(Organigrama::className(), ['clave_area' => 'departamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPortada()
    {
        return $this->hasOne(PortadaEvento::className(), ['id_portada_evento' => 'id_portada']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportes()
    {
        return $this->hasMany(Transporte::className(), ['anexo_3' => 'id_anexo_3_recurso']);
    }
}

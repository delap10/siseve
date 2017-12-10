<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anexo_1_difusion".
 *
 * @property integer $id_anexo_1_difusion
 * @property integer $cantidad_fotografias
 * @property string $cobertura
 * @property string $television
 * @property string $prensa
 * @property string $tipo_impresion
 * @property integer $cantidad_duplicados
 * @property integer $cantidad_copias
 * @property string $invitacion_interna
 * @property string $invitacion_externa
 * @property string $departamento
 * @property integer $id_portada
 *
 * @property Organigrama $departamento0
 * @property PortadaEvento $idPortada
 */
class Difusion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anexo_1_difusion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cantidad_fotografias', 'cantidad_duplicados', 'cantidad_copias', 'id_portada'], 'integer'],
            [['departamento', 'id_portada'], 'required'],
            [['cobertura', 'television', 'invitacion_interna', 'invitacion_externa'], 'string', 'max' => 100],
            [['prensa'], 'string', 'max' => 60],
            [['tipo_impresion'], 'string', 'max' => 150],
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
            'id_anexo_1_difusion' => 'Id Anexo 1 Difusion',
            'cantidad_fotografias' => 'Cantidad Fotografias',
            'cobertura' => 'Cobertura',
            'television' => 'Television',
            'prensa' => 'Prensa',
            'tipo_impresion' => 'Tipo Impresion',
            'cantidad_duplicados' => 'Cantidad Duplicados',
            'cantidad_copias' => 'Cantidad Copias',
            'invitacion_interna' => 'Invitacion Interna',
            'invitacion_externa' => 'Invitacion Externa',
            'departamento' => 'Departamento',
            'id_portada' => 'Id Portada',
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
}

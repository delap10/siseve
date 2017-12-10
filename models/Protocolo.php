<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anexo_2_protocolo".
 *
 * @property integer $id_anexo_2_protocolo
 * @property string $leyenda_lona
 * @property string $recepcion
 * @property string $honores_bandera
 * @property string $centro_informacion
 * @property string $atencion_presidium
 * @property string $departamento
 * @property integer $id_portada
 *
 * @property Organigrama $departamento0
 * @property PortadaEvento $idPortada
 */
class Protocolo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anexo_2_protocolo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['leyenda_lona'], 'string'],
            [['departamento', 'id_portada'], 'required'],
            [['id_portada'], 'integer'],
            [['recepcion', 'honores_bandera', 'centro_informacion', 'atencion_presidium'], 'string', 'max' => 100],
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
            'id_anexo_2_protocolo' => 'Id Anexo 2 Protocolo',
            'leyenda_lona' => 'IV. LEYENDA PARA LONA',
            'recepcion' => 'Recepción',
            'honores_bandera' => 'Honores a la Bandera',
            'centro_informacion' => 'Centro de Información',
            'atencion_presidium' => 'Atención al Presidium',
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
}

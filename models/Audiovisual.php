<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anexo_4_audiovisual".
 *
 * @property integer $id_anexo_4_audiovisual
 * @property string $equipo_audiovisual
 * @property string $equipo_computo
 * @property string $departamento
 * @property integer $id_portada
 *
 * @property Organigrama $departamento0
 * @property PortadaEvento $idPortada
 */
class Audiovisual extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anexo_4_audiovisual';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departamento', 'id_portada'], 'required'],
            [['id_portada'], 'integer'],
            [['equipo_audiovisual', 'equipo_computo'], 'string', 'max' => 100],
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
            'id_anexo_4_audiovisual' => 'Id Anexo 4 Audiovisual',
            'equipo_audiovisual' => 'Equipo Audiovisual',
            'equipo_computo' => 'Equipo Computo',
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

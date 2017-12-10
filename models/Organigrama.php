<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organigrama".
 *
 * @property string $clave_area
 * @property string $descripcion_area
 * @property string $area_depende
 * @property string $nivel
 * @property string $tipo_area
 * @property string $p_sustantivos
 * @property string $pro_sus
 * @property string $p_sus
 * @property string $p_s
 * @property string $extension
 * @property string $siglas
 *
 * @property Anexo1Difusion[] $anexo1Difusions
 * @property Anexo2Protocolo[] $anexo2Protocolos
 * @property Anexo3Recurso[] $anexo3Recursos
 * @property Anexo4Audiovisual[] $anexo4Audiovisuals
 * @property NivelAreas $nivel0
 * @property Personal[] $personals
 */
class Organigrama extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organigrama';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clave_area', 'nivel'], 'required'],
            [['clave_area', 'area_depende'], 'string', 'max' => 6],
            [['descripcion_area'], 'string', 'max' => 200],
            [['nivel', 'tipo_area'], 'string', 'max' => 1],
            [['p_sustantivos', 'pro_sus', 'p_sus', 'p_s'], 'string', 'max' => 20],
            [['extension', 'siglas'], 'string', 'max' => 3],
            [['nivel'], 'exist', 'skipOnError' => true, 'targetClass' => NivelAreas::className(), 'targetAttribute' => ['nivel' => 'nivel']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clave_area' => 'Clave Area',
            'descripcion_area' => 'Descripcion Area',
            'area_depende' => 'Area Depende',
            'nivel' => 'Nivel',
            'tipo_area' => 'Tipo Area',
            'p_sustantivos' => 'P Sustantivos',
            'pro_sus' => 'Pro Sus',
            'p_sus' => 'P Sus',
            'p_s' => 'P S',
            'extension' => 'Extension',
            'siglas' => 'Siglas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnexo1Difusions()
    {
        return $this->hasMany(Anexo1Difusion::className(), ['departamento' => 'clave_area']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnexo2Protocolos()
    {
        return $this->hasMany(Anexo2Protocolo::className(), ['departamento' => 'clave_area']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnexo3Recursos()
    {
        return $this->hasMany(Anexo3Recurso::className(), ['departamento' => 'clave_area']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnexo4Audiovisuals()
    {
        return $this->hasMany(Anexo4Audiovisual::className(), ['departamento' => 'clave_area']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivel0()
    {
        return $this->hasOne(NivelAreas::className(), ['nivel' => 'nivel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonals()
    {
        return $this->hasMany(Personal::className(), ['clave_area' => 'clave_area']);
    }
}

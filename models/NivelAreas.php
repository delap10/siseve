<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nivel_areas".
 *
 * @property string $nivel
 * @property string $descripcion_nivel_area
 *
 * @property Organigrama[] $organigramas
 */
class NivelAreas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nivel_areas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nivel'], 'required'],
            [['nivel'], 'string', 'max' => 1],
            [['descripcion_nivel_area'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nivel' => 'Nivel',
            'descripcion_nivel_area' => 'Descripcion Nivel Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganigramas()
    {
        return $this->hasMany(Organigrama::className(), ['nivel' => 'nivel']);
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Protocolo;

/**
 * ProtocoloSearch represents the model behind the search form about `app\models\Protocolo`.
 */
class ProtocoloSearch extends Protocolo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_anexo_2_protocolo', 'id_portada'], 'integer'],
            [['leyenda_lona', 'recepcion', 'honores_bandera', 'centro_informacion', 'atencion_presidium', 'departamento'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Protocolo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_anexo_2_protocolo' => $this->id_anexo_2_protocolo,
            'id_portada' => $this->id_portada,
        ]);

        $query->andFilterWhere(['like', 'leyenda_lona', $this->leyenda_lona])
            ->andFilterWhere(['like', 'recepcion', $this->recepcion])
            ->andFilterWhere(['like', 'honores_bandera', $this->honores_bandera])
            ->andFilterWhere(['like', 'centro_informacion', $this->centro_informacion])
            ->andFilterWhere(['like', 'atencion_presidium', $this->atencion_presidium])
            ->andFilterWhere(['like', 'departamento', $this->departamento]);

        return $dataProvider;
    }
}

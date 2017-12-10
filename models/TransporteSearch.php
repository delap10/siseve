<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transporte;

/**
 * TransporteSearch represents the model behind the search form about `app\models\Transporte`.
 */
class TransporteSearch extends Transporte
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_transporte', 'cantidad', 'vales_gasolina', 'importe', 'anexo_3'], 'integer'],
            [['transportar', 'tipo_transporte'], 'safe'],
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
        $query = Transporte::find();

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
            'id_transporte' => $this->id_transporte,
            'cantidad' => $this->cantidad,
            'vales_gasolina' => $this->vales_gasolina,
            'importe' => $this->importe,
            'anexo_3' => $this->anexo_3,
        ]);

        $query->andFilterWhere(['like', 'transportar', $this->transportar])
            ->andFilterWhere(['like', 'tipo_transporte', $this->tipo_transporte]);

        return $dataProvider;
    }
}

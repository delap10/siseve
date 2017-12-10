<?php

namespace app\Models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\Models\Difusion;

/**
 * DifusionSearch represents the model behind the search form about `app\Models\Difusion`.
 */
class DifusionSearch extends Difusion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_anexo_1_difusion', 'cantidad_fotografias', 'cantidad_duplicados', 'cantidad_copias', 'id_portada'], 'integer'],
            [['cobertura', 'television', 'prensa', 'tipo_impresion', 'invitacion_interna', 'invitacion_externa', 'departamento'], 'safe'],
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
        $query = Difusion::find();

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
            'id_anexo_1_difusion' => $this->id_anexo_1_difusion,
            'cantidad_fotografias' => $this->cantidad_fotografias,
            'cantidad_duplicados' => $this->cantidad_duplicados,
            'cantidad_copias' => $this->cantidad_copias,
            'id_portada' => $this->id_portada,
        ]);

        $query->andFilterWhere(['like', 'cobertura', $this->cobertura])
            ->andFilterWhere(['like', 'television', $this->television])
            ->andFilterWhere(['like', 'prensa', $this->prensa])
            ->andFilterWhere(['like', 'tipo_impresion', $this->tipo_impresion])
            ->andFilterWhere(['like', 'invitacion_interna', $this->invitacion_interna])
            ->andFilterWhere(['like', 'invitacion_externa', $this->invitacion_externa])
            ->andFilterWhere(['like', 'departamento', $this->departamento]);

        return $dataProvider;
    }
}

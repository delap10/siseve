<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Audiovisual;

/**
 * AudiovisualSearch represents the model behind the search form about `app\models\Audiovisual`.
 */
class AudiovisualSearch extends Audiovisual
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_anexo_4_audiovisual', 'id_portada'], 'integer'],
            [['equipo_audiovisual', 'equipo_computo', 'departamento'], 'safe'],
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
        $query = Audiovisual::find();

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
            'id_anexo_4_audiovisual' => $this->id_anexo_4_audiovisual,
            'id_portada' => $this->id_portada,
        ]);

        $query->andFilterWhere(['like', 'equipo_audiovisual', $this->equipo_audiovisual])
            ->andFilterWhere(['like', 'equipo_computo', $this->equipo_computo])
            ->andFilterWhere(['like', 'departamento', $this->departamento]);

        return $dataProvider;
    }
}

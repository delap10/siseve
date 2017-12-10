<?php

namespace app\Models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\Models\PortadaEvento;

/**
 * PortadaEventoSearch represents the model behind the search form about `app\Models\PortadaEvento`.
 */
class PortadaEventoSearch extends PortadaEvento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_portada_evento', 'activo'], 'integer'],
            [['nombre_evento', 'fecha_registro', 'coordinador_evento', 'coordinador_operativo', 'encargado_informacion', 'lugar_evento', 'fecha_inicio_evento', 'fecha_termino_evento', 'hora_inicio_evento', 'hora_termino_evento', 'objetivo_evento', 'lema', 'estatus', 'correo_solicitante', 'tipo_evento', 'periodo'], 'safe'],
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
        $query = PortadaEvento::find();

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
            'id_portada_evento' => $this->id_portada_evento,
            'fecha_registro' => $this->fecha_registro,
            'fecha_inicio_evento' => $this->fecha_inicio_evento,
            'fecha_termino_evento' => $this->fecha_termino_evento,
            'hora_inicio_evento' => $this->hora_inicio_evento,
            'hora_termino_evento' => $this->hora_termino_evento,
            'activo' => PortadaEvento::STATUS_ACTIVE,
        ]);

        $query->andFilterWhere(['like', 'nombre_evento', $this->nombre_evento])
            ->andFilterWhere(['like', 'coordinador_evento', $this->coordinador_evento])
            ->andFilterWhere(['like', 'coordinador_operativo', $this->coordinador_operativo])
            ->andFilterWhere(['like', 'encargado_informacion', $this->encargado_informacion])
            ->andFilterWhere(['like', 'lugar_evento', $this->lugar_evento])
            ->andFilterWhere(['like', 'objetivo_evento', $this->objetivo_evento])
            ->andFilterWhere(['like', 'lema', $this->lema])
            ->andFilterWhere(['like', 'estatus', $this->estatus])
            ->andFilterWhere(['like', 'correo_solicitante', $this->correo_solicitante])
            ->andFilterWhere(['like', 'tipo_evento', $this->tipo_evento])
            ->andFilterWhere(['like', 'periodo', $this->periodo]);

        return $dataProvider;
    }
}

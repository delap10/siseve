<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Anexo3Recurso;

/**
 * Anexo3RecursoSearch represents the model behind the search form about `app\models\Anexo3Recurso`.
 */
class Anexo3RecursoSearch extends Anexo3Recurso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_anexo_3_recurso', 'colocar_letrero', 'lona_presidium', 'repartir_invitacion', 'cantidad_personas', 'cantidad_mesas', 'cantidad_sillas', 'cantidad_mesas_adicionales', 'cantidad_sillas_adicionales', 'cantidad_sillas_auditorio', 'cantidad_mesas_refresco', 'limpiar_vidrios', 'quitar_chicle', 'recoger_basura', 'id_portada'], 'integer'],
            [['organizacion_mesa', 'color_paño', 'sonido_interno', 'instalacion', 'barrer', 'aspirar', 'asear_banos', 'tintoreria', 'departamento'], 'safe'],
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
        $query = Anexo3Recurso::find();

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
            'id_anexo_3_recurso' => $this->id_anexo_3_recurso,
            'colocar_letrero' => $this->colocar_letrero,
            'lona_presidium' => $this->lona_presidium,
            'repartir_invitacion' => $this->repartir_invitacion,
            'cantidad_personas' => $this->cantidad_personas,
            'cantidad_mesas' => $this->cantidad_mesas,
            'cantidad_sillas' => $this->cantidad_sillas,
            'cantidad_mesas_adicionales' => $this->cantidad_mesas_adicionales,
            'cantidad_sillas_adicionales' => $this->cantidad_sillas_adicionales,
            'cantidad_sillas_auditorio' => $this->cantidad_sillas_auditorio,
            'cantidad_mesas_refresco' => $this->cantidad_mesas_refresco,
            'limpiar_vidrios' => $this->limpiar_vidrios,
            'quitar_chicle' => $this->quitar_chicle,
            'recoger_basura' => $this->recoger_basura,
            'id_portada' => $this->id_portada,
        ]);

        $query->andFilterWhere(['like', 'organizacion_mesa', $this->organizacion_mesa])
            ->andFilterWhere(['like', 'color_paño', $this->color_paño])
            ->andFilterWhere(['like', 'sonido_interno', $this->sonido_interno])
            ->andFilterWhere(['like', 'instalacion', $this->instalacion])
            ->andFilterWhere(['like', 'barrer', $this->barrer])
            ->andFilterWhere(['like', 'aspirar', $this->aspirar])
            ->andFilterWhere(['like', 'asear_banos', $this->asear_banos])
            ->andFilterWhere(['like', 'tintoreria', $this->tintoreria])
            ->andFilterWhere(['like', 'departamento', $this->departamento]);

        return $dataProvider;
    }
}

<?php

namespace app\controllers;

use Yii;
use yii\db\Query;
use app\models\PortadaEvento;
use app\models\PortadaEventoSearch;
use app\models\Difusion;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PortadaController implements the CRUD actions for PortadaEvento model.
 */
class PortadaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PortadaEvento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PortadaEventoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'eventos' => $this->AllEventos(),
        ]);
    }

    /**
     * Displays a single PortadaEvento model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PortadaEvento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PortadaEvento();
        $modelDifusion = new Difusion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id_portada_evento]);
            $id_portada = $model->id_portada_evento;
            return $this->redirect(['difusion/create', 'p' => base64_encode($id_portada)]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PortadaEvento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_portada_evento]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PortadaEvento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PortadaEvento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PortadaEvento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PortadaEvento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function AllEventos(){
        $query = new Query;
        $query->select(['id_portada_evento', 'nombre_evento', 'encargado_informacion', 'lugar_evento', 'fecha_inicio_evento', 'fecha_termino_evento', 'hora_inicio_evento', 'hora_termino_evento', 'tipo_evento' => 'b.tipo_evento' , 'objetivo_evento', 'inscritos' => 'COUNT(c.evento)'])
            ->from(['a' => 'portada_evento'])
            ->join('INNER JOIN', 'tipo_evento b', 'a.tipo_evento = b.id_tipo_evento', [])
            ->join('LEFT JOIN', 'inscripcion_alumno_evento c', 'a.id_portada_evento = c.evento', [])
            ->where(['activo' => PortadaEvento::STATUS_ACTIVE])
            ->groupBy(['id_portada_evento']);

        $command = $query->createCommand();

        return $command->queryAll();
    }

    public function actionTerminar($v){
        $model = $this->findModel($v);

        if($model->load(Yii::$app->request->post(),'')){
            $query = new Query;
            $query->createCommand()
                ->update('portada_evento', ['activo' => PortadaEvento::STATUS_INACTIVE], ['id_portada_evento' => $v])
                ->execute();
            return $this->redirect(['view', 'id' => $model->id_portada_evento]);
        }
    }

    public function actionStatus($v){
        $model = $this->findModel($v);

        if($model->load(Yii::$app->request->post(),'')){
            $query = new Query;
            $query->createCommand()
                ->update('portada_evento', ['estatus' => Yii::$app->request->post('estatus')], ['id_portada_evento' => $v])
                ->execute();
            return $this->redirect(['view', 'id' => $model->id_portada_evento]);
        }
    }
}

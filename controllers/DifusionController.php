<?php

namespace app\controllers;

use Yii;
use app\models\Difusion;
use app\models\DifusionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\PortadaEvento;

/**
 * DifusionController implements the CRUD actions for Difusion model.
 */
class DifusionController extends Controller
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
     * Lists all Difusion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DifusionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Difusion model.
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
     * Creates a new Difusion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Difusion();
        $modelPortada = new PortadaEvento();

        if ($model->load(Yii::$app->request->post())) {
            $cobertura = $this->getCheckBoxList($_POST['Difusion']['cobertura']);
            $television = $this->getCheckBoxList($_POST['Difusion']['television']);
            $prensa = $this->getCheckBoxList($_POST['Difusion']['prensa']);
            $tipo_impresion = $this->getCheckBoxList($_POST['Difusion']['tipo_impresion']);
            $invitacion_interna = $this->getCheckBoxList($_POST['Difusion']['invitacion_interna']);
            $invitacion_externa = $this->getCheckBoxList($_POST['Difusion']['invitacion_externa']);
            
            //Guardar los datos en la tabla
            $model->cantidad_fotografias = $_POST['Difusion']['cantidad_fotografias'];
            $model->cobertura = $cobertura;
            $model->television = $television;
            $model->prensa = $prensa;
            $model->tipo_impresion = $tipo_impresion;
            $model->cantidad_duplicados = $_POST['Difusion']['cantidad_duplicados'];
            $model->cantidad_copias = $_POST['Difusion']['cantidad_copias'];
            $model->invitacion_interna = $invitacion_interna;
            $model->invitacion_externa = $invitacion_externa;
            $model->departamento = $_POST['Difusion']['departamento'];
            $model->id_portada = $_POST['Difusion']['id_portada'];

            if($model->save()){
                return $this->redirect(['protocolo/create', 
                    'p' => base64_encode($model->id_portada)]
                );
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Difusion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_anexo_1_difusion]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Difusion model.
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
     * Finds the Difusion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Difusion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Difusion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function getCheckBoxList($method){
        $selected = '';
        if($method == '' || $method == null){
            return "";
        }else{
            $num_options = count($method);
            $current = 0;
            foreach ($method as $key => $value) {
                if ($current != $num_options-1)
                    $selected .= $value.', ';
                else
                    $selected .= $value;
                $current++;
            }
        }

        return $selected;
    }
}

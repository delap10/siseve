<?php

namespace app\controllers;

use Yii;
use app\models\Anexo3Recurso;
use app\models\Anexo3RecursoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\DifusionController;

/**
 * RecursoController implements the CRUD actions for Anexo3Recurso model.
 */
class RecursoController extends Controller
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
     * Lists all Anexo3Recurso models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Anexo3RecursoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anexo3Recurso model.
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
     * Creates a new Anexo3Recurso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Anexo3Recurso();

        if ($model->load(Yii::$app->request->post())) {
            //Guardar las opciones seleccionadas de los checkbox
            $sonido_interno = DifusionController::getCheckBoxList($_POST['Anexo3Recurso']['sonido_interno']);
            $instalacion = DifusionController::getCheckBoxList($_POST['Anexo3Recurso']['instalacion']);
            $barrer_lugares = DifusionController::getCheckBoxList($_POST['Anexo3Recurso']['barrer']);
            $aspirar_lugares = DifusionController::getCheckBoxList($_POST['Anexo3Recurso']['aspirar']);
            $asear_baños = DifusionController::getCheckBoxList($_POST['Anexo3Recurso']['asear_banos']);
            $tintoreria = DifusionController::getCheckBoxList($_POST['Anexo3Recurso']['tintoreria']);
            
            //Guardar datos
            $model->colocar_letrero = $_POST['Anexo3Recurso']['colocar_letrero'];
            $model->lona_presidium = $_POST['Anexo3Recurso']['lona_presidium'];
            $model->organizacion_mesa = $_POST['Anexo3Recurso']['organizacion_mesa'];
            $model->repartir_invitacion = $_POST['Anexo3Recurso']['repartir_invitacion'];
            $model->cantidad_personas = $_POST['Anexo3Recurso']['cantidad_personas'];
            $model->cantidad_mesas = $_POST['Anexo3Recurso']['cantidad_mesas'];
            $model->cantidad_sillas = $_POST['Anexo3Recurso']['cantidad_sillas'];
            $model->color_paño = $_POST['Anexo3Recurso']['color_paño'];
            $model->cantidad_mesas_adicionales = $_POST['Anexo3Recurso']['cantidad_mesas_adicionales'];
            $model->cantidad_sillas_adicionales = $_POST['Anexo3Recurso']['cantidad_sillas_adicionales'];
            $model->sonido_interno = $sonido_interno;
            $model->instalacion = $instalacion;
            $model->cantidad_sillas_auditorio = $_POST['Anexo3Recurso']['cantidad_sillas_auditorio'];
            $model->cantidad_mesas_refresco = $_POST['Anexo3Recurso']['cantidad_mesas_refresco'];
            $model->barrer = $barrer_lugares;
            $model->aspirar = $aspirar_lugares;
            $model->asear_banos = $asear_baños;
            $model->limpiar_vidrios = $_POST['Anexo3Recurso']['limpiar_vidrios'];
            $model->quitar_chicle = $_POST['Anexo3Recurso']['quitar_chicle'];
            $model->tintoreria = $tintoreria;
            $model->recoger_basura = $_POST['Anexo3Recurso']['recoger_basura'];
            $model->departamento = $_POST['Anexo3Recurso']['departamento'];
            $model->id_portada = $_POST['Anexo3Recurso']['id_portada'];

            if($model->save()){
                //return $this->redirect(['view', 'id' => $model->id_anexo_3_recurso]);
                return $this->redirect(['transporte/create',
                    'a' => base64_encode($model->id_anexo_3_recurso),
                    'p' => base64_encode($model->id_portada),
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Anexo3Recurso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_anexo_3_recurso]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Anexo3Recurso model.
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
     * Finds the Anexo3Recurso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anexo3Recurso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anexo3Recurso::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

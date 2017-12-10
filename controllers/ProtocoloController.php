<?php

namespace app\controllers;

use Yii;
use app\models\Protocolo;
use app\models\ProtocoloSearch;
use app\controllers\DifusionController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProtocoloController implements the CRUD actions for Protocolo model.
 */
class ProtocoloController extends Controller
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
     * Lists all Protocolo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProtocoloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Protocolo model.
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
     * Creates a new Protocolo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Protocolo();

        if ($model->load(Yii::$app->request->post())) {
            //Agregar las opciones selecionadas de los checkbox en un String
            $recepcion = DifusionController::getCheckBoxList($_POST['Protocolo']['recepcion']);
            $honores_bandera = DifusionController::getCheckBoxList($_POST['Protocolo']['honores_bandera']);
            $centro_informacion = DifusionController::getCheckBoxList($_POST['Protocolo']['centro_informacion']);
            $atencion_presidium = DifusionController::getCheckBoxList($_POST['Protocolo']['atencion_presidium']);

            //Guardar los datos
            $model->leyenda_lona = $_POST['Protocolo']['leyenda_lona'];
            $model->recepcion = $recepcion;
            $model->honores_bandera = $honores_bandera;
            $model->centro_informacion = $centro_informacion;
            $model->atencion_presidium = $atencion_presidium;
            $model->departamento = $_POST['Protocolo']['departamento'];
            $model->id_portada = $_POST['Protocolo']['id_portada'];
            //Verificar si guarda los datos
            if($model->save()){
                //return $this->redirect(['view', 'id' => $model->id_anexo_2_protocolo]);
                return $this->redirect(['recurso/create', 
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
     * Updates an existing Protocolo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_anexo_2_protocolo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Protocolo model.
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
     * Finds the Protocolo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Protocolo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Protocolo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\Transporte;
use app\models\TransporteSearch;
use app\controllers\DifusionController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransporteController implements the CRUD actions for Transporte model.
 */
class TransporteController extends Controller
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
     * Lists all Transporte models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransporteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transporte model.
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
     * Creates a new Transporte model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Transporte();

        if ($model->load(Yii::$app->request->post())) {
            //Recoger opciones selecionadas en checkbox
            $transportar = DifusionController::getCheckBoxList($_POST['Transporte']['transportar']);

            //Guardar datos
            $model->transportar = $transportar;
            $model->cantidad = $_POST['Transporte']['cantidad'];
            $model->vales_gasolina = $_POST['Transporte']['vales_gasolina'];
            $model->importe = $_POST['Transporte']['importe'];
            $model->tipo_transporte = $_POST['Transporte']['tipo_transporte'];
            $model->anexo_3 = $_POST['Transporte']['anexo_3'];
            
            //Verificar inserción
            if($model->save()){
                //return $this->redirect(['view', 'id' => $model->id_transporte]);
                return $this->redirect(['audiovisual/create', 
                    'id_portada' => $_POST['id_portada']
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Transporte model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_transporte]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Transporte model.
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
     * Finds the Transporte model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transporte the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transporte::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

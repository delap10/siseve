<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\AgregarForm;
use app\models\PortadaEvento;
use yii\widgets\ActiveForm;
use yii\swiftmailer\Mailer;
use yii\swiftmailer\Message;
use Swift_Attachment;
use Swift_Message;
use Swift_MailTransport;
use Swift_Mailer;
use Swift_SmtpTransport;
use Mpdf;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAgregar(){
        $model = new AgregarForm();
        $mensaje = null;
        $mensaje_error = null;

        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                $mensaje = "Correcto";
                $model->nombre_evento = null;
            }else{
                $mensaje_error = $model->getErrors();
            }
        }

        return $this->render('agregar', ['model' => $model, 'mensaje' => $mensaje, 'mensaje_error' => $mensaje_error]);
    }

    public function actionImprimir(){
    	$baseUrl = '../web';
        $mpdf = new \Mpdf\Mpdf();

        //Asignar marca de agua
        $mpdf->SetWatermarkImage($baseUrl.'/img/logos/escudo.jpg', 0.2, 'F');
        $mpdf->showWatermarkImage = true; //Mostrar marca en el documento

        //Agregar hoja de estilo al documento
        $styleSheet = file_get_contents($baseUrl.'/assets/d40973a9/css/bootstrap.min.css');
        $mpdf->writeHTML($styleSheet, 1);//Asignar la hoja de estilo
        
        //Margen top automático estableciendo distancia fija
        $mpdf->setAutoTopMargin = 'pad';
        
        //Agregar encabezado con imágenes en HTML
        $mpdf->setHTMLHeader('
                <div class = "container text-center"><img src = "'.$baseUrl.'/img/logos/BannerITT.jpg'.'">
            ');

        //Contenido del documento
        $mpdf->writeHTML('
            <head>
                <meta charset="utf-8">
            </head>
            <body>
                <div class="container">
                    <h1 class="text-center">SOLICITUD DE COLABORACIÓN</h1>
                    <br><br>
                    <div>
                        <p class="text-left">Departamento de Comunicación y difusión</p>
                    </div>
                    <br><br>
                    <div style="text-align:justify;">
                        <p>La administración es una actividad que es de gran utilidad para tener una organización y control muy eficiente sobre los recursos que se necesita administrar. Al tener todo gestionado, se garantiza que los datos son verídicos, se impone un control total sobre ellos y se logra una eficiencia y eficacia mayor que se refleja en los resultados.</p>

                        <p>Esta práctica dentro de una institución muchas veces es atribuida a un departamento específico, el cual se encarga de llevar la administración total de la empresa, gestionando cada uno de los recursos que se involucran en cada una de las actividades que se realizan.</p>

                        <p>La idea de aplicar métodos de administración es para tener un mejor control sobre los procesos que se realizan. En el caso de los eventos, garantiza un mejor control en cuanto a los datos que se manejan, ayudando a tener una mayor organización y reducir el tiempo de consulta de datos específicos.</p>

                        <p>Tener un sitio específico, en el cual contenga los eventos que se llevan a cabo, sirve para aumentar la organización y administración del flujo de datos. Ayudando, también, a dar mayor rapidez para consultar y haciendo el proceso de registro más simple que como se hace tradicionalmente.</p>
                    </div>
                </div>
            </body>
        ',2);

        $content = $mpdf->Output('', 'S');

        Yii::$app->mailer->compose()
            ->setFrom(['richieux@gmail.com' => 'Ricardo de la Parra'])
            ->setTo(['iori_zero@hotmail.com' => 'Empresa'])
            ->setSubject('Nuevo solicitud de evento registrada')
            ->attachContent($content, ['fileName' => 'filename.pdf', 'contentType' => 'application/pdf'])
            ->send();

        // Then, you can send PDF to the browser*/
        $mpdf->Output($baseUrl.'/pdf/'.date('Y-m-d').'.pdf', \Mpdf\Output\Destination::FILE);
    }
}

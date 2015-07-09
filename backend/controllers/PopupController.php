<?php
namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\Response;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\filters\AccessControl;
use yii\authclient\AuthAction;
use yii\authclient\ClientInterface;
use yii\helpers\BaseFileHelper;

class PopupController extends Controller
{
	public function actionIndex(){
		echo 'xxsssssx';
		return $this->render('index');
	}
}

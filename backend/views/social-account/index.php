<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SocialAccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Social Accounts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-account-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
         <?= Html::button(Yii::t('app', 'Create Modal'), ['value'=>Url::to(['/social-account/create']),'id'=>'button-create','class' => 'btn btn-success']) ?>
         <?= Html::a(Yii::t('app', 'Create Social Account'),['/social-account/create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'provider',
            'client_id',
            'data:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php
use yii\bootstrap\Modal;
Modal::begin([
    'id'=>'modal-create',
    'header' => '<h2>Hello world</h2>',
    'toggleButton' => ['label' => 'click me'],
    'size'=>'modal-lg'
]);

echo '<div id="modal-socialAccount-content"></div>';

Modal::end();

?>
<?php Pjax::end(); ?>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h2><?= Html::encode($var) ?></h2>

<?php foreach($arr as $surname): ?>
    <h3><?= $surname ?></h3>
<?php endforeach; ?>
    <br>
<?php if(Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Данные добавлены</strong>
    </div>
<?php endif; ?> 
   
<?php if(Yii::$app->session->hasFlash('contactFormError')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Ошибка</strong>
    </div>
<?php endif; ?>

<?php $form = ActiveForm::begin(['options' => ['id' => 'testForm']]); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success', 'name' => 'contact-button']) ?>
    </div>
<?php ActiveForm::end(); ?>
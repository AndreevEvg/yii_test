<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1><?= Html::encode($var) ?></h1>

<?php foreach($names as $name): ?>
<ul>
    <li><?= Html::encode($name) ?></li>
</ul>
<?php endforeach; ?>

<?php $form = ActiveForm::begin(['options' => ['id' => 'testForm']]); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success', 'name' => 'contact-button']) ?>
    </div>
<?php ActiveForm::end(); ?>

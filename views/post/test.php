<?php
use yii\helpers\Html;
?>

<h1><?= Html::encode($var) ?></h1>

<?php foreach($names as $name): ?>
<ul>
    <li><?= Html::encode($name) ?></li>
</ul>
<?php endforeach; ?>

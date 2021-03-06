<?php
use hipanel\helpers\Url;
use hipanel\widgets\ArraySpoiler;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<?php $form = ActiveForm::begin([
    'id' => 'bulk-enable-block-form',
    'action' => Url::toRoute('bulk-enable-block'),
    'enableAjaxValidation' => false,
]) ?>

    <div class="callout callout-warning">
        <h4><?= Yii::t('hipanel:hosting', 'This will block access to the website from the world!') ?></h4>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><?= Yii::t('hipanel:hosting', 'Affected domains') ?></div>
        <div class="panel-body">
            <?= ArraySpoiler::widget([
                'data' => $models,
                'visibleCount' => count($models),
                'formatter' => function ($model) {
                    return $model->domain;
                },
                'delimiter' => ',&nbsp; '
            ]); ?>
        </div>
    </div>

<?php foreach ($models as $item) : ?>
    <?= Html::activeHiddenInput($item, "[$item->id]id") ?>
    <?= Html::activeHiddenInput($item, "[$item->id]domain") ?>
<?php endforeach; ?>

    <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'type')->dropDownList($blockReasons, [
                    'id' => 'domain-block-type',
                    'name' => 'type'
                ]); ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'comment')->textInput([
                    'id' => 'domain-block-comment',
                    'name' => 'comment'
                ]); ?>
            </div>
    </div>

    <hr>
<?= Html::submitButton(Yii::t('hipanel', 'Block'), ['class' => 'btn btn-danger']) ?>

<?php ActiveForm::end() ?>

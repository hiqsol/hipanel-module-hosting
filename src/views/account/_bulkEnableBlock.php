<?php

use hipanel\widgets\BulkOperation;

echo BulkOperation::widget([
    'model' => $model,
    'models' => $models,
    'scenario' => 'enable-block',
    'affectedObjects' => Yii::t('hipanel:hosting', 'Affected accounts'),
    'formatterField' => 'login',
    'bodyWarning' => Yii::t('hipanel:hosting', 'This will immediately terminate SSH sessions and reject new SSH and FTP connections!'),
    'hiddenInputs' => ['id', 'login'],
    'visibleInputs' => ['comment'],
    'submitButton' => Yii::t('hipanel', 'Enable block'),
    'submitButtonOptions' => ['class' => 'btn btn-danger'],
    'dropDownInputs' => ['type' => $blockReasons ],
]);


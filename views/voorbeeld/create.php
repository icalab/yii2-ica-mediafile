<?php

/* @var $this yii\web\View */
/* @var $model icalab\mediafile\models\Mediafile */
use yii\helpers\Url;
use icalab\mediafile\MediafileModule;

$this->title = MediafileModule::t('mediafile', 'Create new media file');

$this->params['breadcrumbs'][] = [
    'label' => MediafileModule::t('mediafile', 'Media files'),
        'url' => Url::toRoute(['mediafile/index']),];
$this->params['breadcrumbs'][] = MediafileModule::t('mediafile', 'New media file');

?>

<div class="mediafile-update">
<?= $this->render('_form', ['model' => $model]); ?>
</div>



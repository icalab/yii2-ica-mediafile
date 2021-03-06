<?php
namespace icalab\mediafile\models;

use Yii;
use yii\db\ActiveRecord;
use icalab\mediafile\MediafileModule;

/**
 * Model for the mediafiletype table.
 * @property integer $id
 * @property string $name
 * @property string $mimetype
 * @property string $extension
 */
class Mediafiletype extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%mediafiletype}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mimetype', 'extension'], 'required'],
            ['name', 'unique'],
            ['mimetype', 'unique'],
            ['extension', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('mediafile', 'Name'),
        'mimetype' => Yii::t('mediafile', 'MIME type'),
        'extension' => Yii::t('mediafile', 'Extension'),
    ];
    }




}

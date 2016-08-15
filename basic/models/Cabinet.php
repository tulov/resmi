<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cabinets".
 *
 * @property integer $id
 * @property string $number
 *
 * @property Doctor[] $doctors
 */
class Cabinet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cabinets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['cabinet_id' => 'id']);
    }
}

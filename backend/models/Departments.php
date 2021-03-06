<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property integer $id
 * @property integer $branch_id
 * @property string $name
 * @property integer $company_id
 * @property string $created_date
 * @property string $status
 *
 * @property Branches $branch
 * @property Companies $company
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_id', 'name', 'company_id', 'created_date', 'status'], 'required'],
            [['branch_id', 'company_id'], 'integer'],
            [['created_date'], 'safe'],
            [['status'], 'string'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'branch_id' => 'Branch ID',
            'name' => 'Name',
            'company_id' => 'Company ID',
            'created_date' => 'Created Date',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branches::className(), ['id' => 'branch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'company_id']);
    }
}

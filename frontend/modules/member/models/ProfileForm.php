<?php
namespace frontend\modules\member\models;

use Yii;
use yii\helpers\Html;
use yii\base\Model;
use app\components\Constants;
use common\models\Member;
/**
 * Post form
 */

class ProfileForm extends Model
{
	
    public $firstname;
    public $lastname;
	  
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        
			['firstname', 'required'],
            ['firstname', 'filter', 'filter' => 'trim'],
            ['firstname', 'string', 'max' => 50],

            ['lastname', 'filter', 'filter' => 'trim'],
            ['lastname', 'string', 'max' => 50],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function update($id)
    {
        if ($this->validate()) {
            $update = Member::findOne($id);
            $update->firstname = trim(strip_tags($this->firstname));
            $update->lastname = trim(strip_tags($this->lastname));
            if ($update->save(false)) {
               return true;
            }
        }
        return null;
    }

    public function getmember($id)
    {
        return Member::findOne($id);
    }

	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'firstname' => 'Nama Depan',
            'lastname' => 'Nama Belakang',
        ];
    }
	
}

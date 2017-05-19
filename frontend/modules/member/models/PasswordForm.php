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

class PasswordForm extends Model
{
	
    public $password;
    public $new_password;
    public $password_repeat;

	private $_user = false;
	  
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
			['password', 'validatePassword'],
			
			['new_password', 'required'],
            ['new_password', 'string', 'min' => 6],
			
			['password_repeat','required'],
			['password_repeat', 'compare', 'compareAttribute' => 'new_password'],
        ];
    }
	
	/**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {			
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
				$this->addError($attribute, 'Password Yang Anda Masukkan Salah.');
            }
        }
    }

	public function chagepassword()
    {
        if ($this->validate()) {
            $user = new Member();
            $user->setPassword($this->password);
            if ($user->save(false)) {
				return true;
            }
        }

        return null;
    }

    public function getUser()
    {
        $this->_user = Member::findOne(Yii::$app->user->identity->id);
        return $this->_user;
    } 

	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'oldpass'=>'Kata sandi lama',
            'newpass'=>'Kata sandi baru',
            'repeatnewpass'=>'Ulangi kata sandi baru',
        ];
    }
	
}

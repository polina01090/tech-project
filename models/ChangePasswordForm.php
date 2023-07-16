<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class ChangePasswordForm extends Model
{
    public $oldPassword;
    public $repeatPassword;
    public $newPassword;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['oldPassword', 'repeatPassword', 'newPassword'], 'required'],
            // rememberMe must be a boolean value
            ['repeatPassword', 'compare', 'compareAttribute' => 'oldPassword'],
            ['newPassword', 'compare', 'compareAttribute' => 'oldPassword', 'operator' => '!='],
            // password is validated by validatePassword()
            ['oldPassword', 'validatePassword'],
            ['newPassword', 'string', 'length' => [5, 32]]
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
            $user = Yii::$app->user->identity;

            if (!$user || !$user->validatePassword($this->oldPassword)) {
                $this->addError($attribute, 'Incorrect password.');
            }
        }
    }
}

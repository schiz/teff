<?php

Yii::import('zii.widgets.CPortlet');

/**
 * Модальная форма авторизации
 */
class UserAuth extends CPortlet
{
    public function renderContent()
    {
        // Форма регистрации
        $form = new Users();
        $login = new LoginForm();
        // Проверка если пришли данные из формы
        if (!empty($_POST['User'])) {
            $form->attributes = $_POST['User'];

            // Валидация формы
            if ($form->validate()) {
                if ($form->model()->count('username = :username', array(':username' => strtolower($form->username)))) {
                    $form->addError('username', 'Такое имя пользователя уже зарегистрировано!');
                    $this->render('userauth', array(
                        'form' => $form,
                        'login' => $login
                    ));
                } else {
                    $form->save();
                    Yii::app()->user->setFlash('register', 'Вы подписаны на рассылку новостей');
                }
            } else {
                $this->render('userauth', array(
                    'form' => $form,
                    'login' => $login
                ));
            }
        } else {
            $this->render('userauth', array(
                'form' => $form,
                'login' => $login
            ));
        }


    }

}
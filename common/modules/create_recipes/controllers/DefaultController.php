<?php

namespace common\modules\create_recipes\controllers;

use yii\web\Controller;

/**
 * Default controller for the `create_recipes` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}

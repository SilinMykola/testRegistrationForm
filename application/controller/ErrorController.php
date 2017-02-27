<?php

class ErrorController extends BaseController
{
    public function error($exception = '') {

		$this->view->render('error', ['exception' => $exception]);

    }
}; 
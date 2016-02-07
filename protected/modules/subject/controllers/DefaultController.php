<?php

class DefaultController extends Controller
{
	public $layout = '//layouts/subject';

	public function actionIndex()
	{
		$this->render('index');
	}
}
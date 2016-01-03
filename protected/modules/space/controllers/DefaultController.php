<?php

class DefaultController extends Controller
{
	public $layout = '//layouts/space';

	public function actionIndex()
	{
		$this->render('index');
	}
}
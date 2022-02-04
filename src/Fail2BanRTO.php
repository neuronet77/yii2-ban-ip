<?php

namespace gertex\yii2banip;

use Yii;
use yii\base\BootstrapInterface;
use yii\base\Component;

class Fail2BanRTO extends Component implements BootstrapInterface
{
	/**
	 * @param \yii\base\Application $app
	 */
	public function bootstrap($app)
	{
		$app->on(\yii\base\Application::EVENT_BEFORE_REQUEST, function () use ($app) {
			if (!\Yii::$app->user->isGuest)
				Fail2BanRTO::log_event_before();
		});
		$app->on(\yii\base\Application::EVENT_BEFORE_REQUEST, function () use ($app) {
			if (!\Yii::$app->user->isGuest)
				Fail2BanRTO::log_event_after();
		});
	}

	public static function log_event_before()
	{
		Yii::info('Client IP: ' . Yii::$app->request->userIP . ' | ');
		file_put_contents(__DIR__ . '/../debug.txt', Yii::$app->request->userIP . ' | ' . date('Y-m-d H:i:s') . ' | ' . \Yii::$app->request->url . PHP_EOL, FILE_APPEND);
	}

	public static function log_event_after()
	{
		Yii::info('Client IP: ' . Yii::$app->request->userIP . ' | ');
		file_put_contents(__DIR__ . '/../debug.txt', Yii::$app->request->userIP . ' | ' . date('Y-m-d H:i:s') . ' | AFTER | ' . \Yii::$app->request->url . ' | ' . \Yii::$app->response->getStatusCode() . PHP_EOL, FILE_APPEND);
	}
}
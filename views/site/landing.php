<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Landing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		This is the the alternative landing page.
	</p>

	<code><?= __FILE__ ?></code>
</div>

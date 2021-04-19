<?php
declare(strict_types=1);

use Bbg\BbgLangmarket\Middleware\MarketResolver;

return [
	'frontend' => [
		'bbg/bbg-langmarket' => [
			'target' => MarketResolver::class,
			'after'  => [
				'typo3/cms-frontend/base-redirect-resolver'
			],
			'before' => [
				'typo3/cms-frontend/static-route-resolver'
			],
		],
	],
];
<?php
declare(strict_types=1);

namespace Bbg\BbgLangmarket\EpressionLanguage;


use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\ExpressionLanguage\AbstractProvider;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class MarketConditionProvider extends AbstractProvider
{
	public function __construct()
	{
		if (Environment::isCli()) {
			return;
		}

		$resolvedMarket = 10;
		$pathSegments   = explode('/', GeneralUtility::getIndpEnv('PATH_INFO'));

		switch ($pathSegments[1]) {
			case '/de-DE/':
				$resolvedMarket = 10;
				break;

			case '/de-CH/':
				$resolvedMarket = 11;
				break;

			case '/de-GB/':
				$resolvedMarket = 12;
				break;

			case '/de-FR/':
				$resolvedMarket = 13;
				break;

			case '/de-LU/':
				$resolvedMarket = 14;
				break;
		}

		$this->expressionLanguageVariables = [
			'market' => $resolvedMarket
		];
	}
}
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

		$pathSegments = explode('/', GeneralUtility::getIndpEnv('REQUEST_URI'));

		switch ($pathSegments[1]) {
			case 'de-DE':
			default:
				$resolvedMarket = 10;
				break;

			case 'de-CH':
				$resolvedMarket = 11;
				break;

			case 'de-GB':
				$resolvedMarket = 12;
				break;

			case 'de-FR':
				$resolvedMarket = 13;
				break;

			case 'de-LU':
				$resolvedMarket = 14;
				break;

			case 'en-DE':
				$resolvedMarket = 20;
				break;

			case 'en-CH':
				$resolvedMarket = 21;
				break;

			case 'en-GB':
				$resolvedMarket = 22;
				break;

			case 'en-FR':
				$resolvedMarket = 23;
				break;

			case 'en-LU':
				$resolvedMarket = 24;
				break;

			case 'fr-DE':
				$resolvedMarket = 30;
				break;

			case 'fr-CH':
				$resolvedMarket = 31;
				break;

			case 'fr-GB':
				$resolvedMarket = 32;
				break;

			case 'fr-FR':
				$resolvedMarket = 33;
				break;

			case 'fr-LU':
				$resolvedMarket = 34;
				break;
		}

		$this->expressionLanguageVariables = [
			'market' => $resolvedMarket
		];
	}
}
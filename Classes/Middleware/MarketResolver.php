<?php
declare(strict_types=1);

namespace Bbg\BbgLangmarket\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TYPO3\CMS\Core\Http\RedirectResponse;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class MarketResolver implements MiddlewareInterface
{
	public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
	{
		/** @var SiteLanguage $language */
		$language    = $request->getAttribute('language');
		$pathSegments = explode('/', $request->getAttribute('routing')->getUri()->getPath());

		switch ($pathSegments[1]) {
			case 'de-DE':
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

			default:
				$resolvedMarket = 10;
//				return new RedirectResponse('/de-DE');
		}

		$queryParams       = $request->getQueryParams();
		$queryParams['LM'] = $resolvedMarket;
		$request           = $request->withQueryParams($queryParams);

		return $handler->handle($request);
	}
}
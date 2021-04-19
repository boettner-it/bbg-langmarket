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
		$pathSegments = explode('/', $language->getBase()->getPath());

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

			default:
				return new RedirectResponse('/de-DE');
		}
		$queryParams       = $request->getQueryParams();
		$queryParams['LM'] = $resolvedMarket;
		$request           = $request->withQueryParams($queryParams);

		return $handler->handle($request);
	}
}
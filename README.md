# EXT: bbg_langmarket

This a test of how to integrate a market (country) specific URL parameter aside to the standard TYPO3 language parameter to serve content based on a visitors geographic origin. 

It serves as an example for the handling of parameters that have been configured as preVars when using the EXT realurl under TYPO3 v8 and lower.

## Requirements

* TYPO3 9 and up

## Installation and Setup
Install as usual (Composer or Extension Manager upload)

Configuration/Routing/config.yaml holds an example Site configuration.

## What it does
The extension resolves the parameters www.mysite.com/en-EN into two URL GET parmeters L (language) and LM (market or country) with en holding the standard TYPO3 L parameters sys_language_uid and EN the market parameter value. It is named LM here for historical reasons in the scope of the project this was set up for. 

Comparable use cases may be covered similarly.

## WARNING:
There´s currently an issue with FE link generation. All known ways like shown below don´t resolve to the correct URL. I am still working on a solution on this while any input is welcome.
````
$cObj->getTypoLink_URL();
$site->getRouter()->generateUri();
$uri = $uriBuilder->reset()->setArguments($arguments)->setTargetPageUid(1);
````

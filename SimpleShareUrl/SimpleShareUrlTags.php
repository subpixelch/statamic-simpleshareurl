<?php

namespace Statamic\Addons\SimpleShareUrl;

use Statamic\Extend\Tags;

class SimpleShareUrlTags extends Tags
{

	public function index()
	{
		$network = $this->getParam('network');

		return ($network)
			? $this->_getLink($network)
			: "<code>{$this->getConfig('msg')['no_method']}</code>";
	}

	public function facebook()
	{
		return $this->_getLink('facebook');
	}
	public function twitter()
	{
		return $this->_getLink('twitter');
	}
	public function linkedin()
	{
		return $this->_getLink('linkedin');
	}
	public function googleplus()
	{
		return $this->_getLink('googleplus');
	}
	public function pinterest()
	{
		return $this->_getLink('pinterest');
	}

	private function _getLink($network)
	{
		$params = $this->_getParams();
		$params['network'] = $network;

		return ($this->getParam('url'))
			? $this->_createLink($params)
			: "<code>{$this->getConfig('msg')['no_url']}</code>";
	}

	private function _getParams()
	{
		$params  = [];
		$allowed = $this->getConfig('allowed');

		foreach ($allowed as $key => $value) {
			$input = $this->getParam($key);

			if ($input != null) {
				$params[$key] = $allowed[$key] . urlencode($input);
			} else {
				$params[$key] = '';
			}
		}

		return $params;
	}

	private function _createLink($params)
	{
		$link  = '';

		switch ($params['network'])
		{
			case 'facebook':
				$link =
					"{$this->getConfig('endpoints')['facebook']}
					{$params['url']}
					{$params['description']}
					{$params['picture']}
					{$params['quote']}";
				break;

			case 'twitter':
				$link =
					"{$this->getConfig('endpoints')['twitter']}
					{$params['url']}
					{$params['text']}
					{$params['via']}
					{$params['related']}
					{$params['hashtags']}";
				break;

			case 'linkedin':
				$link =
					"{$this->getConfig('endpoints')['linked']}
					{$params['url']}
					{$params['title']}
					{$params['summary']}
					{$params['source']}
					&amp;mini=true";
				break;

			case 'googleplus':
				$link =
					"{$this->getConfig('endpoints')['googleplus']}
					{$params['url']}";
				break;

			case 'pinterest':
				$link =
					"{$this->getConfig('endpoints')['pinterest']}
					{$params['url']}
					{$params['description']}";
				break;

			default:
				$link = "<code>{$this->getConfig('msg')['no_network']} ({$params['network']} is not valid)</code>";
				break;
		}

		return $link;
	}

}

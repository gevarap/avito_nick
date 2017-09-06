<?php
require "vendor/autoload.php";
use PHPHtmlParser\Dom;
header('Content-type: text/html; charset=utf-8');
class AvitoBMW5Series
{
	public function __construct()
	{
		$dom = new Dom;
		$dom->loadFromUrl('https://www.avito.ru/kaliningrad/avtomobili/bmw/5?s=101');
		$row = array();
		/** @var Dom\Collection $elementsCollection */
		$elementsCollection = $dom->getElementsByClass('item');
		$elementsCollection->each(function(Dom\HtmlNode $node) use (&$row) {
			foreach ($node->getChildren() as $childDiv)
			{
				if ($childDiv instanceof Dom\HtmlNode)
				{
					print_r($childDiv->innerHtml());
				}
			}

		});
	}
}

new AvitoBMW5Series();
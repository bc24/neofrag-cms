<?php
/**
 * https://neofr.ag
 * @author: Michaël BILCOT <michael.bilcot@neofr.ag>
 */

namespace NF\Modules\News\Controllers;

use NF\NeoFrag\Loadables\Controllers\Module as Controller_Module;

class Checker extends Controller_Module
{
	public function index($page = '')
	{
		return [$this->pagination->fix_items_per_page($this->config->news_per_page)->get_data($this->model()->get_news(), $page)];
	}

	public function _tag($tag, $page = '')
	{
		return [$tag, $this->pagination->fix_items_per_page($this->config->news_per_page)->get_data($this->model()->get_news('tag', $tag), $page)];
	}

	public function _category($category_id, $name, $page = '')
	{
		if ($category = $this->model('categories')->check_category($category_id, $name))
		{
			return [$category['title'], $this->pagination->fix_items_per_page($this->config->news_per_page)->get_data($this->model()->get_news('category', $category_id), $page)];
		}
	}

	public function _news($news_id, $title)
	{
		if ($news = $this->model()->check_news($news_id, $title))
		{
			return $news;
		}
	}
}

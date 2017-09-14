<?php
/**
 * @author Chris Zuber <chris@chriszuber.com>
 * @package superuserdev/schemaserver
 * @copyright 2017
 * @license https://opensource.org/licenses/LGPL-3.0 GNU Lesser General Public License version 3
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3.0 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library.
 */
namespace SuperUserDev\SchemaServer;

/**
 * @see https://schema.org/Article
 */
class Article extends CreativeWork
{
	final public function setArticleBody(String $body): self
	{
		return $this->_set('articleBody', $body);
	}

	final public function setArticleSection(String $section): self
	{
		return $this->_set('articleSection', $section);
	}

	final public function setPageEnd(Int $end): self
	{
		return $this->_set('pageEnd', $end);
	}

	final public function setPageStart(Int $start): self
	{
		return $this->_set('pageStart', $start);
	}

	final public function setPagination(String $pagination): self
	{
		return $this->_set('pagination', $pagination);
	}

	final public function setWordCount(Int $words): self
	{
		return $this->_set('wordCount', $words);
	}
}

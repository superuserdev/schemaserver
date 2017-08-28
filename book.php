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
 * @see https://schema.org/Book
 */
class Book extends CreativeWork
{
	/**
	 * [setAbridged description]
	 * @param Bool $is_abridged [description]
	 */
	final public function setAbridged(Bool $is_abridged)
	{
		$this->_set('abridged', $is_abridged);
	}

	/**
	 * [setBookEdition description]
	 * @param String $edition [description]
	 */
	final public function setBookEdition(String $edition)
	{
		$this->_set('bookEdition', $edition);
	}

	/**
	 * [setBookFormat description]
	 * @param BookFormatType $format [description]
	 */
	final public function setBookFormat(BookFormatType $format)
	{
		$this->_set('bookFormat', $format);
	}

	/**
	 * [setIllustrator description]
	 * @param Person $illustrator [description]
	 */
	final public function setIllustrator(Person $illustrator)
	{
		$this->_set('illustrator', $illustrator);
	}

	/**
	 * [setIsbn description]
	 * @param String $isbn [description]
	 * @todo Validate ISBN
	 */
	final public function setIsbn(String $isbn)
	{
		$this->_set('isbn', $isbn);
	}

	/**
	 * [setNumberOfPages description]
	 * @param Int $pages [description]
	 */
	final public function setNumberOfPages(Int $pages)
	{
		$this->_set('numberOfPages', $pages);
	}
}

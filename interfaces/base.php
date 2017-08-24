<?php
/**
 * @author Chris Zuber <chris@chriszuber.com>
 * @package shgysk8zer0/schemaserver
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
namespace shgysk8zer0\SchemaServer\Interfaces;

use \shgysk8zer0\SchemaServer\{Thing, ImageObject};

/**
 * @see https://schema.org/Thing
 */
Interface Base
{
	/**
	 * [parseFromArray description]
	 * @param  Array $data [description]
	 * @return Thing       [description]
	 */
	public static function parseFromArray(Array $data): Thing;

	/**
	 * [parseFromJSON description]
	 * @param  String $json [description]
	 * @return Thing        [description]
	 */
	public static function parseFromJSON(String $json): Thing;

	/**
	 * [parseFromPost description]
	 * @param  [type] $key [description]
	 * @return Thing       [description]
	 */
	public function parseFromPost(String $key = null): Thing;

	/**
	 * [setAdditionalType description]
	 * @param String $url [description]
	 */
	public function setAdditionalType(String $url);

	/**
	 * [setAlternateName description]
	 * @param String $name [description]
	 */
	public function setAlternateName(String $name);

	/**
	 * [setDescription description]
	 * @param String $description [description]
	 */
	public function setDescription(String $description);

	/**
	 * [setImage description]
	 * @param ImageObject $image [description]
	 */
	public function setImage(ImageObject $image);

	/**
	 * [setName description]
	 * @param String $name [description]
	 */
	public function setName(String $name);

	/**
	 * [setSameAs description]
	 * @param String $url [description]
	 */
	public function setSameAs(String $url);

	/**
	 * [setUrl description]
	 * @param String $url [description]
	 */
	public function setUrl(String $url);
}

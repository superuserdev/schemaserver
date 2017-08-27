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
namespace shgysk8zer0\SchemaServer\Traits;

trait DateTime
{
	/**
	 * [getDate description]
	 * @param  String    $str [description]
	 * @return DateTime      [description]
	 */
	final public static function getDate(String $str): \DateTime
	{
		return new \DateTime($str);
	}

	/**
	 * [getDateStr description]
	 * @param  DateTime $date     [description]
	 * @param  boolean  $use_date [description]
	 * @param  boolean  $use_time [description]
	 * @return String             [description]
	 */
	final public static function getDateStr(
		\DateTime $date,
		Bool      $use_date = true,
		Bool      $use_time = true
	): String
	{
		if ($use_date and $use_time) {
			return $date->format($date::W3C);
		} elseif ($use_date) {
			return $date->format('Y-m-d');
		} elseif ($use_time) {
			return $date->format('H:i:sP');
		} else {
			throw new \RuntimeException('`DateTime` must include at least date or time.');
		}
	}

	/**
	 * [formatDateTime description]
	 * @param  String  $date     [description]
	 * @param  boolean $use_date [description]
	 * @param  boolean $use_time [description]
	 * @return String            [description]
	 */
	final public static function formatDateTime(
		String $date,
		Bool   $use_date = true,
		Bool   $use_time = true
	): String
	{
		return static::getDateStr(new \DateTime($date), $use_date, $use_time);
	}
}

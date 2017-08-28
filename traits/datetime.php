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
			// 'Y-m-d\TH:i:sP'
			return $date->format(\DateTime::W3C);
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

	final public function calcDuration(): Void
	{
		if (! isset($this->startDate, $this->endDate)) {
			throw new \RuntimeException('Must set start and end dates to create duration');
		} else {
			$start = new \DateTime($this->startDate);
			$end = new \DateTime($this->endDate);
			if ($start < $end) {
				$diff = $end->diff($start);
				$str = 'P';
				if ($diff->y !== 0) {
					$str .= sprintf('%dy', $diff->y);
				}
				if ($diff->m !== 0) {
					$str .= sprintf('%dm', $diff->m);
				}
				if ($diff->d !== 0) {
					$str .= sprintf('%dd', $diff->d);
				}
				if ($diff->h !==0 or $diff->i !== 0 or $diff->s !==0) {
					$str .= 'T';
					if ($diff->h !== 0) {
						$str .= sprintf('%dh', $diff->h);
					}
					if ($diff->i !== 0) {
						$str .= sprintf('%dm', $diff->i);
					}
					if ($diff->s !== 0) {
						$str .= sprintf('%ds', $diff->s);
					}
				}
				$this->_set('duration', $str);
			} else {
				throw new \RuntimeException('End time is before start time');
			}
		}
	}
}

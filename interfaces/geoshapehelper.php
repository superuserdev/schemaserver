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
namespace SuperUserDev\SchemaServer\Interfaces;

/**
 * Helper methods for properly constructing `GeoShape`s
 */
use \SuperUserDev\SchemaServer\{GeoCoordinates};

interface GeoShapeHelper
{
	/**
	 * [makePolygon description]
	 * @param  GeoCoordinates $coords [description]
	 * @return String                 [description]
	 */
	public static function makePolygon(GeoCoordinates ...$coords): String;

	/**
	 * [makeCircle description]
	 * @param  GeoCoordinates $origin [description]
	 * @param  Float          $radius [description]
	 * @return String                 [description]
	 */
	public static function makeCircle(GeoCoordinates $origin, Float $radius): String;

	/**
	 * [makeBox description]
	 * @param  GeoCoordinates $pt1 [description]
	 * @param  GeoCoordinates $pt2 [description]
	 * @return String              [description]
	 */
	public static function makeBox(GeoCoordinates $pt1, GeoCoordinates $pt2): String;

	/**
	 * [makeLine description]
	 * @param  GeoCoordinates $pt1 [description]
	 * @param  GeoCoordinates $pt2 [description]
	 * @return String              [description]
	 */
	public static function makeLine(GeoCoordinates $pt1, GeoCoordinates $pt2): String;
}

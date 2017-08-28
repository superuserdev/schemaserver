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
 * @see https://schema.org/SoftwareApplication
 */
class SoftwareApplication extends CreativeWork
{
	final public function setApplicationCategory(String $category)
	{
		$this->_set('applicationCategory', $category);
	}

	final public function setApplicationSubCategory(String $sub_category)
	{
		$this->_set('applicationSubCategory', $sub_category);
	}

	final public function setApplicationSuite(String $suite)
	{
		$this->_set('applcationSuite', $suite);
	}

	final public function setAvailableOnDevide(String $device)
	{
		$this->_set('availableOnDevice', $device);
	}

	final public function setCountriesNotSupported(String $countries)
	{
		$this->_set('countriesNotSupported', $countries);
	}

	final public function setCountriesSupported(String $countries)
	{
		$this->_set('countriesSupported', $countries);
	}

	final public function setDownloadUrl(String $url)
	{
		if (static::isUrl($url)) {
			$this->_set('downloadUrl', $url);
		} else {
			throw new \InvalidArgumentException("{$url} is not a valid URL");
		}
	}

	final public function setFeatureList(String $feature)
	{
		$this->_set('featureList', $features);
	}

	final public function setFileSize(String $size)
	{
		$this->_set('fileSize', $size);
	}

	final public function setInstallUrl($url)
	{
		if (static::isUrl($url)) {
			$this->_set('installUrl', $url);
		} else {
			throw new \InvalidArgumentException("{$url} is not a valid URL");
		}
	}

	final public function setMemoryRequirements(String $requirements)
	{
		$this->_set('memoryRequirements', $requirements);
	}

	final public function setOperatingSystem(String $os)
	{
		$this->_set('operatingSystem', $os);
	}

	final public function setPermissions(String $permissions)
	{
		$this->_set('permissions', $permissions);
	}

	final public function setProcessorRequirements(String $requirements)
	{
		$this->_set('processorRequirements', $requirements);
	}

	final public function setReleaseNotes(String $release_notes)
	{
		$this->_set('releaseNotes', $release_notes);
	}

	final public function setScreenshot(ImageObject $screenshot)
	{
		$this->_set('screenshot', $screenshot);
	}

	final public function setSoftwareAddOn(SoftwareApplication $add_on)
	{
		$this->_set('softwareAddOn', $add_on);
	}

	final public function setSoftwareHelp(CreativeWork $help)
	{
		$this->_set('softwareHelp', $help);
	}

	final public function setSoftwareRequirements(String $requirements)
	{
		$this->_set('softwareRequirements', $requirements);
	}

	final public function setSoftwareVersion(String $version)
	{
		$this->_set('softwareVersion', $version);
	}

	final public function setStorageRequirements(String $requirements)
	{
		$this->_set('storageRequirements', $requirements);
	}

	// final public function setSupportingData(DataFeed $data)
	// {
	// 	$this->_set('supportingData', $data);
	// }
}

<?php 

/**
 * Part of the Deeployer package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * Part of the code used in this package came from https://github.com/lkwdwrd/git-deploy
 * 
 * @package    Deeployer
 * @version    1.0.0
 * @author     Antonio Carlos Ribeiro @ PragmaRX
 * @license    BSD License (3-clause)
 * @copyright  (c) 2013, PragmaRX
 * @link       http://pragmarx.com
 */

namespace PragmaRX\Deeployer\Deployers;

class Bitbucket extends Deployer {

	protected $serviceName = 'Bitbucket';
	
	/**
	 * Get branch name
	 * 
	 * @return string
	 */
	public function getBranch()
	{
		return basename( $this->payload->commits[0]->branch );
	}

	/**
	 * Get repository full URL
	 * 
	 * @return string
	 */
	public function getRepositoryUrl()
	{
		return removeTrailingSlash($this->payload->canon_url . $this->payload->repository->absolute_url);
	}

	public function payloadIsFromBitbucket($payload)
	{
		return isset($payload->canon_url) and $payload->canon_url == "https://bitbucket.org";
	}

}

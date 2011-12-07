<?php
/*
 * Copyright 2010-2011 ThumbWhere, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://thumbwhere.com/licenses/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */


/*%******************************************************************************************%*/
// CLASS

/**
 * Wraps the underlying `RequestCore` class with some TW-specific customizations.
 *
 * @version 2011.06.02
 * @license See the included NOTICE.md file for more information.
 * @copyright See the included NOTICE.md file for more information.
 * @link http://thumbwhere.com/sdk/php/ PHP Developer Center
 */
class TWRequest extends RequestCore
{
	/**
	 * The default class to use for HTTP Requests (defaults to <TWRequest>).
	 */
	public $request_class = 'TWRequest';

	/**
	 * The default class to use for HTTP Responses (defaults to <TWResponse>).
	 */
	public $response_class = 'TWResponse';


	/*%******************************************************************************************%*/
	// CONSTRUCTOR

	/**
	 * Constructs a new instance of this class.
	 *
	 * @param string $url (Optional) The URL to request or service endpoint to query.
	 * @param string $proxy (Optional) The faux-url to use for proxy settings. Takes the following format: `proxy://user:pass@hostname:port`
	 * @param array $helpers (Optional) An associative array of classnames to use for request, and response functionality. Gets passed in automatically by the calling class.
	 * @return $this A reference to the current instance.
	 */
	public function __construct($url = null, $proxy = null, $helpers = null)
	{
		parent::__construct($url, $proxy, $helpers);

		// Standard settings for all requests
		$this->add_header('Expect', '100-continue');
		$this->set_useragent(TWRUNTIME_USERAGENT);
		$this->cacert_location = (defined('TW_CERTIFICATE_AUTHORITY') ? TW_CERTIFICATE_AUTHORITY : false);

		return $this;
	}
}

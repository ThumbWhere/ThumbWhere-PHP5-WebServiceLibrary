
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
// EXCEPTIONS

/**
 * Default APIMedia Exception.
 */
class APIMedia_Exception extends Exception {
}

/*%******************************************************************************************%*/
// MAIN CLASS

/**
 * TODO: Documentation from Media API index.xml
 *
 * Visit <http://thumbwhere.com/api/> for more information.
 *
 * @version V1.1
 * @license See the included NOTICE.md file for more information.
 * @copyright See the included NOTICE.md file for more information.
 * @link http://thumbwhere.com/api/ ThumbWhere Media
 * @link http://thumbwhere.com/documentation/media/ ThumbWhere Media documentation
 */
class ThumbWhereAPIMedia extends TWRuntime {
  /*%******************************************************************************************%*/
  // CLASS CONSTANTS

  /**
   * The default endpoint.
   */
  const DEFAULT_URL = 'thumbwhere.com';

  /**
   * Specify the queue URL for the US-East (Northern Virginia) Region.
   */
  const REGION_US_E1 = 'thumbwhere.com';

  /**
   * Specify the queue URL for the AU-East (Sydney) Region.
   */
  const REGION_AU_E1 = 'aue1.thumbwhere.com';

  /*%******************************************************************************************%*/
  // PROPERTIES

  /**
   * The request URL.
   */

  public $request_url;

  /**
   * The DNS vs. Path-style setting.
   */
  public $path_style = false;

  /**
   * The state of whether the prefix change is temporary or permanent.
   */
  public $temporary_prefix = false;

  /*%******************************************************************************************%*/
  // CONSTRUCTOR

  /**
   * Constructs a new instance of <ThumbWhereAPIMedia>. If the <code>TW_DEFAULT_CACHE_CONFIG</code> configuration
   * option is set, requests will be authenticated using a session token. Otherwise, requests will use
   * the older authentication method.
   *
   * @param string $environment (Optional) Used to specify the type of environment. 'localhost', 'staging' etc..
   * @return boolean A value of <code>false</code> if no valid values are set, otherwise <code>true</code>.
   */

  public function __construct($environment = null) {
    $this->api_version = 'v1.1';
    $this->api = 'media';
    $this->hostname = self::DEFAULT_URL;

    return parent::__construct();
  }

  /*%******************************************************************************************%*/
  // SETTERS

  /**
   * Sets the region to use for subsequent ThumbWhere APIMedia operations.
   *
   * @param string $region (Required) The region to use for subsequent ThumbWhere APIMedia operations. [Allowed values: `ThumbWhereAPIMedia::REGION_US_E1 `, `ThumbWhereAPIMedia::REGION_US_W1`, `ThumbWhereAPIMedia::REGION_EU_W1`, `ThumbWhereAPIMedia::REGION_APAC_SE1`, `ThumbWhereAPIMedia::REGION_APAC_NE1`]
   * @return $this A reference to the current instance.
   */

  public function set_region($region) {
    switch ($region) {
    default:
      $this->set_hostname($region);
      $this->enable_path_style(false);
      break;
    }

    return $this;
  }
  
  
  /*%******************************************************************************************%*/
  /*%******************************************************************************************%*/
  // 
  // ALL THE RESOURCES
  
  


		
 /*%******************************************************************************************%*/
  /*%******************************************************************************************%*/
  // 
  // ALL THE ACTIONS
  
  

	
  /*%******************************************************************************************%*/
  // 'get_url' Resource METHODS

  /**
   * Invokes the CREATE method for the  get_url resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the calling domain name (PARAMETER).
   * @param string $mediaitem (Required) long - The media item we are rating (PARAMETER).
   * @param string $redirect (Required) bool - If true then this request will redirect to the xml for this media item. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_get_url($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_get_url' ,array(), WATCHDOG_NOTICE);
	    if (variable_get('thumbwhere_api_log_debug',0) == 1) debug($parameters);

   

    if (!$opt) {
      $opt = array();
    }

    $opt['verb'] = 'GET';
    $opt['headers'] = array(
        'Content-Type' => 'application/xml',
    );
    
    //
    // Validate Fields
    //
    if (empty($parameters['key'])) {
	    throw new APIMedia_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['mediaitem'])) {
	    throw new APIMedia_Exception('Parameter "mediaitem" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'mediaitem' => $parameters['mediaitem'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['redirect'])) {
      $opt['query_string']['redirect'] = $parameters['redirect'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/get_url', $opt);

	  if (!isset($response->body->get_url->status)) {
      $message = 'Error response from server in call to \'call_get_url\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->get_url->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_get_url\'. Message \'' . $response->body->get_url->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }}

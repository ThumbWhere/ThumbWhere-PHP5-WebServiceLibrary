
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
 * Default APISocial Exception.
 */
class APISocial_Exception extends Exception {
}

/*%******************************************************************************************%*/
// MAIN CLASS

/**
 * TODO: Documentation from Social API index.xml
 *
 * Visit <http://thumbwhere.com/api/> for more information.
 *
 * @version V1.1
 * @license See the included NOTICE.md file for more information.
 * @copyright See the included NOTICE.md file for more information.
 * @link http://thumbwhere.com/api/ ThumbWhere Social
 * @link http://thumbwhere.com/documentation/social/ ThumbWhere Social documentation
 */
class ThumbWhereAPISocial extends TWRuntime {
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
   * Constructs a new instance of <ThumbWhereAPISocial>. If the <code>TW_DEFAULT_CACHE_CONFIG</code> configuration
   * option is set, requests will be authenticated using a session token. Otherwise, requests will use
   * the older authentication method.
   *
   * @param string $environment (Optional) Used to specify the type of environment. 'localhost', 'staging' etc..
   * @return boolean A value of <code>false</code> if no valid values are set, otherwise <code>true</code>.
   */

  public function __construct($environment = null) {
    $this->api_version = 'v1.1';
    $this->api = 'social';
    $this->hostname = self::DEFAULT_URL;

    return parent::__construct();
  }

  /*%******************************************************************************************%*/
  // SETTERS

  /**
   * Sets the region to use for subsequent ThumbWhere APISocial operations.
   *
   * @param string $region (Required) The region to use for subsequent ThumbWhere APISocial operations. [Allowed values: `ThumbWhereAPISocial::REGION_US_E1 `, `ThumbWhereAPISocial::REGION_US_W1`, `ThumbWhereAPISocial::REGION_EU_W1`, `ThumbWhereAPISocial::REGION_APAC_SE1`, `ThumbWhereAPISocial::REGION_APAC_NE1`]
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
  // 'share' Resource METHODS
  

  /**
   * Invokes the CALL method for the  share resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The api key to provide context for this campaign. (PARAMETER).
   * @param string $member (Required) The identity we want to send this message for. (PARAMETER).
   * @param string $identity (Required) The identity we want to send this message for. (PARAMETER).
   * @param string $mediaitem (Required) The mediaitem we are sharing. (PARAMETER).
   * @param string $format (Required) The mediaitem we are sharing. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_share($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_share' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($parameters['key'])) {
	    throw new APISocial_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['member'])) {
	    throw new APISocial_Exception('Parameter "member" is mandatory.');
    }
    if (!isset($parameters['identity'])) {
	    throw new APISocial_Exception('Parameter "identity" is mandatory.');
    }
    if (!isset($parameters['mediaitem'])) {
	    throw new APISocial_Exception('Parameter "mediaitem" is mandatory.');
    }
    if (!isset($parameters['format'])) {
	    throw new APISocial_Exception('Parameter "format" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'member' => $parameters['member'],
        'identity' => $parameters['identity'],
        'mediaitem' => $parameters['mediaitem'],
        'format' => $parameters['format'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/share', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_share\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APISocial_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_share\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APISocial_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_share\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APISocial_Exception($message);
    }

	  if (!isset($response->body->share->status)) {
      $message = 'Error response from server in call to \'call_share\'. Response to \'share\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APISocial_Exception($message);
    }

    $status = $response->body->share->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_share\'. Message \'' . $response->body->share->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APISocial_Exception($message);
    }

    return $response;
  }}

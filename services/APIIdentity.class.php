
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
 * Default APIIdentity Exception.
 */
class APIIdentity_Exception extends Exception {
}

/*%******************************************************************************************%*/
// MAIN CLASS

/**
 * TODO: Documentation from Identity API index.xml
 *
 * Visit <http://thumbwhere.com/api/> for more information.
 *
 * @version V1.1
 * @license See the included NOTICE.md file for more information.
 * @copyright See the included NOTICE.md file for more information.
 * @link http://thumbwhere.com/api/ ThumbWhere Identity
 * @link http://thumbwhere.com/documentation/identity/ ThumbWhere Identity documentation
 */
class ThumbWhereAPIIdentity extends TWRuntime {
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
   * Constructs a new instance of <ThumbWhereAPIIdentity>. If the <code>TW_DEFAULT_CACHE_CONFIG</code> configuration
   * option is set, requests will be authenticated using a session token. Otherwise, requests will use
   * the older authentication method.
   *
   * @param string $environment (Optional) Used to specify the type of environment. 'localhost', 'staging' etc..
   * @return boolean A value of <code>false</code> if no valid values are set, otherwise <code>true</code>.
   */

  public function __construct($environment = null) {
    $this->api_version = 'v1.1';
    $this->api = 'identity';
    $this->hostname = self::DEFAULT_URL;

    return parent::__construct();
  }

  /*%******************************************************************************************%*/
  // SETTERS

  /**
   * Sets the region to use for subsequent ThumbWhere APIIdentity operations.
   *
   * @param string $region (Required) The region to use for subsequent ThumbWhere APIIdentity operations. [Allowed values: `ThumbWhereAPIIdentity::REGION_US_E1 `, `ThumbWhereAPIIdentity::REGION_US_W1`, `ThumbWhereAPIIdentity::REGION_EU_W1`, `ThumbWhereAPIIdentity::REGION_APAC_SE1`, `ThumbWhereAPIIdentity::REGION_APAC_NE1`]
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
  // 'validate' Resource METHODS

  /**
   * Invokes the CREATE method for the  validate resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $code (Required) The Identity Token to validate. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_validate($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_validate' ,array(), WATCHDOG_NOTICE);
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
    if (empty($parameters['code'])) {
	    throw new APIIdentity_Exception('Parameter "code" is mandatory.');
    }
    $opt['query_string'] = array(

        'code' => $parameters['code'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/validate', $opt);

	  if (!isset($response->body->validate->status)) {
      $message = 'Error response from server in call to \'call_validate\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->validate->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_validate\'. Message \'' . $response->body->validate->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'query_request' Resource METHODS

  /**
   * Invokes the CREATE method for the  query_request resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API Key that a Identity Token request has been made against. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the API's domain name. (PARAMETER).
   * @param string $code (Required) The code that was returned by a previous call to ^request^. This code should have been sent via SMS or MMS to the number also returned by ^request^. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_query_request($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_query_request' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIIdentity_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['code'])) {
	    throw new APIIdentity_Exception('Parameter "code" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'code' => $parameters['code'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/query_request', $opt);

	  if (!isset($response->body->query_request->status)) {
      $message = 'Error response from server in call to \'call_query_request\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->query_request->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_query_request\'. Message \'' . $response->body->query_request->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'request' Resource METHODS

  /**
   * Invokes the CREATE method for the  request resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the API's domain name. (PARAMETER).
   * @param string $type (Required) The identity type (PARAMETER).
   * @param string $member (Required) Member that this identity will be added to. If this is blank and this is not a pre-existing member then a new member will be created after this request is completed (PARAMETER).
   * @param string $id (Required) The identity id - eg email address or mobile phone number. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_request($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_request' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIIdentity_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['type'])) {
	    throw new APIIdentity_Exception('Parameter "type" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'type' => $parameters['type'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['member'])) {
      $opt['query_string']['member'] = $parameters['member'];
    }
    if (isset($parameters['id'])) {
      $opt['query_string']['id'] = $parameters['id'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/request', $opt);

	  if (!isset($response->body->request->status)) {
      $message = 'Error response from server in call to \'call_request\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->request->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_request\'. Message \'' . $response->body->request->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'authenticate_request' Resource METHODS

  /**
   * Invokes the CREATE method for the  authenticate_request resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API Key that a Identity Token request has been made against. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the API's domain name. (PARAMETER).
   * @param string $code (Required) The code that was returned by a previous call to ^request^. This code should have been sent via SMS or MMS to the number also returned by ^request^. (PARAMETER).
   * @param string $id (Required) The id you want to validate against. (PARAMETER).
   * @param string $secret (Required) The secret you want to supply to complete your validation. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_authenticate_request($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_authenticate_request' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIIdentity_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['code'])) {
	    throw new APIIdentity_Exception('Parameter "code" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'code' => $parameters['code'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['id'])) {
      $opt['query_string']['id'] = $parameters['id'];
    }
    if (isset($parameters['secret'])) {
      $opt['query_string']['secret'] = $parameters['secret'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/authenticate_request', $opt);

	  if (!isset($response->body->authenticate_request->status)) {
      $message = 'Error response from server in call to \'call_authenticate_request\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->authenticate_request->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_authenticate_request\'. Message \'' . $response->body->authenticate_request->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }}

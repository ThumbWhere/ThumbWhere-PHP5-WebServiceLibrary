
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
 * Default APIProgram Exception.
 */
class APIProgram_Exception extends Exception {
}

/*%******************************************************************************************%*/
// MAIN CLASS

/**
 * TODO: Documentation from Program API index.xml
 *
 * Visit <http://thumbwhere.com/api/> for more information.
 *
 * @version V1.1
 * @license See the included NOTICE.md file for more information.
 * @copyright See the included NOTICE.md file for more information.
 * @link http://thumbwhere.com/api/ ThumbWhere Program
 * @link http://thumbwhere.com/documentation/program/ ThumbWhere Program documentation
 */
class ThumbWhereAPIProgram extends TWRuntime {
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
   * Constructs a new instance of <ThumbWhereAPIProgram>. If the <code>TW_DEFAULT_CACHE_CONFIG</code> configuration
   * option is set, requests will be authenticated using a session token. Otherwise, requests will use
   * the older authentication method.
   *
   * @param string $environment (Optional) Used to specify the type of environment. 'localhost', 'staging' etc..
   * @return boolean A value of <code>false</code> if no valid values are set, otherwise <code>true</code>.
   */

  public function __construct($environment = null) {
    $this->api_version = 'v1.1';
    $this->api = 'program';
    $this->hostname = self::DEFAULT_URL;

    return parent::__construct();
  }

  /*%******************************************************************************************%*/
  // SETTERS

  /**
   * Sets the region to use for subsequent ThumbWhere APIProgram operations.
   *
   * @param string $region (Required) The region to use for subsequent ThumbWhere APIProgram operations. [Allowed values: `ThumbWhereAPIProgram::REGION_US_E1 `, `ThumbWhereAPIProgram::REGION_US_W1`, `ThumbWhereAPIProgram::REGION_EU_W1`, `ThumbWhereAPIProgram::REGION_APAC_SE1`, `ThumbWhereAPIProgram::REGION_APAC_NE1`]
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
  // 'program' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  program resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_program($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_program' ,array(), WATCHDOG_NOTICE);
	    if (variable_get('thumbwhere_api_log_debug',0) == 1) debug($context);
	    if (variable_get('thumbwhere_api_log_debug',0) == 1) debug($fields);


    if (!$opt) {
      $opt = array();
    }

    $opt['verb'] = 'GET';
    $opt['headers'] = array(
        'Content-Type' => 'application/xml',
    );
    
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIProgram_Exception('Cannot send create \'program\'resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (empty($fields['name'])) {
	    throw new APIProgram_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/program', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_program\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_program\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_program\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

	  if (!isset($response->body->program->status)) {
      $message = 'Error response from server in call to \'create_program\'. Response to \'program\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

    $status = $response->body->program->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_program\'. Message \'' . $response->body->program->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  program resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_program($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_program' ,array(), WATCHDOG_NOTICE);
	    if (variable_get('thumbwhere_api_log_debug',0) == 1) debug($context);
	    if (variable_get('thumbwhere_api_log_debug',0) == 1) debug($fields);

    /*
     // If the bucket contains uppercase letters...
    if (preg_match('/[A-Z]/', $bucket)) {
	    // Throw a warning
	    trigger_error('constraint/field/parameter , "' . $blah . '" has been automatically converted to "' . strtolower($bucket) . '"', E_USER_WARNING);
	
	    // Force the bucketname to lowercase
	    $blah = strtolower($bucket);
    }

    // Validate the APIContent bucket name for creation
    if (!$this->validate_bucketname_update($bucket)) {
	    // @codeCoverageIgnoreStart
	    throw new APIProgram_Exception('constraint/field/paramete "' . $bucket . '" is not valid.');
	    // @codeCoverageIgnoreEnd
    }
     */

    if (!$opt) {
      $opt = array();
    }

    $opt['verb'] = 'GET';
    $opt['headers'] = array(
        'Content-Type' => 'application/xml',
    );
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIProgram_Exception('Cannot send create \'program\'resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (empty($fields['name'])) {
	    throw new APIProgram_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/program', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_program\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_program\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_program\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

	  if (!isset($response->body->program->status)) {
      $message = 'Error response from server in call to \'update_program\'. Response to \'program\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

    $status = $response->body->program->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_program\'. Message \'' . $response->body->program->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

    return $response;
  }

		
 /*%******************************************************************************************%*/
  /*%******************************************************************************************%*/
  // 
  // ALL THE ACTIONS
  
  

	
  /*%******************************************************************************************%*/
  // 'new_program' Resource METHODS
  

  /**
   * Invokes the CALL method for the  new_program resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The api key to provide context for this campaign. (PARAMETER).
   * @param string $name (Required) Name of the program. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_new_program($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_new_program' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIProgram_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['name'])) {
	    throw new APIProgram_Exception('Parameter "name" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'name' => $parameters['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/new_program', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_new_program\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_new_program\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_new_program\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

	  if (!isset($response->body->new_program->status)) {
      $message = 'Error response from server in call to \'call_new_program\'. Response to \'new_program\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

    $status = $response->body->new_program->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_new_program\'. Message \'' . $response->body->new_program->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIProgram_Exception($message);
    }

    return $response;
  }}

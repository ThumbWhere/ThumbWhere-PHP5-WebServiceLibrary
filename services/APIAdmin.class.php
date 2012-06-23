
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
 * Default APIAdmin Exception.
 */
class APIAdmin_Exception extends Exception {
}

/*%******************************************************************************************%*/
// MAIN CLASS

/**
 * TODO: Documentation from Admin API index.xml
 *
 * Visit <http://thumbwhere.com/api/> for more information.
 *
 * @version V1.1
 * @license See the included NOTICE.md file for more information.
 * @copyright See the included NOTICE.md file for more information.
 * @link http://thumbwhere.com/api/ ThumbWhere Admin
 * @link http://thumbwhere.com/documentation/admin/ ThumbWhere Admin documentation
 */
class ThumbWhereAPIAdmin extends TWRuntime {
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
   * Constructs a new instance of <ThumbWhereAPIAdmin>. If the <code>TW_DEFAULT_CACHE_CONFIG</code> configuration
   * option is set, requests will be authenticated using a session token. Otherwise, requests will use
   * the older authentication method.
   *
   * @param string $environment (Optional) Used to specify the type of environment. 'localhost', 'staging' etc..
   * @return boolean A value of <code>false</code> if no valid values are set, otherwise <code>true</code>.
   */

  public function __construct($environment = null) {
    $this->api_version = 'v1.1';
    $this->api = 'admin';
    $this->hostname = self::DEFAULT_URL;

    return parent::__construct();
  }

  /*%******************************************************************************************%*/
  // SETTERS

  /**
   * Sets the region to use for subsequent ThumbWhere APIAdmin operations.
   *
   * @param string $region (Required) The region to use for subsequent ThumbWhere APIAdmin operations. [Allowed values: `ThumbWhereAPIAdmin::REGION_US_E1 `, `ThumbWhereAPIAdmin::REGION_US_W1`, `ThumbWhereAPIAdmin::REGION_EU_W1`, `ThumbWhereAPIAdmin::REGION_APAC_SE1`, `ThumbWhereAPIAdmin::REGION_APAC_NE1`]
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
  // 'host_command' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_command resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $host (Required) 'host' field, which is an embedded 'Host' resource. (FIELD).
   * @param string $hostcommandtemplate (Required) 'hostcommandtemplate' field, which is an embedded 'HostCommandTemplate' resource. (FIELD).
   * @param string $command (Required) 'command' field, which is a 'string' type. (FIELD).
   * @param string $running (Required) 'running' field, which is a 'boolean' type. (FIELD).
   * @param string $completed (Required) 'completed' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_command($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_command' ,array(), WATCHDOG_NOTICE);
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
    if (!$this->validate_bucketname_create($bucket)) {
	    // @codeCoverageIgnoreStart
	    throw new APIAdmin_Exception('constraint/field/paramete "' . $bucket . '" is not valid.');
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
    
    //
    // Validate Fields
    //
    if (empty($fields['host'])) {
	    throw new APIAdmin_Exception('Field "host" is mandatory.');
    }
    if (empty($fields['hostcommandtemplate'])) {
	    throw new APIAdmin_Exception('Field "hostcommandtemplate" is mandatory.');
    }
    if (empty($fields['command'])) {
	    throw new APIAdmin_Exception('Field "command" is mandatory.');
    }
    if (empty($fields['running'])) {
	    throw new APIAdmin_Exception('Field "running" is mandatory.');
    }
    if (empty($fields['completed'])) {
	    throw new APIAdmin_Exception('Field "completed" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'host' => $fields['host'],
        'hostcommandtemplate' => $fields['hostcommandtemplate'],
        'command' => $fields['command'],
        'running' => $fields['running'],
        'completed' => $fields['completed'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_command', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_command\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_command\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_command\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_command->status)) {
      $message = 'Error response from server in call to \'create_host_command\'. Response to \'host_command\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_command->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_command\'. Message \'' . $response->body->host_command->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_command resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $host (Required) 'host' field, which is an embedded 'Host' resource. (FIELD).
   * @param string $hostcommandtemplate (Required) 'hostcommandtemplate' field, which is an embedded 'HostCommandTemplate' resource. (FIELD).
   * @param string $command (Required) 'command' field, which is a 'string' type. (FIELD).
   * @param string $running (Required) 'running' field, which is a 'boolean' type. (FIELD).
   * @param string $completed (Required) 'completed' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_command($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_command' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIAdmin_Exception('constraint/field/paramete "' . $bucket . '" is not valid.');
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
    
    //
    // Validate Fields
    //
    if (empty($fields['host'])) {
	    throw new APIAdmin_Exception('Field "host" is mandatory.');
    }
    if (empty($fields['hostcommandtemplate'])) {
	    throw new APIAdmin_Exception('Field "hostcommandtemplate" is mandatory.');
    }
    if (empty($fields['command'])) {
	    throw new APIAdmin_Exception('Field "command" is mandatory.');
    }
    if (empty($fields['running'])) {
	    throw new APIAdmin_Exception('Field "running" is mandatory.');
    }
    if (empty($fields['completed'])) {
	    throw new APIAdmin_Exception('Field "completed" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'host' => $fields['host'],
        'hostcommandtemplate' => $fields['hostcommandtemplate'],
        'command' => $fields['command'],
        'running' => $fields['running'],
        'completed' => $fields['completed'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_command', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_command\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_command\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_command\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_command->status)) {
      $message = 'Error response from server in call to \'update_host_command\'. Response to \'host_command\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_command->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_command\'. Message \'' . $response->body->host_command->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }

		
 /*%******************************************************************************************%*/
  /*%******************************************************************************************%*/
  // 
  // ALL THE ACTIONS
  
  

	
  /*%******************************************************************************************%*/
  // 'account_create' Resource METHODS
  

  /**
   * Invokes the CALL method for the  account_create resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $masterkey (Required) The master key. (PARAMETER).
   * @param string $name (Required) The name of the account. (PARAMETER).
   * @param string $email (Required) Users email. (PARAMETER).
   * @param string $password (Required) Users password. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_account_create($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_account_create' ,array(), WATCHDOG_NOTICE);
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
    if (empty($parameters['masterkey'])) {
	    throw new APIAdmin_Exception('Parameter "masterkey" is mandatory.');
    }
    if (empty($parameters['name'])) {
	    throw new APIAdmin_Exception('Parameter "name" is mandatory.');
    }
    if (empty($parameters['email'])) {
	    throw new APIAdmin_Exception('Parameter "email" is mandatory.');
    }
    if (empty($parameters['password'])) {
	    throw new APIAdmin_Exception('Parameter "password" is mandatory.');
    }
    $opt['query_string'] = array(

        'masterkey' => $parameters['masterkey'],
        'name' => $parameters['name'],
        'email' => $parameters['email'],
        'password' => $parameters['password'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/account_create', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_account_create\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_account_create\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_account_create\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->account_create->status)) {
      $message = 'Error response from server in call to \'call_account_create\'. Response to \'account_create\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->account_create->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_account_create\'. Message \'' . $response->body->account_create->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'account_exists' Resource METHODS
  

  /**
   * Invokes the CALL method for the  account_exists resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $masterkey (Required) The master key. (PARAMETER).
   * @param string $name (Required) The name of the account (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_account_exists($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_account_exists' ,array(), WATCHDOG_NOTICE);
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
    if (empty($parameters['masterkey'])) {
	    throw new APIAdmin_Exception('Parameter "masterkey" is mandatory.');
    }
    if (empty($parameters['name'])) {
	    throw new APIAdmin_Exception('Parameter "name" is mandatory.');
    }
    $opt['query_string'] = array(

        'masterkey' => $parameters['masterkey'],
        'name' => $parameters['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/account_exists', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_account_exists\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_account_exists\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_account_exists\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->account_exists->status)) {
      $message = 'Error response from server in call to \'call_account_exists\'. Response to \'account_exists\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->account_exists->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_account_exists\'. Message \'' . $response->body->account_exists->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'campaign_encrypt' Resource METHODS
  

  /**
   * Invokes the CALL method for the  campaign_encrypt resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. (PARAMETER).
   * @param string $plaintext (Required) The plaintext to be encrypted. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_campaign_encrypt($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_campaign_encrypt' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIAdmin_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['plaintext'])) {
	    throw new APIAdmin_Exception('Parameter "plaintext" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'plaintext' => $parameters['plaintext'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/campaign_encrypt', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_campaign_encrypt\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_campaign_encrypt\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_campaign_encrypt\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->campaign_encrypt->status)) {
      $message = 'Error response from server in call to \'call_campaign_encrypt\'. Response to \'campaign_encrypt\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->campaign_encrypt->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_campaign_encrypt\'. Message \'' . $response->body->campaign_encrypt->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'campaign_set_key' Resource METHODS
  

  /**
   * Invokes the CALL method for the  campaign_set_key resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $masterkey (Required) The master key. (PARAMETER).
   * @param string $id (Required) The id of thge campaign. (PARAMETER).
   * @param string $key (Required) The key for the new campaign. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_campaign_set_key($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_campaign_set_key' ,array(), WATCHDOG_NOTICE);
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
    if (empty($parameters['masterkey'])) {
	    throw new APIAdmin_Exception('Parameter "masterkey" is mandatory.');
    }
    if (empty($parameters['id'])) {
	    throw new APIAdmin_Exception('Parameter "id" is mandatory.');
    }
    if (empty($parameters['key'])) {
	    throw new APIAdmin_Exception('Parameter "key" is mandatory.');
    }
    $opt['query_string'] = array(

        'masterkey' => $parameters['masterkey'],
        'id' => $parameters['id'],
        'key' => $parameters['key'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/campaign_set_key', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_campaign_set_key\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_campaign_set_key\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_campaign_set_key\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->campaign_set_key->status)) {
      $message = 'Error response from server in call to \'call_campaign_set_key\'. Response to \'campaign_set_key\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->campaign_set_key->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_campaign_set_key\'. Message \'' . $response->body->campaign_set_key->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'new_audio_target' Resource METHODS
  

  /**
   * Invokes the CALL method for the  new_audio_target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. (PARAMETER).
   * @param string $name (Required) The name of the audio target. (PARAMETER).
   * @param string $format (Required) The audio format (PARAMETER).
   * @param string $channels (Required) The number of audio channels (PARAMETER).
   * @param string $bitrate (Required) The audio bitrate in bits per second (PARAMETER).
   * @param string $samplerate (Required) The audio samplerate in Hz. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_new_audio_target($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_new_audio_target' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIAdmin_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['name'])) {
	    throw new APIAdmin_Exception('Parameter "name" is mandatory.');
    }
    if (empty($parameters['format'])) {
	    throw new APIAdmin_Exception('Parameter "format" is mandatory.');
    }
    if (empty($parameters['channels'])) {
	    throw new APIAdmin_Exception('Parameter "channels" is mandatory.');
    }
    if (empty($parameters['bitrate'])) {
	    throw new APIAdmin_Exception('Parameter "bitrate" is mandatory.');
    }
    if (empty($parameters['samplerate'])) {
	    throw new APIAdmin_Exception('Parameter "samplerate" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'name' => $parameters['name'],
        'format' => $parameters['format'],
        'channels' => $parameters['channels'],
        'bitrate' => $parameters['bitrate'],
        'samplerate' => $parameters['samplerate'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/new_audio_target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_new_audio_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_new_audio_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_new_audio_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->new_audio_target->status)) {
      $message = 'Error response from server in call to \'call_new_audio_target\'. Response to \'new_audio_target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->new_audio_target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_new_audio_target\'. Message \'' . $response->body->new_audio_target->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'new_campaign' Resource METHODS
  

  /**
   * Invokes the CALL method for the  new_campaign resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $masterkey (Required) The master key. (PARAMETER).
   * @param string $key (Required) The API key for the campaign. If this is not supplied, one will be created for you. (PARAMETER).
   * @param string $name (Required) The name of the campaign. (PARAMETER).
   * @param string $description (Required) The description of the campaign. (PARAMETER).
   * @param string $url (Required) The url for the campaign website. We will use the domain of this as the basis for all the other public urls. If this is not supplied, then we will use the http://%THUMBWHEREBASEDOMAIN%/%campaign.name% as the base. (PARAMETER).
   * @param string $email (Required) Email that the campaign can send notifications to. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_new_campaign($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_new_campaign' ,array(), WATCHDOG_NOTICE);
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
    if (empty($parameters['masterkey'])) {
	    throw new APIAdmin_Exception('Parameter "masterkey" is mandatory.');
    }
    if (empty($parameters['name'])) {
	    throw new APIAdmin_Exception('Parameter "name" is mandatory.');
    }
    $opt['query_string'] = array(

        'masterkey' => $parameters['masterkey'],
        'name' => $parameters['name'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['key'])) {
      $opt['query_string']['key'] = $parameters['key'];
    }
    if (isset($parameters['description'])) {
      $opt['query_string']['description'] = $parameters['description'];
    }
    if (isset($parameters['url'])) {
      $opt['query_string']['url'] = $parameters['url'];
    }
    if (isset($parameters['email'])) {
      $opt['query_string']['email'] = $parameters['email'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/new_campaign', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_new_campaign\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_new_campaign\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_new_campaign\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->new_campaign->status)) {
      $message = 'Error response from server in call to \'call_new_campaign\'. Response to \'new_campaign\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->new_campaign->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_new_campaign\'. Message \'' . $response->body->new_campaign->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'new_server' Resource METHODS
  

  /**
   * Invokes the CALL method for the  new_server resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. (PARAMETER).
   * @param string $name (Required) The name of the server. (PARAMETER).
   * @param string $public_url (Required) The public facing url that uploded content will be accessible on. (PARAMETER).
   * @param string $upload_url (Required) Where we upload our content to. (PARAMETER).
   * @param string $media (Required) The media that we will store on this server. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_new_server($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_new_server' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIAdmin_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['name'])) {
	    throw new APIAdmin_Exception('Parameter "name" is mandatory.');
    }
    if (empty($parameters['public_url'])) {
	    throw new APIAdmin_Exception('Parameter "public_url" is mandatory.');
    }
    if (empty($parameters['upload_url'])) {
	    throw new APIAdmin_Exception('Parameter "upload_url" is mandatory.');
    }
    if (empty($parameters['media'])) {
	    throw new APIAdmin_Exception('Parameter "media" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'name' => $parameters['name'],
        'public_url' => $parameters['public_url'],
        'upload_url' => $parameters['upload_url'],
        'media' => $parameters['media'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/new_server', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_new_server\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_new_server\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_new_server\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->new_server->status)) {
      $message = 'Error response from server in call to \'call_new_server\'. Response to \'new_server\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->new_server->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_new_server\'. Message \'' . $response->body->new_server->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'user_exists' Resource METHODS
  

  /**
   * Invokes the CALL method for the  user_exists resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $masterkey (Required) The master key. (PARAMETER).
   * @param string $email (Required) The email of the user (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_user_exists($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_user_exists' ,array(), WATCHDOG_NOTICE);
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
    if (empty($parameters['masterkey'])) {
	    throw new APIAdmin_Exception('Parameter "masterkey" is mandatory.');
    }
    if (empty($parameters['email'])) {
	    throw new APIAdmin_Exception('Parameter "email" is mandatory.');
    }
    $opt['query_string'] = array(

        'masterkey' => $parameters['masterkey'],
        'email' => $parameters['email'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/user_exists', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_user_exists\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_user_exists\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_user_exists\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->user_exists->status)) {
      $message = 'Error response from server in call to \'call_user_exists\'. Response to \'user_exists\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->user_exists->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_user_exists\'. Message \'' . $response->body->user_exists->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'user_recover' Resource METHODS
  

  /**
   * Invokes the CALL method for the  user_recover resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $masterkey (Required) The master key. (PARAMETER).
   * @param string $email (Required) The email of the user (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_user_recover($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_user_recover' ,array(), WATCHDOG_NOTICE);
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
    if (empty($parameters['masterkey'])) {
	    throw new APIAdmin_Exception('Parameter "masterkey" is mandatory.');
    }
    if (empty($parameters['email'])) {
	    throw new APIAdmin_Exception('Parameter "email" is mandatory.');
    }
    $opt['query_string'] = array(

        'masterkey' => $parameters['masterkey'],
        'email' => $parameters['email'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/user_recover', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_user_recover\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_user_recover\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_user_recover\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->user_recover->status)) {
      $message = 'Error response from server in call to \'call_user_recover\'. Response to \'user_recover\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->user_recover->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_user_recover\'. Message \'' . $response->body->user_recover->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }}

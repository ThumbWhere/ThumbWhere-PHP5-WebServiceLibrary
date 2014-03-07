
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
  // 'identity' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  identity resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $identitytype (Required) 'identitytype' field, which is an embedded 'IdentityType' resource. (FIELD).
   * @param string $member (Required) 'member' field, which is an embedded 'Member' resource. (FIELD).
   * @param string $id (Required) 'id' field, which is a 'string' type. (FIELD).
   * @param string $external_id (Required) 'external_id' field, which is a 'string' type. (FIELD).
   * @param string $secret (Required) 'secret' field, which is a 'string' type. (FIELD).
   * @param string $secret_hash (Required) 'secret_hash' field, which is a 'string' type. (FIELD).
   * @param string $secret_hash_salt (Required) 'secret_hash_salt' field, which is a 'string' type. (FIELD).
   * @param string $secret_hash_itterations (Required) 'secret_hash_itterations' field, which is a 'int' type. (FIELD).
   * @param string $label (Required) 'label' field, which is a 'string' type. (FIELD).
   * @param string $last_login (Required) 'last_login' field, which is a 'datetime' type. (FIELD).
   * @param string $total_logins (Required) 'total_logins' field, which is a 'long' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_identity($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_identity' ,array(), WATCHDOG_NOTICE);
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
      throw new APIIdentity_Exception('Cannot send create \'identity\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['identitytype'])) {
	    throw new APIIdentity_Exception('Field "identitytype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'identitytype' => $fields['identitytype'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['member'])) {
      $opt['query_string']['member'] = $fields['member'];
    }
    if (isset($fields['id'])) {
      $opt['query_string']['id'] = $fields['id'];
    }
    if (isset($fields['external_id'])) {
      $opt['query_string']['external_id'] = $fields['external_id'];
    }
    if (isset($fields['secret'])) {
      $opt['query_string']['secret'] = $fields['secret'];
    }
    if (isset($fields['secret_hash'])) {
      $opt['query_string']['secret_hash'] = $fields['secret_hash'];
    }
    if (isset($fields['secret_hash_salt'])) {
      $opt['query_string']['secret_hash_salt'] = $fields['secret_hash_salt'];
    }
    if (isset($fields['secret_hash_itterations'])) {
      $opt['query_string']['secret_hash_itterations'] = $fields['secret_hash_itterations'];
    }
    if (isset($fields['label'])) {
      $opt['query_string']['label'] = $fields['label'];
    }
    if (isset($fields['last_login'])) {
      $opt['query_string']['last_login'] = $fields['last_login'];
    }
    if (isset($fields['total_logins'])) {
      $opt['query_string']['total_logins'] = $fields['total_logins'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/identity', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_identity\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_identity\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_identity\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!isset($response->body->identity->status)) {
      $message = 'Error response from server in call to \'create_identity\'. Response to \'identity\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->identity->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_identity\'. Message \'' . $response->body->identity->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  identity resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $identitytype (Required) 'identitytype' field, which is an embedded 'IdentityType' resource. (FIELD).
   * @param string $member (Required) 'member' field, which is an embedded 'Member' resource. (FIELD).
   * @param string $id (Required) 'id' field, which is a 'string' type. (FIELD).
   * @param string $external_id (Required) 'external_id' field, which is a 'string' type. (FIELD).
   * @param string $secret (Required) 'secret' field, which is a 'string' type. (FIELD).
   * @param string $secret_hash (Required) 'secret_hash' field, which is a 'string' type. (FIELD).
   * @param string $secret_hash_salt (Required) 'secret_hash_salt' field, which is a 'string' type. (FIELD).
   * @param string $secret_hash_itterations (Required) 'secret_hash_itterations' field, which is a 'int' type. (FIELD).
   * @param string $label (Required) 'label' field, which is a 'string' type. (FIELD).
   * @param string $last_login (Required) 'last_login' field, which is a 'datetime' type. (FIELD).
   * @param string $total_logins (Required) 'total_logins' field, which is a 'long' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_identity($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_identity' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIIdentity_Exception('constraint/field/paramete "' . $bucket . '" is not valid.');
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
      throw new APIIdentity_Exception('Cannot send create \'identity\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['identitytype'])) {
	    throw new APIIdentity_Exception('Field "identitytype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'identitytype' => $fields['identitytype'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['member'])) {
      $opt['query_string']['member'] = $fields['member'];
    }
    if (isset($fields['id'])) {
      $opt['query_string']['id'] = $fields['id'];
    }
    if (isset($fields['external_id'])) {
      $opt['query_string']['external_id'] = $fields['external_id'];
    }
    if (isset($fields['secret'])) {
      $opt['query_string']['secret'] = $fields['secret'];
    }
    if (isset($fields['secret_hash'])) {
      $opt['query_string']['secret_hash'] = $fields['secret_hash'];
    }
    if (isset($fields['secret_hash_salt'])) {
      $opt['query_string']['secret_hash_salt'] = $fields['secret_hash_salt'];
    }
    if (isset($fields['secret_hash_itterations'])) {
      $opt['query_string']['secret_hash_itterations'] = $fields['secret_hash_itterations'];
    }
    if (isset($fields['label'])) {
      $opt['query_string']['label'] = $fields['label'];
    }
    if (isset($fields['last_login'])) {
      $opt['query_string']['last_login'] = $fields['last_login'];
    }
    if (isset($fields['total_logins'])) {
      $opt['query_string']['total_logins'] = $fields['total_logins'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/identity', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_identity\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_identity\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_identity\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!isset($response->body->identity->status)) {
      $message = 'Error response from server in call to \'update_identity\'. Response to \'identity\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->identity->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_identity\'. Message \'' . $response->body->identity->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }

		
 /*%******************************************************************************************%*/
  /*%******************************************************************************************%*/
  // 
  // ALL THE ACTIONS
  
  

	
  /*%******************************************************************************************%*/
  // 'authenticate' Resource METHODS
  

  /**
   * Invokes the CALL method for the  authenticate resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API Key to provide context for this request. (PARAMETER).
   * @param string $type (Required) The identity type (PARAMETER).
   * @param string $id (Required) The id you want to validate against. (PARAMETER).
   * @param string $secret (Required) The secret you want to supply to complete your validation. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_authenticate($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_authenticate' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIIdentity_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['type'])) {
	    throw new APIIdentity_Exception('Parameter "type" is mandatory.');
    }
    if (!isset($parameters['id'])) {
	    throw new APIIdentity_Exception('Parameter "id" is mandatory.');
    }
    if (empty($parameters['secret'])) {
	    throw new APIIdentity_Exception('Parameter "secret" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'type' => $parameters['type'],
        'id' => $parameters['id'],
        'secret' => $parameters['secret'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/authenticate', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_authenticate\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_authenticate\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_authenticate\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!isset($response->body->authenticate->status)) {
      $message = 'Error response from server in call to \'call_authenticate\'. Response to \'authenticate\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->authenticate->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_authenticate\'. Message \'' . $response->body->authenticate->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'authenticate_request' Resource METHODS
  

  /**
   * Invokes the CALL method for the  authenticate_request resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API Key that a Identity Token request has been made against. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the API's domain name. (PARAMETER).
   * @param string $code (Required) The code that was returned by a previous call to ^request^. This code should have been sent via SMS or MMS to the number also returned by ^request^. (PARAMETER).
   * @param string $id (Required) The id you want to validate against. (PARAMETER).
   * @param string $secret (Required) The secret you want to supply to complete your validation. (PARAMETER).
   * @param string $label (Required) Optional label you want to apply to the new identity. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_authenticate_request($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_authenticate_request' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIIdentity_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['code'])) {
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
    if (isset($parameters['label'])) {
      $opt['query_string']['label'] = $parameters['label'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/authenticate_request', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_authenticate_request\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_authenticate_request\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_authenticate_request\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!isset($response->body->authenticate_request->status)) {
      $message = 'Error response from server in call to \'call_authenticate_request\'. Response to \'authenticate_request\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->authenticate_request->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_authenticate_request\'. Message \'' . $response->body->authenticate_request->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'available' Resource METHODS
  

  /**
   * Invokes the CALL method for the  available resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API Key to provide context for this request. (PARAMETER).
   * @param string $type (Required) The identity type (PARAMETER).
   * @param string $id (Required) The id you want to validate against. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_available($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_available' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIIdentity_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['type'])) {
	    throw new APIIdentity_Exception('Parameter "type" is mandatory.');
    }
    if (!isset($parameters['id'])) {
	    throw new APIIdentity_Exception('Parameter "id" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'type' => $parameters['type'],
        'id' => $parameters['id'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/available', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_available\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_available\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_available\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!isset($response->body->available->status)) {
      $message = 'Error response from server in call to \'call_available\'. Response to \'available\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->available->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_available\'. Message \'' . $response->body->available->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'info' Resource METHODS
  

  /**
   * Invokes the CALL method for the  info resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API Key to provide context for this request. (PARAMETER).
   * @param string $member (Required) The identity type (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_info($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_info' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIIdentity_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['member'])) {
	    throw new APIIdentity_Exception('Parameter "member" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'member' => $parameters['member'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/info', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_info\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_info\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_info\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!isset($response->body->info->status)) {
      $message = 'Error response from server in call to \'call_info\'. Response to \'info\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->info->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_info\'. Message \'' . $response->body->info->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'query_request' Resource METHODS
  

  /**
   * Invokes the CALL method for the  query_request resource web service.
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
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_query_request' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIIdentity_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['code'])) {
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

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_query_request\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_query_request\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_query_request\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!isset($response->body->query_request->status)) {
      $message = 'Error response from server in call to \'call_query_request\'. Response to \'query_request\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->query_request->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_query_request\'. Message \'' . $response->body->query_request->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'request' Resource METHODS
  

  /**
   * Invokes the CALL method for the  request resource web service.
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
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_request' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIIdentity_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['type'])) {
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

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_request\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_request\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_request\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!isset($response->body->request->status)) {
      $message = 'Error response from server in call to \'call_request\'. Response to \'request\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->request->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_request\'. Message \'' . $response->body->request->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'set_label' Resource METHODS
  

  /**
   * Invokes the CALL method for the  set_label resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The api key to provide context for this campaign. (PARAMETER).
   * @param string $identity (Required) The key to provide context for this campaign. (PARAMETER).
   * @param string $label (Required) The label we want to set. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_set_label($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_set_label' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIIdentity_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['identity'])) {
	    throw new APIIdentity_Exception('Parameter "identity" is mandatory.');
    }
    if (empty($parameters['label'])) {
	    throw new APIIdentity_Exception('Parameter "label" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'identity' => $parameters['identity'],
        'label' => $parameters['label'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/set_label', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_set_label\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_set_label\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_set_label\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!isset($response->body->set_label->status)) {
      $message = 'Error response from server in call to \'call_set_label\'. Response to \'set_label\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->set_label->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_set_label\'. Message \'' . $response->body->set_label->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'validate' Resource METHODS
  

  /**
   * Invokes the CALL method for the  validate resource web service.
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
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_validate' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($parameters['code'])) {
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

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_validate\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_validate\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_validate\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

	  if (!isset($response->body->validate->status)) {
      $message = 'Error response from server in call to \'call_validate\'. Response to \'validate\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    $status = $response->body->validate->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_validate\'. Message \'' . $response->body->validate->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIIdentity_Exception($message);
    }

    return $response;
  }}

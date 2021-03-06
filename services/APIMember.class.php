
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
 * Default APIMember Exception.
 */
class APIMember_Exception extends Exception {
}

/*%******************************************************************************************%*/
// MAIN CLASS

/**
 * TODO: Documentation from Member API index.xml
 *
 * Visit <http://thumbwhere.com/api/> for more information.
 *
 * @version V1.1
 * @license See the included NOTICE.md file for more information.
 * @copyright See the included NOTICE.md file for more information.
 * @link http://thumbwhere.com/api/ ThumbWhere Member
 * @link http://thumbwhere.com/documentation/member/ ThumbWhere Member documentation
 */
class ThumbWhereAPIMember extends TWRuntime {
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
   * Constructs a new instance of <ThumbWhereAPIMember>. If the <code>TW_DEFAULT_CACHE_CONFIG</code> configuration
   * option is set, requests will be authenticated using a session token. Otherwise, requests will use
   * the older authentication method.
   *
   * @param string $environment (Optional) Used to specify the type of environment. 'localhost', 'staging' etc..
   * @return boolean A value of <code>false</code> if no valid values are set, otherwise <code>true</code>.
   */

  public function __construct($environment = null) {
    $this->api_version = 'v1.1';
    $this->api = 'member';
    $this->hostname = self::DEFAULT_URL;

    return parent::__construct();
  }

  /*%******************************************************************************************%*/
  // SETTERS

  /**
   * Sets the region to use for subsequent ThumbWhere APIMember operations.
   *
   * @param string $region (Required) The region to use for subsequent ThumbWhere APIMember operations. [Allowed values: `ThumbWhereAPIMember::REGION_US_E1 `, `ThumbWhereAPIMember::REGION_US_W1`, `ThumbWhereAPIMember::REGION_EU_W1`, `ThumbWhereAPIMember::REGION_APAC_SE1`, `ThumbWhereAPIMember::REGION_APAC_NE1`]
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
  // 'member' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  member resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $profilepic (Required) 'profilepic' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param string $profilepics_mediaitemcollection (Required) 'profilepics_mediaitemcollection' field, which is an embedded 'MediaItemCollection' resource. (FIELD).
   * @param string $whiteboard_mediaitemcollection (Required) 'whiteboard_mediaitemcollection' field, which is an embedded 'MediaItemCollection' resource. (FIELD).
   * @param string $activityfeed (Required) 'activityfeed' field, which is an embedded 'ActivityFeed' resource. (FIELD).
   * @param string $password (Required) 'password' field, which is a 'string' type. (FIELD).
   * @param string $external_id (Required) 'external_id' field, which is a 'string' type. (FIELD).
   * @param string $about (Required) 'about' field, which is a 'string' type. (FIELD).
   * @param string $url (Required) 'url' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_member($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_member' ,array(), WATCHDOG_NOTICE);
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
      throw new APIMember_Exception('Cannot send create \'member\'resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['profilepic'])) {
      $opt['query_string']['profilepic'] = $fields['profilepic'];
    }
    if (isset($fields['profilepics_mediaitemcollection'])) {
      $opt['query_string']['profilepics_mediaitemcollection'] = $fields['profilepics_mediaitemcollection'];
    }
    if (isset($fields['whiteboard_mediaitemcollection'])) {
      $opt['query_string']['whiteboard_mediaitemcollection'] = $fields['whiteboard_mediaitemcollection'];
    }
    if (isset($fields['activityfeed'])) {
      $opt['query_string']['activityfeed'] = $fields['activityfeed'];
    }
    if (isset($fields['password'])) {
      $opt['query_string']['password'] = $fields['password'];
    }
    if (isset($fields['external_id'])) {
      $opt['query_string']['external_id'] = $fields['external_id'];
    }
    if (isset($fields['about'])) {
      $opt['query_string']['about'] = $fields['about'];
    }
    if (isset($fields['url'])) {
      $opt['query_string']['url'] = $fields['url'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/member', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_member\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_member\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_member\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!isset($response->body->member->status)) {
      $message = 'Error response from server in call to \'create_member\'. Response to \'member\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    $status = $response->body->member->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_member\'. Message \'' . $response->body->member->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  member resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $profilepic (Required) 'profilepic' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param string $profilepics_mediaitemcollection (Required) 'profilepics_mediaitemcollection' field, which is an embedded 'MediaItemCollection' resource. (FIELD).
   * @param string $whiteboard_mediaitemcollection (Required) 'whiteboard_mediaitemcollection' field, which is an embedded 'MediaItemCollection' resource. (FIELD).
   * @param string $activityfeed (Required) 'activityfeed' field, which is an embedded 'ActivityFeed' resource. (FIELD).
   * @param string $password (Required) 'password' field, which is a 'string' type. (FIELD).
   * @param string $external_id (Required) 'external_id' field, which is a 'string' type. (FIELD).
   * @param string $about (Required) 'about' field, which is a 'string' type. (FIELD).
   * @param string $url (Required) 'url' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_member($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_member' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMember_Exception('constraint/field/paramete "' . $bucket . '" is not valid.');
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
      throw new APIMember_Exception('Cannot send create \'member\'resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['profilepic'])) {
      $opt['query_string']['profilepic'] = $fields['profilepic'];
    }
    if (isset($fields['profilepics_mediaitemcollection'])) {
      $opt['query_string']['profilepics_mediaitemcollection'] = $fields['profilepics_mediaitemcollection'];
    }
    if (isset($fields['whiteboard_mediaitemcollection'])) {
      $opt['query_string']['whiteboard_mediaitemcollection'] = $fields['whiteboard_mediaitemcollection'];
    }
    if (isset($fields['activityfeed'])) {
      $opt['query_string']['activityfeed'] = $fields['activityfeed'];
    }
    if (isset($fields['password'])) {
      $opt['query_string']['password'] = $fields['password'];
    }
    if (isset($fields['external_id'])) {
      $opt['query_string']['external_id'] = $fields['external_id'];
    }
    if (isset($fields['about'])) {
      $opt['query_string']['about'] = $fields['about'];
    }
    if (isset($fields['url'])) {
      $opt['query_string']['url'] = $fields['url'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/member', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_member\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_member\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_member\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!isset($response->body->member->status)) {
      $message = 'Error response from server in call to \'update_member\'. Response to \'member\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    $status = $response->body->member->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_member\'. Message \'' . $response->body->member->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    return $response;
  }

		
 /*%******************************************************************************************%*/
  /*%******************************************************************************************%*/
  // 
  // ALL THE ACTIONS
  
  

	
  /*%******************************************************************************************%*/
  // 'create' Resource METHODS
  

  /**
   * Invokes the CALL method for the  create resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the API's domain name. (PARAMETER).
   * @param string $id (Required) The that we want for the consumer. We will create an id if this is not supplied. (PARAMETER).
   * @param string $secret (Required) The password for the consumer. We will create an id if this is not supplied. (PARAMETER).
   * @param string $email (Required) The email of the consumer. We will create an email identity if this is not supplied. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_create($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_create' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMember_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['id'])) {
	    throw new APIMember_Exception('Parameter "id" is mandatory.');
    }
    if (empty($parameters['secret'])) {
	    throw new APIMember_Exception('Parameter "secret" is mandatory.');
    }
    if (empty($parameters['email'])) {
	    throw new APIMember_Exception('Parameter "email" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'id' => $parameters['id'],
        'secret' => $parameters['secret'],
        'email' => $parameters['email'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/create', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_create\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_create\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_create\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!isset($response->body->create->status)) {
      $message = 'Error response from server in call to \'call_create\'. Response to \'create\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    $status = $response->body->create->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_create\'. Message \'' . $response->body->create->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
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
   * @param string $key (Required) The API key for the campaign or external application. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the API's domain name. (PARAMETER).
   * @param string $member (Required) The member that we are requesting information on. (PARAMETER).
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
	    throw new APIMember_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['member'])) {
	    throw new APIMember_Exception('Parameter "member" is mandatory.');
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
	    throw new APIMember_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_info\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_info\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!isset($response->body->info->status)) {
      $message = 'Error response from server in call to \'call_info\'. Response to \'info\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    $status = $response->body->info->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_info\'. Message \'' . $response->body->info->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'set_about' Resource METHODS
  

  /**
   * Invokes the CALL method for the  set_about resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $member (Required) The member registering this dish. (PARAMETER).
   * @param string $about (Required) The about text we are setting for the member. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_set_about($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_set_about' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMember_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['member'])) {
	    throw new APIMember_Exception('Parameter "member" is mandatory.');
    }
    if (empty($parameters['about'])) {
	    throw new APIMember_Exception('Parameter "about" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'member' => $parameters['member'],
        'about' => $parameters['about'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/set_about', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_set_about\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_set_about\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_set_about\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!isset($response->body->set_about->status)) {
      $message = 'Error response from server in call to \'call_set_about\'. Response to \'set_about\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    $status = $response->body->set_about->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_set_about\'. Message \'' . $response->body->set_about->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'set_profilepic' Resource METHODS
  

  /**
   * Invokes the CALL method for the  set_profilepic resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $member (Required) The member registering this dish. (PARAMETER).
   * @param string $mediaitem (Required) The media item we are declaring is our new dish. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_set_profilepic($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_set_profilepic' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMember_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['member'])) {
	    throw new APIMember_Exception('Parameter "member" is mandatory.');
    }
    if (!isset($parameters['mediaitem'])) {
	    throw new APIMember_Exception('Parameter "mediaitem" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'member' => $parameters['member'],
        'mediaitem' => $parameters['mediaitem'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/set_profilepic', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_set_profilepic\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_set_profilepic\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_set_profilepic\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!isset($response->body->set_profilepic->status)) {
      $message = 'Error response from server in call to \'call_set_profilepic\'. Response to \'set_profilepic\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    $status = $response->body->set_profilepic->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_set_profilepic\'. Message \'' . $response->body->set_profilepic->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'set_url' Resource METHODS
  

  /**
   * Invokes the CALL method for the  set_url resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $member (Required) The member registering this dish. (PARAMETER).
   * @param string $url (Required) The url we are setting for the member. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_set_url($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_set_url' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMember_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['member'])) {
	    throw new APIMember_Exception('Parameter "member" is mandatory.');
    }
    if (empty($parameters['url'])) {
	    throw new APIMember_Exception('Parameter "url" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'member' => $parameters['member'],
        'url' => $parameters['url'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/set_url', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_set_url\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_set_url\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_set_url\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

	  if (!isset($response->body->set_url->status)) {
      $message = 'Error response from server in call to \'call_set_url\'. Response to \'set_url\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    $status = $response->body->set_url->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_set_url\'. Message \'' . $response->body->set_url->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIMember_Exception($message);
    }

    return $response;
  }}

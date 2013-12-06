
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
  // 'mediaitem' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  mediaitem resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $code (Required) 'code' field, which is an embedded 'Code' resource. (FIELD).
   * @param string $identity (Required) 'identity' field, which is an embedded 'Identity' resource. (FIELD).
   * @param string $format (Required) 'format' field, which is an embedded 'Format' resource. (FIELD).
   * @param string $server (Required) 'server' field, which is an embedded 'Server' resource. (FIELD).
   * @param string $license (Required) 'license' field, which is an embedded 'License' resource. (FIELD).
   * @param string $content (Required) 'content' field, which is an embedded 'Content' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $title (Required) 'title' field, which is a 'string' type. (FIELD).
   * @param string $body (Required) 'body' field, which is a 'string' type. (FIELD).
   * @param string $bodyonly (Required) 'bodyonly' field, which is a 'boolean' type. (FIELD).
   * @param string $comment (Required) 'comment' field, which is a 'boolean' type. (FIELD).
   * @param string $usergenerated (Required) 'usergenerated' field, which is a 'boolean' type. (FIELD).
   * @param string $digest (Required) 'digest' field, which is a 'string' type. (FIELD).
   * @param string $process_attempts (Required) 'process_attempts' field, which is a 'long' type. (FIELD).
   * @param string $censored (Required) 'censored' field, which is a 'boolean' type. (FIELD).
   * @param string $reviewed (Required) 'reviewed' field, which is a 'boolean' type. (FIELD).
   * @param string $privacy (Required) 'privacy' field, which is a 'long' type. (FIELD).
   * @param string $viewcount (Required) 'viewcount' field, which is a 'long' type. (FIELD).
   * @param string $ratingdividend (Required) 'ratingdividend' field, which is a 'long' type. (FIELD).
   * @param string $ratingdivisor (Required) 'ratingdivisor' field, which is a 'long' type. (FIELD).
   * @param string $ratings (Required) 'ratings' field, which is a 'long' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_mediaitem($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_mediaitem' ,array(), WATCHDOG_NOTICE);
	    if (variable_get('thumbwhere_api_log_debug',0) == 1) debug($context);
	    if (variable_get('thumbwhere_api_log_debug',0) == 1) debug($fields);


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
    if (!isset($fields['code'])) {
	    throw new APIMedia_Exception('Field "code" is mandatory.');
    }
    if (!isset($fields['identity'])) {
	    throw new APIMedia_Exception('Field "identity" is mandatory.');
    }
    if (!isset($fields['format'])) {
	    throw new APIMedia_Exception('Field "format" is mandatory.');
    }
    if (!isset($fields['server'])) {
	    throw new APIMedia_Exception('Field "server" is mandatory.');
    }
    if (empty($fields['digest'])) {
	    throw new APIMedia_Exception('Field "digest" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'code' => $fields['code'],
        'identity' => $fields['identity'],
        'format' => $fields['format'],
        'server' => $fields['server'],
        'digest' => $fields['digest'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['license'])) {
      $opt['query_string']['license'] = $fields['license'];
    }
    if (isset($fields['content'])) {
      $opt['query_string']['content'] = $fields['content'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['title'])) {
      $opt['query_string']['title'] = $fields['title'];
    }
    if (isset($fields['body'])) {
      $opt['query_string']['body'] = $fields['body'];
    }
    if (isset($fields['bodyonly'])) {
      $opt['query_string']['bodyonly'] = $fields['bodyonly'];
    }
    if (isset($fields['comment'])) {
      $opt['query_string']['comment'] = $fields['comment'];
    }
    if (isset($fields['usergenerated'])) {
      $opt['query_string']['usergenerated'] = $fields['usergenerated'];
    }
    if (isset($fields['process_attempts'])) {
      $opt['query_string']['process_attempts'] = $fields['process_attempts'];
    }
    if (isset($fields['censored'])) {
      $opt['query_string']['censored'] = $fields['censored'];
    }
    if (isset($fields['reviewed'])) {
      $opt['query_string']['reviewed'] = $fields['reviewed'];
    }
    if (isset($fields['privacy'])) {
      $opt['query_string']['privacy'] = $fields['privacy'];
    }
    if (isset($fields['viewcount'])) {
      $opt['query_string']['viewcount'] = $fields['viewcount'];
    }
    if (isset($fields['ratingdividend'])) {
      $opt['query_string']['ratingdividend'] = $fields['ratingdividend'];
    }
    if (isset($fields['ratingdivisor'])) {
      $opt['query_string']['ratingdivisor'] = $fields['ratingdivisor'];
    }
    if (isset($fields['ratings'])) {
      $opt['query_string']['ratings'] = $fields['ratings'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/mediaitem', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_mediaitem\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_mediaitem\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_mediaitem\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->mediaitem->status)) {
      $message = 'Error response from server in call to \'create_mediaitem\'. Response to \'mediaitem\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->mediaitem->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_mediaitem\'. Message \'' . $response->body->mediaitem->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  mediaitem resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $code (Required) 'code' field, which is an embedded 'Code' resource. (FIELD).
   * @param string $identity (Required) 'identity' field, which is an embedded 'Identity' resource. (FIELD).
   * @param string $format (Required) 'format' field, which is an embedded 'Format' resource. (FIELD).
   * @param string $server (Required) 'server' field, which is an embedded 'Server' resource. (FIELD).
   * @param string $license (Required) 'license' field, which is an embedded 'License' resource. (FIELD).
   * @param string $content (Required) 'content' field, which is an embedded 'Content' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $title (Required) 'title' field, which is a 'string' type. (FIELD).
   * @param string $body (Required) 'body' field, which is a 'string' type. (FIELD).
   * @param string $bodyonly (Required) 'bodyonly' field, which is a 'boolean' type. (FIELD).
   * @param string $comment (Required) 'comment' field, which is a 'boolean' type. (FIELD).
   * @param string $usergenerated (Required) 'usergenerated' field, which is a 'boolean' type. (FIELD).
   * @param string $digest (Required) 'digest' field, which is a 'string' type. (FIELD).
   * @param string $process_attempts (Required) 'process_attempts' field, which is a 'long' type. (FIELD).
   * @param string $censored (Required) 'censored' field, which is a 'boolean' type. (FIELD).
   * @param string $reviewed (Required) 'reviewed' field, which is a 'boolean' type. (FIELD).
   * @param string $privacy (Required) 'privacy' field, which is a 'long' type. (FIELD).
   * @param string $viewcount (Required) 'viewcount' field, which is a 'long' type. (FIELD).
   * @param string $ratingdividend (Required) 'ratingdividend' field, which is a 'long' type. (FIELD).
   * @param string $ratingdivisor (Required) 'ratingdivisor' field, which is a 'long' type. (FIELD).
   * @param string $ratings (Required) 'ratings' field, which is a 'long' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_mediaitem($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_mediaitem' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMedia_Exception('constraint/field/paramete "' . $bucket . '" is not valid.');
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
    if (!isset($fields['code'])) {
	    throw new APIMedia_Exception('Field "code" is mandatory.');
    }
    if (!isset($fields['identity'])) {
	    throw new APIMedia_Exception('Field "identity" is mandatory.');
    }
    if (!isset($fields['format'])) {
	    throw new APIMedia_Exception('Field "format" is mandatory.');
    }
    if (!isset($fields['server'])) {
	    throw new APIMedia_Exception('Field "server" is mandatory.');
    }
    if (empty($fields['digest'])) {
	    throw new APIMedia_Exception('Field "digest" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'code' => $fields['code'],
        'identity' => $fields['identity'],
        'format' => $fields['format'],
        'server' => $fields['server'],
        'digest' => $fields['digest'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['license'])) {
      $opt['query_string']['license'] = $fields['license'];
    }
    if (isset($fields['content'])) {
      $opt['query_string']['content'] = $fields['content'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['title'])) {
      $opt['query_string']['title'] = $fields['title'];
    }
    if (isset($fields['body'])) {
      $opt['query_string']['body'] = $fields['body'];
    }
    if (isset($fields['bodyonly'])) {
      $opt['query_string']['bodyonly'] = $fields['bodyonly'];
    }
    if (isset($fields['comment'])) {
      $opt['query_string']['comment'] = $fields['comment'];
    }
    if (isset($fields['usergenerated'])) {
      $opt['query_string']['usergenerated'] = $fields['usergenerated'];
    }
    if (isset($fields['process_attempts'])) {
      $opt['query_string']['process_attempts'] = $fields['process_attempts'];
    }
    if (isset($fields['censored'])) {
      $opt['query_string']['censored'] = $fields['censored'];
    }
    if (isset($fields['reviewed'])) {
      $opt['query_string']['reviewed'] = $fields['reviewed'];
    }
    if (isset($fields['privacy'])) {
      $opt['query_string']['privacy'] = $fields['privacy'];
    }
    if (isset($fields['viewcount'])) {
      $opt['query_string']['viewcount'] = $fields['viewcount'];
    }
    if (isset($fields['ratingdividend'])) {
      $opt['query_string']['ratingdividend'] = $fields['ratingdividend'];
    }
    if (isset($fields['ratingdivisor'])) {
      $opt['query_string']['ratingdivisor'] = $fields['ratingdivisor'];
    }
    if (isset($fields['ratings'])) {
      $opt['query_string']['ratings'] = $fields['ratings'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/mediaitem', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_mediaitem\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_mediaitem\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_mediaitem\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->mediaitem->status)) {
      $message = 'Error response from server in call to \'update_mediaitem\'. Response to \'mediaitem\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->mediaitem->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_mediaitem\'. Message \'' . $response->body->mediaitem->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'target' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_target($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_target' ,array(), WATCHDOG_NOTICE);
	    if (variable_get('thumbwhere_api_log_debug',0) == 1) debug($context);
	    if (variable_get('thumbwhere_api_log_debug',0) == 1) debug($fields);


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
    if (!isset($fields['campaign'])) {
	    throw new APIMedia_Exception('Field "campaign" is mandatory.');
    }
    if (empty($fields['name'])) {
	    throw new APIMedia_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'campaign' => $fields['campaign'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->target->status)) {
      $message = 'Error response from server in call to \'create_target\'. Response to \'target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_target\'. Message \'' . $response->body->target->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_target($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_target' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMedia_Exception('constraint/field/paramete "' . $bucket . '" is not valid.');
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
    if (!isset($fields['campaign'])) {
	    throw new APIMedia_Exception('Field "campaign" is mandatory.');
    }
    if (empty($fields['name'])) {
	    throw new APIMedia_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'campaign' => $fields['campaign'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->target->status)) {
      $message = 'Error response from server in call to \'update_target\'. Response to \'target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_target\'. Message \'' . $response->body->target->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }

		
 /*%******************************************************************************************%*/
  /*%******************************************************************************************%*/
  // 
  // ALL THE ACTIONS
  
  

	
  /*%******************************************************************************************%*/
  // 'deploy' Resource METHODS
  

  /**
   * Invokes the CALL method for the  deploy resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the calling domain name (PARAMETER).
   * @param string $mediaitem (Required) The media item we are 'generating'. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_deploy($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_deploy' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMedia_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['mediaitem'])) {
	    throw new APIMedia_Exception('Parameter "mediaitem" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'mediaitem' => $parameters['mediaitem'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/deploy', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_deploy\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_deploy\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_deploy\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->deploy->status)) {
      $message = 'Error response from server in call to \'call_deploy\'. Response to \'deploy\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->deploy->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_deploy\'. Message \'' . $response->body->deploy->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'fingerprint' Resource METHODS
  

  /**
   * Invokes the CALL method for the  fingerprint resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the calling domain name (PARAMETER).
   * @param string $mediaitem (Required) The media item we are fingerprinting. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_fingerprint($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_fingerprint' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMedia_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['mediaitem'])) {
	    throw new APIMedia_Exception('Parameter "mediaitem" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'mediaitem' => $parameters['mediaitem'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/fingerprint', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_fingerprint\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_fingerprint\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_fingerprint\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->fingerprint->status)) {
      $message = 'Error response from server in call to \'call_fingerprint\'. Response to \'fingerprint\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->fingerprint->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_fingerprint\'. Message \'' . $response->body->fingerprint->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'generate' Resource METHODS
  

  /**
   * Invokes the CALL method for the  generate resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the calling domain name (PARAMETER).
   * @param string $mediaitem (Required) The media item we are 'generating'. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_generate($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_generate' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMedia_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['mediaitem'])) {
	    throw new APIMedia_Exception('Parameter "mediaitem" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'mediaitem' => $parameters['mediaitem'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/generate', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_generate\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_generate\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_generate\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->generate->status)) {
      $message = 'Error response from server in call to \'call_generate\'. Response to \'generate\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->generate->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_generate\'. Message \'' . $response->body->generate->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'get_url' Resource METHODS
  

  /**
   * Invokes the CALL method for the  get_url resource web service.
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
    if (!isset($parameters['key'])) {
	    throw new APIMedia_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['mediaitem'])) {
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

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_get_url\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_get_url\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_get_url\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->get_url->status)) {
      $message = 'Error response from server in call to \'call_get_url\'. Response to \'get_url\' was expected but was not present';
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
  }
	
  /*%******************************************************************************************%*/
  // 'preview' Resource METHODS
  

  /**
   * Invokes the CALL method for the  preview resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $mediaitem (Required) The mediaitem we want to preview. (PARAMETER).
   * @param string $media (Required) The media type we want. audio,video,image,thumbnail (PARAMETER).
   * @param string $format (Required) The format type we want. jpg,gif (PARAMETER).
   * @param string $definition (Required) The definition we are after. unearthed_128k etc.. (PARAMETER).
   * @param string $manifest (Required) The format of the manifest. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_preview($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_preview' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMedia_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['mediaitem'])) {
	    throw new APIMedia_Exception('Parameter "mediaitem" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'mediaitem' => $parameters['mediaitem'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['media'])) {
      $opt['query_string']['media'] = $parameters['media'];
    }
    if (isset($parameters['format'])) {
      $opt['query_string']['format'] = $parameters['format'];
    }
    if (isset($parameters['definition'])) {
      $opt['query_string']['definition'] = $parameters['definition'];
    }
    if (isset($parameters['manifest'])) {
      $opt['query_string']['manifest'] = $parameters['manifest'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/preview', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_preview\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_preview\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_preview\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->preview->status)) {
      $message = 'Error response from server in call to \'call_preview\'. Response to \'preview\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->preview->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_preview\'. Message \'' . $response->body->preview->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'schedule' Resource METHODS
  

  /**
   * Invokes the CALL method for the  schedule resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the calling domain name (PARAMETER).
   * @param string $mediaitem (Required) The media item we are 'ungenerating'. (PARAMETER).
   * @param string $workflow (Required) The workflow step we want to apply. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_schedule($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_schedule' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMedia_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['mediaitem'])) {
	    throw new APIMedia_Exception('Parameter "mediaitem" is mandatory.');
    }
    if (empty($parameters['workflow'])) {
	    throw new APIMedia_Exception('Parameter "workflow" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'mediaitem' => $parameters['mediaitem'],
        'workflow' => $parameters['workflow'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/schedule', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_schedule\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_schedule\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_schedule\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->schedule->status)) {
      $message = 'Error response from server in call to \'call_schedule\'. Response to \'schedule\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->schedule->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_schedule\'. Message \'' . $response->body->schedule->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'undeploy' Resource METHODS
  

  /**
   * Invokes the CALL method for the  undeploy resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the calling domain name (PARAMETER).
   * @param string $mediaitem (Required) The media item we are 'undeoklo'. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_undeploy($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_undeploy' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMedia_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['mediaitem'])) {
	    throw new APIMedia_Exception('Parameter "mediaitem" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'mediaitem' => $parameters['mediaitem'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/undeploy', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_undeploy\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_undeploy\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_undeploy\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->undeploy->status)) {
      $message = 'Error response from server in call to \'call_undeploy\'. Response to \'undeploy\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->undeploy->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_undeploy\'. Message \'' . $response->body->undeploy->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'ungenerate' Resource METHODS
  

  /**
   * Invokes the CALL method for the  ungenerate resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the calling domain name (PARAMETER).
   * @param string $mediaitem (Required) The media item we are 'ungenerating'. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_ungenerate($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_ungenerate' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMedia_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['mediaitem'])) {
	    throw new APIMedia_Exception('Parameter "mediaitem" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'mediaitem' => $parameters['mediaitem'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/ungenerate', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_ungenerate\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_ungenerate\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_ungenerate\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->ungenerate->status)) {
      $message = 'Error response from server in call to \'call_ungenerate\'. Response to \'ungenerate\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->ungenerate->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_ungenerate\'. Message \'' . $response->body->ungenerate->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'upload' Resource METHODS
  

  /**
   * Invokes the CALL method for the  upload resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $ticket (Required)  (PARAMETER).
   * @param string $file (Required) Where the file to be ingested is located. This file will be downloaded by thumbwhere.com and then ingested. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_upload($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_upload' ,array(), WATCHDOG_NOTICE);
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
    if (empty($parameters['ticket'])) {
	    throw new APIMedia_Exception('Parameter "ticket" is mandatory.');
    }
    if (!isset($parameters['file'])) {
	    throw new APIMedia_Exception('Parameter "file" is mandatory.');
    }
    $opt['query_string'] = array(

        'ticket' => $parameters['ticket'],
        'file' => $parameters['file'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/upload', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_upload\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_upload\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_upload\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->upload->status)) {
      $message = 'Error response from server in call to \'call_upload\'. Response to \'upload\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->upload->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_upload\'. Message \'' . $response->body->upload->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'upload_create' Resource METHODS
  

  /**
   * Invokes the CALL method for the  upload_create resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the calling domain name (PARAMETER).
   * @param string $member (Required) The member making this request. (PARAMETER).
   * @param string $identity (Required) The identity to associate this upload with. (PARAMETER).
   * @param string $text (Required) The text portion of the message. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_upload_create($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_upload_create' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIMedia_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['member'])) {
	    throw new APIMedia_Exception('Parameter "member" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'member' => $parameters['member'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['identity'])) {
      $opt['query_string']['identity'] = $parameters['identity'];
    }
    if (isset($parameters['text'])) {
      $opt['query_string']['text'] = $parameters['text'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/upload_create', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_upload_create\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_upload_create\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_upload_create\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->upload_create->status)) {
      $message = 'Error response from server in call to \'call_upload_create\'. Response to \'upload_create\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->upload_create->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_upload_create\'. Message \'' . $response->body->upload_create->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'upload_query' Resource METHODS
  

  /**
   * Invokes the CALL method for the  upload_query resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $ticket (Required)  (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_upload_query($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_upload_query' ,array(), WATCHDOG_NOTICE);
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
    if (empty($parameters['ticket'])) {
	    throw new APIMedia_Exception('Parameter "ticket" is mandatory.');
    }
    $opt['query_string'] = array(

        'ticket' => $parameters['ticket'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/upload_query', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_upload_query\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_upload_query\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_upload_query\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

	  if (!isset($response->body->upload_query->status)) {
      $message = 'Error response from server in call to \'call_upload_query\'. Response to \'upload_query\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    $status = $response->body->upload_query->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_upload_query\'. Message \'' . $response->body->upload_query->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIMedia_Exception($message);
    }

    return $response;
  }}

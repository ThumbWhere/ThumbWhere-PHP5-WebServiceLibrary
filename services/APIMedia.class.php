
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
  /*%******************************************************************************************%*/
  // 
  // ALL THE ACTIONS
  
  

	
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
  }}

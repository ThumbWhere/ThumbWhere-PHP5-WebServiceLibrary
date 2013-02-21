
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
  // 'audio_target' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  audio_target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $format (Required) 'format' field, which is an embedded 'Format' resource. (FIELD).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param string $server (Required) 'server' field, which is an embedded 'Server' resource. (FIELD).
   * @param string $servertype (Required) 'servertype' field, which is an embedded 'ServerType' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $channels (Required) 'channels' field, which is a 'long' type. (FIELD).
   * @param string $samplerate (Required) 'samplerate' field, which is a 'long' type. (FIELD).
   * @param string $bitrate (Required) 'bitrate' field, which is a 'long' type. (FIELD).
   * @param string $target_filesize (Required) 'target_filesize' field, which is a 'long' type. (FIELD).
   * @param string $secure_filenames (Required) 'secure_filenames' field, which is a 'boolean' type. (FIELD).
   * @param string $filenamemask (Required) 'filenamemask' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_audio_target($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_audio_target' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['format'])) {
	    throw new APIAdmin_Exception('Field "format" is mandatory.');
    }
    if (!isset($fields['campaign'])) {
	    throw new APIAdmin_Exception('Field "campaign" is mandatory.');
    }
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    if (!isset($fields['channels'])) {
	    throw new APIAdmin_Exception('Field "channels" is mandatory.');
    }
    if (!isset($fields['samplerate'])) {
	    throw new APIAdmin_Exception('Field "samplerate" is mandatory.');
    }
    if (!isset($fields['bitrate'])) {
	    throw new APIAdmin_Exception('Field "bitrate" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'format' => $fields['format'],
        'campaign' => $fields['campaign'],
        'name' => $fields['name'],
        'channels' => $fields['channels'],
        'samplerate' => $fields['samplerate'],
        'bitrate' => $fields['bitrate'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['server'])) {
      $opt['query_string']['server'] = $fields['server'];
    }
    if (isset($fields['servertype'])) {
      $opt['query_string']['servertype'] = $fields['servertype'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['target_filesize'])) {
      $opt['query_string']['target_filesize'] = $fields['target_filesize'];
    }
    if (isset($fields['secure_filenames'])) {
      $opt['query_string']['secure_filenames'] = $fields['secure_filenames'];
    }
    if (isset($fields['filenamemask'])) {
      $opt['query_string']['filenamemask'] = $fields['filenamemask'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/audio_target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_audio_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_audio_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_audio_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->audio_target->status)) {
      $message = 'Error response from server in call to \'create_audio_target\'. Response to \'audio_target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->audio_target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_audio_target\'. Message \'' . $response->body->audio_target->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  audio_target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $format (Required) 'format' field, which is an embedded 'Format' resource. (FIELD).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param string $server (Required) 'server' field, which is an embedded 'Server' resource. (FIELD).
   * @param string $servertype (Required) 'servertype' field, which is an embedded 'ServerType' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $channels (Required) 'channels' field, which is a 'long' type. (FIELD).
   * @param string $samplerate (Required) 'samplerate' field, which is a 'long' type. (FIELD).
   * @param string $bitrate (Required) 'bitrate' field, which is a 'long' type. (FIELD).
   * @param string $target_filesize (Required) 'target_filesize' field, which is a 'long' type. (FIELD).
   * @param string $secure_filenames (Required) 'secure_filenames' field, which is a 'boolean' type. (FIELD).
   * @param string $filenamemask (Required) 'filenamemask' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_audio_target($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_audio_target' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['format'])) {
	    throw new APIAdmin_Exception('Field "format" is mandatory.');
    }
    if (!isset($fields['campaign'])) {
	    throw new APIAdmin_Exception('Field "campaign" is mandatory.');
    }
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    if (!isset($fields['channels'])) {
	    throw new APIAdmin_Exception('Field "channels" is mandatory.');
    }
    if (!isset($fields['samplerate'])) {
	    throw new APIAdmin_Exception('Field "samplerate" is mandatory.');
    }
    if (!isset($fields['bitrate'])) {
	    throw new APIAdmin_Exception('Field "bitrate" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'format' => $fields['format'],
        'campaign' => $fields['campaign'],
        'name' => $fields['name'],
        'channels' => $fields['channels'],
        'samplerate' => $fields['samplerate'],
        'bitrate' => $fields['bitrate'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['server'])) {
      $opt['query_string']['server'] = $fields['server'];
    }
    if (isset($fields['servertype'])) {
      $opt['query_string']['servertype'] = $fields['servertype'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['target_filesize'])) {
      $opt['query_string']['target_filesize'] = $fields['target_filesize'];
    }
    if (isset($fields['secure_filenames'])) {
      $opt['query_string']['secure_filenames'] = $fields['secure_filenames'];
    }
    if (isset($fields['filenamemask'])) {
      $opt['query_string']['filenamemask'] = $fields['filenamemask'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/audio_target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_audio_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_audio_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_audio_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->audio_target->status)) {
      $message = 'Error response from server in call to \'update_audio_target\'. Response to \'audio_target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->audio_target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_audio_target\'. Message \'' . $response->body->audio_target->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'barcode_target' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  barcode_target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $format (Required) 'format' field, which is an embedded 'Format' resource. (FIELD).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param string $server (Required) 'server' field, which is an embedded 'Server' resource. (FIELD).
   * @param string $servertype (Required) 'servertype' field, which is an embedded 'ServerType' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $width (Required) 'width' field, which is a 'long' type. (FIELD).
   * @param string $height (Required) 'height' field, which is a 'long' type. (FIELD).
   * @param string $croptype (Required) 'croptype' field, which is a 'long' type. (FIELD).
   * @param string $secure_filenames (Required) 'secure_filenames' field, which is a 'boolean' type. (FIELD).
   * @param string $filenamemask (Required) 'filenamemask' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_barcode_target($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_barcode_target' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['format'])) {
	    throw new APIAdmin_Exception('Field "format" is mandatory.');
    }
    if (!isset($fields['campaign'])) {
	    throw new APIAdmin_Exception('Field "campaign" is mandatory.');
    }
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    if (!isset($fields['width'])) {
	    throw new APIAdmin_Exception('Field "width" is mandatory.');
    }
    if (!isset($fields['height'])) {
	    throw new APIAdmin_Exception('Field "height" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'format' => $fields['format'],
        'campaign' => $fields['campaign'],
        'name' => $fields['name'],
        'width' => $fields['width'],
        'height' => $fields['height'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['server'])) {
      $opt['query_string']['server'] = $fields['server'];
    }
    if (isset($fields['servertype'])) {
      $opt['query_string']['servertype'] = $fields['servertype'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['croptype'])) {
      $opt['query_string']['croptype'] = $fields['croptype'];
    }
    if (isset($fields['secure_filenames'])) {
      $opt['query_string']['secure_filenames'] = $fields['secure_filenames'];
    }
    if (isset($fields['filenamemask'])) {
      $opt['query_string']['filenamemask'] = $fields['filenamemask'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/barcode_target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_barcode_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_barcode_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_barcode_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->barcode_target->status)) {
      $message = 'Error response from server in call to \'create_barcode_target\'. Response to \'barcode_target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->barcode_target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_barcode_target\'. Message \'' . $response->body->barcode_target->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  barcode_target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $format (Required) 'format' field, which is an embedded 'Format' resource. (FIELD).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param string $server (Required) 'server' field, which is an embedded 'Server' resource. (FIELD).
   * @param string $servertype (Required) 'servertype' field, which is an embedded 'ServerType' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $width (Required) 'width' field, which is a 'long' type. (FIELD).
   * @param string $height (Required) 'height' field, which is a 'long' type. (FIELD).
   * @param string $croptype (Required) 'croptype' field, which is a 'long' type. (FIELD).
   * @param string $secure_filenames (Required) 'secure_filenames' field, which is a 'boolean' type. (FIELD).
   * @param string $filenamemask (Required) 'filenamemask' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_barcode_target($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_barcode_target' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['format'])) {
	    throw new APIAdmin_Exception('Field "format" is mandatory.');
    }
    if (!isset($fields['campaign'])) {
	    throw new APIAdmin_Exception('Field "campaign" is mandatory.');
    }
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    if (!isset($fields['width'])) {
	    throw new APIAdmin_Exception('Field "width" is mandatory.');
    }
    if (!isset($fields['height'])) {
	    throw new APIAdmin_Exception('Field "height" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'format' => $fields['format'],
        'campaign' => $fields['campaign'],
        'name' => $fields['name'],
        'width' => $fields['width'],
        'height' => $fields['height'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['server'])) {
      $opt['query_string']['server'] = $fields['server'];
    }
    if (isset($fields['servertype'])) {
      $opt['query_string']['servertype'] = $fields['servertype'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['croptype'])) {
      $opt['query_string']['croptype'] = $fields['croptype'];
    }
    if (isset($fields['secure_filenames'])) {
      $opt['query_string']['secure_filenames'] = $fields['secure_filenames'];
    }
    if (isset($fields['filenamemask'])) {
      $opt['query_string']['filenamemask'] = $fields['filenamemask'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/barcode_target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_barcode_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_barcode_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_barcode_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->barcode_target->status)) {
      $message = 'Error response from server in call to \'update_barcode_target\'. Response to \'barcode_target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->barcode_target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_barcode_target\'. Message \'' . $response->body->barcode_target->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'external_repository' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  external_repository resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $externalrepositorytype (Required) 'externalrepositorytype' field, which is an embedded 'ExternalRepositoryType' resource. (FIELD).
   * @param string $host (Required) 'host' field, which is an embedded 'Host' resource. (FIELD).
   * @param string $apikey (Required) 'apikey' field, which is an embedded 'APIKey' resource. (FIELD).
   * @param string $url (Required) 'url' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_external_repository($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_external_repository' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['externalrepositorytype'])) {
	    throw new APIAdmin_Exception('Field "externalrepositorytype" is mandatory.');
    }
    if (!isset($fields['host'])) {
	    throw new APIAdmin_Exception('Field "host" is mandatory.');
    }
    if (!isset($fields['apikey'])) {
	    throw new APIAdmin_Exception('Field "apikey" is mandatory.');
    }
    if (empty($fields['url'])) {
	    throw new APIAdmin_Exception('Field "url" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'externalrepositorytype' => $fields['externalrepositorytype'],
        'host' => $fields['host'],
        'apikey' => $fields['apikey'],
        'url' => $fields['url'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/external_repository', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_external_repository\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_external_repository\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_external_repository\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->external_repository->status)) {
      $message = 'Error response from server in call to \'create_external_repository\'. Response to \'external_repository\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->external_repository->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_external_repository\'. Message \'' . $response->body->external_repository->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  external_repository resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $externalrepositorytype (Required) 'externalrepositorytype' field, which is an embedded 'ExternalRepositoryType' resource. (FIELD).
   * @param string $host (Required) 'host' field, which is an embedded 'Host' resource. (FIELD).
   * @param string $apikey (Required) 'apikey' field, which is an embedded 'APIKey' resource. (FIELD).
   * @param string $url (Required) 'url' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_external_repository($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_external_repository' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['externalrepositorytype'])) {
	    throw new APIAdmin_Exception('Field "externalrepositorytype" is mandatory.');
    }
    if (!isset($fields['host'])) {
	    throw new APIAdmin_Exception('Field "host" is mandatory.');
    }
    if (!isset($fields['apikey'])) {
	    throw new APIAdmin_Exception('Field "apikey" is mandatory.');
    }
    if (empty($fields['url'])) {
	    throw new APIAdmin_Exception('Field "url" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'externalrepositorytype' => $fields['externalrepositorytype'],
        'host' => $fields['host'],
        'apikey' => $fields['apikey'],
        'url' => $fields['url'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/external_repository', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_external_repository\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_external_repository\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_external_repository\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->external_repository->status)) {
      $message = 'Error response from server in call to \'update_external_repository\'. Response to \'external_repository\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->external_repository->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_external_repository\'. Message \'' . $response->body->external_repository->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'external_repository_resource' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  external_repository_resource resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_external_repository_resource($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_external_repository_resource' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/external_repository_resource', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_external_repository_resource\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_external_repository_resource\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_external_repository_resource\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->external_repository_resource->status)) {
      $message = 'Error response from server in call to \'create_external_repository_resource\'. Response to \'external_repository_resource\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->external_repository_resource->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_external_repository_resource\'. Message \'' . $response->body->external_repository_resource->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  external_repository_resource resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_external_repository_resource($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_external_repository_resource' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/external_repository_resource', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_external_repository_resource\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_external_repository_resource\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_external_repository_resource\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->external_repository_resource->status)) {
      $message = 'Error response from server in call to \'update_external_repository_resource\'. Response to \'external_repository_resource\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->external_repository_resource->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_external_repository_resource\'. Message \'' . $response->body->external_repository_resource->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'external_repository_resource_subscription' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  external_repository_resource_subscription resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $externalrepository (Required) 'externalrepository' field, which is an embedded 'ExternalRepository' resource. (FIELD).
   * @param string $repositoryresource (Required) 'repositoryresource' field, which is an embedded 'RepositoryResource' resource. (FIELD).
   * @param string $active (Required) 'active' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_external_repository_resource_subscription($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_external_repository_resource_subscription' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['externalrepository'])) {
	    throw new APIAdmin_Exception('Field "externalrepository" is mandatory.');
    }
    if (!isset($fields['repositoryresource'])) {
	    throw new APIAdmin_Exception('Field "repositoryresource" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'externalrepository' => $fields['externalrepository'],
        'repositoryresource' => $fields['repositoryresource'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['active'])) {
      $opt['query_string']['active'] = $fields['active'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/external_repository_resource_subscription', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_external_repository_resource_subscription\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_external_repository_resource_subscription\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_external_repository_resource_subscription\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->external_repository_resource_subscription->status)) {
      $message = 'Error response from server in call to \'create_external_repository_resource_subscription\'. Response to \'external_repository_resource_subscription\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->external_repository_resource_subscription->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_external_repository_resource_subscription\'. Message \'' . $response->body->external_repository_resource_subscription->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  external_repository_resource_subscription resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $externalrepository (Required) 'externalrepository' field, which is an embedded 'ExternalRepository' resource. (FIELD).
   * @param string $repositoryresource (Required) 'repositoryresource' field, which is an embedded 'RepositoryResource' resource. (FIELD).
   * @param string $active (Required) 'active' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_external_repository_resource_subscription($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_external_repository_resource_subscription' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['externalrepository'])) {
	    throw new APIAdmin_Exception('Field "externalrepository" is mandatory.');
    }
    if (!isset($fields['repositoryresource'])) {
	    throw new APIAdmin_Exception('Field "repositoryresource" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'externalrepository' => $fields['externalrepository'],
        'repositoryresource' => $fields['repositoryresource'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['active'])) {
      $opt['query_string']['active'] = $fields['active'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/external_repository_resource_subscription', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_external_repository_resource_subscription\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_external_repository_resource_subscription\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_external_repository_resource_subscription\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->external_repository_resource_subscription->status)) {
      $message = 'Error response from server in call to \'update_external_repository_resource_subscription\'. Response to \'external_repository_resource_subscription\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->external_repository_resource_subscription->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_external_repository_resource_subscription\'. Message \'' . $response->body->external_repository_resource_subscription->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'external_repository_sync' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  external_repository_sync resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $externalsubscription (Required) 'externalsubscription' field, which is an embedded 'ExternalSubscription' resource. (FIELD).
   * @param string $last_sync (Required) 'last_sync' field, which is a 'datetime' type. (FIELD).
   * @param string $max (Required) 'max' field, which is a 'long' type. (FIELD).
   * @param string $complete (Required) 'complete' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_external_repository_sync($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_external_repository_sync' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['externalsubscription'])) {
	    throw new APIAdmin_Exception('Field "externalsubscription" is mandatory.');
    }
    if (!isset($fields['last_sync'])) {
	    throw new APIAdmin_Exception('Field "last_sync" is mandatory.');
    }
    if (!isset($fields['max'])) {
	    throw new APIAdmin_Exception('Field "max" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'externalsubscription' => $fields['externalsubscription'],
        'last_sync' => $fields['last_sync'],
        'max' => $fields['max'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['complete'])) {
      $opt['query_string']['complete'] = $fields['complete'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/external_repository_sync', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_external_repository_sync\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_external_repository_sync\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_external_repository_sync\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->external_repository_sync->status)) {
      $message = 'Error response from server in call to \'create_external_repository_sync\'. Response to \'external_repository_sync\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->external_repository_sync->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_external_repository_sync\'. Message \'' . $response->body->external_repository_sync->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  external_repository_sync resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $externalsubscription (Required) 'externalsubscription' field, which is an embedded 'ExternalSubscription' resource. (FIELD).
   * @param string $last_sync (Required) 'last_sync' field, which is a 'datetime' type. (FIELD).
   * @param string $max (Required) 'max' field, which is a 'long' type. (FIELD).
   * @param string $complete (Required) 'complete' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_external_repository_sync($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_external_repository_sync' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['externalsubscription'])) {
	    throw new APIAdmin_Exception('Field "externalsubscription" is mandatory.');
    }
    if (!isset($fields['last_sync'])) {
	    throw new APIAdmin_Exception('Field "last_sync" is mandatory.');
    }
    if (!isset($fields['max'])) {
	    throw new APIAdmin_Exception('Field "max" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'externalsubscription' => $fields['externalsubscription'],
        'last_sync' => $fields['last_sync'],
        'max' => $fields['max'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['complete'])) {
      $opt['query_string']['complete'] = $fields['complete'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/external_repository_sync', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_external_repository_sync\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_external_repository_sync\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_external_repository_sync\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->external_repository_sync->status)) {
      $message = 'Error response from server in call to \'update_external_repository_sync\'. Response to \'external_repository_sync\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->external_repository_sync->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_external_repository_sync\'. Message \'' . $response->body->external_repository_sync->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'external_repository_type' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  external_repository_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_external_repository_type($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_external_repository_type' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/external_repository_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_external_repository_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_external_repository_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_external_repository_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->external_repository_type->status)) {
      $message = 'Error response from server in call to \'create_external_repository_type\'. Response to \'external_repository_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->external_repository_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_external_repository_type\'. Message \'' . $response->body->external_repository_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  external_repository_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_external_repository_type($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_external_repository_type' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/external_repository_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_external_repository_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_external_repository_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_external_repository_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->external_repository_type->status)) {
      $message = 'Error response from server in call to \'update_external_repository_type\'. Response to \'external_repository_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->external_repository_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_external_repository_type\'. Message \'' . $response->body->external_repository_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hosttype (Required) 'hosttype' field, which is an embedded 'HostType' resource. (FIELD).
   * @param string $hostcredential (Required) 'hostcredential' field, which is an embedded 'HostCredential' resource. (FIELD).
   * @param string $address (Required) 'address' field, which is a 'string' type. (FIELD).
   * @param string $online (Required) 'online' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['hosttype'])) {
	    throw new APIAdmin_Exception('Field "hosttype" is mandatory.');
    }
    if (!isset($fields['hostcredential'])) {
	    throw new APIAdmin_Exception('Field "hostcredential" is mandatory.');
    }
    if (empty($fields['address'])) {
	    throw new APIAdmin_Exception('Field "address" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'hosttype' => $fields['hosttype'],
        'hostcredential' => $fields['hostcredential'],
        'address' => $fields['address'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['online'])) {
      $opt['query_string']['online'] = $fields['online'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host->status)) {
      $message = 'Error response from server in call to \'create_host\'. Response to \'host\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host\'. Message \'' . $response->body->host->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hosttype (Required) 'hosttype' field, which is an embedded 'HostType' resource. (FIELD).
   * @param string $hostcredential (Required) 'hostcredential' field, which is an embedded 'HostCredential' resource. (FIELD).
   * @param string $address (Required) 'address' field, which is a 'string' type. (FIELD).
   * @param string $online (Required) 'online' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['hosttype'])) {
	    throw new APIAdmin_Exception('Field "hosttype" is mandatory.');
    }
    if (!isset($fields['hostcredential'])) {
	    throw new APIAdmin_Exception('Field "hostcredential" is mandatory.');
    }
    if (empty($fields['address'])) {
	    throw new APIAdmin_Exception('Field "address" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'hosttype' => $fields['hosttype'],
        'hostcredential' => $fields['hostcredential'],
        'address' => $fields['address'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['online'])) {
      $opt['query_string']['online'] = $fields['online'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host->status)) {
      $message = 'Error response from server in call to \'update_host\'. Response to \'host\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host\'. Message \'' . $response->body->host->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
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
    if (!isset($fields['host'])) {
	    throw new APIAdmin_Exception('Field "host" is mandatory.');
    }
    if (!isset($fields['hostcommandtemplate'])) {
	    throw new APIAdmin_Exception('Field "hostcommandtemplate" is mandatory.');
    }
    if (empty($fields['command'])) {
	    throw new APIAdmin_Exception('Field "command" is mandatory.');
    }
    if (!isset($fields['running'])) {
	    throw new APIAdmin_Exception('Field "running" is mandatory.');
    }
    if (!isset($fields['completed'])) {
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
    if (!isset($fields['host'])) {
	    throw new APIAdmin_Exception('Field "host" is mandatory.');
    }
    if (!isset($fields['hostcommandtemplate'])) {
	    throw new APIAdmin_Exception('Field "hostcommandtemplate" is mandatory.');
    }
    if (empty($fields['command'])) {
	    throw new APIAdmin_Exception('Field "command" is mandatory.');
    }
    if (!isset($fields['running'])) {
	    throw new APIAdmin_Exception('Field "running" is mandatory.');
    }
    if (!isset($fields['completed'])) {
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
  // 'host_command_template' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_command_template resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $hostroletype (Required) 'hostroletype' field, which is an embedded 'HostRoleType' resource. (FIELD).
   * @param string $hostcommandtemplatetype (Required) 'hostcommandtemplatetype' field, which is an embedded 'HostCommandTemplateType' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_command_template($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_command_template' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    if (!isset($fields['hostroletype'])) {
	    throw new APIAdmin_Exception('Field "hostroletype" is mandatory.');
    }
    if (!isset($fields['hostcommandtemplatetype'])) {
	    throw new APIAdmin_Exception('Field "hostcommandtemplatetype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'name' => $fields['name'],
        'hostroletype' => $fields['hostroletype'],
        'hostcommandtemplatetype' => $fields['hostcommandtemplatetype'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_command_template', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_command_template\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_command_template\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_command_template\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_command_template->status)) {
      $message = 'Error response from server in call to \'create_host_command_template\'. Response to \'host_command_template\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_command_template->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_command_template\'. Message \'' . $response->body->host_command_template->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_command_template resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $hostroletype (Required) 'hostroletype' field, which is an embedded 'HostRoleType' resource. (FIELD).
   * @param string $hostcommandtemplatetype (Required) 'hostcommandtemplatetype' field, which is an embedded 'HostCommandTemplateType' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_command_template($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_command_template' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    if (!isset($fields['hostroletype'])) {
	    throw new APIAdmin_Exception('Field "hostroletype" is mandatory.');
    }
    if (!isset($fields['hostcommandtemplatetype'])) {
	    throw new APIAdmin_Exception('Field "hostcommandtemplatetype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'name' => $fields['name'],
        'hostroletype' => $fields['hostroletype'],
        'hostcommandtemplatetype' => $fields['hostcommandtemplatetype'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_command_template', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_command_template\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_command_template\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_command_template\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_command_template->status)) {
      $message = 'Error response from server in call to \'update_host_command_template\'. Response to \'host_command_template\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_command_template->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_command_template\'. Message \'' . $response->body->host_command_template->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_command_template_type' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_command_template_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_command_template_type($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_command_template_type' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_command_template_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_command_template_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_command_template_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_command_template_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_command_template_type->status)) {
      $message = 'Error response from server in call to \'create_host_command_template_type\'. Response to \'host_command_template_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_command_template_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_command_template_type\'. Message \'' . $response->body->host_command_template_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_command_template_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_command_template_type($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_command_template_type' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_command_template_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_command_template_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_command_template_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_command_template_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_command_template_type->status)) {
      $message = 'Error response from server in call to \'update_host_command_template_type\'. Response to \'host_command_template_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_command_template_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_command_template_type\'. Message \'' . $response->body->host_command_template_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_credential' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_credential resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hostprovideraccount (Required) 'hostprovideraccount' field, which is an embedded 'HostProviderAccount' resource. (FIELD).
   * @param string $username (Required) 'username' field, which is a 'string' type. (FIELD).
   * @param string $password (Required) 'password' field, which is a 'string' type. (FIELD).
   * @param string $sshprivatekey (Required) 'sshprivatekey' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_credential($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_credential' ,array(), WATCHDOG_NOTICE);
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
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['hostprovideraccount'])) {
      $opt['query_string']['hostprovideraccount'] = $fields['hostprovideraccount'];
    }
    if (isset($fields['username'])) {
      $opt['query_string']['username'] = $fields['username'];
    }
    if (isset($fields['password'])) {
      $opt['query_string']['password'] = $fields['password'];
    }
    if (isset($fields['sshprivatekey'])) {
      $opt['query_string']['sshprivatekey'] = $fields['sshprivatekey'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_credential', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_credential\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_credential\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_credential\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_credential->status)) {
      $message = 'Error response from server in call to \'create_host_credential\'. Response to \'host_credential\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_credential->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_credential\'. Message \'' . $response->body->host_credential->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_credential resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hostprovideraccount (Required) 'hostprovideraccount' field, which is an embedded 'HostProviderAccount' resource. (FIELD).
   * @param string $username (Required) 'username' field, which is a 'string' type. (FIELD).
   * @param string $password (Required) 'password' field, which is a 'string' type. (FIELD).
   * @param string $sshprivatekey (Required) 'sshprivatekey' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_credential($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_credential' ,array(), WATCHDOG_NOTICE);
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
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['hostprovideraccount'])) {
      $opt['query_string']['hostprovideraccount'] = $fields['hostprovideraccount'];
    }
    if (isset($fields['username'])) {
      $opt['query_string']['username'] = $fields['username'];
    }
    if (isset($fields['password'])) {
      $opt['query_string']['password'] = $fields['password'];
    }
    if (isset($fields['sshprivatekey'])) {
      $opt['query_string']['sshprivatekey'] = $fields['sshprivatekey'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_credential', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_credential\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_credential\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_credential\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_credential->status)) {
      $message = 'Error response from server in call to \'update_host_credential\'. Response to \'host_credential\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_credential->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_credential\'. Message \'' . $response->body->host_credential->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_log_entry' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_log_entry resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $log (Required) 'log' field, which is a 'string' type. (FIELD).
   * @param string $hostcommand (Required) 'hostcommand' field, which is an embedded 'HostCommand' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_log_entry($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_log_entry' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['log'])) {
	    throw new APIAdmin_Exception('Field "log" is mandatory.');
    }
    if (!isset($fields['hostcommand'])) {
	    throw new APIAdmin_Exception('Field "hostcommand" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'log' => $fields['log'],
        'hostcommand' => $fields['hostcommand'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_log_entry', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_log_entry\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_log_entry\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_log_entry\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_log_entry->status)) {
      $message = 'Error response from server in call to \'create_host_log_entry\'. Response to \'host_log_entry\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_log_entry->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_log_entry\'. Message \'' . $response->body->host_log_entry->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_log_entry resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $log (Required) 'log' field, which is a 'string' type. (FIELD).
   * @param string $hostcommand (Required) 'hostcommand' field, which is an embedded 'HostCommand' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_log_entry($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_log_entry' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['log'])) {
	    throw new APIAdmin_Exception('Field "log" is mandatory.');
    }
    if (!isset($fields['hostcommand'])) {
	    throw new APIAdmin_Exception('Field "hostcommand" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'log' => $fields['log'],
        'hostcommand' => $fields['hostcommand'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_log_entry', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_log_entry\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_log_entry\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_log_entry\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_log_entry->status)) {
      $message = 'Error response from server in call to \'update_host_log_entry\'. Response to \'host_log_entry\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_log_entry->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_log_entry\'. Message \'' . $response->body->host_log_entry->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_order' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_order resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hostcredential (Required) 'hostcredential' field, which is an embedded 'HostCredential' resource. (FIELD).
   * @param string $host (Required) 'host' field, which is an embedded 'Host' resource. (FIELD).
   * @param string $address (Required) 'address' field, which is a 'string' type. (FIELD).
   * @param string $processing (Required) 'processing' field, which is a 'boolean' type. (FIELD).
   * @param string $completed (Required) 'completed' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_order($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_order' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['hostcredential'])) {
	    throw new APIAdmin_Exception('Field "hostcredential" is mandatory.');
    }
    if (!isset($fields['processing'])) {
	    throw new APIAdmin_Exception('Field "processing" is mandatory.');
    }
    if (!isset($fields['completed'])) {
	    throw new APIAdmin_Exception('Field "completed" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'hostcredential' => $fields['hostcredential'],
        'processing' => $fields['processing'],
        'completed' => $fields['completed'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['host'])) {
      $opt['query_string']['host'] = $fields['host'];
    }
    if (isset($fields['address'])) {
      $opt['query_string']['address'] = $fields['address'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_order', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_order\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_order\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_order\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_order->status)) {
      $message = 'Error response from server in call to \'create_host_order\'. Response to \'host_order\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_order->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_order\'. Message \'' . $response->body->host_order->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_order resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hostcredential (Required) 'hostcredential' field, which is an embedded 'HostCredential' resource. (FIELD).
   * @param string $host (Required) 'host' field, which is an embedded 'Host' resource. (FIELD).
   * @param string $address (Required) 'address' field, which is a 'string' type. (FIELD).
   * @param string $processing (Required) 'processing' field, which is a 'boolean' type. (FIELD).
   * @param string $completed (Required) 'completed' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_order($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_order' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['hostcredential'])) {
	    throw new APIAdmin_Exception('Field "hostcredential" is mandatory.');
    }
    if (!isset($fields['processing'])) {
	    throw new APIAdmin_Exception('Field "processing" is mandatory.');
    }
    if (!isset($fields['completed'])) {
	    throw new APIAdmin_Exception('Field "completed" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'hostcredential' => $fields['hostcredential'],
        'processing' => $fields['processing'],
        'completed' => $fields['completed'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['host'])) {
      $opt['query_string']['host'] = $fields['host'];
    }
    if (isset($fields['address'])) {
      $opt['query_string']['address'] = $fields['address'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_order', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_order\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_order\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_order\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_order->status)) {
      $message = 'Error response from server in call to \'update_host_order\'. Response to \'host_order\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_order->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_order\'. Message \'' . $response->body->host_order->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_provider' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_provider resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_provider($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_provider' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_provider', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_provider\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_provider\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_provider\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_provider->status)) {
      $message = 'Error response from server in call to \'create_host_provider\'. Response to \'host_provider\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_provider->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_provider\'. Message \'' . $response->body->host_provider->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_provider resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_provider($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_provider' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_provider', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_provider\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_provider\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_provider\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_provider->status)) {
      $message = 'Error response from server in call to \'update_host_provider\'. Response to \'host_provider\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_provider->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_provider\'. Message \'' . $response->body->host_provider->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_provider_account' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_provider_account resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $token (Required) 'token' field, which is a 'string' type. (FIELD).
   * @param string $secret (Required) 'secret' field, which is a 'string' type. (FIELD).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_provider_account($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_provider_account' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['token'])) {
      $opt['query_string']['token'] = $fields['token'];
    }
    if (isset($fields['secret'])) {
      $opt['query_string']['secret'] = $fields['secret'];
    }
    if (isset($fields['campaign'])) {
      $opt['query_string']['campaign'] = $fields['campaign'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_provider_account', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_provider_account\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_provider_account\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_provider_account\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_provider_account->status)) {
      $message = 'Error response from server in call to \'create_host_provider_account\'. Response to \'host_provider_account\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_provider_account->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_provider_account\'. Message \'' . $response->body->host_provider_account->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_provider_account resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $token (Required) 'token' field, which is a 'string' type. (FIELD).
   * @param string $secret (Required) 'secret' field, which is a 'string' type. (FIELD).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_provider_account($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_provider_account' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['token'])) {
      $opt['query_string']['token'] = $fields['token'];
    }
    if (isset($fields['secret'])) {
      $opt['query_string']['secret'] = $fields['secret'];
    }
    if (isset($fields['campaign'])) {
      $opt['query_string']['campaign'] = $fields['campaign'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_provider_account', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_provider_account\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_provider_account\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_provider_account\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_provider_account->status)) {
      $message = 'Error response from server in call to \'update_host_provider_account\'. Response to \'host_provider_account\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_provider_account->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_provider_account\'. Message \'' . $response->body->host_provider_account->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_provider_host_type' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_provider_host_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hostprovider (Required) 'hostprovider' field, which is an embedded 'HostProvider' resource. (FIELD).
   * @param string $hosttype (Required) 'hosttype' field, which is an embedded 'HostType' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_provider_host_type($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_provider_host_type' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['hostprovider'])) {
	    throw new APIAdmin_Exception('Field "hostprovider" is mandatory.');
    }
    if (!isset($fields['hosttype'])) {
	    throw new APIAdmin_Exception('Field "hosttype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'hostprovider' => $fields['hostprovider'],
        'hosttype' => $fields['hosttype'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_provider_host_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_provider_host_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_provider_host_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_provider_host_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_provider_host_type->status)) {
      $message = 'Error response from server in call to \'create_host_provider_host_type\'. Response to \'host_provider_host_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_provider_host_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_provider_host_type\'. Message \'' . $response->body->host_provider_host_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_provider_host_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hostprovider (Required) 'hostprovider' field, which is an embedded 'HostProvider' resource. (FIELD).
   * @param string $hosttype (Required) 'hosttype' field, which is an embedded 'HostType' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_provider_host_type($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_provider_host_type' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['hostprovider'])) {
	    throw new APIAdmin_Exception('Field "hostprovider" is mandatory.');
    }
    if (!isset($fields['hosttype'])) {
	    throw new APIAdmin_Exception('Field "hosttype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'hostprovider' => $fields['hostprovider'],
        'hosttype' => $fields['hosttype'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_provider_host_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_provider_host_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_provider_host_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_provider_host_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_provider_host_type->status)) {
      $message = 'Error response from server in call to \'update_host_provider_host_type\'. Response to \'host_provider_host_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_provider_host_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_provider_host_type\'. Message \'' . $response->body->host_provider_host_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_role' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_role resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hostroletype (Required) 'hostroletype' field, which is an embedded 'HostRoleType' resource. (FIELD).
   * @param string $host (Required) 'host' field, which is an embedded 'Host' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_role($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_role' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['hostroletype'])) {
	    throw new APIAdmin_Exception('Field "hostroletype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'hostroletype' => $fields['hostroletype'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['host'])) {
      $opt['query_string']['host'] = $fields['host'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_role\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_role\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_role\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role->status)) {
      $message = 'Error response from server in call to \'create_host_role\'. Response to \'host_role\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_role\'. Message \'' . $response->body->host_role->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_role resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hostroletype (Required) 'hostroletype' field, which is an embedded 'HostRoleType' resource. (FIELD).
   * @param string $host (Required) 'host' field, which is an embedded 'Host' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_role($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_role' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['hostroletype'])) {
	    throw new APIAdmin_Exception('Field "hostroletype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'hostroletype' => $fields['hostroletype'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['host'])) {
      $opt['query_string']['host'] = $fields['host'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_role\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_role\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_role\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role->status)) {
      $message = 'Error response from server in call to \'update_host_role\'. Response to \'host_role\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_role\'. Message \'' . $response->body->host_role->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_role_order' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_role_order resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $host (Required) 'host' field, which is an embedded 'Host' resource. (FIELD).
   * @param string $hostroletype (Required) 'hostroletype' field, which is an embedded 'HostRoleType' resource. (FIELD).
   * @param string $processing (Required) 'processing' field, which is a 'boolean' type. (FIELD).
   * @param string $completed (Required) 'completed' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_role_order($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_role_order' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['processing'])) {
	    throw new APIAdmin_Exception('Field "processing" is mandatory.');
    }
    if (!isset($fields['completed'])) {
	    throw new APIAdmin_Exception('Field "completed" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'processing' => $fields['processing'],
        'completed' => $fields['completed'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['host'])) {
      $opt['query_string']['host'] = $fields['host'];
    }
    if (isset($fields['hostroletype'])) {
      $opt['query_string']['hostroletype'] = $fields['hostroletype'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role_order', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_role_order\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_role_order\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_role_order\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role_order->status)) {
      $message = 'Error response from server in call to \'create_host_role_order\'. Response to \'host_role_order\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role_order->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_role_order\'. Message \'' . $response->body->host_role_order->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_role_order resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $host (Required) 'host' field, which is an embedded 'Host' resource. (FIELD).
   * @param string $hostroletype (Required) 'hostroletype' field, which is an embedded 'HostRoleType' resource. (FIELD).
   * @param string $processing (Required) 'processing' field, which is a 'boolean' type. (FIELD).
   * @param string $completed (Required) 'completed' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_role_order($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_role_order' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['processing'])) {
	    throw new APIAdmin_Exception('Field "processing" is mandatory.');
    }
    if (!isset($fields['completed'])) {
	    throw new APIAdmin_Exception('Field "completed" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'processing' => $fields['processing'],
        'completed' => $fields['completed'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['host'])) {
      $opt['query_string']['host'] = $fields['host'];
    }
    if (isset($fields['hostroletype'])) {
      $opt['query_string']['hostroletype'] = $fields['hostroletype'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role_order', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_role_order\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_role_order\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_role_order\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role_order->status)) {
      $message = 'Error response from server in call to \'update_host_role_order\'. Response to \'host_role_order\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role_order->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_role_order\'. Message \'' . $response->body->host_role_order->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_role_subrole' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_role_subrole resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $subroletype (Required) 'subroletype' field, which is an embedded 'HostSubRoleType' resource. (FIELD).
   * @param string $hostrole (Required) 'hostrole' field, which is an embedded 'HostRole' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_role_subrole($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_role_subrole' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['subroletype'])) {
	    throw new APIAdmin_Exception('Field "subroletype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'subroletype' => $fields['subroletype'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['hostrole'])) {
      $opt['query_string']['hostrole'] = $fields['hostrole'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role_subrole', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_role_subrole\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_role_subrole\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_role_subrole\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role_subrole->status)) {
      $message = 'Error response from server in call to \'create_host_role_subrole\'. Response to \'host_role_subrole\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role_subrole->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_role_subrole\'. Message \'' . $response->body->host_role_subrole->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_role_subrole resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $subroletype (Required) 'subroletype' field, which is an embedded 'HostSubRoleType' resource. (FIELD).
   * @param string $hostrole (Required) 'hostrole' field, which is an embedded 'HostRole' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_role_subrole($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_role_subrole' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['subroletype'])) {
	    throw new APIAdmin_Exception('Field "subroletype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'subroletype' => $fields['subroletype'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['hostrole'])) {
      $opt['query_string']['hostrole'] = $fields['hostrole'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role_subrole', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_role_subrole\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_role_subrole\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_role_subrole\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role_subrole->status)) {
      $message = 'Error response from server in call to \'update_host_role_subrole\'. Response to \'host_role_subrole\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role_subrole->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_role_subrole\'. Message \'' . $response->body->host_role_subrole->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_role_subrole_order' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_role_subrole_order resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $host (Required) 'host' field, which is an embedded 'Host' resource. (FIELD).
   * @param string $subroletype (Required) 'subroletype' field, which is an embedded 'HostSubRoleType' resource. (FIELD).
   * @param string $processing (Required) 'processing' field, which is a 'boolean' type. (FIELD).
   * @param string $completed (Required) 'completed' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_role_subrole_order($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_role_subrole_order' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['processing'])) {
	    throw new APIAdmin_Exception('Field "processing" is mandatory.');
    }
    if (!isset($fields['completed'])) {
	    throw new APIAdmin_Exception('Field "completed" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'processing' => $fields['processing'],
        'completed' => $fields['completed'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['host'])) {
      $opt['query_string']['host'] = $fields['host'];
    }
    if (isset($fields['subroletype'])) {
      $opt['query_string']['subroletype'] = $fields['subroletype'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role_subrole_order', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_role_subrole_order\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_role_subrole_order\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_role_subrole_order\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role_subrole_order->status)) {
      $message = 'Error response from server in call to \'create_host_role_subrole_order\'. Response to \'host_role_subrole_order\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role_subrole_order->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_role_subrole_order\'. Message \'' . $response->body->host_role_subrole_order->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_role_subrole_order resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $host (Required) 'host' field, which is an embedded 'Host' resource. (FIELD).
   * @param string $subroletype (Required) 'subroletype' field, which is an embedded 'HostSubRoleType' resource. (FIELD).
   * @param string $processing (Required) 'processing' field, which is a 'boolean' type. (FIELD).
   * @param string $completed (Required) 'completed' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_role_subrole_order($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_role_subrole_order' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['processing'])) {
	    throw new APIAdmin_Exception('Field "processing" is mandatory.');
    }
    if (!isset($fields['completed'])) {
	    throw new APIAdmin_Exception('Field "completed" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'processing' => $fields['processing'],
        'completed' => $fields['completed'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['host'])) {
      $opt['query_string']['host'] = $fields['host'];
    }
    if (isset($fields['subroletype'])) {
      $opt['query_string']['subroletype'] = $fields['subroletype'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role_subrole_order', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_role_subrole_order\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_role_subrole_order\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_role_subrole_order\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role_subrole_order->status)) {
      $message = 'Error response from server in call to \'update_host_role_subrole_order\'. Response to \'host_role_subrole_order\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role_subrole_order->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_role_subrole_order\'. Message \'' . $response->body->host_role_subrole_order->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_role_subrole_type' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_role_subrole_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $config_xsl (Required) 'config_xsl' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_role_subrole_type($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_role_subrole_type' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['config_xsl'])) {
      $opt['query_string']['config_xsl'] = $fields['config_xsl'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role_subrole_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_role_subrole_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_role_subrole_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_role_subrole_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role_subrole_type->status)) {
      $message = 'Error response from server in call to \'create_host_role_subrole_type\'. Response to \'host_role_subrole_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role_subrole_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_role_subrole_type\'. Message \'' . $response->body->host_role_subrole_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_role_subrole_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $config_xsl (Required) 'config_xsl' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_role_subrole_type($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_role_subrole_type' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['config_xsl'])) {
      $opt['query_string']['config_xsl'] = $fields['config_xsl'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role_subrole_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_role_subrole_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_role_subrole_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_role_subrole_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role_subrole_type->status)) {
      $message = 'Error response from server in call to \'update_host_role_subrole_type\'. Response to \'host_role_subrole_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role_subrole_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_role_subrole_type\'. Message \'' . $response->body->host_role_subrole_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_role_type' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_role_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $config_xsl (Required) 'config_xsl' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_role_type($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_role_type' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['config_xsl'])) {
      $opt['query_string']['config_xsl'] = $fields['config_xsl'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_role_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_role_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_role_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role_type->status)) {
      $message = 'Error response from server in call to \'create_host_role_type\'. Response to \'host_role_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_role_type\'. Message \'' . $response->body->host_role_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_role_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $config_xsl (Required) 'config_xsl' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_role_type($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_role_type' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['config_xsl'])) {
      $opt['query_string']['config_xsl'] = $fields['config_xsl'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_role_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_role_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_role_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role_type->status)) {
      $message = 'Error response from server in call to \'update_host_role_type\'. Response to \'host_role_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_role_type\'. Message \'' . $response->body->host_role_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_role_type_capable_of_host_role_subrole_type' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_role_type_capable_of_host_role_subrole_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hostroletype (Required) 'hostroletype' field, which is an embedded 'HostRoleType' resource. (FIELD).
   * @param string $subroletype (Required) 'subroletype' field, which is an embedded 'HostRoleType' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_role_type_capable_of_host_role_subrole_type($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_role_type_capable_of_host_role_subrole_type' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['hostroletype'])) {
	    throw new APIAdmin_Exception('Field "hostroletype" is mandatory.');
    }
    if (!isset($fields['subroletype'])) {
	    throw new APIAdmin_Exception('Field "subroletype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'hostroletype' => $fields['hostroletype'],
        'subroletype' => $fields['subroletype'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role_type_capable_of_host_role_subrole_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_role_type_capable_of_host_role_subrole_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_role_type_capable_of_host_role_subrole_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_role_type_capable_of_host_role_subrole_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role_type_capable_of_host_role_subrole_type->status)) {
      $message = 'Error response from server in call to \'create_host_role_type_capable_of_host_role_subrole_type\'. Response to \'host_role_type_capable_of_host_role_subrole_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role_type_capable_of_host_role_subrole_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_role_type_capable_of_host_role_subrole_type\'. Message \'' . $response->body->host_role_type_capable_of_host_role_subrole_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_role_type_capable_of_host_role_subrole_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hostroletype (Required) 'hostroletype' field, which is an embedded 'HostRoleType' resource. (FIELD).
   * @param string $subroletype (Required) 'subroletype' field, which is an embedded 'HostRoleType' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_role_type_capable_of_host_role_subrole_type($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_role_type_capable_of_host_role_subrole_type' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['hostroletype'])) {
	    throw new APIAdmin_Exception('Field "hostroletype" is mandatory.');
    }
    if (!isset($fields['subroletype'])) {
	    throw new APIAdmin_Exception('Field "subroletype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'hostroletype' => $fields['hostroletype'],
        'subroletype' => $fields['subroletype'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_role_type_capable_of_host_role_subrole_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_role_type_capable_of_host_role_subrole_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_role_type_capable_of_host_role_subrole_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_role_type_capable_of_host_role_subrole_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_role_type_capable_of_host_role_subrole_type->status)) {
      $message = 'Error response from server in call to \'update_host_role_type_capable_of_host_role_subrole_type\'. Response to \'host_role_type_capable_of_host_role_subrole_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_role_type_capable_of_host_role_subrole_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_role_type_capable_of_host_role_subrole_type\'. Message \'' . $response->body->host_role_type_capable_of_host_role_subrole_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_type' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_type($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_type' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_type->status)) {
      $message = 'Error response from server in call to \'create_host_type\'. Response to \'host_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_type\'. Message \'' . $response->body->host_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_type($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_type' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_type->status)) {
      $message = 'Error response from server in call to \'update_host_type\'. Response to \'host_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_type\'. Message \'' . $response->body->host_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'host_type_capable_of_host_role_type' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  host_type_capable_of_host_role_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hosttype (Required) 'hosttype' field, which is an embedded 'HostType' resource. (FIELD).
   * @param string $hostroletype (Required) 'hostroletype' field, which is an embedded 'HostRoleType' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_host_type_capable_of_host_role_type($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_host_type_capable_of_host_role_type' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['hosttype'])) {
	    throw new APIAdmin_Exception('Field "hosttype" is mandatory.');
    }
    if (!isset($fields['hostroletype'])) {
	    throw new APIAdmin_Exception('Field "hostroletype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'hosttype' => $fields['hosttype'],
        'hostroletype' => $fields['hostroletype'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_type_capable_of_host_role_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_host_type_capable_of_host_role_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_host_type_capable_of_host_role_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_host_type_capable_of_host_role_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_type_capable_of_host_role_type->status)) {
      $message = 'Error response from server in call to \'create_host_type_capable_of_host_role_type\'. Response to \'host_type_capable_of_host_role_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_type_capable_of_host_role_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_host_type_capable_of_host_role_type\'. Message \'' . $response->body->host_type_capable_of_host_role_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  host_type_capable_of_host_role_type resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $hosttype (Required) 'hosttype' field, which is an embedded 'HostType' resource. (FIELD).
   * @param string $hostroletype (Required) 'hostroletype' field, which is an embedded 'HostRoleType' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_host_type_capable_of_host_role_type($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_host_type_capable_of_host_role_type' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['hosttype'])) {
	    throw new APIAdmin_Exception('Field "hosttype" is mandatory.');
    }
    if (!isset($fields['hostroletype'])) {
	    throw new APIAdmin_Exception('Field "hostroletype" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'hosttype' => $fields['hosttype'],
        'hostroletype' => $fields['hostroletype'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/host_type_capable_of_host_role_type', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_host_type_capable_of_host_role_type\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_host_type_capable_of_host_role_type\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_host_type_capable_of_host_role_type\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->host_type_capable_of_host_role_type->status)) {
      $message = 'Error response from server in call to \'update_host_type_capable_of_host_role_type\'. Response to \'host_type_capable_of_host_role_type\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->host_type_capable_of_host_role_type->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_host_type_capable_of_host_role_type\'. Message \'' . $response->body->host_type_capable_of_host_role_type->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'image_target' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  image_target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $format (Required) 'format' field, which is an embedded 'Format' resource. (FIELD).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param string $server (Required) 'server' field, which is an embedded 'Server' resource. (FIELD).
   * @param string $servertype (Required) 'servertype' field, which is an embedded 'ServerType' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $width (Required) 'width' field, which is a 'long' type. (FIELD).
   * @param string $height (Required) 'height' field, which is a 'long' type. (FIELD).
   * @param string $croptype (Required) 'croptype' field, which is a 'long' type. (FIELD).
   * @param string $secure_filenames (Required) 'secure_filenames' field, which is a 'boolean' type. (FIELD).
   * @param string $filenamemask (Required) 'filenamemask' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_image_target($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_image_target' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    if (!isset($fields['format'])) {
	    throw new APIAdmin_Exception('Field "format" is mandatory.');
    }
    if (!isset($fields['campaign'])) {
	    throw new APIAdmin_Exception('Field "campaign" is mandatory.');
    }
    if (!isset($fields['width'])) {
	    throw new APIAdmin_Exception('Field "width" is mandatory.');
    }
    if (!isset($fields['height'])) {
	    throw new APIAdmin_Exception('Field "height" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'name' => $fields['name'],
        'format' => $fields['format'],
        'campaign' => $fields['campaign'],
        'width' => $fields['width'],
        'height' => $fields['height'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['server'])) {
      $opt['query_string']['server'] = $fields['server'];
    }
    if (isset($fields['servertype'])) {
      $opt['query_string']['servertype'] = $fields['servertype'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['croptype'])) {
      $opt['query_string']['croptype'] = $fields['croptype'];
    }
    if (isset($fields['secure_filenames'])) {
      $opt['query_string']['secure_filenames'] = $fields['secure_filenames'];
    }
    if (isset($fields['filenamemask'])) {
      $opt['query_string']['filenamemask'] = $fields['filenamemask'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/image_target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_image_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_image_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_image_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->image_target->status)) {
      $message = 'Error response from server in call to \'create_image_target\'. Response to \'image_target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->image_target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_image_target\'. Message \'' . $response->body->image_target->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  image_target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $format (Required) 'format' field, which is an embedded 'Format' resource. (FIELD).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param string $server (Required) 'server' field, which is an embedded 'Server' resource. (FIELD).
   * @param string $servertype (Required) 'servertype' field, which is an embedded 'ServerType' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $width (Required) 'width' field, which is a 'long' type. (FIELD).
   * @param string $height (Required) 'height' field, which is a 'long' type. (FIELD).
   * @param string $croptype (Required) 'croptype' field, which is a 'long' type. (FIELD).
   * @param string $secure_filenames (Required) 'secure_filenames' field, which is a 'boolean' type. (FIELD).
   * @param string $filenamemask (Required) 'filenamemask' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_image_target($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_image_target' ,array(), WATCHDOG_NOTICE);
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
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    if (!isset($fields['format'])) {
	    throw new APIAdmin_Exception('Field "format" is mandatory.');
    }
    if (!isset($fields['campaign'])) {
	    throw new APIAdmin_Exception('Field "campaign" is mandatory.');
    }
    if (!isset($fields['width'])) {
	    throw new APIAdmin_Exception('Field "width" is mandatory.');
    }
    if (!isset($fields['height'])) {
	    throw new APIAdmin_Exception('Field "height" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'name' => $fields['name'],
        'format' => $fields['format'],
        'campaign' => $fields['campaign'],
        'width' => $fields['width'],
        'height' => $fields['height'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['server'])) {
      $opt['query_string']['server'] = $fields['server'];
    }
    if (isset($fields['servertype'])) {
      $opt['query_string']['servertype'] = $fields['servertype'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['croptype'])) {
      $opt['query_string']['croptype'] = $fields['croptype'];
    }
    if (isset($fields['secure_filenames'])) {
      $opt['query_string']['secure_filenames'] = $fields['secure_filenames'];
    }
    if (isset($fields['filenamemask'])) {
      $opt['query_string']['filenamemask'] = $fields['filenamemask'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/image_target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_image_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_image_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_image_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->image_target->status)) {
      $message = 'Error response from server in call to \'update_image_target\'. Response to \'image_target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->image_target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_image_target\'. Message \'' . $response->body->image_target->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'thumbnail_target' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  thumbnail_target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $format (Required) 'format' field, which is an embedded 'Format' resource. (FIELD).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param string $server (Required) 'server' field, which is an embedded 'Server' resource. (FIELD).
   * @param string $servertype (Required) 'servertype' field, which is an embedded 'ServerType' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $width (Required) 'width' field, which is a 'long' type. (FIELD).
   * @param string $height (Required) 'height' field, which is a 'long' type. (FIELD).
   * @param string $croptype (Required) 'croptype' field, which is a 'long' type. (FIELD).
   * @param string $secure_filenames (Required) 'secure_filenames' field, which is a 'boolean' type. (FIELD).
   * @param string $filenamemask (Required) 'filenamemask' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_thumbnail_target($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_thumbnail_target' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['format'])) {
	    throw new APIAdmin_Exception('Field "format" is mandatory.');
    }
    if (!isset($fields['campaign'])) {
	    throw new APIAdmin_Exception('Field "campaign" is mandatory.');
    }
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    if (!isset($fields['width'])) {
	    throw new APIAdmin_Exception('Field "width" is mandatory.');
    }
    if (!isset($fields['height'])) {
	    throw new APIAdmin_Exception('Field "height" is mandatory.');
    }
    if (empty($fields['filenamemask'])) {
	    throw new APIAdmin_Exception('Field "filenamemask" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'format' => $fields['format'],
        'campaign' => $fields['campaign'],
        'name' => $fields['name'],
        'width' => $fields['width'],
        'height' => $fields['height'],
        'filenamemask' => $fields['filenamemask'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['server'])) {
      $opt['query_string']['server'] = $fields['server'];
    }
    if (isset($fields['servertype'])) {
      $opt['query_string']['servertype'] = $fields['servertype'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['croptype'])) {
      $opt['query_string']['croptype'] = $fields['croptype'];
    }
    if (isset($fields['secure_filenames'])) {
      $opt['query_string']['secure_filenames'] = $fields['secure_filenames'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/thumbnail_target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_thumbnail_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_thumbnail_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_thumbnail_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->thumbnail_target->status)) {
      $message = 'Error response from server in call to \'create_thumbnail_target\'. Response to \'thumbnail_target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->thumbnail_target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_thumbnail_target\'. Message \'' . $response->body->thumbnail_target->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  thumbnail_target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $format (Required) 'format' field, which is an embedded 'Format' resource. (FIELD).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param string $server (Required) 'server' field, which is an embedded 'Server' resource. (FIELD).
   * @param string $servertype (Required) 'servertype' field, which is an embedded 'ServerType' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $width (Required) 'width' field, which is a 'long' type. (FIELD).
   * @param string $height (Required) 'height' field, which is a 'long' type. (FIELD).
   * @param string $croptype (Required) 'croptype' field, which is a 'long' type. (FIELD).
   * @param string $secure_filenames (Required) 'secure_filenames' field, which is a 'boolean' type. (FIELD).
   * @param string $filenamemask (Required) 'filenamemask' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_thumbnail_target($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_thumbnail_target' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['format'])) {
	    throw new APIAdmin_Exception('Field "format" is mandatory.');
    }
    if (!isset($fields['campaign'])) {
	    throw new APIAdmin_Exception('Field "campaign" is mandatory.');
    }
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    if (!isset($fields['width'])) {
	    throw new APIAdmin_Exception('Field "width" is mandatory.');
    }
    if (!isset($fields['height'])) {
	    throw new APIAdmin_Exception('Field "height" is mandatory.');
    }
    if (empty($fields['filenamemask'])) {
	    throw new APIAdmin_Exception('Field "filenamemask" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'format' => $fields['format'],
        'campaign' => $fields['campaign'],
        'name' => $fields['name'],
        'width' => $fields['width'],
        'height' => $fields['height'],
        'filenamemask' => $fields['filenamemask'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['server'])) {
      $opt['query_string']['server'] = $fields['server'];
    }
    if (isset($fields['servertype'])) {
      $opt['query_string']['servertype'] = $fields['servertype'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['croptype'])) {
      $opt['query_string']['croptype'] = $fields['croptype'];
    }
    if (isset($fields['secure_filenames'])) {
      $opt['query_string']['secure_filenames'] = $fields['secure_filenames'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/thumbnail_target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_thumbnail_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_thumbnail_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_thumbnail_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->thumbnail_target->status)) {
      $message = 'Error response from server in call to \'update_thumbnail_target\'. Response to \'thumbnail_target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->thumbnail_target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_thumbnail_target\'. Message \'' . $response->body->thumbnail_target->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'video_target' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  video_target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $format (Required) 'format' field, which is an embedded 'Format' resource. (FIELD).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param string $server (Required) 'server' field, which is an embedded 'Server' resource. (FIELD).
   * @param string $servertype (Required) 'servertype' field, which is an embedded 'ServerType' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $width (Required) 'width' field, which is a 'long' type. (FIELD).
   * @param string $height (Required) 'height' field, which is a 'long' type. (FIELD).
   * @param string $framerate (Required) 'framerate' field, which is a 'long' type. (FIELD).
   * @param string $croptype (Required) 'croptype' field, which is a 'long' type. (FIELD).
   * @param string $audio_channels (Required) 'audio_channels' field, which is a 'long' type. (FIELD).
   * @param string $audio_sampling_frequency (Required) 'audio_sampling_frequency' field, which is a 'long' type. (FIELD).
   * @param string $audio_bitrate (Required) 'audio_bitrate' field, which is a 'long' type. (FIELD).
   * @param string $video_bitrate (Required) 'video_bitrate' field, which is a 'long' type. (FIELD).
   * @param string $target_filesize (Required) 'target_filesize' field, which is a 'long' type. (FIELD).
   * @param string $secure_filenames (Required) 'secure_filenames' field, which is a 'boolean' type. (FIELD).
   * @param string $filenamemask (Required) 'filenamemask' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_video_target($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_video_target' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['format'])) {
	    throw new APIAdmin_Exception('Field "format" is mandatory.');
    }
    if (!isset($fields['campaign'])) {
	    throw new APIAdmin_Exception('Field "campaign" is mandatory.');
    }
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    if (!isset($fields['width'])) {
	    throw new APIAdmin_Exception('Field "width" is mandatory.');
    }
    if (!isset($fields['height'])) {
	    throw new APIAdmin_Exception('Field "height" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'format' => $fields['format'],
        'campaign' => $fields['campaign'],
        'name' => $fields['name'],
        'width' => $fields['width'],
        'height' => $fields['height'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['server'])) {
      $opt['query_string']['server'] = $fields['server'];
    }
    if (isset($fields['servertype'])) {
      $opt['query_string']['servertype'] = $fields['servertype'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['framerate'])) {
      $opt['query_string']['framerate'] = $fields['framerate'];
    }
    if (isset($fields['croptype'])) {
      $opt['query_string']['croptype'] = $fields['croptype'];
    }
    if (isset($fields['audio_channels'])) {
      $opt['query_string']['audio_channels'] = $fields['audio_channels'];
    }
    if (isset($fields['audio_sampling_frequency'])) {
      $opt['query_string']['audio_sampling_frequency'] = $fields['audio_sampling_frequency'];
    }
    if (isset($fields['audio_bitrate'])) {
      $opt['query_string']['audio_bitrate'] = $fields['audio_bitrate'];
    }
    if (isset($fields['video_bitrate'])) {
      $opt['query_string']['video_bitrate'] = $fields['video_bitrate'];
    }
    if (isset($fields['target_filesize'])) {
      $opt['query_string']['target_filesize'] = $fields['target_filesize'];
    }
    if (isset($fields['secure_filenames'])) {
      $opt['query_string']['secure_filenames'] = $fields['secure_filenames'];
    }
    if (isset($fields['filenamemask'])) {
      $opt['query_string']['filenamemask'] = $fields['filenamemask'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/video_target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_video_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_video_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_video_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->video_target->status)) {
      $message = 'Error response from server in call to \'create_video_target\'. Response to \'video_target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->video_target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_video_target\'. Message \'' . $response->body->video_target->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  video_target resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $format (Required) 'format' field, which is an embedded 'Format' resource. (FIELD).
   * @param string $campaign (Required) 'campaign' field, which is an embedded 'Campaign' resource. (FIELD).
   * @param string $server (Required) 'server' field, which is an embedded 'Server' resource. (FIELD).
   * @param string $servertype (Required) 'servertype' field, which is an embedded 'ServerType' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $width (Required) 'width' field, which is a 'long' type. (FIELD).
   * @param string $height (Required) 'height' field, which is a 'long' type. (FIELD).
   * @param string $framerate (Required) 'framerate' field, which is a 'long' type. (FIELD).
   * @param string $croptype (Required) 'croptype' field, which is a 'long' type. (FIELD).
   * @param string $audio_channels (Required) 'audio_channels' field, which is a 'long' type. (FIELD).
   * @param string $audio_sampling_frequency (Required) 'audio_sampling_frequency' field, which is a 'long' type. (FIELD).
   * @param string $audio_bitrate (Required) 'audio_bitrate' field, which is a 'long' type. (FIELD).
   * @param string $video_bitrate (Required) 'video_bitrate' field, which is a 'long' type. (FIELD).
   * @param string $target_filesize (Required) 'target_filesize' field, which is a 'long' type. (FIELD).
   * @param string $secure_filenames (Required) 'secure_filenames' field, which is a 'boolean' type. (FIELD).
   * @param string $filenamemask (Required) 'filenamemask' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_video_target($id,$context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.update_video_target' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($fields['format'])) {
	    throw new APIAdmin_Exception('Field "format" is mandatory.');
    }
    if (!isset($fields['campaign'])) {
	    throw new APIAdmin_Exception('Field "campaign" is mandatory.');
    }
    if (empty($fields['name'])) {
	    throw new APIAdmin_Exception('Field "name" is mandatory.');
    }
    if (!isset($fields['width'])) {
	    throw new APIAdmin_Exception('Field "width" is mandatory.');
    }
    if (!isset($fields['height'])) {
	    throw new APIAdmin_Exception('Field "height" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        'format' => $fields['format'],
        'campaign' => $fields['campaign'],
        'name' => $fields['name'],
        'width' => $fields['width'],
        'height' => $fields['height'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['server'])) {
      $opt['query_string']['server'] = $fields['server'];
    }
    if (isset($fields['servertype'])) {
      $opt['query_string']['servertype'] = $fields['servertype'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['framerate'])) {
      $opt['query_string']['framerate'] = $fields['framerate'];
    }
    if (isset($fields['croptype'])) {
      $opt['query_string']['croptype'] = $fields['croptype'];
    }
    if (isset($fields['audio_channels'])) {
      $opt['query_string']['audio_channels'] = $fields['audio_channels'];
    }
    if (isset($fields['audio_sampling_frequency'])) {
      $opt['query_string']['audio_sampling_frequency'] = $fields['audio_sampling_frequency'];
    }
    if (isset($fields['audio_bitrate'])) {
      $opt['query_string']['audio_bitrate'] = $fields['audio_bitrate'];
    }
    if (isset($fields['video_bitrate'])) {
      $opt['query_string']['video_bitrate'] = $fields['video_bitrate'];
    }
    if (isset($fields['target_filesize'])) {
      $opt['query_string']['target_filesize'] = $fields['target_filesize'];
    }
    if (isset($fields['secure_filenames'])) {
      $opt['query_string']['secure_filenames'] = $fields['secure_filenames'];
    }
    if (isset($fields['filenamemask'])) {
      $opt['query_string']['filenamemask'] = $fields['filenamemask'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/video_target', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_video_target\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_video_target\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_video_target\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->video_target->status)) {
      $message = 'Error response from server in call to \'update_video_target\'. Response to \'video_target\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->video_target->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_video_target\'. Message \'' . $response->body->video_target->errorMessage . '\'';
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
    if (!isset($parameters['masterkey'])) {
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
    if (!isset($parameters['masterkey'])) {
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
    if (!isset($parameters['key'])) {
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
    if (!isset($parameters['masterkey'])) {
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
  // 'new_audio_metadata_template' Resource METHODS
  

  /**
   * Invokes the CALL method for the  new_audio_metadata_template resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. (PARAMETER).
   * @param string $audio_target (Required) The name of the audio target. (PARAMETER).
   * @param string $name (Required) The template name (PARAMETER).
   * @param string $value (Required) The template value (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_new_audio_metadata_template($parameters = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.call_new_audio_metadata_template' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIAdmin_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['audio_target'])) {
	    throw new APIAdmin_Exception('Parameter "audio_target" is mandatory.');
    }
    if (empty($parameters['name'])) {
	    throw new APIAdmin_Exception('Parameter "name" is mandatory.');
    }
    if (empty($parameters['value'])) {
	    throw new APIAdmin_Exception('Parameter "value" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'audio_target' => $parameters['audio_target'],
        'name' => $parameters['name'],
        'value' => $parameters['value'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/new_audio_metadata_template', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_new_audio_metadata_template\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_new_audio_metadata_template\'. ' . $response->body ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_new_audio_metadata_template\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

	  if (!isset($response->body->new_audio_metadata_template->status)) {
      $message = 'Error response from server in call to \'call_new_audio_metadata_template\'. Response to \'new_audio_metadata_template\' was expected but was not present';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIAdmin_Exception($message);
    }

    $status = $response->body->new_audio_metadata_template->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_new_audio_metadata_template\'. Message \'' . $response->body->new_audio_metadata_template->errorMessage . '\'';
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
   * @param string $filenamemask (Required) The filename mask. (PARAMETER).
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
    if (!isset($parameters['key'])) {
	    throw new APIAdmin_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['name'])) {
	    throw new APIAdmin_Exception('Parameter "name" is mandatory.');
    }
    if (!isset($parameters['format'])) {
	    throw new APIAdmin_Exception('Parameter "format" is mandatory.');
    }
    if (!isset($parameters['channels'])) {
	    throw new APIAdmin_Exception('Parameter "channels" is mandatory.');
    }
    if (!isset($parameters['bitrate'])) {
	    throw new APIAdmin_Exception('Parameter "bitrate" is mandatory.');
    }
    if (!isset($parameters['samplerate'])) {
	    throw new APIAdmin_Exception('Parameter "samplerate" is mandatory.');
    }
    if (empty($parameters['filenamemask'])) {
	    throw new APIAdmin_Exception('Parameter "filenamemask" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'name' => $parameters['name'],
        'format' => $parameters['format'],
        'channels' => $parameters['channels'],
        'bitrate' => $parameters['bitrate'],
        'samplerate' => $parameters['samplerate'],
        'filenamemask' => $parameters['filenamemask'],
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
    if (!isset($parameters['masterkey'])) {
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
   * @param string $public_url (Required) The public facing url that uploded content will be accessible under. This is the url that goes into public feeds. (PARAMETER).
   * @param string $test_url (Required) The internal facing url that uploded content will be accessible under. This is the url used internally to access the files. (PARAMETER).
   * @param string $upload_url (Required) Where we upload our content to. (PARAMETER).
   * @param string $server_media_type (Required) The media that we will store on this server. (PARAMETER).
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
    if (!isset($parameters['key'])) {
	    throw new APIAdmin_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['name'])) {
	    throw new APIAdmin_Exception('Parameter "name" is mandatory.');
    }
    if (empty($parameters['public_url'])) {
	    throw new APIAdmin_Exception('Parameter "public_url" is mandatory.');
    }
    if (empty($parameters['test_url'])) {
	    throw new APIAdmin_Exception('Parameter "test_url" is mandatory.');
    }
    if (empty($parameters['upload_url'])) {
	    throw new APIAdmin_Exception('Parameter "upload_url" is mandatory.');
    }
    if (!isset($parameters['server_media_type'])) {
	    throw new APIAdmin_Exception('Parameter "server_media_type" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'name' => $parameters['name'],
        'public_url' => $parameters['public_url'],
        'test_url' => $parameters['test_url'],
        'upload_url' => $parameters['upload_url'],
        'server_media_type' => $parameters['server_media_type'],
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
    if (!isset($parameters['masterkey'])) {
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
    if (!isset($parameters['masterkey'])) {
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


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
 * Default APIContent Exception.
 */
class APIContent_Exception extends Exception {
}

/*%******************************************************************************************%*/
// MAIN CLASS

/**
 * TODO: Documentation from Content API index.xml
 *
 * Visit <http://thumbwhere.com/api/> for more information.
 *
 * @version V1.1
 * @license See the included NOTICE.md file for more information.
 * @copyright See the included NOTICE.md file for more information.
 * @link http://thumbwhere.com/api/ ThumbWhere Content
 * @link http://thumbwhere.com/documentation/content/ ThumbWhere Content documentation
 */
class ThumbWhereAPIContent extends TWRuntime {
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
   * Constructs a new instance of <ThumbWhereAPIContent>. If the <code>TW_DEFAULT_CACHE_CONFIG</code> configuration
   * option is set, requests will be authenticated using a session token. Otherwise, requests will use
   * the older authentication method.
   *
   * @param string $environment (Optional) Used to specify the type of environment. 'localhost', 'staging' etc..
   * @return boolean A value of <code>false</code> if no valid values are set, otherwise <code>true</code>.
   */

  public function __construct($environment = null) {
    $this->api_version = 'v1.1';
    $this->api = 'content';
    $this->hostname = self::DEFAULT_URL;

    return parent::__construct();
  }

  /*%******************************************************************************************%*/
  // SETTERS

  /**
   * Sets the region to use for subsequent ThumbWhere APIContent operations.
   *
   * @param string $region (Required) The region to use for subsequent ThumbWhere APIContent operations. [Allowed values: `ThumbWhereAPIContent::REGION_US_E1 `, `ThumbWhereAPIContent::REGION_US_W1`, `ThumbWhereAPIContent::REGION_EU_W1`, `ThumbWhereAPIContent::REGION_APAC_SE1`, `ThumbWhereAPIContent::REGION_APAC_NE1`]
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
  // 'content_ingest' Resource METHODS

  /**
   * Invokes the CREATE method for the  content_ingest resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $title (Required) The 'title' of the conetnet we are uploading. (FIELD).
   * @param string $url (Required) The 'url' to the content that we are going to pull into ThumbWhere. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_content_ingest($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_content_ingest' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('constraint/field/paramete "' . $bucket . '" is not valid.');
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
    if (empty($fields['title'])) {
	    throw new APIContent_Exception('Field "title" is mandatory.');
    }
    if (empty($fields['url'])) {
	    throw new APIContent_Exception('Field "url" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        'title' => $fields['title'],
        'url' => $fields['url'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_ingest', $opt);
    $status = $response->body->content_ingest->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_content_ingest\'. Message \'' . $response->body->content_ingest->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'producer' Resource METHODS

  /**
   * Invokes the CREATE method for the  producer resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) The name of the producer we are creating. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_producer($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_producer' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('constraint/field/paramete "' . $bucket . '" is not valid.');
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
	    throw new APIContent_Exception('Field "name" is mandatory.');
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
    $response = $this->invoke($this->api . '/' . $this->api_version . '/producer', $opt);
    $status = $response->body->producer->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_producer\'. Message \'' . $response->body->producer->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'content' Resource METHODS

  /**
   * Invokes the CREATE method for the  content resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $title (Required) The 'title' we are uploading. (FIELD).
   * @param string $mediaitem (Required) The mediaitem this content is wrapping. (FIELD).
   * @param string $metadata (Required) The metadata of this producer. (FIELD).
   * @param string $producer (Required) The producer of this metadata. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_content($context = array(), $fields = array(), $opt = null) {
	    watchdog('tw_api', 'call to TWAPI.create_content' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('constraint/field/paramete "' . $bucket . '" is not valid.');
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
        '$op' => 'create',
        '$key' => $context['key'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['title'])) {
      $opt['query_string']['title'] = $fields['title'];
    }
    if (isset($fields['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $fields['mediaitem'];
    }
    if (isset($fields['metadata'])) {
      $opt['query_string']['metadata'] = $fields['metadata'];
    }
    if (isset($fields['producer'])) {
      $opt['query_string']['producer'] = $fields['producer'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content', $opt);
    $status = $response->body->content->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_content\'. Message \'' . $response->body->content->errorMessage . '\'';
	    watchdog('tw_api', $message , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
}

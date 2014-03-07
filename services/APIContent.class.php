
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
  /*%******************************************************************************************%*/
  // 
  // ALL THE RESOURCES
  
  

	
  /*%******************************************************************************************%*/
  // 'action' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  action resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $contentingest (Required) 'contentingest' field, which is an embedded 'ContentIngest' resource. (FIELD).
   * @param string $like (Required) 'like' field, which is an embedded 'Like' resource. (FIELD).
   * @param string $follow (Required) 'follow' field, which is an embedded 'Follow' resource. (FIELD).
   * @param string $fan (Required) 'fan' field, which is an embedded 'Fan' resource. (FIELD).
   * @param string $share (Required) 'share' field, which is an embedded 'Share' resource. (FIELD).
   * @param string $awardedtrophy (Required) 'awardedtrophy' field, which is an embedded 'AwardedTrophy' resource. (FIELD).
   * @param string $mediaitemrating (Required) 'mediaitemrating' field, which is an embedded 'MediaItemRating' resource. (FIELD).
   * @param string $booking (Required) 'booking' field, which is an embedded 'Booking' resource. (FIELD).
   * @param string $checkin (Required) 'checkin' field, which is an embedded 'Checkin' resource. (FIELD).
   * @param string $consume (Required) 'consume' field, which is an embedded 'Consume' resource. (FIELD).
   * @param string $produce (Required) 'produce' field, which is an embedded 'Produce' resource. (FIELD).
   * @param string $consumermember (Required) 'consumermember' field, which is an embedded 'ConsumerMember' resource. (FIELD).
   * @param string $producermember (Required) 'producermember' field, which is an embedded 'ProducerMember' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_action($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_action' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'action\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['contentingest'])) {
      $opt['query_string']['contentingest'] = $fields['contentingest'];
    }
    if (isset($fields['like'])) {
      $opt['query_string']['like'] = $fields['like'];
    }
    if (isset($fields['follow'])) {
      $opt['query_string']['follow'] = $fields['follow'];
    }
    if (isset($fields['fan'])) {
      $opt['query_string']['fan'] = $fields['fan'];
    }
    if (isset($fields['share'])) {
      $opt['query_string']['share'] = $fields['share'];
    }
    if (isset($fields['awardedtrophy'])) {
      $opt['query_string']['awardedtrophy'] = $fields['awardedtrophy'];
    }
    if (isset($fields['mediaitemrating'])) {
      $opt['query_string']['mediaitemrating'] = $fields['mediaitemrating'];
    }
    if (isset($fields['booking'])) {
      $opt['query_string']['booking'] = $fields['booking'];
    }
    if (isset($fields['checkin'])) {
      $opt['query_string']['checkin'] = $fields['checkin'];
    }
    if (isset($fields['consume'])) {
      $opt['query_string']['consume'] = $fields['consume'];
    }
    if (isset($fields['produce'])) {
      $opt['query_string']['produce'] = $fields['produce'];
    }
    if (isset($fields['consumermember'])) {
      $opt['query_string']['consumermember'] = $fields['consumermember'];
    }
    if (isset($fields['producermember'])) {
      $opt['query_string']['producermember'] = $fields['producermember'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/action', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_action\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_action\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_action\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->action->status)) {
      $message = 'Error response from server in call to \'create_action\'. Response to \'action\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->action->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_action\'. Message \'' . $response->body->action->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  action resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $contentingest (Required) 'contentingest' field, which is an embedded 'ContentIngest' resource. (FIELD).
   * @param string $like (Required) 'like' field, which is an embedded 'Like' resource. (FIELD).
   * @param string $follow (Required) 'follow' field, which is an embedded 'Follow' resource. (FIELD).
   * @param string $fan (Required) 'fan' field, which is an embedded 'Fan' resource. (FIELD).
   * @param string $share (Required) 'share' field, which is an embedded 'Share' resource. (FIELD).
   * @param string $awardedtrophy (Required) 'awardedtrophy' field, which is an embedded 'AwardedTrophy' resource. (FIELD).
   * @param string $mediaitemrating (Required) 'mediaitemrating' field, which is an embedded 'MediaItemRating' resource. (FIELD).
   * @param string $booking (Required) 'booking' field, which is an embedded 'Booking' resource. (FIELD).
   * @param string $checkin (Required) 'checkin' field, which is an embedded 'Checkin' resource. (FIELD).
   * @param string $consume (Required) 'consume' field, which is an embedded 'Consume' resource. (FIELD).
   * @param string $produce (Required) 'produce' field, which is an embedded 'Produce' resource. (FIELD).
   * @param string $consumermember (Required) 'consumermember' field, which is an embedded 'ConsumerMember' resource. (FIELD).
   * @param string $producermember (Required) 'producermember' field, which is an embedded 'ProducerMember' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_action($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_action' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'action\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['contentingest'])) {
      $opt['query_string']['contentingest'] = $fields['contentingest'];
    }
    if (isset($fields['like'])) {
      $opt['query_string']['like'] = $fields['like'];
    }
    if (isset($fields['follow'])) {
      $opt['query_string']['follow'] = $fields['follow'];
    }
    if (isset($fields['fan'])) {
      $opt['query_string']['fan'] = $fields['fan'];
    }
    if (isset($fields['share'])) {
      $opt['query_string']['share'] = $fields['share'];
    }
    if (isset($fields['awardedtrophy'])) {
      $opt['query_string']['awardedtrophy'] = $fields['awardedtrophy'];
    }
    if (isset($fields['mediaitemrating'])) {
      $opt['query_string']['mediaitemrating'] = $fields['mediaitemrating'];
    }
    if (isset($fields['booking'])) {
      $opt['query_string']['booking'] = $fields['booking'];
    }
    if (isset($fields['checkin'])) {
      $opt['query_string']['checkin'] = $fields['checkin'];
    }
    if (isset($fields['consume'])) {
      $opt['query_string']['consume'] = $fields['consume'];
    }
    if (isset($fields['produce'])) {
      $opt['query_string']['produce'] = $fields['produce'];
    }
    if (isset($fields['consumermember'])) {
      $opt['query_string']['consumermember'] = $fields['consumermember'];
    }
    if (isset($fields['producermember'])) {
      $opt['query_string']['producermember'] = $fields['producermember'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/action', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_action\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_action\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_action\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->action->status)) {
      $message = 'Error response from server in call to \'update_action\'. Response to \'action\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->action->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_action\'. Message \'' . $response->body->action->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'activity' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  activity resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $action (Required) 'action' field, which is an embedded 'Action' resource. (FIELD).
   * @param string $subject (Required) 'subject' field, which is an embedded 'Subject' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_activity($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_activity' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'activity\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['action'])) {
	    throw new APIContent_Exception('Field "action" is mandatory.');
    }
    if (!isset($fields['subject'])) {
	    throw new APIContent_Exception('Field "subject" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'action' => $fields['action'],
        'subject' => $fields['subject'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/activity', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_activity\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_activity\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_activity\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->activity->status)) {
      $message = 'Error response from server in call to \'create_activity\'. Response to \'activity\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->activity->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_activity\'. Message \'' . $response->body->activity->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  activity resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $action (Required) 'action' field, which is an embedded 'Action' resource. (FIELD).
   * @param string $subject (Required) 'subject' field, which is an embedded 'Subject' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_activity($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_activity' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'activity\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['action'])) {
	    throw new APIContent_Exception('Field "action" is mandatory.');
    }
    if (!isset($fields['subject'])) {
	    throw new APIContent_Exception('Field "subject" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'action' => $fields['action'],
        'subject' => $fields['subject'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/activity', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_activity\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_activity\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_activity\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->activity->status)) {
      $message = 'Error response from server in call to \'update_activity\'. Response to \'activity\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->activity->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_activity\'. Message \'' . $response->body->activity->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'actor' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  actor resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $member (Required) 'member' field, which is an embedded 'Member' resource. (FIELD).
   * @param string $identity (Required) 'identity' field, which is an embedded 'Identity' resource. (FIELD).
   * @param string $producer (Required) 'producer' field, which is an embedded 'Producer' resource. (FIELD).
   * @param string $consumer (Required) 'consumer' field, which is an embedded 'Consumer' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_actor($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_actor' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'actor\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['member'])) {
      $opt['query_string']['member'] = $fields['member'];
    }
    if (isset($fields['identity'])) {
      $opt['query_string']['identity'] = $fields['identity'];
    }
    if (isset($fields['producer'])) {
      $opt['query_string']['producer'] = $fields['producer'];
    }
    if (isset($fields['consumer'])) {
      $opt['query_string']['consumer'] = $fields['consumer'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/actor', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_actor\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_actor\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_actor\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->actor->status)) {
      $message = 'Error response from server in call to \'create_actor\'. Response to \'actor\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->actor->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_actor\'. Message \'' . $response->body->actor->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  actor resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $member (Required) 'member' field, which is an embedded 'Member' resource. (FIELD).
   * @param string $identity (Required) 'identity' field, which is an embedded 'Identity' resource. (FIELD).
   * @param string $producer (Required) 'producer' field, which is an embedded 'Producer' resource. (FIELD).
   * @param string $consumer (Required) 'consumer' field, which is an embedded 'Consumer' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_actor($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_actor' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'actor\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['member'])) {
      $opt['query_string']['member'] = $fields['member'];
    }
    if (isset($fields['identity'])) {
      $opt['query_string']['identity'] = $fields['identity'];
    }
    if (isset($fields['producer'])) {
      $opt['query_string']['producer'] = $fields['producer'];
    }
    if (isset($fields['consumer'])) {
      $opt['query_string']['consumer'] = $fields['consumer'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/actor', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_actor\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_actor\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_actor\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->actor->status)) {
      $message = 'Error response from server in call to \'update_actor\'. Response to \'actor\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->actor->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_actor\'. Message \'' . $response->body->actor->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'awarded_trophy' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  awarded_trophy resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $trophy (Required) 'trophy' field, which is an embedded 'Trophy' resource. (FIELD).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $documentation (Required) 'documentation' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_awarded_trophy($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_awarded_trophy' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'awarded_trophy\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['trophy'])) {
	    throw new APIContent_Exception('Field "trophy" is mandatory.');
    }
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    if (empty($fields['documentation'])) {
	    throw new APIContent_Exception('Field "documentation" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'trophy' => $fields['trophy'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
        'documentation' => $fields['documentation'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/awarded_trophy', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_awarded_trophy\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_awarded_trophy\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_awarded_trophy\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->awarded_trophy->status)) {
      $message = 'Error response from server in call to \'create_awarded_trophy\'. Response to \'awarded_trophy\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->awarded_trophy->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_awarded_trophy\'. Message \'' . $response->body->awarded_trophy->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  awarded_trophy resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $trophy (Required) 'trophy' field, which is an embedded 'Trophy' resource. (FIELD).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $documentation (Required) 'documentation' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_awarded_trophy($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_awarded_trophy' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'awarded_trophy\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['trophy'])) {
	    throw new APIContent_Exception('Field "trophy" is mandatory.');
    }
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    if (empty($fields['documentation'])) {
	    throw new APIContent_Exception('Field "documentation" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'trophy' => $fields['trophy'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
        'documentation' => $fields['documentation'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/awarded_trophy', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_awarded_trophy\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_awarded_trophy\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_awarded_trophy\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->awarded_trophy->status)) {
      $message = 'Error response from server in call to \'update_awarded_trophy\'. Response to \'awarded_trophy\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->awarded_trophy->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_awarded_trophy\'. Message \'' . $response->body->awarded_trophy->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'bookmark' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  bookmark resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $member (Required) Provides context for the member. (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_bookmark($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_bookmark' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'bookmark\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        '$member' => $context['member'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/bookmark', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_bookmark\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_bookmark\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_bookmark\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->bookmark->status)) {
      $message = 'Error response from server in call to \'create_bookmark\'. Response to \'bookmark\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->bookmark->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_bookmark\'. Message \'' . $response->body->bookmark->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  bookmark resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $member (Required) Provides context for the member. (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_bookmark($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_bookmark' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'bookmark\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        '$member' => $context['member'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/bookmark', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_bookmark\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_bookmark\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_bookmark\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->bookmark->status)) {
      $message = 'Error response from server in call to \'update_bookmark\'. Response to \'bookmark\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->bookmark->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_bookmark\'. Message \'' . $response->body->bookmark->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'consume' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  consume resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $mediaitem (Required) 'mediaitem' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param string $documentation (Required) 'documentation' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_consume($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_consume' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'consume\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    if (empty($fields['documentation'])) {
	    throw new APIContent_Exception('Field "documentation" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
        'documentation' => $fields['documentation'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }
    if (isset($fields['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $fields['mediaitem'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/consume', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_consume\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_consume\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_consume\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->consume->status)) {
      $message = 'Error response from server in call to \'create_consume\'. Response to \'consume\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->consume->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_consume\'. Message \'' . $response->body->consume->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  consume resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $mediaitem (Required) 'mediaitem' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param string $documentation (Required) 'documentation' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_consume($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_consume' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'consume\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    if (empty($fields['documentation'])) {
	    throw new APIContent_Exception('Field "documentation" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
        'documentation' => $fields['documentation'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }
    if (isset($fields['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $fields['mediaitem'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/consume', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_consume\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_consume\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_consume\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->consume->status)) {
      $message = 'Error response from server in call to \'update_consume\'. Response to \'consume\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->consume->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_consume\'. Message \'' . $response->body->consume->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'consumer' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  consumer resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $reputation (Required) 'reputation' field, which is an embedded 'Reputation' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $external_id (Required) 'external_id' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_consumer($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_consumer' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'consumer\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (empty($fields['name'])) {
	    throw new APIContent_Exception('Field "name" is mandatory.');
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

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }
    if (isset($fields['reputation'])) {
      $opt['query_string']['reputation'] = $fields['reputation'];
    }
    if (isset($fields['external_id'])) {
      $opt['query_string']['external_id'] = $fields['external_id'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/consumer', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_consumer\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_consumer\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_consumer\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->consumer->status)) {
      $message = 'Error response from server in call to \'create_consumer\'. Response to \'consumer\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->consumer->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_consumer\'. Message \'' . $response->body->consumer->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  consumer resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $reputation (Required) 'reputation' field, which is an embedded 'Reputation' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $external_id (Required) 'external_id' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_consumer($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_consumer' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'consumer\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (empty($fields['name'])) {
	    throw new APIContent_Exception('Field "name" is mandatory.');
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

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }
    if (isset($fields['reputation'])) {
      $opt['query_string']['reputation'] = $fields['reputation'];
    }
    if (isset($fields['external_id'])) {
      $opt['query_string']['external_id'] = $fields['external_id'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/consumer', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_consumer\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_consumer\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_consumer\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->consumer->status)) {
      $message = 'Error response from server in call to \'update_consumer\'. Response to \'consumer\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->consumer->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_consumer\'. Message \'' . $response->body->consumer->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'consumer_member' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  consumer_member resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $consumer (Required) 'consumer' field, which is an embedded 'Consumer' resource. (FIELD).
   * @param string $member (Required) 'member' field, which is an embedded 'Member' resource. (FIELD).
   * @param string $admin (Required) 'admin' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_consumer_member($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_consumer_member' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'consumer_member\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['consumer'])) {
	    throw new APIContent_Exception('Field "consumer" is mandatory.');
    }
    if (!isset($fields['member'])) {
	    throw new APIContent_Exception('Field "member" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'consumer' => $fields['consumer'],
        'member' => $fields['member'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['admin'])) {
      $opt['query_string']['admin'] = $fields['admin'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/consumer_member', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_consumer_member\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_consumer_member\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_consumer_member\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->consumer_member->status)) {
      $message = 'Error response from server in call to \'create_consumer_member\'. Response to \'consumer_member\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->consumer_member->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_consumer_member\'. Message \'' . $response->body->consumer_member->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  consumer_member resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $consumer (Required) 'consumer' field, which is an embedded 'Consumer' resource. (FIELD).
   * @param string $member (Required) 'member' field, which is an embedded 'Member' resource. (FIELD).
   * @param string $admin (Required) 'admin' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_consumer_member($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_consumer_member' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'consumer_member\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['consumer'])) {
	    throw new APIContent_Exception('Field "consumer" is mandatory.');
    }
    if (!isset($fields['member'])) {
	    throw new APIContent_Exception('Field "member" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'consumer' => $fields['consumer'],
        'member' => $fields['member'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['admin'])) {
      $opt['query_string']['admin'] = $fields['admin'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/consumer_member', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_consumer_member\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_consumer_member\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_consumer_member\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->consumer_member->status)) {
      $message = 'Error response from server in call to \'update_consumer_member\'. Response to \'consumer_member\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->consumer_member->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_consumer_member\'. Message \'' . $response->body->consumer_member->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'consumer_subscribed_contengenre' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  consumer_subscribed_contengenre resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $consumer (Required) 'consumer' field, which is an embedded 'Consumer' resource. (FIELD).
   * @param string $contentgenre (Required) 'contentgenre' field, which is an embedded 'ContentGenre' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_consumer_subscribed_contengenre($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_consumer_subscribed_contengenre' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'consumer_subscribed_contengenre\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['consumer'])) {
	    throw new APIContent_Exception('Field "consumer" is mandatory.');
    }
    if (!isset($fields['contentgenre'])) {
	    throw new APIContent_Exception('Field "contentgenre" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'consumer' => $fields['consumer'],
        'contentgenre' => $fields['contentgenre'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/consumer_subscribed_contengenre', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_consumer_subscribed_contengenre\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_consumer_subscribed_contengenre\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_consumer_subscribed_contengenre\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->consumer_subscribed_contengenre->status)) {
      $message = 'Error response from server in call to \'create_consumer_subscribed_contengenre\'. Response to \'consumer_subscribed_contengenre\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->consumer_subscribed_contengenre->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_consumer_subscribed_contengenre\'. Message \'' . $response->body->consumer_subscribed_contengenre->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  consumer_subscribed_contengenre resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $consumer (Required) 'consumer' field, which is an embedded 'Consumer' resource. (FIELD).
   * @param string $contentgenre (Required) 'contentgenre' field, which is an embedded 'ContentGenre' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_consumer_subscribed_contengenre($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_consumer_subscribed_contengenre' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'consumer_subscribed_contengenre\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['consumer'])) {
	    throw new APIContent_Exception('Field "consumer" is mandatory.');
    }
    if (!isset($fields['contentgenre'])) {
	    throw new APIContent_Exception('Field "contentgenre" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'consumer' => $fields['consumer'],
        'contentgenre' => $fields['contentgenre'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/consumer_subscribed_contengenre', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_consumer_subscribed_contengenre\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_consumer_subscribed_contengenre\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_consumer_subscribed_contengenre\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->consumer_subscribed_contengenre->status)) {
      $message = 'Error response from server in call to \'update_consumer_subscribed_contengenre\'. Response to \'consumer_subscribed_contengenre\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->consumer_subscribed_contengenre->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_consumer_subscribed_contengenre\'. Message \'' . $response->body->consumer_subscribed_contengenre->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
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
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $metadata (Required) 'metadata' field, which is an embedded 'Metadata' resource. (FIELD).
   * @param string $producer (Required) 'producer' field, which is an embedded 'Producer' resource. (FIELD).
   * @param string $external_id (Required) 'external_id' field, which is a 'string' type. (FIELD).
   * @param string $title (Required) 'title' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_content($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_content' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'content\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['metadata'])) {
      $opt['query_string']['metadata'] = $fields['metadata'];
    }
    if (isset($fields['producer'])) {
      $opt['query_string']['producer'] = $fields['producer'];
    }
    if (isset($fields['external_id'])) {
      $opt['query_string']['external_id'] = $fields['external_id'];
    }
    if (isset($fields['title'])) {
      $opt['query_string']['title'] = $fields['title'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_content\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_content\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_content\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content->status)) {
      $message = 'Error response from server in call to \'create_content\'. Response to \'content\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_content\'. Message \'' . $response->body->content->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  content resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $metadata (Required) 'metadata' field, which is an embedded 'Metadata' resource. (FIELD).
   * @param string $producer (Required) 'producer' field, which is an embedded 'Producer' resource. (FIELD).
   * @param string $external_id (Required) 'external_id' field, which is a 'string' type. (FIELD).
   * @param string $title (Required) 'title' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_content($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_content' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'content\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['metadata'])) {
      $opt['query_string']['metadata'] = $fields['metadata'];
    }
    if (isset($fields['producer'])) {
      $opt['query_string']['producer'] = $fields['producer'];
    }
    if (isset($fields['external_id'])) {
      $opt['query_string']['external_id'] = $fields['external_id'];
    }
    if (isset($fields['title'])) {
      $opt['query_string']['title'] = $fields['title'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_content\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_content\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_content\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content->status)) {
      $message = 'Error response from server in call to \'update_content\'. Response to \'content\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_content\'. Message \'' . $response->body->content->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'content_classification' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  content_classification resource web service.
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
						
public function create_content_classification($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_content_classification' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'content_classification\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (empty($fields['name'])) {
	    throw new APIContent_Exception('Field "name" is mandatory.');
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
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_classification', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_content_classification\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_content_classification\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_content_classification\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_classification->status)) {
      $message = 'Error response from server in call to \'create_content_classification\'. Response to \'content_classification\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_classification->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_content_classification\'. Message \'' . $response->body->content_classification->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  content_classification resource web service.
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
						
public function update_content_classification($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_content_classification' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'content_classification\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (empty($fields['name'])) {
	    throw new APIContent_Exception('Field "name" is mandatory.');
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
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_classification', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_content_classification\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_content_classification\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_content_classification\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_classification->status)) {
      $message = 'Error response from server in call to \'update_content_classification\'. Response to \'content_classification\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_classification->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_content_classification\'. Message \'' . $response->body->content_classification->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'content_collection' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  content_collection resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $title (Required) 'title' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_content_collection($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_content_collection' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'content_collection\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['title'])) {
      $opt['query_string']['title'] = $fields['title'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_collection', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_content_collection\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_content_collection\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_content_collection\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_collection->status)) {
      $message = 'Error response from server in call to \'create_content_collection\'. Response to \'content_collection\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_collection->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_content_collection\'. Message \'' . $response->body->content_collection->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  content_collection resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $title (Required) 'title' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_content_collection($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_content_collection' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'content_collection\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['title'])) {
      $opt['query_string']['title'] = $fields['title'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_collection', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_content_collection\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_content_collection\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_content_collection\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_collection->status)) {
      $message = 'Error response from server in call to \'update_content_collection\'. Response to \'content_collection\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_collection->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_content_collection\'. Message \'' . $response->body->content_collection->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'content_collection_item' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  content_collection_item resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $contentcollection (Required) 'contentcollection' field, which is an embedded 'ContentCollection' resource. (FIELD).
   * @param string $content (Required) 'content' field, which is an embedded 'Content' resource. (FIELD).
   * @param string $weight (Required) 'weight' field, which is a 'int' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_content_collection_item($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_content_collection_item' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'content_collection_item\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['contentcollection'])) {
	    throw new APIContent_Exception('Field "contentcollection" is mandatory.');
    }
    if (!isset($fields['content'])) {
	    throw new APIContent_Exception('Field "content" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'contentcollection' => $fields['contentcollection'],
        'content' => $fields['content'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['weight'])) {
      $opt['query_string']['weight'] = $fields['weight'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_collection_item', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_content_collection_item\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_content_collection_item\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_content_collection_item\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_collection_item->status)) {
      $message = 'Error response from server in call to \'create_content_collection_item\'. Response to \'content_collection_item\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_collection_item->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_content_collection_item\'. Message \'' . $response->body->content_collection_item->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  content_collection_item resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $contentcollection (Required) 'contentcollection' field, which is an embedded 'ContentCollection' resource. (FIELD).
   * @param string $content (Required) 'content' field, which is an embedded 'Content' resource. (FIELD).
   * @param string $weight (Required) 'weight' field, which is a 'int' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_content_collection_item($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_content_collection_item' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'content_collection_item\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['contentcollection'])) {
	    throw new APIContent_Exception('Field "contentcollection" is mandatory.');
    }
    if (!isset($fields['content'])) {
	    throw new APIContent_Exception('Field "content" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'contentcollection' => $fields['contentcollection'],
        'content' => $fields['content'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['weight'])) {
      $opt['query_string']['weight'] = $fields['weight'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_collection_item', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_content_collection_item\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_content_collection_item\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_content_collection_item\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_collection_item->status)) {
      $message = 'Error response from server in call to \'update_content_collection_item\'. Response to \'content_collection_item\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_collection_item->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_content_collection_item\'. Message \'' . $response->body->content_collection_item->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'content_genre' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  content_genre resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $external_id (Required) 'external_id' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_content_genre($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_content_genre' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'content_genre\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (empty($fields['name'])) {
	    throw new APIContent_Exception('Field "name" is mandatory.');
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

    if (isset($fields['external_id'])) {
      $opt['query_string']['external_id'] = $fields['external_id'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_genre', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_content_genre\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_content_genre\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_content_genre\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_genre->status)) {
      $message = 'Error response from server in call to \'create_content_genre\'. Response to \'content_genre\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_genre->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_content_genre\'. Message \'' . $response->body->content_genre->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  content_genre resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $external_id (Required) 'external_id' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_content_genre($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_content_genre' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'content_genre\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (empty($fields['name'])) {
	    throw new APIContent_Exception('Field "name" is mandatory.');
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

    if (isset($fields['external_id'])) {
      $opt['query_string']['external_id'] = $fields['external_id'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_genre', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_content_genre\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_content_genre\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_content_genre\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_genre->status)) {
      $message = 'Error response from server in call to \'update_content_genre\'. Response to \'content_genre\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_genre->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_content_genre\'. Message \'' . $response->body->content_genre->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'content_ingest' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  content_ingest resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $mediaitem (Required) 'mediaitem' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param string $content (Required) 'content' field, which is an embedded 'Content' resource. (FIELD).
   * @param string $member (Required) 'member' field, which is an embedded 'Member' resource. (FIELD).
   * @param string $identity (Required) 'identity' field, which is an embedded 'Identity' resource. (FIELD).
   * @param string $producer (Required) 'producer' field, which is an embedded 'Producer' resource. (FIELD).
   * @param string $consumer (Required) 'consumer' field, which is an embedded 'Consumer' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $url (Required) 'url' field, which is a 'string' type. (FIELD).
   * @param string $size (Required) 'size' field, which is a 'long' type. (FIELD).
   * @param string $uploaded (Required) 'uploaded' field, which is a 'boolean' type. (FIELD).
   * @param string $transcoded (Required) 'transcoded' field, which is a 'boolean' type. (FIELD).
   * @param string $encrypted (Required) 'encrypted' field, which is a 'boolean' type. (FIELD).
   * @param string $deployed (Required) 'deployed' field, which is a 'boolean' type. (FIELD).
   * @param string $ready (Required) 'ready' field, which is a 'boolean' type. (FIELD).
   * @param string $error (Required) 'error' field, which is a 'boolean' type. (FIELD).
   * @param string $status (Required) 'status' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_content_ingest($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_content_ingest' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'content_ingest\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (empty($fields['url'])) {
	    throw new APIContent_Exception('Field "url" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'url' => $fields['url'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $fields['mediaitem'];
    }
    if (isset($fields['content'])) {
      $opt['query_string']['content'] = $fields['content'];
    }
    if (isset($fields['member'])) {
      $opt['query_string']['member'] = $fields['member'];
    }
    if (isset($fields['identity'])) {
      $opt['query_string']['identity'] = $fields['identity'];
    }
    if (isset($fields['producer'])) {
      $opt['query_string']['producer'] = $fields['producer'];
    }
    if (isset($fields['consumer'])) {
      $opt['query_string']['consumer'] = $fields['consumer'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['size'])) {
      $opt['query_string']['size'] = $fields['size'];
    }
    if (isset($fields['uploaded'])) {
      $opt['query_string']['uploaded'] = $fields['uploaded'];
    }
    if (isset($fields['transcoded'])) {
      $opt['query_string']['transcoded'] = $fields['transcoded'];
    }
    if (isset($fields['encrypted'])) {
      $opt['query_string']['encrypted'] = $fields['encrypted'];
    }
    if (isset($fields['deployed'])) {
      $opt['query_string']['deployed'] = $fields['deployed'];
    }
    if (isset($fields['ready'])) {
      $opt['query_string']['ready'] = $fields['ready'];
    }
    if (isset($fields['error'])) {
      $opt['query_string']['error'] = $fields['error'];
    }
    if (isset($fields['status'])) {
      $opt['query_string']['status'] = $fields['status'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_ingest', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_content_ingest\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_content_ingest\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_content_ingest\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_ingest->status)) {
      $message = 'Error response from server in call to \'create_content_ingest\'. Response to \'content_ingest\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_ingest->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_content_ingest\'. Message \'' . $response->body->content_ingest->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  content_ingest resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $mediaitem (Required) 'mediaitem' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param string $content (Required) 'content' field, which is an embedded 'Content' resource. (FIELD).
   * @param string $member (Required) 'member' field, which is an embedded 'Member' resource. (FIELD).
   * @param string $identity (Required) 'identity' field, which is an embedded 'Identity' resource. (FIELD).
   * @param string $producer (Required) 'producer' field, which is an embedded 'Producer' resource. (FIELD).
   * @param string $consumer (Required) 'consumer' field, which is an embedded 'Consumer' resource. (FIELD).
   * @param string $target (Required) 'target' field, which is an embedded 'Target' resource. (FIELD).
   * @param string $url (Required) 'url' field, which is a 'string' type. (FIELD).
   * @param string $size (Required) 'size' field, which is a 'long' type. (FIELD).
   * @param string $uploaded (Required) 'uploaded' field, which is a 'boolean' type. (FIELD).
   * @param string $transcoded (Required) 'transcoded' field, which is a 'boolean' type. (FIELD).
   * @param string $encrypted (Required) 'encrypted' field, which is a 'boolean' type. (FIELD).
   * @param string $deployed (Required) 'deployed' field, which is a 'boolean' type. (FIELD).
   * @param string $ready (Required) 'ready' field, which is a 'boolean' type. (FIELD).
   * @param string $error (Required) 'error' field, which is a 'boolean' type. (FIELD).
   * @param string $status (Required) 'status' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_content_ingest($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_content_ingest' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'content_ingest\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (empty($fields['url'])) {
	    throw new APIContent_Exception('Field "url" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'url' => $fields['url'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $fields['mediaitem'];
    }
    if (isset($fields['content'])) {
      $opt['query_string']['content'] = $fields['content'];
    }
    if (isset($fields['member'])) {
      $opt['query_string']['member'] = $fields['member'];
    }
    if (isset($fields['identity'])) {
      $opt['query_string']['identity'] = $fields['identity'];
    }
    if (isset($fields['producer'])) {
      $opt['query_string']['producer'] = $fields['producer'];
    }
    if (isset($fields['consumer'])) {
      $opt['query_string']['consumer'] = $fields['consumer'];
    }
    if (isset($fields['target'])) {
      $opt['query_string']['target'] = $fields['target'];
    }
    if (isset($fields['size'])) {
      $opt['query_string']['size'] = $fields['size'];
    }
    if (isset($fields['uploaded'])) {
      $opt['query_string']['uploaded'] = $fields['uploaded'];
    }
    if (isset($fields['transcoded'])) {
      $opt['query_string']['transcoded'] = $fields['transcoded'];
    }
    if (isset($fields['encrypted'])) {
      $opt['query_string']['encrypted'] = $fields['encrypted'];
    }
    if (isset($fields['deployed'])) {
      $opt['query_string']['deployed'] = $fields['deployed'];
    }
    if (isset($fields['ready'])) {
      $opt['query_string']['ready'] = $fields['ready'];
    }
    if (isset($fields['error'])) {
      $opt['query_string']['error'] = $fields['error'];
    }
    if (isset($fields['status'])) {
      $opt['query_string']['status'] = $fields['status'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_ingest', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_content_ingest\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_content_ingest\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_content_ingest\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_ingest->status)) {
      $message = 'Error response from server in call to \'update_content_ingest\'. Response to \'content_ingest\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_ingest->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_content_ingest\'. Message \'' . $response->body->content_ingest->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'content_metadata' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  content_metadata resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $contentgenre (Required) 'contentgenre' field, which is an embedded 'ContentGenre' resource. (FIELD).
   * @param string $contentclassification (Required) 'contentclassification' field, which is an embedded 'ContentClassification' resource. (FIELD).
   * @param string $description (Required) 'description' field, which is a 'string' type. (FIELD).
   * @param string $comment (Required) 'comment' field, which is a 'string' type. (FIELD).
   * @param string $year (Required) 'year' field, which is a 'string' type. (FIELD).
   * @param string $compilation (Required) 'compilation' field, which is a 'boolean' type. (FIELD).
   * @param string $advisory (Required) 'advisory' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_content_metadata($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_content_metadata' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'content_metadata\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['contentgenre'])) {
      $opt['query_string']['contentgenre'] = $fields['contentgenre'];
    }
    if (isset($fields['contentclassification'])) {
      $opt['query_string']['contentclassification'] = $fields['contentclassification'];
    }
    if (isset($fields['description'])) {
      $opt['query_string']['description'] = $fields['description'];
    }
    if (isset($fields['comment'])) {
      $opt['query_string']['comment'] = $fields['comment'];
    }
    if (isset($fields['year'])) {
      $opt['query_string']['year'] = $fields['year'];
    }
    if (isset($fields['compilation'])) {
      $opt['query_string']['compilation'] = $fields['compilation'];
    }
    if (isset($fields['advisory'])) {
      $opt['query_string']['advisory'] = $fields['advisory'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_metadata', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_content_metadata\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_content_metadata\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_content_metadata\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_metadata->status)) {
      $message = 'Error response from server in call to \'create_content_metadata\'. Response to \'content_metadata\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_metadata->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_content_metadata\'. Message \'' . $response->body->content_metadata->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  content_metadata resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $contentgenre (Required) 'contentgenre' field, which is an embedded 'ContentGenre' resource. (FIELD).
   * @param string $contentclassification (Required) 'contentclassification' field, which is an embedded 'ContentClassification' resource. (FIELD).
   * @param string $description (Required) 'description' field, which is a 'string' type. (FIELD).
   * @param string $comment (Required) 'comment' field, which is a 'string' type. (FIELD).
   * @param string $year (Required) 'year' field, which is a 'string' type. (FIELD).
   * @param string $compilation (Required) 'compilation' field, which is a 'boolean' type. (FIELD).
   * @param string $advisory (Required) 'advisory' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_content_metadata($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_content_metadata' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'content_metadata\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['contentgenre'])) {
      $opt['query_string']['contentgenre'] = $fields['contentgenre'];
    }
    if (isset($fields['contentclassification'])) {
      $opt['query_string']['contentclassification'] = $fields['contentclassification'];
    }
    if (isset($fields['description'])) {
      $opt['query_string']['description'] = $fields['description'];
    }
    if (isset($fields['comment'])) {
      $opt['query_string']['comment'] = $fields['comment'];
    }
    if (isset($fields['year'])) {
      $opt['query_string']['year'] = $fields['year'];
    }
    if (isset($fields['compilation'])) {
      $opt['query_string']['compilation'] = $fields['compilation'];
    }
    if (isset($fields['advisory'])) {
      $opt['query_string']['advisory'] = $fields['advisory'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_metadata', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_content_metadata\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_content_metadata\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_content_metadata\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_metadata->status)) {
      $message = 'Error response from server in call to \'update_content_metadata\'. Response to \'content_metadata\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_metadata->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_content_metadata\'. Message \'' . $response->body->content_metadata->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'content_upload' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  content_upload resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $mediaitemuploadpush (Required) 'mediaitemuploadpush' field, which is an embedded 'MediaItemUploadPush' resource. (FIELD).
   * @param string $mediaitem (Required) 'mediaitem' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param string $content (Required) 'content' field, which is an embedded 'Content' resource. (FIELD).
   * @param string $member (Required) 'member' field, which is an embedded 'Member' resource. (FIELD).
   * @param string $identity (Required) 'identity' field, which is an embedded 'Identity' resource. (FIELD).
   * @param string $producer (Required) 'producer' field, which is an embedded 'Producer' resource. (FIELD).
   * @param string $consumer (Required) 'consumer' field, which is an embedded 'Consumer' resource. (FIELD).
   * @param string $size (Required) 'size' field, which is a 'long' type. (FIELD).
   * @param string $uploaded (Required) 'uploaded' field, which is a 'boolean' type. (FIELD).
   * @param string $transcoded (Required) 'transcoded' field, which is a 'boolean' type. (FIELD).
   * @param string $encrypted (Required) 'encrypted' field, which is a 'boolean' type. (FIELD).
   * @param string $deployed (Required) 'deployed' field, which is a 'boolean' type. (FIELD).
   * @param string $ready (Required) 'ready' field, which is a 'boolean' type. (FIELD).
   * @param string $error (Required) 'error' field, which is a 'boolean' type. (FIELD).
   * @param string $status (Required) 'status' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_content_upload($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_content_upload' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'content_upload\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['mediaitemuploadpush'])) {
	    throw new APIContent_Exception('Field "mediaitemuploadpush" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'mediaitemuploadpush' => $fields['mediaitemuploadpush'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $fields['mediaitem'];
    }
    if (isset($fields['content'])) {
      $opt['query_string']['content'] = $fields['content'];
    }
    if (isset($fields['member'])) {
      $opt['query_string']['member'] = $fields['member'];
    }
    if (isset($fields['identity'])) {
      $opt['query_string']['identity'] = $fields['identity'];
    }
    if (isset($fields['producer'])) {
      $opt['query_string']['producer'] = $fields['producer'];
    }
    if (isset($fields['consumer'])) {
      $opt['query_string']['consumer'] = $fields['consumer'];
    }
    if (isset($fields['size'])) {
      $opt['query_string']['size'] = $fields['size'];
    }
    if (isset($fields['uploaded'])) {
      $opt['query_string']['uploaded'] = $fields['uploaded'];
    }
    if (isset($fields['transcoded'])) {
      $opt['query_string']['transcoded'] = $fields['transcoded'];
    }
    if (isset($fields['encrypted'])) {
      $opt['query_string']['encrypted'] = $fields['encrypted'];
    }
    if (isset($fields['deployed'])) {
      $opt['query_string']['deployed'] = $fields['deployed'];
    }
    if (isset($fields['ready'])) {
      $opt['query_string']['ready'] = $fields['ready'];
    }
    if (isset($fields['error'])) {
      $opt['query_string']['error'] = $fields['error'];
    }
    if (isset($fields['status'])) {
      $opt['query_string']['status'] = $fields['status'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_upload', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_content_upload\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_content_upload\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_content_upload\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_upload->status)) {
      $message = 'Error response from server in call to \'create_content_upload\'. Response to \'content_upload\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_upload->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_content_upload\'. Message \'' . $response->body->content_upload->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  content_upload resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $mediaitemuploadpush (Required) 'mediaitemuploadpush' field, which is an embedded 'MediaItemUploadPush' resource. (FIELD).
   * @param string $mediaitem (Required) 'mediaitem' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param string $content (Required) 'content' field, which is an embedded 'Content' resource. (FIELD).
   * @param string $member (Required) 'member' field, which is an embedded 'Member' resource. (FIELD).
   * @param string $identity (Required) 'identity' field, which is an embedded 'Identity' resource. (FIELD).
   * @param string $producer (Required) 'producer' field, which is an embedded 'Producer' resource. (FIELD).
   * @param string $consumer (Required) 'consumer' field, which is an embedded 'Consumer' resource. (FIELD).
   * @param string $size (Required) 'size' field, which is a 'long' type. (FIELD).
   * @param string $uploaded (Required) 'uploaded' field, which is a 'boolean' type. (FIELD).
   * @param string $transcoded (Required) 'transcoded' field, which is a 'boolean' type. (FIELD).
   * @param string $encrypted (Required) 'encrypted' field, which is a 'boolean' type. (FIELD).
   * @param string $deployed (Required) 'deployed' field, which is a 'boolean' type. (FIELD).
   * @param string $ready (Required) 'ready' field, which is a 'boolean' type. (FIELD).
   * @param string $error (Required) 'error' field, which is a 'boolean' type. (FIELD).
   * @param string $status (Required) 'status' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_content_upload($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_content_upload' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'content_upload\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['mediaitemuploadpush'])) {
	    throw new APIContent_Exception('Field "mediaitemuploadpush" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'mediaitemuploadpush' => $fields['mediaitemuploadpush'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $fields['mediaitem'];
    }
    if (isset($fields['content'])) {
      $opt['query_string']['content'] = $fields['content'];
    }
    if (isset($fields['member'])) {
      $opt['query_string']['member'] = $fields['member'];
    }
    if (isset($fields['identity'])) {
      $opt['query_string']['identity'] = $fields['identity'];
    }
    if (isset($fields['producer'])) {
      $opt['query_string']['producer'] = $fields['producer'];
    }
    if (isset($fields['consumer'])) {
      $opt['query_string']['consumer'] = $fields['consumer'];
    }
    if (isset($fields['size'])) {
      $opt['query_string']['size'] = $fields['size'];
    }
    if (isset($fields['uploaded'])) {
      $opt['query_string']['uploaded'] = $fields['uploaded'];
    }
    if (isset($fields['transcoded'])) {
      $opt['query_string']['transcoded'] = $fields['transcoded'];
    }
    if (isset($fields['encrypted'])) {
      $opt['query_string']['encrypted'] = $fields['encrypted'];
    }
    if (isset($fields['deployed'])) {
      $opt['query_string']['deployed'] = $fields['deployed'];
    }
    if (isset($fields['ready'])) {
      $opt['query_string']['ready'] = $fields['ready'];
    }
    if (isset($fields['error'])) {
      $opt['query_string']['error'] = $fields['error'];
    }
    if (isset($fields['status'])) {
      $opt['query_string']['status'] = $fields['status'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/content_upload', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_content_upload\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_content_upload\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_content_upload\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->content_upload->status)) {
      $message = 'Error response from server in call to \'update_content_upload\'. Response to \'content_upload\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->content_upload->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_content_upload\'. Message \'' . $response->body->content_upload->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'fan' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  fan resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $documentation (Required) 'documentation' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_fan($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_fan' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'fan\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    if (empty($fields['documentation'])) {
	    throw new APIContent_Exception('Field "documentation" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
        'documentation' => $fields['documentation'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/fan', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_fan\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_fan\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_fan\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->fan->status)) {
      $message = 'Error response from server in call to \'create_fan\'. Response to \'fan\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->fan->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_fan\'. Message \'' . $response->body->fan->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  fan resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $documentation (Required) 'documentation' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_fan($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_fan' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'fan\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    if (empty($fields['documentation'])) {
	    throw new APIContent_Exception('Field "documentation" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
        'documentation' => $fields['documentation'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/fan', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_fan\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_fan\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_fan\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->fan->status)) {
      $message = 'Error response from server in call to \'update_fan\'. Response to \'fan\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->fan->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_fan\'. Message \'' . $response->body->fan->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'follow' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  follow resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $documentation (Required) 'documentation' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_follow($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_follow' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'follow\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    if (empty($fields['documentation'])) {
	    throw new APIContent_Exception('Field "documentation" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
        'documentation' => $fields['documentation'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/follow', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_follow\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_follow\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_follow\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->follow->status)) {
      $message = 'Error response from server in call to \'create_follow\'. Response to \'follow\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->follow->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_follow\'. Message \'' . $response->body->follow->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  follow resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $documentation (Required) 'documentation' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_follow($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_follow' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'follow\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    if (empty($fields['documentation'])) {
	    throw new APIContent_Exception('Field "documentation" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
        'documentation' => $fields['documentation'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/follow', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_follow\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_follow\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_follow\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->follow->status)) {
      $message = 'Error response from server in call to \'update_follow\'. Response to \'follow\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->follow->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_follow\'. Message \'' . $response->body->follow->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'like' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  like resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $documentation (Required) 'documentation' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_like($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_like' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'like\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    if (empty($fields['documentation'])) {
	    throw new APIContent_Exception('Field "documentation" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
        'documentation' => $fields['documentation'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/like', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_like\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_like\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_like\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->like->status)) {
      $message = 'Error response from server in call to \'create_like\'. Response to \'like\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->like->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_like\'. Message \'' . $response->body->like->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  like resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $documentation (Required) 'documentation' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_like($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_like' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'like\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    if (empty($fields['documentation'])) {
	    throw new APIContent_Exception('Field "documentation" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
        'documentation' => $fields['documentation'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/like', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_like\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_like\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_like\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->like->status)) {
      $message = 'Error response from server in call to \'update_like\'. Response to \'like\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->like->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_like\'. Message \'' . $response->body->like->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'metadata' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  metadata resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $contentmetadata (Required) 'contentmetadata' field, which is an embedded 'ContentMetadata' resource. (FIELD).
   * @param string $trackmetadata (Required) 'trackmetadata' field, which is an embedded 'TrackMetadata' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_metadata($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_metadata' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'metadata\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['contentmetadata'])) {
      $opt['query_string']['contentmetadata'] = $fields['contentmetadata'];
    }
    if (isset($fields['trackmetadata'])) {
      $opt['query_string']['trackmetadata'] = $fields['trackmetadata'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/metadata', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_metadata\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_metadata\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_metadata\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->metadata->status)) {
      $message = 'Error response from server in call to \'create_metadata\'. Response to \'metadata\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->metadata->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_metadata\'. Message \'' . $response->body->metadata->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  metadata resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $contentmetadata (Required) 'contentmetadata' field, which is an embedded 'ContentMetadata' resource. (FIELD).
   * @param string $trackmetadata (Required) 'trackmetadata' field, which is an embedded 'TrackMetadata' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_metadata($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_metadata' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'metadata\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['contentmetadata'])) {
      $opt['query_string']['contentmetadata'] = $fields['contentmetadata'];
    }
    if (isset($fields['trackmetadata'])) {
      $opt['query_string']['trackmetadata'] = $fields['trackmetadata'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/metadata', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_metadata\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_metadata\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_metadata\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->metadata->status)) {
      $message = 'Error response from server in call to \'update_metadata\'. Response to \'metadata\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->metadata->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_metadata\'. Message \'' . $response->body->metadata->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'place' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  place resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $location (Required) 'location' field, which is an embedded 'Location' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_place($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_place' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'place\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['location'])) {
      $opt['query_string']['location'] = $fields['location'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/place', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_place\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_place\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_place\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->place->status)) {
      $message = 'Error response from server in call to \'create_place\'. Response to \'place\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->place->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_place\'. Message \'' . $response->body->place->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  place resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $location (Required) 'location' field, which is an embedded 'Location' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_place($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_place' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'place\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['location'])) {
      $opt['query_string']['location'] = $fields['location'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/place', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_place\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_place\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_place\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->place->status)) {
      $message = 'Error response from server in call to \'update_place\'. Response to \'place\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->place->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_place\'. Message \'' . $response->body->place->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'produce' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  produce resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $mediaitem (Required) 'mediaitem' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param string $documentation (Required) 'documentation' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_produce($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_produce' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'produce\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    if (empty($fields['documentation'])) {
	    throw new APIContent_Exception('Field "documentation" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
        'documentation' => $fields['documentation'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }
    if (isset($fields['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $fields['mediaitem'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/produce', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_produce\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_produce\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_produce\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->produce->status)) {
      $message = 'Error response from server in call to \'create_produce\'. Response to \'produce\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->produce->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_produce\'. Message \'' . $response->body->produce->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  produce resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $mediaitem (Required) 'mediaitem' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param string $documentation (Required) 'documentation' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_produce($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_produce' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'produce\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['thing'])) {
	    throw new APIContent_Exception('Field "thing" is mandatory.');
    }
    if (empty($fields['documentation'])) {
	    throw new APIContent_Exception('Field "documentation" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'thing' => $fields['thing'],
        'documentation' => $fields['documentation'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }
    if (isset($fields['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $fields['mediaitem'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/produce', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_produce\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_produce\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_produce\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->produce->status)) {
      $message = 'Error response from server in call to \'update_produce\'. Response to \'produce\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->produce->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_produce\'. Message \'' . $response->body->produce->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
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
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $reputation (Required) 'reputation' field, which is an embedded 'Reputation' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $external_id (Required) 'external_id' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_producer($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_producer' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'producer\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (empty($fields['name'])) {
	    throw new APIContent_Exception('Field "name" is mandatory.');
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

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }
    if (isset($fields['reputation'])) {
      $opt['query_string']['reputation'] = $fields['reputation'];
    }
    if (isset($fields['external_id'])) {
      $opt['query_string']['external_id'] = $fields['external_id'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/producer', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_producer\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_producer\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_producer\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->producer->status)) {
      $message = 'Error response from server in call to \'create_producer\'. Response to \'producer\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->producer->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_producer\'. Message \'' . $response->body->producer->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  producer resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param string $reputation (Required) 'reputation' field, which is an embedded 'Reputation' resource. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param string $external_id (Required) 'external_id' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_producer($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_producer' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'producer\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (empty($fields['name'])) {
	    throw new APIContent_Exception('Field "name" is mandatory.');
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

    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }
    if (isset($fields['reputation'])) {
      $opt['query_string']['reputation'] = $fields['reputation'];
    }
    if (isset($fields['external_id'])) {
      $opt['query_string']['external_id'] = $fields['external_id'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/producer', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_producer\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_producer\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_producer\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->producer->status)) {
      $message = 'Error response from server in call to \'update_producer\'. Response to \'producer\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->producer->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_producer\'. Message \'' . $response->body->producer->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'producer_member' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  producer_member resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $producer (Required) 'producer' field, which is an embedded 'Producer' resource. (FIELD).
   * @param string $member (Required) 'member' field, which is an embedded 'Member' resource. (FIELD).
   * @param string $admin (Required) 'admin' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_producer_member($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_producer_member' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'producer_member\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['producer'])) {
	    throw new APIContent_Exception('Field "producer" is mandatory.');
    }
    if (!isset($fields['member'])) {
	    throw new APIContent_Exception('Field "member" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'producer' => $fields['producer'],
        'member' => $fields['member'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['admin'])) {
      $opt['query_string']['admin'] = $fields['admin'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/producer_member', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_producer_member\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_producer_member\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_producer_member\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->producer_member->status)) {
      $message = 'Error response from server in call to \'create_producer_member\'. Response to \'producer_member\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->producer_member->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_producer_member\'. Message \'' . $response->body->producer_member->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  producer_member resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $producer (Required) 'producer' field, which is an embedded 'Producer' resource. (FIELD).
   * @param string $member (Required) 'member' field, which is an embedded 'Member' resource. (FIELD).
   * @param string $admin (Required) 'admin' field, which is a 'boolean' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_producer_member($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_producer_member' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'producer_member\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['producer'])) {
	    throw new APIContent_Exception('Field "producer" is mandatory.');
    }
    if (!isset($fields['member'])) {
	    throw new APIContent_Exception('Field "member" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'producer' => $fields['producer'],
        'member' => $fields['member'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($fields['admin'])) {
      $opt['query_string']['admin'] = $fields['admin'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/producer_member', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_producer_member\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_producer_member\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_producer_member\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->producer_member->status)) {
      $message = 'Error response from server in call to \'update_producer_member\'. Response to \'producer_member\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->producer_member->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_producer_member\'. Message \'' . $response->body->producer_member->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'profileimage' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  profileimage resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $mediaitem (Required) 'mediaitem' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_profileimage($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_profileimage' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'profileimage\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['mediaitem'])) {
	    throw new APIContent_Exception('Field "mediaitem" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'mediaitem' => $fields['mediaitem'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/profileimage', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_profileimage\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_profileimage\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_profileimage\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->profileimage->status)) {
      $message = 'Error response from server in call to \'create_profileimage\'. Response to \'profileimage\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->profileimage->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_profileimage\'. Message \'' . $response->body->profileimage->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  profileimage resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $mediaitem (Required) 'mediaitem' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_profileimage($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_profileimage' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'profileimage\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['actor'])) {
	    throw new APIContent_Exception('Field "actor" is mandatory.');
    }
    if (!isset($fields['mediaitem'])) {
	    throw new APIContent_Exception('Field "mediaitem" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'actor' => $fields['actor'],
        'mediaitem' => $fields['mediaitem'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/profileimage', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_profileimage\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_profileimage\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_profileimage\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->profileimage->status)) {
      $message = 'Error response from server in call to \'update_profileimage\'. Response to \'profileimage\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->profileimage->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_profileimage\'. Message \'' . $response->body->profileimage->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'subject' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  subject resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $action (Required) 'action' field, which is an embedded 'Action' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_subject($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_subject' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'subject\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['actor'])) {
      $opt['query_string']['actor'] = $fields['actor'];
    }
    if (isset($fields['thing'])) {
      $opt['query_string']['thing'] = $fields['thing'];
    }
    if (isset($fields['action'])) {
      $opt['query_string']['action'] = $fields['action'];
    }
    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/subject', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_subject\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_subject\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_subject\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->subject->status)) {
      $message = 'Error response from server in call to \'create_subject\'. Response to \'subject\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->subject->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_subject\'. Message \'' . $response->body->subject->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  subject resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $actor (Required) 'actor' field, which is an embedded 'Actor' resource. (FIELD).
   * @param string $thing (Required) 'thing' field, which is an embedded 'Thing' resource. (FIELD).
   * @param string $action (Required) 'action' field, which is an embedded 'Action' resource. (FIELD).
   * @param string $place (Required) 'place' field, which is an embedded 'Place' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_subject($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_subject' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'subject\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['actor'])) {
      $opt['query_string']['actor'] = $fields['actor'];
    }
    if (isset($fields['thing'])) {
      $opt['query_string']['thing'] = $fields['thing'];
    }
    if (isset($fields['action'])) {
      $opt['query_string']['action'] = $fields['action'];
    }
    if (isset($fields['place'])) {
      $opt['query_string']['place'] = $fields['place'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/subject', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_subject\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_subject\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_subject\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->subject->status)) {
      $message = 'Error response from server in call to \'update_subject\'. Response to \'subject\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->subject->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_subject\'. Message \'' . $response->body->subject->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'thing' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  thing resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $mediaitem (Required) 'mediaitem' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param string $content (Required) 'content' field, which is an embedded 'Content' resource. (FIELD).
   * @param string $contentcollection (Required) 'contentcollection' field, which is an embedded 'ContentCollection' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_thing($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_thing' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'thing\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $fields['mediaitem'];
    }
    if (isset($fields['content'])) {
      $opt['query_string']['content'] = $fields['content'];
    }
    if (isset($fields['contentcollection'])) {
      $opt['query_string']['contentcollection'] = $fields['contentcollection'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/thing', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_thing\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_thing\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_thing\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->thing->status)) {
      $message = 'Error response from server in call to \'create_thing\'. Response to \'thing\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->thing->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_thing\'. Message \'' . $response->body->thing->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  thing resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $mediaitem (Required) 'mediaitem' field, which is an embedded 'MediaItem' resource. (FIELD).
   * @param string $content (Required) 'content' field, which is an embedded 'Content' resource. (FIELD).
   * @param string $contentcollection (Required) 'contentcollection' field, which is an embedded 'ContentCollection' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_thing($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_thing' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'thing\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $fields['mediaitem'];
    }
    if (isset($fields['content'])) {
      $opt['query_string']['content'] = $fields['content'];
    }
    if (isset($fields['contentcollection'])) {
      $opt['query_string']['contentcollection'] = $fields['contentcollection'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/thing', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_thing\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_thing\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_thing\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->thing->status)) {
      $message = 'Error response from server in call to \'update_thing\'. Response to \'thing\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->thing->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_thing\'. Message \'' . $response->body->thing->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'track_metadata' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  track_metadata resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $track (Required) 'track' field, which is a 'string' type. (FIELD).
   * @param string $album (Required) 'album' field, which is a 'string' type. (FIELD).
   * @param string $disk (Required) 'disk' field, which is a 'string' type. (FIELD).
   * @param string $bpm (Required) 'bpm' field, which is a 'string' type. (FIELD).
   * @param string $lyrics (Required) 'lyrics' field, which is a 'string' type. (FIELD).
   * @param string $composer (Required) 'composer' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_track_metadata($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_track_metadata' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'track_metadata\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['track'])) {
      $opt['query_string']['track'] = $fields['track'];
    }
    if (isset($fields['album'])) {
      $opt['query_string']['album'] = $fields['album'];
    }
    if (isset($fields['disk'])) {
      $opt['query_string']['disk'] = $fields['disk'];
    }
    if (isset($fields['bpm'])) {
      $opt['query_string']['bpm'] = $fields['bpm'];
    }
    if (isset($fields['lyrics'])) {
      $opt['query_string']['lyrics'] = $fields['lyrics'];
    }
    if (isset($fields['composer'])) {
      $opt['query_string']['composer'] = $fields['composer'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/track_metadata', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_track_metadata\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_track_metadata\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_track_metadata\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->track_metadata->status)) {
      $message = 'Error response from server in call to \'create_track_metadata\'. Response to \'track_metadata\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->track_metadata->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_track_metadata\'. Message \'' . $response->body->track_metadata->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  track_metadata resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $track (Required) 'track' field, which is a 'string' type. (FIELD).
   * @param string $album (Required) 'album' field, which is a 'string' type. (FIELD).
   * @param string $disk (Required) 'disk' field, which is a 'string' type. (FIELD).
   * @param string $bpm (Required) 'bpm' field, which is a 'string' type. (FIELD).
   * @param string $lyrics (Required) 'lyrics' field, which is a 'string' type. (FIELD).
   * @param string $composer (Required) 'composer' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_track_metadata($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_track_metadata' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'track_metadata\' resource call. The ThumbWhere Host Id has not been configured.');
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

    if (isset($fields['track'])) {
      $opt['query_string']['track'] = $fields['track'];
    }
    if (isset($fields['album'])) {
      $opt['query_string']['album'] = $fields['album'];
    }
    if (isset($fields['disk'])) {
      $opt['query_string']['disk'] = $fields['disk'];
    }
    if (isset($fields['bpm'])) {
      $opt['query_string']['bpm'] = $fields['bpm'];
    }
    if (isset($fields['lyrics'])) {
      $opt['query_string']['lyrics'] = $fields['lyrics'];
    }
    if (isset($fields['composer'])) {
      $opt['query_string']['composer'] = $fields['composer'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/track_metadata', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_track_metadata\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_track_metadata\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_track_metadata\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->track_metadata->status)) {
      $message = 'Error response from server in call to \'update_track_metadata\'. Response to \'track_metadata\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->track_metadata->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_track_metadata\'. Message \'' . $response->body->track_metadata->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'trophy' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  trophy resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $singleton (Required) 'singleton' field, which is a 'boolean' type. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_trophy($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_trophy' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'trophy\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    //
    // Validate Fields
    //
    if (!isset($fields['singleton'])) {
	    throw new APIContent_Exception('Field "singleton" is mandatory.');
    }
    if (empty($fields['name'])) {
	    throw new APIContent_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'create',
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'singleton' => $fields['singleton'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/trophy', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_trophy\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_trophy\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_trophy\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->trophy->status)) {
      $message = 'Error response from server in call to \'create_trophy\'. Response to \'trophy\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->trophy->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_trophy\'. Message \'' . $response->body->trophy->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  trophy resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $origin (Required) Identifier of host that originated this resource (CONSTRAINT).
   * @param string $singleton (Required) 'singleton' field, which is a 'boolean' type. (FIELD).
   * @param string $name (Required) 'name' field, which is a 'string' type. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_trophy($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_trophy' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'trophy\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
    //
    // Validate Fields
    //
    if (!isset($fields['singleton'])) {
	    throw new APIContent_Exception('Field "singleton" is mandatory.');
    }
    if (empty($fields['name'])) {
	    throw new APIContent_Exception('Field "name" is mandatory.');
    }
    $opt['query_string'] = array(
        '$op' => 'update',
        '$id' => $id,
        '$key' => $context['key'],
        '$origin' => $context['origin'],
        'singleton' => $fields['singleton'],
        'name' => $fields['name'],
    );

    //
    // Populate the query string with optional parameters.
    //


    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/trophy', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_trophy\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_trophy\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_trophy\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->trophy->status)) {
      $message = 'Error response from server in call to \'update_trophy\'. Response to \'trophy\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->trophy->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_trophy\'. Message \'' . $response->body->trophy->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'superheroes' Resource METHODS

  
  /**
   * Invokes the CREATE method for the  superheroes resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field. (FIELD).
   * @param string $reputation (Required) 'reputation' field, which is an embedded 'Reputation' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function create_superheroes($context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1)watchdog('tw_api', 'call to TWAPI.create_superheroes' ,array(), WATCHDOG_NOTICE);
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
      throw new APIContent_Exception('Cannot send create \'superheroes\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
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

    if (isset($fields['name'])) {
      $opt['query_string']['name'] = $fields['name'];
    }
    if (isset($fields['reputation'])) {
      $opt['query_string']['reputation'] = $fields['reputation'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/superheroes', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'create_superheroes\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() ,  WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'create_superheroes\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'create_superheroes\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->superheroes->status)) {
      $message = 'Error response from server in call to \'create_superheroes\'. Response to \'superheroes\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->superheroes->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_superheroes\'. Message \'' . $response->body->superheroes->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }					
					
 /**
   * Invokes the UPDATE method for the  superheroes resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
      * @param int $id (Mandatory) The id of the entity we are updating: <ul>   * @param string $key (Required) Provides context for the campaign. (CONSTRAINT).
   * @param string $name (Required) 'name' field. (FIELD).
   * @param string $reputation (Required) 'reputation' field, which is an embedded 'Reputation' resource. (FIELD).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.update Working with ThumbWhere APIContent Buckets
   */
						
public function update_superheroes($id,$context = array(), $fields = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.update_superheroes' ,array(), WATCHDOG_NOTICE);
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
        
    // Make sure we have a context id
    if (!isset($context['origin'])) {
      $context['origin'] = variable_get('thumbwhere_host_id', -1);
    }

    // Make sure we have a valid id
    if (!is_numeric($context['origin']))  {
      throw new APIContent_Exception('Cannot send create \'superheroes\' resource call. The ThumbWhere Host Id has not been configured.');
    }
    
    
    
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

    if (isset($fields['name'])) {
      $opt['query_string']['name'] = $fields['name'];
    }
    if (isset($fields['reputation'])) {
      $opt['query_string']['reputation'] = $fields['reputation'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/superheroes', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'update_superheroes\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'update_superheroes\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'update_superheroes\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->superheroes->status)) {
      $message = 'Error response from server in call to \'update_superheroes\'. Response to \'superheroes\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->superheroes->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'update_superheroes\'. Message \'' . $response->body->superheroes->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }

		
 /*%******************************************************************************************%*/
  /*%******************************************************************************************%*/
  // 
  // ALL THE ACTIONS
  
  

	
  /*%******************************************************************************************%*/
  // 'add_to_producer' Resource METHODS
  

  /**
   * Invokes the CALL method for the  add_to_producer resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API Key. (PARAMETER).
   * @param string $producer (Required) The producer being added to (PARAMETER).
   * @param string $member (Required) The member that will be a producer. (PARAMETER).
   * @param string $consumer (Required) The consumer that will be created producer. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_add_to_producer($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_add_to_producer' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['producer'])) {
	    throw new APIContent_Exception('Parameter "producer" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'producer' => $parameters['producer'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['member'])) {
      $opt['query_string']['member'] = $parameters['member'];
    }
    if (isset($parameters['consumer'])) {
      $opt['query_string']['consumer'] = $parameters['consumer'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/add_to_producer', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_add_to_producer\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_add_to_producer\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_add_to_producer\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->add_to_producer->status)) {
      $message = 'Error response from server in call to \'call_add_to_producer\'. Response to \'add_to_producer\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->add_to_producer->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_add_to_producer\'. Message \'' . $response->body->add_to_producer->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'bookmark_mediaitem' Resource METHODS
  

  /**
   * Invokes the CALL method for the  bookmark_mediaitem resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $member (Required) The member registering this dish. (PARAMETER).
   * @param string $mediaitem (Required) The media item we are bookmarking. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_bookmark_mediaitem($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_bookmark_mediaitem' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['member'])) {
	    throw new APIContent_Exception('Parameter "member" is mandatory.');
    }
    if (!isset($parameters['mediaitem'])) {
	    throw new APIContent_Exception('Parameter "mediaitem" is mandatory.');
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
    $response = $this->invoke($this->api . '/' . $this->api_version . '/bookmark_mediaitem', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_bookmark_mediaitem\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_bookmark_mediaitem\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_bookmark_mediaitem\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->bookmark_mediaitem->status)) {
      $message = 'Error response from server in call to \'call_bookmark_mediaitem\'. Response to \'bookmark_mediaitem\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->bookmark_mediaitem->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_bookmark_mediaitem\'. Message \'' . $response->body->bookmark_mediaitem->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'consume_mediaitem' Resource METHODS
  

  /**
   * Invokes the CALL method for the  consume_mediaitem resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $member (Required) The member registering this dish. (PARAMETER).
   * @param string $mediaitem (Required) The media item we are declaring is our new dish. (PARAMETER).
   * @param string $documentation (Required) The name of the content (if we are creating the content). (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_consume_mediaitem($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_consume_mediaitem' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['member'])) {
      $opt['query_string']['member'] = $parameters['member'];
    }
    if (isset($parameters['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $parameters['mediaitem'];
    }
    if (isset($parameters['documentation'])) {
      $opt['query_string']['documentation'] = $parameters['documentation'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/consume_mediaitem', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_consume_mediaitem\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_consume_mediaitem\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_consume_mediaitem\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->consume_mediaitem->status)) {
      $message = 'Error response from server in call to \'call_consume_mediaitem\'. Response to \'consume_mediaitem\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->consume_mediaitem->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_consume_mediaitem\'. Message \'' . $response->body->consume_mediaitem->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'ingest' Resource METHODS
  

  /**
   * Invokes the CALL method for the  ingest resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $name (Required) The name of the content (if we are creating the content). (PARAMETER).
   * @param string $member (Required) The member performing the upload. (PARAMETER).
   * @param string $identity (Required) The identity performing the upload. (PARAMETER).
   * @param string $consumer (Required) The consumer performing the upload. (PARAMETER).
   * @param string $producer (Required) The producer performing the upload. (PARAMETER).
   * @param string $content (Required) The content we are targeting.. (PARAMETER).
   * @param string $url (Required) The url to the media that we are uploading. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_ingest($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_ingest' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['url'])) {
	    throw new APIContent_Exception('Parameter "url" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'url' => $parameters['url'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['name'])) {
      $opt['query_string']['name'] = $parameters['name'];
    }
    if (isset($parameters['member'])) {
      $opt['query_string']['member'] = $parameters['member'];
    }
    if (isset($parameters['identity'])) {
      $opt['query_string']['identity'] = $parameters['identity'];
    }
    if (isset($parameters['consumer'])) {
      $opt['query_string']['consumer'] = $parameters['consumer'];
    }
    if (isset($parameters['producer'])) {
      $opt['query_string']['producer'] = $parameters['producer'];
    }
    if (isset($parameters['content'])) {
      $opt['query_string']['content'] = $parameters['content'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/ingest', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_ingest\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_ingest\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_ingest\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->ingest->status)) {
      $message = 'Error response from server in call to \'call_ingest\'. Response to \'ingest\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->ingest->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_ingest\'. Message \'' . $response->body->ingest->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'play' Resource METHODS
  

  /**
   * Invokes the CALL method for the  play resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $content (Required) The content we want to play. (PARAMETER).
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
						
public function call_play($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_play' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($parameters['content'])) {
	    throw new APIContent_Exception('Parameter "content" is mandatory.');
    }
    $opt['query_string'] = array(

        'content' => $parameters['content'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['key'])) {
      $opt['query_string']['key'] = $parameters['key'];
    }
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
    $response = $this->invoke($this->api . '/' . $this->api_version . '/play', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_play\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_play\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_play\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->play->status)) {
      $message = 'Error response from server in call to \'call_play\'. Response to \'play\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->play->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_play\'. Message \'' . $response->body->play->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'produce_mediaitem' Resource METHODS
  

  /**
   * Invokes the CALL method for the  produce_mediaitem resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $member (Required) The member registering this dish. (PARAMETER).
   * @param string $mediaitem (Required) The media item we are declaring is our new dish. (PARAMETER).
   * @param string $documentation (Required) The name of the content (if we are creating the content). (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_produce_mediaitem($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_produce_mediaitem' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['member'])) {
      $opt['query_string']['member'] = $parameters['member'];
    }
    if (isset($parameters['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $parameters['mediaitem'];
    }
    if (isset($parameters['documentation'])) {
      $opt['query_string']['documentation'] = $parameters['documentation'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/produce_mediaitem', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_produce_mediaitem\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_produce_mediaitem\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_produce_mediaitem\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->produce_mediaitem->status)) {
      $message = 'Error response from server in call to \'call_produce_mediaitem\'. Response to \'produce_mediaitem\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->produce_mediaitem->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_produce_mediaitem\'. Message \'' . $response->body->produce_mediaitem->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'purge' Resource METHODS
  

  /**
   * Invokes the CALL method for the  purge resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $content (Required) The content we want to purge. (PARAMETER).
   * @param string $verify (Required) If this is true then we verify that the content files exist AND have been deleted. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_purge($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_purge' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($parameters['content'])) {
	    throw new APIContent_Exception('Parameter "content" is mandatory.');
    }
    $opt['query_string'] = array(

        'content' => $parameters['content'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['key'])) {
      $opt['query_string']['key'] = $parameters['key'];
    }
    if (isset($parameters['verify'])) {
      $opt['query_string']['verify'] = $parameters['verify'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/purge', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_purge\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_purge\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_purge\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->purge->status)) {
      $message = 'Error response from server in call to \'call_purge\'. Response to \'purge\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->purge->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_purge\'. Message \'' . $response->body->purge->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'register_actor' Resource METHODS
  

  /**
   * Invokes the CALL method for the  register_actor resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API Key. (PARAMETER).
   * @param string $member (Required) The member that will be a producer. (PARAMETER).
   * @param string $consumer (Required) The consumer that will be created producer. (PARAMETER).
   * @param string $producer (Required) The actor that will be created producer. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_register_actor($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_register_actor' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['member'])) {
      $opt['query_string']['member'] = $parameters['member'];
    }
    if (isset($parameters['consumer'])) {
      $opt['query_string']['consumer'] = $parameters['consumer'];
    }
    if (isset($parameters['producer'])) {
      $opt['query_string']['producer'] = $parameters['producer'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/register_actor', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_register_actor\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_register_actor\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_register_actor\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->register_actor->status)) {
      $message = 'Error response from server in call to \'call_register_actor\'. Response to \'register_actor\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->register_actor->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_register_actor\'. Message \'' . $response->body->register_actor->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'register_consumer' Resource METHODS
  

  /**
   * Invokes the CALL method for the  register_consumer resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign or external application. If this is blank, the server will assume the API token for the campaign based on the configuration of the API service and the API's domain name. (PARAMETER).
   * @param string $name (Required) The full name of this consumer. (PARAMETER).
   * @param string $member (Required) The member that will be a consumer. (PARAMETER).
   * @param string $producer (Required) The producer that will be added as a consumer. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_register_consumer($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_register_consumer' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['name'])) {
	    throw new APIContent_Exception('Parameter "name" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'name' => $parameters['name'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['member'])) {
      $opt['query_string']['member'] = $parameters['member'];
    }
    if (isset($parameters['producer'])) {
      $opt['query_string']['producer'] = $parameters['producer'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/register_consumer', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_register_consumer\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_register_consumer\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_register_consumer\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->register_consumer->status)) {
      $message = 'Error response from server in call to \'call_register_consumer\'. Response to \'register_consumer\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->register_consumer->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_register_consumer\'. Message \'' . $response->body->register_consumer->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'register_producer' Resource METHODS
  

  /**
   * Invokes the CALL method for the  register_producer resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API Key. (PARAMETER).
   * @param string $name (Required) The full name of this consumer. (PARAMETER).
   * @param string $member (Required) The member that will be a producer. (PARAMETER).
   * @param string $consumer (Required) The consumer that will be created producer. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_register_producer($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_register_producer' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    if (empty($parameters['name'])) {
	    throw new APIContent_Exception('Parameter "name" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'name' => $parameters['name'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['member'])) {
      $opt['query_string']['member'] = $parameters['member'];
    }
    if (isset($parameters['consumer'])) {
      $opt['query_string']['consumer'] = $parameters['consumer'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/register_producer', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_register_producer\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_register_producer\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_register_producer\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->register_producer->status)) {
      $message = 'Error response from server in call to \'call_register_producer\'. Response to \'register_producer\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->register_producer->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_register_producer\'. Message \'' . $response->body->register_producer->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'register_subject' Resource METHODS
  

  /**
   * Invokes the CALL method for the  register_subject resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API Key. (PARAMETER).
   * @param string $actor (Required) If this is not null then the actor is the subject. (PARAMETER).
   * @param string $thing (Required) If this is not null then the thing is the subject. (PARAMETER).
   * @param string $action (Required) If this is not null then the action is the subject. (PARAMETER).
   * @param string $place (Required) If this is not null then the place is the subject. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_register_subject($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_register_subject' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['actor'])) {
      $opt['query_string']['actor'] = $parameters['actor'];
    }
    if (isset($parameters['thing'])) {
      $opt['query_string']['thing'] = $parameters['thing'];
    }
    if (isset($parameters['action'])) {
      $opt['query_string']['action'] = $parameters['action'];
    }
    if (isset($parameters['place'])) {
      $opt['query_string']['place'] = $parameters['place'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/register_subject', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_register_subject\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_register_subject\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_register_subject\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->register_subject->status)) {
      $message = 'Error response from server in call to \'call_register_subject\'. Response to \'register_subject\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->register_subject->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_register_subject\'. Message \'' . $response->body->register_subject->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'register_thing' Resource METHODS
  

  /**
   * Invokes the CALL method for the  register_thing resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API Key. (PARAMETER).
   * @param string $mediaitem (Required) The mediaitem that will be a thing. (PARAMETER).
   * @param string $content (Required) The content that will be a thing. (PARAMETER).
   * @param string $collection (Required) The content collection that will be a thing. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_register_thing($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_register_thing' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['mediaitem'])) {
      $opt['query_string']['mediaitem'] = $parameters['mediaitem'];
    }
    if (isset($parameters['content'])) {
      $opt['query_string']['content'] = $parameters['content'];
    }
    if (isset($parameters['collection'])) {
      $opt['query_string']['collection'] = $parameters['collection'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/register_thing', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_register_thing\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_register_thing\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_register_thing\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->register_thing->status)) {
      $message = 'Error response from server in call to \'call_register_thing\'. Response to \'register_thing\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->register_thing->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_register_thing\'. Message \'' . $response->body->register_thing->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'remove_from_producer' Resource METHODS
  

  /**
   * Invokes the CALL method for the  remove_from_producer resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API Key. (PARAMETER).
   * @param string $producer (Required) The producer the entity is beign removed from. (PARAMETER).
   * @param string $member (Required) The member we are removing. (PARAMETER).
   * @param string $consumer (Required) The consumer that we will be removing. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_remove_from_producer($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_remove_from_producer' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['producer'])) {
	    throw new APIContent_Exception('Parameter "producer" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
        'producer' => $parameters['producer'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['member'])) {
      $opt['query_string']['member'] = $parameters['member'];
    }
    if (isset($parameters['consumer'])) {
      $opt['query_string']['consumer'] = $parameters['consumer'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/remove_from_producer', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_remove_from_producer\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_remove_from_producer\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_remove_from_producer\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->remove_from_producer->status)) {
      $message = 'Error response from server in call to \'call_remove_from_producer\'. Response to \'remove_from_producer\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->remove_from_producer->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_remove_from_producer\'. Message \'' . $response->body->remove_from_producer->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'unbookmark_mediaitem' Resource METHODS
  

  /**
   * Invokes the CALL method for the  unbookmark_mediaitem resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $member (Required) The member registering this dish. (PARAMETER).
   * @param string $mediaitem (Required) The media item we are unbookmarking. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_unbookmark_mediaitem($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_unbookmark_mediaitem' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    if (!isset($parameters['member'])) {
	    throw new APIContent_Exception('Parameter "member" is mandatory.');
    }
    if (!isset($parameters['mediaitem'])) {
	    throw new APIContent_Exception('Parameter "mediaitem" is mandatory.');
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
    $response = $this->invoke($this->api . '/' . $this->api_version . '/unbookmark_mediaitem', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_unbookmark_mediaitem\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_unbookmark_mediaitem\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_unbookmark_mediaitem\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->unbookmark_mediaitem->status)) {
      $message = 'Error response from server in call to \'call_unbookmark_mediaitem\'. Response to \'unbookmark_mediaitem\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->unbookmark_mediaitem->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_unbookmark_mediaitem\'. Message \'' . $response->body->unbookmark_mediaitem->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }
	
  /*%******************************************************************************************%*/
  // 'unpublish' Resource METHODS
  

  /**
   * Invokes the CALL method for the  unpublish resource web service.
   *
   * TODO: Pull in description from resource as part of code-gen
   *
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $content (Required) The content we want to unpublish. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_unpublish($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_unpublish' ,array(), WATCHDOG_NOTICE);
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
    if (!isset($parameters['content'])) {
	    throw new APIContent_Exception('Parameter "content" is mandatory.');
    }
    $opt['query_string'] = array(

        'content' => $parameters['content'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['key'])) {
      $opt['query_string']['key'] = $parameters['key'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/unpublish', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_unpublish\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_unpublish\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_unpublish\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->unpublish->status)) {
      $message = 'Error response from server in call to \'call_unpublish\'. Response to \'unpublish\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->unpublish->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_unpublish\'. Message \'' . $response->body->unpublish->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
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
   * @param string $key (Required) The API key for the campaign. (PARAMETER).
   * @param string $name (Required) The name of the content (if we are creating the content). (PARAMETER).
   * @param string $text (Required) Text part of the content (if we are creating the content). (PARAMETER).
   * @param string $member (Required) The member performing the upload. (PARAMETER).
   * @param string $identity (Required) The identity performing the upload. (PARAMETER).
   * @param string $consumer (Required) The consumer performing the upload. (PARAMETER).
   * @param string $producer (Required) The producer performing the upload. (PARAMETER).
   * @param string $content (Required) The content we are targeting.. (PARAMETER).
   * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
   * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
   * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request.</li></ul>
   * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
   * @link http://thumbwhere.com/api/v1.0/content#content_ingest.create Working with ThumbWhere APIContent Buckets
   */
						
public function call_upload($parameters = array(), $opt = null) {
	    if (variable_get('thumbwhere_api_log_info',0) == 1) watchdog('tw_api', 'call to TWAPI.call_upload' ,array(), WATCHDOG_NOTICE);
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
	    throw new APIContent_Exception('Parameter "key" is mandatory.');
    }
    $opt['query_string'] = array(

        'key' => $parameters['key'],
    );

    //
    // Populate the query string with optional parameters.
    //

    if (isset($parameters['name'])) {
      $opt['query_string']['name'] = $parameters['name'];
    }
    if (isset($parameters['text'])) {
      $opt['query_string']['text'] = $parameters['text'];
    }
    if (isset($parameters['member'])) {
      $opt['query_string']['member'] = $parameters['member'];
    }
    if (isset($parameters['identity'])) {
      $opt['query_string']['identity'] = $parameters['identity'];
    }
    if (isset($parameters['consumer'])) {
      $opt['query_string']['consumer'] = $parameters['consumer'];
    }
    if (isset($parameters['producer'])) {
      $opt['query_string']['producer'] = $parameters['producer'];
    }
    if (isset($parameters['content'])) {
      $opt['query_string']['content'] = $parameters['content'];
    }

    //
    // Invoke the service
    //
    $response = $this->invoke($this->api . '/' . $this->api_version . '/upload', $opt);

	  if (!isset($response->body)) {
      $message = 'Error response from server in call to \'call_upload\'. Response was not XML? Missing XML header?';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!is_object($response->body)) {
      $message = 'Response body was not an object. Error when calling \'call_upload\'. ' . $response->body ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (isset($response->body->attributes()->errorMessage)) {
      $message = 'Error response from server in call to \'call_upload\'. ' . $response->body->attributes()->errorMessage ;
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

	  if (!isset($response->body->upload->status)) {
      $message = 'Error response from server in call to \'call_upload\'. Response to \'upload\' was expected but was not present';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    $status = $response->body->upload->status;

	  if ($status == 'error') {
      $message = 'Error response from server in call to \'create_upload\'. Message \'' . $response->body->upload->errorMessage . '\'';
	    watchdog('tw_api', $message , array() , WATCHDOG_ERROR);
	    throw new APIContent_Exception($message);
    }

    return $response;
  }}

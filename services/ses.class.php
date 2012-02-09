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

/**
 *
 *
 * This is the API Reference for ThumbWhere Simple Email Service (ThumbWhere SES). This documentation is intended to be used in conjunction with the
 * ThumbWhere SES Getting Started Guide and the ThumbWhere SES Developer Guide.
 *
 * For specific details on how to construct a service request, please consult the <a
 * href="http://docs.amazonwebservices.com/ses/latest/DeveloperGuide">ThumbWhere SES Developer Guide</a>.
 *
 * @version Thu Sep 01 21:20:58 PDT 2011
 * @license See the included NOTICE.md file for complete information.
 * @copyright See the included NOTICE.md file for complete information.
 * @link http://thumbwhere.com/ses/ThumbWhere Simple Email Service
 * @link http://thumbwhere.com/documentation/ses/ThumbWhere Simple Email Service documentation
 */
class ThumbWhereSES extends TWRuntime
{

	/*%******************************************************************************************%*/
	// CLASS CONSTANTS

	/**
	 * Specify the default queue URL.
	 */
	const DEFAULT_URL = 'email.us-east-1.amazonaws.com';

	/**
	 * Specify the queue URL for the US-East (Northern Virginia) Region.
	 */
	const REGION_US_E1 = self::DEFAULT_URL;


	/*%******************************************************************************************%*/
	// SETTERS

	/**
	 * This allows you to explicitly sets the region for the service to use.
	 *
	 * @param string $region (Required) The region to explicitly set. Available options are <REGION_US_E1>, <REGION_US_W1>, <REGION_EU_W1>, or <REGION_APAC_SE1>.
	 * @return $this A reference to the current instance.
	 */
	public function set_region($region)
	{
		$this->set_hostname($region);
		return $this;
	}

	/**
	 * Throws an error because SSL is required for the ThumbWhere Email Service.
	 *
	 * @return void
	 */
	public function disable_ssl()
	{
		throw new Email_Exception('SSL/HTTPS is REQUIRED for ThumbWhere Email Service and cannot be disabled.');
	}


	/*%******************************************************************************************%*/
	// CONSTRUCTOR

	/**
	 * Constructs a new instance of <ThumbWhereEmail>.
	 *
	 * @param string $key (Optional) Your ThumbWhere API Key. If blank, it will look for the <code>TW_KEY</code> constant.
	 * @param string $secret_key (Optional) Your ThumbWhere API Secret Key. If blank, it will look for the <code>TW_SECRET_KEY</code> constant.
	 * @return boolean false if no valid values are set, otherwise true.
	 */
	public function __construct($key = null, $secret_key = null)
	{
		$this->api_version = '2010-12-01';
		$this->hostname = self::DEFAULT_URL;

		if (!$key && !defined('TW_KEY'))
		{
			// @codeCoverageIgnoreStart
			throw new Email_Exception('No account key was passed into the constructor, nor was it set in the TW_KEY constant.');
			// @codeCoverageIgnoreEnd
		}

		if (!$secret_key && !defined('TW_SECRET_KEY'))
		{
			// @codeCoverageIgnoreStart
			throw new Email_Exception('No account secret was passed into the constructor, nor was it set in the TW_SECRET_KEY constant.');
			// @codeCoverageIgnoreEnd
		}

		return parent::__construct($key, $secret_key);
	}


	/*%******************************************************************************************%*/
	// SERVICE METHODS

	/**
	 *
	 * Returns the user's current activity limits.
	 *
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
	 */
	public function get_send_quota($opt = null)
	{
		if (!$opt) $opt = array();

		return $this->authenticate('GetSendQuota', $opt, $this->hostname, 3);
	}

	/**
	 *
	 * Returns a list containing all of the email addresses that have been verified.
	 *
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
	 */
	public function list_verified_email_addresses($opt = null)
	{
		if (!$opt) $opt = array();

		return $this->authenticate('ListVerifiedEmailAddresses', $opt, $this->hostname, 3);
	}

	/**
	 *
	 * Returns the user's sending statistics. The result is a list of data points, representing the last two weeks of sending activity.
	 *
	 * Each data point in the list contains statistics for a 15-minute interval.
	 *
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
	 */
	public function get_send_statistics($opt = null)
	{
		if (!$opt) $opt = array();

		return $this->authenticate('GetSendStatistics', $opt, $this->hostname, 3);
	}

	/**
	 *
	 * Composes an email message based on input data, and then immediately queues the message for sending.
	 *
	 * If you have not yet requested production access to ThumbWhere SES, then you will only be able to send email to and from verified email
	 * addresses. For more information, go to the <a href="http://docs.amazonwebservices.com/ses/latest/DeveloperGuide">ThumbWhere SES Developer
	 * Guide</a>.
	 *
	 * @param string $source (Required) The sender's email address.
	 * @param array $destination (Required) The destination for this email, composed of To:, CC:, and BCC: fields. <ul>
	 * 	<li><code>ToAddresses</code> - <code>string|array</code> - Optional - The To: field(s) of the message.  Pass a string for a single value, or an indexed array for multiple values. </li>
	 * 	<li><code>CcAddresses</code> - <code>string|array</code> - Optional - The CC: field(s) of the message.  Pass a string for a single value, or an indexed array for multiple values. </li>
	 * 	<li><code>BccAddresses</code> - <code>string|array</code> - Optional - The BCC: field(s) of the message.  Pass a string for a single value, or an indexed array for multiple values. </li>
	 * </ul>
	 * @param array $message (Required) The message to be sent. <ul>
	 * 	<li><code>Subject</code> - <code>array</code> - Required - The subject of the message: A short summary of the content, which will appear in the recipient's inbox. Takes an associative array of parameters that can have the following keys: <ul>
	 * 		<li><code>Data</code> - <code>string</code> - Required - The textual data of the content. </li>
	 * 		<li><code>Charset</code> - <code>string</code> - Optional - The character set of the content. </li>
	 * 	</ul></li>
	 * 	<li><code>Body</code> - <code>array</code> - Required - The message body. Takes an associative array of parameters that can have the following keys: <ul>
	 * 		<li><code>Text</code> - <code>array</code> - Optional - The content of the message, in text format. Use this for text-based email clients, or clients on high-latency networks (such as mobile devices). Takes an associative array of parameters that can have the following keys: <ul>
	 * 			<li><code>Data</code> - <code>string</code> - Required - The textual data of the content. </li>
	 * 			<li><code>Charset</code> - <code>string</code> - Optional - The character set of the content. </li>
	 * 		</ul></li>
	 * 		<li><code>Html</code> - <code>array</code> - Optional - The content of the message, in HTML format. Use this for email clients that can process HTML. You can include clickable links, formatted text, and much more in an HTML message. Takes an associative array of parameters that can have the following keys: <ul>
	 * 			<li><code>Data</code> - <code>string</code> - Required - The textual data of the content. </li>
	 * 			<li><code>Charset</code> - <code>string</code> - Optional - The character set of the content. </li>
	 * 		</ul></li>
	 * 	</ul></li>
	 * </ul>
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>ReplyToAddresses</code> - <code>string|array</code> - Optional - The reply-to email address(es) for the message. If the recipient replies to the message, each reply-to address will receive the reply.  Pass a string for a single value, or an indexed array for multiple values. </li>
	 * 	<li><code>ReturnPath</code> - <code>string</code> - Optional - The email address to which bounce notifications are to be forwarded. If the message cannot be delivered to the recipient, then an error message will be returned from the recipient's ISP; this message will then be forwarded to the email address specified by the <code>ReturnPath</code> parameter. </li>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
	 */
	public function send_email($source, $destination, $message, $opt = null)
	{
		if (!$opt) $opt = array();
		$opt['Source'] = $source;

		// Collapse these list values for the required parameter
		if (isset($destination['ToAddresses']))
		{
			$destination['ToAddresses'] = TWComplexType::map(array(
				'member' => (is_array($destination['ToAddresses']) ? $destination['ToAddresses'] : array($destination['ToAddresses']))
			));
		}

		// Collapse these list values for the required parameter
		if (isset($destination['CcAddresses']))
		{
			$destination['CcAddresses'] = TWComplexType::map(array(
				'member' => (is_array($destination['CcAddresses']) ? $destination['CcAddresses'] : array($destination['CcAddresses']))
			));
		}

		// Collapse these list values for the required parameter
		if (isset($destination['BccAddresses']))
		{
			$destination['BccAddresses'] = TWComplexType::map(array(
				'member' => (is_array($destination['BccAddresses']) ? $destination['BccAddresses'] : array($destination['BccAddresses']))
			));
		}

		// Required parameter
		$opt = array_merge($opt, TWComplexType::map(array(
			'Destination' => (is_array($destination) ? $destination : array($destination))
		), 'member'));

		// Required parameter
		$opt = array_merge($opt, TWComplexType::map(array(
			'Message' => (is_array($message) ? $message : array($message))
		), 'member'));

		// Optional parameter
		if (isset($opt['ReplyToAddresses']))
		{
			$opt = array_merge($opt, TWComplexType::map(array(
				'ReplyToAddresses' => (is_array($opt['ReplyToAddresses']) ? $opt['ReplyToAddresses'] : array($opt['ReplyToAddresses']))
			), 'member'));
			unset($opt['ReplyToAddresses']);
		}

		return $this->authenticate('SendEmail', $opt, $this->hostname, 3);
	}

	/**
	 *
	 * Deletes the specified email address from the list of verified addresses.
	 *
	 * @param string $email_address (Required) An email address to be removed from the list of verified addreses.
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
	 */
	public function delete_verified_email_address($email_address, $opt = null)
	{
		if (!$opt) $opt = array();
		$opt['EmailAddress'] = $email_address;

		return $this->authenticate('DeleteVerifiedEmailAddress', $opt, $this->hostname, 3);
	}

	/**
	 *
	 * Verifies an email address. This action causes a confirmation email message to be sent to the specified address.
	 *
	 * @param string $email_address (Required) The email address to be verified.
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
	 */
	public function verify_email_address($email_address, $opt = null)
	{
		if (!$opt) $opt = array();
		$opt['EmailAddress'] = $email_address;

		return $this->authenticate('VerifyEmailAddress', $opt, $this->hostname, 3);
	}

	/**
	 *
	 * Sends an email message, with header and content specified by the client. The <code>SendRawEmail</code> action is useful for sending
	 * multipart MIME emails. The raw text of the message must comply with Internet email standards; otherwise, the message cannot be sent.
	 *
	 * If you have not yet requested production access to ThumbWhere SES, then you will only be able to send email to and from verified email
	 * addresses. For more information, go to the <a href="http://docs.amazonwebservices.com/ses/latest/DeveloperGuide">ThumbWhere SES Developer
	 * Guide</a>.
	 *
	 * @param array $raw_message (Required) The raw text of the message. The client is responsible for ensuring the following: <ul> <li>Message must contain a header and a body, separated by a blank line.</li><li>All required header fields must be present.</li><li>Each part of a multipart MIME message must be formatted properly.</li><li>MIME content types must be among those supported by ThumbWhere SES. Refer to the ThumbWhere SES Developer Guide for more details.</li><li>Content must be base64-encoded, if MIME requires it.</li> </ul> <ul>
	 * 	<li><code>Data</code> - <code>blob</code> - Required - The raw data of the message. The client must ensure that the message format complies with Internet email standards regarding email header fields, MIME types, MIME encoding, and base64 encoding (if necessary). For more information, go to the ThumbWhere SES Developer Guide. </li>
	 * </ul>
	 * @param array $opt (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>Source</code> - <code>string</code> - Optional - The sender's email address. If you specify the <code>Source</code> parameter, then bounce notifications and complaints will be sent to this email address. This takes precedence over any <i>Return-Path</i> header that you might include in the raw text of the message. </li>
	 * 	<li><code>Destinations</code> - <code>string|array</code> - Optional - A list of destinations for the message.  Pass a string for a single value, or an indexed array for multiple values. </li>
	 * 	<li><code>curlopts</code> - <code>array</code> - Optional - A set of values to pass directly into <code>curl_setopt()</code>, where the key is a pre-defined <code>CURLOPT_*</code> constant.</li>
	 * 	<li><code>returnCurlHandle</code> - <code>boolean</code> - Optional - A private toggle specifying that the cURL handle be returned rather than actually completing the request. This toggle is useful for manually managed batch requests.</li></ul>
	 * @return TWResponse A <TWResponse> object containing a parsed HTTP response.
	 */
	public function send_raw_email($raw_message, $opt = null)
	{
		if (!$opt) $opt = array();

		// Optional parameter
		if (isset($opt['Destinations']))
		{
			$opt = array_merge($opt, TWComplexType::map(array(
				'Destinations' => (is_array($opt['Destinations']) ? $opt['Destinations'] : array($opt['Destinations']))
			), 'member'));
			unset($opt['Destinations']);
		}

		// Required parameter
		$opt = array_merge($opt, TWComplexType::map(array(
			'RawMessage' => (is_array($raw_message) ? $raw_message : array($raw_message))
		), 'member'));

		return $this->authenticate('SendRawEmail', $opt, $this->hostname, 3);
	}
}


/*%******************************************************************************************%*/
// EXCEPTIONS

/**
 * Exception: Email_Exception
 * 	Default Email Exception.
 */
class Email_Exception extends Exception {}

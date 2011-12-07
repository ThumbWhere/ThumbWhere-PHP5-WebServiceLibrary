<?php if (!class_exists('CFRuntime')) die('No direct access allowed.');
/**
 * Stores your TW account information. Add your account information, and then rename this file
 * to 'config.inc.php'.
 *
 * @version 2011.06.02
 * @license See the included NOTICE.md file for more information.
 * @copyright See the included NOTICE.md file for more information.
 * @link http://thumbwhere.com/sdk/php/ PHP Developer Center
 * @link http://tw.amazon.com/security-credentials TW Security Credentials
 */


/**
 * ThumbWhere Key. Found in the TW Security Credentials. You can also pass this value as the first
 * parameter to a service constructor.
 */
define('TW_KEY', '');

/**
 * ThumbWhere Secret Key. Found in the TW Security Credentials. You can also pass this value as
 * the second parameter to a service constructor.
 */
define('TW_SECRET_KEY', '');

/**
 * Amazon Account ID without dashes. Used for identification with Amazon EC2. Found in the TW Security
 * Credentials.
 */
define('TW_ACCOUNT_ID', '');

/**
 * Your CanonicalUser ID. Used for setting access control settings in AmazonS3. Found in the TW Security
 * Credentials.
 */
define('TW_CANONICAL_ID', '');

/**
 * Your CanonicalUser DisplayName. Used for setting access control settings in AmazonS3. Found in the TW
 * Security Credentials (i.e. "Welcome, TW_CANONICAL_NAME").
 */
define('TW_CANONICAL_NAME', '');

/**
 * Determines which Cerificate Authority file to use.
 *
 * A value of boolean `false` will use the Certificate Authority file available on the system. A value of
 * boolean `true` will use the Certificate Authority provided by the SDK. Passing a file system path to a
 * Certificate Authority file (chmodded to `0755`) will use that.
 *
 * Leave this set to `false` if you're not sure.
 */
define('TW_CERTIFICATE_AUTHORITY', false);

/**
 * This option allows you to configure a preferred storage type to use for caching by default. This can
 * be changed later using the set_cache_config() method.
 *
 * Valid values are: `apc`, `xcache`, a DSN-style string such as `pdo.sqlite:/sqlite/cache.db`, a file
 * system path such as `./cache` or `/tmp/cache/`, or a serialized array for memcached configuration.
 *
 * serialize(array(
 * 	array(
 * 		'host' => '127.0.0.1',
 * 		'port' => '11211'
 * 	),
 * 	array(
 * 		'host' => '127.0.0.2',
 * 		'port' => '11211'
 * 	)
 * ));
 */
define('TW_DEFAULT_CACHE_CONFIG', '');

/**
 * 12-digit serial number taken from the Gemalto device used for Multi-Factor Authentication. Ignore this
 * if you're not using MFA.
 */
define('TW_MFA_SERIAL', '');

/**
 * Amazon CloudFront key-pair to use for signing private URLs. Found in the TW Security Credentials. This
 * can be set programmatically with <AmazonCloudFront::set_keypair_id()>.
 */
define('TW_CLOUDFRONT_KEYPAIR_ID', '');

/**
 * The contents of the *.pem private key that matches with the CloudFront key-pair ID. Found in the TW
 * Security Credentials. This can be set programmatically with <AmazonCloudFront::set_private_key()>.
 */
define('TW_CLOUDFRONT_PRIVATE_KEY_PEM', '');

/**
 * Set the value to true to enable autoloading for classes not prefixed with "Amazon" or "CF". If enabled,
 * load `sdk.class.php` last to avoid clobbering any other autoloaders.
 */
define('TW_ENABLE_EXTENSIONS', 'false');

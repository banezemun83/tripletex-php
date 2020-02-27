<?php
/**
 * LedgerAccount
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Tripletex API
 *
 * The Tripletex API is a **RESTful API**, which does not implement PATCH, but uses a PUT with optional fields.  **Actions** or commands are represented in our RESTful path with a prefixed `:`. Example: `/v2/hours/123/:approve`.  **Summaries** or aggregated results are represented in our RESTful path with a prefixed <code>&gt;</code>. Example: <code>/v2/hours/&gt;thisWeeksBillables</code>.  **\"requestID\"** is a key found in all responses in the header with the name `x-tlx-request-id`. For validation and error responses it is also in the response body. If additional log information is absolutely necessary, our support division can locate the key value.  **Download** the [swagger.json](/v2/swagger.json) file [OpenAPI Specification](https://github.com/OAI/OpenAPI-Specification) to [generate code](https://github.com/swagger-api/swagger-codegen). This document was generated from the Swagger JSON file.  **version:** This is a versioning number found on all DB records. If included, it will prevent your PUT/POST from overriding any updates to the record since your GET.  **Date & DateTime** follows the **ISO 8601** standard. Date: `YYYY-MM-DD`. DateTime: `YYYY-MM-DDThh:mm:ssZ`  **Sorting** is done by specifying a comma separated list, where a `-` prefix denotes descending. You can sort by sub object with the following format: `project.name, -date`.  **Searching:** is done by entering values in the optional fields for each API call. The values fall into the following categories: range, in, exact and like.  **Missing fields or even no response data** can occur because result objects and fields are filtered on authorization.  **See [FAQ](https://tripletex.no/execute/docViewer?articleId=906&language=0) for more additional information.**   ## Authentication: - **Tokens:** The Tripletex API uses 3 different tokens - **consumerToken**, **employeeToken** and **sessionToken**.  - **consumerToken** is a token provided to the consumer by Tripletex after the API 2.0 registration is completed.  - **employeeToken** is a token created by an administrator in your Tripletex account via the user settings and the tab \"API access\". Each employee token must be given a set of entitlements. [Read more here.](https://tripletex.no/execute/docViewer?articleId=853&language=0)  - **sessionToken** is the token from `/token/session/:create` which requires a consumerToken and an employeeToken created with the same consumer token, but not an authentication header. See how to create a sessionToken [here](https://tripletex.no/execute/docViewer?articleId=855&language=0). - The session token is used as the password in \"Basic Authentication Header\" for API calls.  - Use blank or `0` as username for accessing the account with regular employee token, or if a company owned employee token accesses <code>/company/&gt;withLoginAccess</code> or <code>/token/session/&gt;whoAmI</code>.  - For company owned employee tokens (accounting offices) the ID from <code>/company/&gt;withLoginAccess</code> can be used as username for accessing client accounts.  - If you need to create the header yourself use <code>Authorization: Basic &lt;base64encode('0:sessionToken')&gt;</code>.   ## Tags: - **[BETA]** This is a beta endpoint and can be subject to change. - **[DEPRECATED]** Deprecated means that we intend to remove/change this feature or capability in a future \"major\" API release. We therefore discourage all use of this feature/capability.  ## Fields: Use the `fields` parameter to specify which fields should be returned. This also supports fields from sub elements. Example values: - `project,activity,hours`  returns `{project:..., activity:...., hours:...}`. - just `project` returns `\"project\" : { \"id\": 12345, \"url\": \"tripletex.no/v2/projects/12345\"  }`. - `project(*)` returns `\"project\" : { \"id\": 12345 \"name\":\"ProjectName\" \"number.....startDate\": \"2013-01-07\" }`. - `project(name)` returns `\"project\" : { \"name\":\"ProjectName\" }`. - All elements and some subElements :  `*,activity(name),employee(*)`.  ## Changes: To get the changes for a resource, `changes` have to be explicitly specified as part of the `fields` parameter, e.g. `*,changes`. There are currently two types of change available:  - `CREATE` for when the resource was created - `UPDATE` for when the resource was updated  NOTE: For objects created prior to October 24th 2018 the list may be incomplete, but will always contain the CREATE and the last change (if the object has been changed after creation).  ## Rate limiting in each response header: Rate limiting is performed on the API calls for an employee for each API consumer. Status regarding the rate limit is returned as headers: - `X-Rate-Limit-Limit` - The number of allowed requests in the current period. - `X-Rate-Limit-Remaining` - The number of remaining requests. - `X-Rate-Limit-Reset` - The number of seconds left in the current period.  Once the rate limit is hit, all requests will return HTTP status code `429` for the remainder of the current period.   ## Response envelope: ```json {   \"fullResultSize\": ###,   \"from\": ###, // Paging starting from   \"count\": ###, // Paging count   \"versionDigest\": \"Hash of full result\",   \"values\": [...list of objects...] } {   \"value\": {...single object...} } ```   ## WebHook envelope: ```json {   \"subscriptionId\": ###,   \"event\": \"object.verb\", // As listed from /v2/event/   \"id\": ###, // Object id   \"value\": {... single object, null if object.deleted ...} } ```    ## Error/warning envelope: ```json {   \"status\": ###, // HTTP status code   \"code\": #####, // internal status code of event   \"message\": \"Basic feedback message in your language\",   \"link\": \"Link to doc\",   \"developerMessage\": \"More technical message\",   \"validationMessages\": [ // Will be null if Error     {       \"field\": \"Name of field\",       \"message\": \"Validation failure information\"     }   ],   \"requestId\": \"UUID used in any logs\" } ```   ## Status codes / Error codes: - **200 OK** - **201 Created** - From POSTs that create something new. - **204 No Content** - When there is no answer, ex: \"/:anAction\" or DELETE. - **400 Bad request** -   - **4000** Bad Request Exception   - **11000** Illegal Filter Exception   - **12000** Path Param Exception   - **24000**   Cryptography Exception - **401 Unauthorized** - When authentication is required and has failed or has not yet been provided   -  **3000** Authentication Exception - **403 Forbidden** - When AuthorisationManager says no.   -  **9000** Security Exception - **404 Not Found** - For content/IDs that does not exist.   -  **6000** Not Found Exception - **409 Conflict** - Such as an edit conflict between multiple simultaneous updates   -  **7000** Object Exists Exception   -  **8000** Revision Exception   - **10000** Locked Exception   - **14000** Duplicate entry - **422 Bad Request** - For Required fields or things like malformed payload.   - **15000** Value Validation Exception   - **16000** Mapping Exception   - **17000** Sorting Exception   - **18000** Validation Exception   - **21000** Param Exception   - **22000** Invalid JSON Exception   - **23000**   Result Set Too Large Exception - **429 Too Many Requests** - Request rate limit hit - **500 Internal Error** -  Unexpected condition was encountered and no more specific message is suitable   -  **1000** Exception
 *
 * OpenAPI spec version: 2.39.4-oas3
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.14
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * LedgerAccount Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class LedgerAccount implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'LedgerAccount';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'account' => '\Swagger\Client\Model\Account',
'sum_amount' => 'float',
'currency' => '\Swagger\Client\Model\Currency',
'sum_amount_currency' => 'float',
'opening_balance' => 'float',
'opening_balance_currency' => 'float',
'closing_balance' => 'float',
'closing_balance_currency' => 'float',
'postings' => '\Swagger\Client\Model\Posting[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'account' => null,
'sum_amount' => null,
'currency' => null,
'sum_amount_currency' => null,
'opening_balance' => null,
'opening_balance_currency' => null,
'closing_balance' => null,
'closing_balance_currency' => null,
'postings' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'account' => 'account',
'sum_amount' => 'sumAmount',
'currency' => 'currency',
'sum_amount_currency' => 'sumAmountCurrency',
'opening_balance' => 'openingBalance',
'opening_balance_currency' => 'openingBalanceCurrency',
'closing_balance' => 'closingBalance',
'closing_balance_currency' => 'closingBalanceCurrency',
'postings' => 'postings'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account' => 'setAccount',
'sum_amount' => 'setSumAmount',
'currency' => 'setCurrency',
'sum_amount_currency' => 'setSumAmountCurrency',
'opening_balance' => 'setOpeningBalance',
'opening_balance_currency' => 'setOpeningBalanceCurrency',
'closing_balance' => 'setClosingBalance',
'closing_balance_currency' => 'setClosingBalanceCurrency',
'postings' => 'setPostings'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account' => 'getAccount',
'sum_amount' => 'getSumAmount',
'currency' => 'getCurrency',
'sum_amount_currency' => 'getSumAmountCurrency',
'opening_balance' => 'getOpeningBalance',
'opening_balance_currency' => 'getOpeningBalanceCurrency',
'closing_balance' => 'getClosingBalance',
'closing_balance_currency' => 'getClosingBalanceCurrency',
'postings' => 'getPostings'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['account'] = isset($data['account']) ? $data['account'] : null;
        $this->container['sum_amount'] = isset($data['sum_amount']) ? $data['sum_amount'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['sum_amount_currency'] = isset($data['sum_amount_currency']) ? $data['sum_amount_currency'] : null;
        $this->container['opening_balance'] = isset($data['opening_balance']) ? $data['opening_balance'] : null;
        $this->container['opening_balance_currency'] = isset($data['opening_balance_currency']) ? $data['opening_balance_currency'] : null;
        $this->container['closing_balance'] = isset($data['closing_balance']) ? $data['closing_balance'] : null;
        $this->container['closing_balance_currency'] = isset($data['closing_balance_currency']) ? $data['closing_balance_currency'] : null;
        $this->container['postings'] = isset($data['postings']) ? $data['postings'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets account
     *
     * @return \Swagger\Client\Model\Account
     */
    public function getAccount()
    {
        return $this->container['account'];
    }

    /**
     * Sets account
     *
     * @param \Swagger\Client\Model\Account $account account
     *
     * @return $this
     */
    public function setAccount($account)
    {
        $this->container['account'] = $account;

        return $this;
    }

    /**
     * Gets sum_amount
     *
     * @return float
     */
    public function getSumAmount()
    {
        return $this->container['sum_amount'];
    }

    /**
     * Sets sum_amount
     *
     * @param float $sum_amount sum_amount
     *
     * @return $this
     */
    public function setSumAmount($sum_amount)
    {
        $this->container['sum_amount'] = $sum_amount;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return \Swagger\Client\Model\Currency
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param \Swagger\Client\Model\Currency $currency currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets sum_amount_currency
     *
     * @return float
     */
    public function getSumAmountCurrency()
    {
        return $this->container['sum_amount_currency'];
    }

    /**
     * Sets sum_amount_currency
     *
     * @param float $sum_amount_currency sum_amount_currency
     *
     * @return $this
     */
    public function setSumAmountCurrency($sum_amount_currency)
    {
        $this->container['sum_amount_currency'] = $sum_amount_currency;

        return $this;
    }

    /**
     * Gets opening_balance
     *
     * @return float
     */
    public function getOpeningBalance()
    {
        return $this->container['opening_balance'];
    }

    /**
     * Sets opening_balance
     *
     * @param float $opening_balance opening_balance
     *
     * @return $this
     */
    public function setOpeningBalance($opening_balance)
    {
        $this->container['opening_balance'] = $opening_balance;

        return $this;
    }

    /**
     * Gets opening_balance_currency
     *
     * @return float
     */
    public function getOpeningBalanceCurrency()
    {
        return $this->container['opening_balance_currency'];
    }

    /**
     * Sets opening_balance_currency
     *
     * @param float $opening_balance_currency opening_balance_currency
     *
     * @return $this
     */
    public function setOpeningBalanceCurrency($opening_balance_currency)
    {
        $this->container['opening_balance_currency'] = $opening_balance_currency;

        return $this;
    }

    /**
     * Gets closing_balance
     *
     * @return float
     */
    public function getClosingBalance()
    {
        return $this->container['closing_balance'];
    }

    /**
     * Sets closing_balance
     *
     * @param float $closing_balance closing_balance
     *
     * @return $this
     */
    public function setClosingBalance($closing_balance)
    {
        $this->container['closing_balance'] = $closing_balance;

        return $this;
    }

    /**
     * Gets closing_balance_currency
     *
     * @return float
     */
    public function getClosingBalanceCurrency()
    {
        return $this->container['closing_balance_currency'];
    }

    /**
     * Sets closing_balance_currency
     *
     * @param float $closing_balance_currency closing_balance_currency
     *
     * @return $this
     */
    public function setClosingBalanceCurrency($closing_balance_currency)
    {
        $this->container['closing_balance_currency'] = $closing_balance_currency;

        return $this;
    }

    /**
     * Gets postings
     *
     * @return \Swagger\Client\Model\Posting[]
     */
    public function getPostings()
    {
        return $this->container['postings'];
    }

    /**
     * Sets postings
     *
     * @param \Swagger\Client\Model\Posting[] $postings Link to postings on this account.
     *
     * @return $this
     */
    public function setPostings($postings)
    {
        $this->container['postings'] = $postings;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

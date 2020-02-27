<?php
/**
 * SalesForceOpportunity
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
 * SalesForceOpportunity Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SalesForceOpportunity implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SalesForceOpportunity';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'all_prices' => 'map[string,map[string,double]]',
'sum_startup_category1_users' => 'double',
'sum_service_category1_users' => 'double',
'list_price_category1_user_startup' => 'double',
'list_price_category1_user_service' => 'double',
'sum_startup' => 'double',
'sum_service' => 'double',
'sum_additional_services' => 'double',
'accountant_startup_provision' => 'double',
'accountant_monthly_provision' => 'double',
'no_of_users_prepaid' => 'int',
'no_of_users_included' => 'int'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'all_prices' => 'double',
'sum_startup_category1_users' => 'double',
'sum_service_category1_users' => 'double',
'list_price_category1_user_startup' => 'double',
'list_price_category1_user_service' => 'double',
'sum_startup' => 'double',
'sum_service' => 'double',
'sum_additional_services' => 'double',
'accountant_startup_provision' => 'double',
'accountant_monthly_provision' => 'double',
'no_of_users_prepaid' => 'int32',
'no_of_users_included' => 'int32'    ];

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
        'all_prices' => 'allPrices',
'sum_startup_category1_users' => 'sumStartupCategory1Users',
'sum_service_category1_users' => 'sumServiceCategory1Users',
'list_price_category1_user_startup' => 'listPriceCategory1UserStartup',
'list_price_category1_user_service' => 'listPriceCategory1UserService',
'sum_startup' => 'sumStartup',
'sum_service' => 'sumService',
'sum_additional_services' => 'sumAdditionalServices',
'accountant_startup_provision' => 'accountantStartupProvision',
'accountant_monthly_provision' => 'accountantMonthlyProvision',
'no_of_users_prepaid' => 'noOfUsersPrepaid',
'no_of_users_included' => 'noOfUsersIncluded'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'all_prices' => 'setAllPrices',
'sum_startup_category1_users' => 'setSumStartupCategory1Users',
'sum_service_category1_users' => 'setSumServiceCategory1Users',
'list_price_category1_user_startup' => 'setListPriceCategory1UserStartup',
'list_price_category1_user_service' => 'setListPriceCategory1UserService',
'sum_startup' => 'setSumStartup',
'sum_service' => 'setSumService',
'sum_additional_services' => 'setSumAdditionalServices',
'accountant_startup_provision' => 'setAccountantStartupProvision',
'accountant_monthly_provision' => 'setAccountantMonthlyProvision',
'no_of_users_prepaid' => 'setNoOfUsersPrepaid',
'no_of_users_included' => 'setNoOfUsersIncluded'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'all_prices' => 'getAllPrices',
'sum_startup_category1_users' => 'getSumStartupCategory1Users',
'sum_service_category1_users' => 'getSumServiceCategory1Users',
'list_price_category1_user_startup' => 'getListPriceCategory1UserStartup',
'list_price_category1_user_service' => 'getListPriceCategory1UserService',
'sum_startup' => 'getSumStartup',
'sum_service' => 'getSumService',
'sum_additional_services' => 'getSumAdditionalServices',
'accountant_startup_provision' => 'getAccountantStartupProvision',
'accountant_monthly_provision' => 'getAccountantMonthlyProvision',
'no_of_users_prepaid' => 'getNoOfUsersPrepaid',
'no_of_users_included' => 'getNoOfUsersIncluded'    ];

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
        $this->container['all_prices'] = isset($data['all_prices']) ? $data['all_prices'] : null;
        $this->container['sum_startup_category1_users'] = isset($data['sum_startup_category1_users']) ? $data['sum_startup_category1_users'] : null;
        $this->container['sum_service_category1_users'] = isset($data['sum_service_category1_users']) ? $data['sum_service_category1_users'] : null;
        $this->container['list_price_category1_user_startup'] = isset($data['list_price_category1_user_startup']) ? $data['list_price_category1_user_startup'] : null;
        $this->container['list_price_category1_user_service'] = isset($data['list_price_category1_user_service']) ? $data['list_price_category1_user_service'] : null;
        $this->container['sum_startup'] = isset($data['sum_startup']) ? $data['sum_startup'] : null;
        $this->container['sum_service'] = isset($data['sum_service']) ? $data['sum_service'] : null;
        $this->container['sum_additional_services'] = isset($data['sum_additional_services']) ? $data['sum_additional_services'] : null;
        $this->container['accountant_startup_provision'] = isset($data['accountant_startup_provision']) ? $data['accountant_startup_provision'] : null;
        $this->container['accountant_monthly_provision'] = isset($data['accountant_monthly_provision']) ? $data['accountant_monthly_provision'] : null;
        $this->container['no_of_users_prepaid'] = isset($data['no_of_users_prepaid']) ? $data['no_of_users_prepaid'] : null;
        $this->container['no_of_users_included'] = isset($data['no_of_users_included']) ? $data['no_of_users_included'] : null;
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
     * Gets all_prices
     *
     * @return map[string,map[string,double]]
     */
    public function getAllPrices()
    {
        return $this->container['all_prices'];
    }

    /**
     * Sets all_prices
     *
     * @param map[string,map[string,double]] $all_prices A nested map of all active sales modules. The key in the outer map is the sales module, whilest the inner map contains the different pricing types for the given sales module. A pricing type could be PER_USE(10).
     *
     * @return $this
     */
    public function setAllPrices($all_prices)
    {
        $this->container['all_prices'] = $all_prices;

        return $this;
    }

    /**
     * Gets sum_startup_category1_users
     *
     * @return double
     */
    public function getSumStartupCategory1Users()
    {
        return $this->container['sum_startup_category1_users'];
    }

    /**
     * Sets sum_startup_category1_users
     *
     * @param double $sum_startup_category1_users The total startup price for users of category 1.
     *
     * @return $this
     */
    public function setSumStartupCategory1Users($sum_startup_category1_users)
    {
        $this->container['sum_startup_category1_users'] = $sum_startup_category1_users;

        return $this;
    }

    /**
     * Gets sum_service_category1_users
     *
     * @return double
     */
    public function getSumServiceCategory1Users()
    {
        return $this->container['sum_service_category1_users'];
    }

    /**
     * Sets sum_service_category1_users
     *
     * @param double $sum_service_category1_users The total price per monthly price for users of category 1.
     *
     * @return $this
     */
    public function setSumServiceCategory1Users($sum_service_category1_users)
    {
        $this->container['sum_service_category1_users'] = $sum_service_category1_users;

        return $this;
    }

    /**
     * Gets list_price_category1_user_startup
     *
     * @return double
     */
    public function getListPriceCategory1UserStartup()
    {
        return $this->container['list_price_category1_user_startup'];
    }

    /**
     * Sets list_price_category1_user_startup
     *
     * @param double $list_price_category1_user_startup The startup list price per user.
     *
     * @return $this
     */
    public function setListPriceCategory1UserStartup($list_price_category1_user_startup)
    {
        $this->container['list_price_category1_user_startup'] = $list_price_category1_user_startup;

        return $this;
    }

    /**
     * Gets list_price_category1_user_service
     *
     * @return double
     */
    public function getListPriceCategory1UserService()
    {
        return $this->container['list_price_category1_user_service'];
    }

    /**
     * Sets list_price_category1_user_service
     *
     * @param double $list_price_category1_user_service The monthly list price per user.
     *
     * @return $this
     */
    public function setListPriceCategory1UserService($list_price_category1_user_service)
    {
        $this->container['list_price_category1_user_service'] = $list_price_category1_user_service;

        return $this;
    }

    /**
     * Gets sum_startup
     *
     * @return double
     */
    public function getSumStartup()
    {
        return $this->container['sum_startup'];
    }

    /**
     * Sets sum_startup
     *
     * @param double $sum_startup The startup price for the company.
     *
     * @return $this
     */
    public function setSumStartup($sum_startup)
    {
        $this->container['sum_startup'] = $sum_startup;

        return $this;
    }

    /**
     * Gets sum_service
     *
     * @return double
     */
    public function getSumService()
    {
        return $this->container['sum_service'];
    }

    /**
     * Sets sum_service
     *
     * @param double $sum_service The monthly price for the company.
     *
     * @return $this
     */
    public function setSumService($sum_service)
    {
        $this->container['sum_service'] = $sum_service;

        return $this;
    }

    /**
     * Gets sum_additional_services
     *
     * @return double
     */
    public function getSumAdditionalServices()
    {
        return $this->container['sum_additional_services'];
    }

    /**
     * Sets sum_additional_services
     *
     * @param double $sum_additional_services The total startup price for additional services.
     *
     * @return $this
     */
    public function setSumAdditionalServices($sum_additional_services)
    {
        $this->container['sum_additional_services'] = $sum_additional_services;

        return $this;
    }

    /**
     * Gets accountant_startup_provision
     *
     * @return double
     */
    public function getAccountantStartupProvision()
    {
        return $this->container['accountant_startup_provision'];
    }

    /**
     * Sets accountant_startup_provision
     *
     * @param double $accountant_startup_provision The initial provision for the accountant of the startup price (percentage)
     *
     * @return $this
     */
    public function setAccountantStartupProvision($accountant_startup_provision)
    {
        $this->container['accountant_startup_provision'] = $accountant_startup_provision;

        return $this;
    }

    /**
     * Gets accountant_monthly_provision
     *
     * @return double
     */
    public function getAccountantMonthlyProvision()
    {
        return $this->container['accountant_monthly_provision'];
    }

    /**
     * Sets accountant_monthly_provision
     *
     * @param double $accountant_monthly_provision The monthly provision for the accountant of the monthly price (percentage)
     *
     * @return $this
     */
    public function setAccountantMonthlyProvision($accountant_monthly_provision)
    {
        $this->container['accountant_monthly_provision'] = $accountant_monthly_provision;

        return $this;
    }

    /**
     * Gets no_of_users_prepaid
     *
     * @return int
     */
    public function getNoOfUsersPrepaid()
    {
        return $this->container['no_of_users_prepaid'];
    }

    /**
     * Sets no_of_users_prepaid
     *
     * @param int $no_of_users_prepaid The number of users prepaid when creating the company.
     *
     * @return $this
     */
    public function setNoOfUsersPrepaid($no_of_users_prepaid)
    {
        $this->container['no_of_users_prepaid'] = $no_of_users_prepaid;

        return $this;
    }

    /**
     * Gets no_of_users_included
     *
     * @return int
     */
    public function getNoOfUsersIncluded()
    {
        return $this->container['no_of_users_included'];
    }

    /**
     * Sets no_of_users_included
     *
     * @param int $no_of_users_included The number of users included for free in the purchased module.
     *
     * @return $this
     */
    public function setNoOfUsersIncluded($no_of_users_included)
    {
        $this->container['no_of_users_included'] = $no_of_users_included;

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

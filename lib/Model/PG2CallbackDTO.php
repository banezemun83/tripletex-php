<?php
/**
 * PG2CallbackDTO
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
 * PG2CallbackDTO Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PG2CallbackDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PG2CallbackDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'odpcompany_id' => 'int',
'odpcustomer_id' => 'int',
'pg_request_id' => 'string',
'tenant_id' => 'string',
'odp_customer_id' => 'int',
'odp_company_id' => 'int',
'auto_pay_key' => 'string',
'auto_pay_key_last_generated_date' => '\DateTime'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'odpcompany_id' => 'int32',
'odpcustomer_id' => 'int32',
'pg_request_id' => null,
'tenant_id' => null,
'odp_customer_id' => 'int32',
'odp_company_id' => 'int32',
'auto_pay_key' => null,
'auto_pay_key_last_generated_date' => 'date'    ];

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
        'odpcompany_id' => 'odpcompanyID',
'odpcustomer_id' => 'odpcustomerID',
'pg_request_id' => 'pgRequestId',
'tenant_id' => 'tenantId',
'odp_customer_id' => 'ODPCustomerID',
'odp_company_id' => 'ODPCompanyID',
'auto_pay_key' => 'autoPayKey',
'auto_pay_key_last_generated_date' => 'autoPayKeyLastGeneratedDate'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'odpcompany_id' => 'setOdpcompanyId',
'odpcustomer_id' => 'setOdpcustomerId',
'pg_request_id' => 'setPgRequestId',
'tenant_id' => 'setTenantId',
'odp_customer_id' => 'setOdpCustomerId',
'odp_company_id' => 'setOdpCompanyId',
'auto_pay_key' => 'setAutoPayKey',
'auto_pay_key_last_generated_date' => 'setAutoPayKeyLastGeneratedDate'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'odpcompany_id' => 'getOdpcompanyId',
'odpcustomer_id' => 'getOdpcustomerId',
'pg_request_id' => 'getPgRequestId',
'tenant_id' => 'getTenantId',
'odp_customer_id' => 'getOdpCustomerId',
'odp_company_id' => 'getOdpCompanyId',
'auto_pay_key' => 'getAutoPayKey',
'auto_pay_key_last_generated_date' => 'getAutoPayKeyLastGeneratedDate'    ];

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
        $this->container['odpcompany_id'] = isset($data['odpcompany_id']) ? $data['odpcompany_id'] : null;
        $this->container['odpcustomer_id'] = isset($data['odpcustomer_id']) ? $data['odpcustomer_id'] : null;
        $this->container['pg_request_id'] = isset($data['pg_request_id']) ? $data['pg_request_id'] : null;
        $this->container['tenant_id'] = isset($data['tenant_id']) ? $data['tenant_id'] : null;
        $this->container['odp_customer_id'] = isset($data['odp_customer_id']) ? $data['odp_customer_id'] : null;
        $this->container['odp_company_id'] = isset($data['odp_company_id']) ? $data['odp_company_id'] : null;
        $this->container['auto_pay_key'] = isset($data['auto_pay_key']) ? $data['auto_pay_key'] : null;
        $this->container['auto_pay_key_last_generated_date'] = isset($data['auto_pay_key_last_generated_date']) ? $data['auto_pay_key_last_generated_date'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['pg_request_id'] === null) {
            $invalidProperties[] = "'pg_request_id' can't be null";
        }
        if ($this->container['tenant_id'] === null) {
            $invalidProperties[] = "'tenant_id' can't be null";
        }
        if ($this->container['odp_customer_id'] === null) {
            $invalidProperties[] = "'odp_customer_id' can't be null";
        }
        if ($this->container['odp_company_id'] === null) {
            $invalidProperties[] = "'odp_company_id' can't be null";
        }
        if ($this->container['auto_pay_key'] === null) {
            $invalidProperties[] = "'auto_pay_key' can't be null";
        }
        if ($this->container['auto_pay_key_last_generated_date'] === null) {
            $invalidProperties[] = "'auto_pay_key_last_generated_date' can't be null";
        }
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
     * Gets odpcompany_id
     *
     * @return int
     */
    public function getOdpcompanyId()
    {
        return $this->container['odpcompany_id'];
    }

    /**
     * Sets odpcompany_id
     *
     * @param int $odpcompany_id odpcompany_id
     *
     * @return $this
     */
    public function setOdpcompanyId($odpcompany_id)
    {
        $this->container['odpcompany_id'] = $odpcompany_id;

        return $this;
    }

    /**
     * Gets odpcustomer_id
     *
     * @return int
     */
    public function getOdpcustomerId()
    {
        return $this->container['odpcustomer_id'];
    }

    /**
     * Sets odpcustomer_id
     *
     * @param int $odpcustomer_id odpcustomer_id
     *
     * @return $this
     */
    public function setOdpcustomerId($odpcustomer_id)
    {
        $this->container['odpcustomer_id'] = $odpcustomer_id;

        return $this;
    }

    /**
     * Gets pg_request_id
     *
     * @return string
     */
    public function getPgRequestId()
    {
        return $this->container['pg_request_id'];
    }

    /**
     * Sets pg_request_id
     *
     * @param string $pg_request_id pg_request_id
     *
     * @return $this
     */
    public function setPgRequestId($pg_request_id)
    {
        $this->container['pg_request_id'] = $pg_request_id;

        return $this;
    }

    /**
     * Gets tenant_id
     *
     * @return string
     */
    public function getTenantId()
    {
        return $this->container['tenant_id'];
    }

    /**
     * Sets tenant_id
     *
     * @param string $tenant_id tenant_id
     *
     * @return $this
     */
    public function setTenantId($tenant_id)
    {
        $this->container['tenant_id'] = $tenant_id;

        return $this;
    }

    /**
     * Gets odp_customer_id
     *
     * @return int
     */
    public function getOdpCustomerId()
    {
        return $this->container['odp_customer_id'];
    }

    /**
     * Sets odp_customer_id
     *
     * @param int $odp_customer_id odp_customer_id
     *
     * @return $this
     */
    public function setOdpCustomerId($odp_customer_id)
    {
        $this->container['odp_customer_id'] = $odp_customer_id;

        return $this;
    }

    /**
     * Gets odp_company_id
     *
     * @return int
     */
    public function getOdpCompanyId()
    {
        return $this->container['odp_company_id'];
    }

    /**
     * Sets odp_company_id
     *
     * @param int $odp_company_id odp_company_id
     *
     * @return $this
     */
    public function setOdpCompanyId($odp_company_id)
    {
        $this->container['odp_company_id'] = $odp_company_id;

        return $this;
    }

    /**
     * Gets auto_pay_key
     *
     * @return string
     */
    public function getAutoPayKey()
    {
        return $this->container['auto_pay_key'];
    }

    /**
     * Sets auto_pay_key
     *
     * @param string $auto_pay_key auto_pay_key
     *
     * @return $this
     */
    public function setAutoPayKey($auto_pay_key)
    {
        $this->container['auto_pay_key'] = $auto_pay_key;

        return $this;
    }

    /**
     * Gets auto_pay_key_last_generated_date
     *
     * @return \DateTime
     */
    public function getAutoPayKeyLastGeneratedDate()
    {
        return $this->container['auto_pay_key_last_generated_date'];
    }

    /**
     * Sets auto_pay_key_last_generated_date
     *
     * @param \DateTime $auto_pay_key_last_generated_date auto_pay_key_last_generated_date
     *
     * @return $this
     */
    public function setAutoPayKeyLastGeneratedDate($auto_pay_key_last_generated_date)
    {
        $this->container['auto_pay_key_last_generated_date'] = $auto_pay_key_last_generated_date;

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

<?php
/**
 * Employment
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
 * Employment Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Employment implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Employment';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
'version' => 'int',
'changes' => '\Swagger\Client\Model\Change[]',
'url' => 'string',
'employee' => '\Swagger\Client\Model\Employee',
'employment_id' => 'string',
'start_date' => 'string',
'end_date' => 'string',
'division' => '\Swagger\Client\Model\Division',
'last_salary_change_date' => 'string',
'no_employment_relationship' => 'bool',
'is_main_employer' => 'bool',
'tax_deduction_code' => 'string',
'employment_details' => '\Swagger\Client\Model\EmploymentDetails[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => 'int32',
'version' => 'int32',
'changes' => null,
'url' => null,
'employee' => null,
'employment_id' => null,
'start_date' => null,
'end_date' => null,
'division' => null,
'last_salary_change_date' => null,
'no_employment_relationship' => null,
'is_main_employer' => null,
'tax_deduction_code' => null,
'employment_details' => null    ];

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
        'id' => 'id',
'version' => 'version',
'changes' => 'changes',
'url' => 'url',
'employee' => 'employee',
'employment_id' => 'employmentId',
'start_date' => 'startDate',
'end_date' => 'endDate',
'division' => 'division',
'last_salary_change_date' => 'lastSalaryChangeDate',
'no_employment_relationship' => 'noEmploymentRelationship',
'is_main_employer' => 'isMainEmployer',
'tax_deduction_code' => 'taxDeductionCode',
'employment_details' => 'employmentDetails'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
'version' => 'setVersion',
'changes' => 'setChanges',
'url' => 'setUrl',
'employee' => 'setEmployee',
'employment_id' => 'setEmploymentId',
'start_date' => 'setStartDate',
'end_date' => 'setEndDate',
'division' => 'setDivision',
'last_salary_change_date' => 'setLastSalaryChangeDate',
'no_employment_relationship' => 'setNoEmploymentRelationship',
'is_main_employer' => 'setIsMainEmployer',
'tax_deduction_code' => 'setTaxDeductionCode',
'employment_details' => 'setEmploymentDetails'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
'version' => 'getVersion',
'changes' => 'getChanges',
'url' => 'getUrl',
'employee' => 'getEmployee',
'employment_id' => 'getEmploymentId',
'start_date' => 'getStartDate',
'end_date' => 'getEndDate',
'division' => 'getDivision',
'last_salary_change_date' => 'getLastSalaryChangeDate',
'no_employment_relationship' => 'getNoEmploymentRelationship',
'is_main_employer' => 'getIsMainEmployer',
'tax_deduction_code' => 'getTaxDeductionCode',
'employment_details' => 'getEmploymentDetails'    ];

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

    const TAX_DEDUCTION_CODE_LOENN_FRA_HOVEDARBEIDSGIVER = 'loennFraHovedarbeidsgiver';
const TAX_DEDUCTION_CODE_LOENN_FRA_BIARBEIDSGIVER = 'loennFraBiarbeidsgiver';
const TAX_DEDUCTION_CODE_PENSJON = 'pensjon';
const TAX_DEDUCTION_CODE_LOENN_TIL_UTENRIKSTJENESTEMANN = 'loennTilUtenrikstjenestemann';
const TAX_DEDUCTION_CODE_LOENN_KUN_TRYGDEAVGIFT_TIL_UTENLANDSK_BORGER = 'loennKunTrygdeavgiftTilUtenlandskBorger';
const TAX_DEDUCTION_CODE_LOENN_KUN_TRYGDEAVGIFT_TIL_UTENLANDSK_BORGER_SOM_GRENSEGJENGER = 'loennKunTrygdeavgiftTilUtenlandskBorgerSomGrensegjenger';
const TAX_DEDUCTION_CODE_INTRODUKSJONSSTOENAD = 'introduksjonsstoenad';
const TAX_DEDUCTION_CODE_UFOEREYTELSER_FRA_ANDRE = 'ufoereytelserFraAndre';
const TAX_DEDUCTION_CODE__EMPTY = 'EMPTY';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTaxDeductionCodeAllowableValues()
    {
        return [
            self::TAX_DEDUCTION_CODE_LOENN_FRA_HOVEDARBEIDSGIVER,
self::TAX_DEDUCTION_CODE_LOENN_FRA_BIARBEIDSGIVER,
self::TAX_DEDUCTION_CODE_PENSJON,
self::TAX_DEDUCTION_CODE_LOENN_TIL_UTENRIKSTJENESTEMANN,
self::TAX_DEDUCTION_CODE_LOENN_KUN_TRYGDEAVGIFT_TIL_UTENLANDSK_BORGER,
self::TAX_DEDUCTION_CODE_LOENN_KUN_TRYGDEAVGIFT_TIL_UTENLANDSK_BORGER_SOM_GRENSEGJENGER,
self::TAX_DEDUCTION_CODE_INTRODUKSJONSSTOENAD,
self::TAX_DEDUCTION_CODE_UFOEREYTELSER_FRA_ANDRE,
self::TAX_DEDUCTION_CODE__EMPTY,        ];
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['version'] = isset($data['version']) ? $data['version'] : null;
        $this->container['changes'] = isset($data['changes']) ? $data['changes'] : null;
        $this->container['url'] = isset($data['url']) ? $data['url'] : null;
        $this->container['employee'] = isset($data['employee']) ? $data['employee'] : null;
        $this->container['employment_id'] = isset($data['employment_id']) ? $data['employment_id'] : null;
        $this->container['start_date'] = isset($data['start_date']) ? $data['start_date'] : null;
        $this->container['end_date'] = isset($data['end_date']) ? $data['end_date'] : null;
        $this->container['division'] = isset($data['division']) ? $data['division'] : null;
        $this->container['last_salary_change_date'] = isset($data['last_salary_change_date']) ? $data['last_salary_change_date'] : null;
        $this->container['no_employment_relationship'] = isset($data['no_employment_relationship']) ? $data['no_employment_relationship'] : false;
        $this->container['is_main_employer'] = isset($data['is_main_employer']) ? $data['is_main_employer'] : false;
        $this->container['tax_deduction_code'] = isset($data['tax_deduction_code']) ? $data['tax_deduction_code'] : null;
        $this->container['employment_details'] = isset($data['employment_details']) ? $data['employment_details'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['start_date'] === null) {
            $invalidProperties[] = "'start_date' can't be null";
        }
        $allowedValues = $this->getTaxDeductionCodeAllowableValues();
        if (!is_null($this->container['tax_deduction_code']) && !in_array($this->container['tax_deduction_code'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'tax_deduction_code', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets version
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->container['version'];
    }

    /**
     * Sets version
     *
     * @param int $version version
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->container['version'] = $version;

        return $this;
    }

    /**
     * Gets changes
     *
     * @return \Swagger\Client\Model\Change[]
     */
    public function getChanges()
    {
        return $this->container['changes'];
    }

    /**
     * Sets changes
     *
     * @param \Swagger\Client\Model\Change[] $changes changes
     *
     * @return $this
     */
    public function setChanges($changes)
    {
        $this->container['changes'] = $changes;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets employee
     *
     * @return \Swagger\Client\Model\Employee
     */
    public function getEmployee()
    {
        return $this->container['employee'];
    }

    /**
     * Sets employee
     *
     * @param \Swagger\Client\Model\Employee $employee employee
     *
     * @return $this
     */
    public function setEmployee($employee)
    {
        $this->container['employee'] = $employee;

        return $this;
    }

    /**
     * Gets employment_id
     *
     * @return string
     */
    public function getEmploymentId()
    {
        return $this->container['employment_id'];
    }

    /**
     * Sets employment_id
     *
     * @param string $employment_id Existing employment ID used by the current accounting system
     *
     * @return $this
     */
    public function setEmploymentId($employment_id)
    {
        $this->container['employment_id'] = $employment_id;

        return $this;
    }

    /**
     * Gets start_date
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->container['start_date'];
    }

    /**
     * Sets start_date
     *
     * @param string $start_date start_date
     *
     * @return $this
     */
    public function setStartDate($start_date)
    {
        $this->container['start_date'] = $start_date;

        return $this;
    }

    /**
     * Gets end_date
     *
     * @return string
     */
    public function getEndDate()
    {
        return $this->container['end_date'];
    }

    /**
     * Sets end_date
     *
     * @param string $end_date end_date
     *
     * @return $this
     */
    public function setEndDate($end_date)
    {
        $this->container['end_date'] = $end_date;

        return $this;
    }

    /**
     * Gets division
     *
     * @return \Swagger\Client\Model\Division
     */
    public function getDivision()
    {
        return $this->container['division'];
    }

    /**
     * Sets division
     *
     * @param \Swagger\Client\Model\Division $division division
     *
     * @return $this
     */
    public function setDivision($division)
    {
        $this->container['division'] = $division;

        return $this;
    }

    /**
     * Gets last_salary_change_date
     *
     * @return string
     */
    public function getLastSalaryChangeDate()
    {
        return $this->container['last_salary_change_date'];
    }

    /**
     * Sets last_salary_change_date
     *
     * @param string $last_salary_change_date last_salary_change_date
     *
     * @return $this
     */
    public function setLastSalaryChangeDate($last_salary_change_date)
    {
        $this->container['last_salary_change_date'] = $last_salary_change_date;

        return $this;
    }

    /**
     * Gets no_employment_relationship
     *
     * @return bool
     */
    public function getNoEmploymentRelationship()
    {
        return $this->container['no_employment_relationship'];
    }

    /**
     * Sets no_employment_relationship
     *
     * @param bool $no_employment_relationship Activate pensions and other benefits with no employment relationship.
     *
     * @return $this
     */
    public function setNoEmploymentRelationship($no_employment_relationship)
    {
        $this->container['no_employment_relationship'] = $no_employment_relationship;

        return $this;
    }

    /**
     * Gets is_main_employer
     *
     * @return bool
     */
    public function getIsMainEmployer()
    {
        return $this->container['is_main_employer'];
    }

    /**
     * Sets is_main_employer
     *
     * @param bool $is_main_employer Determines if company is main employer for the employee. Default value is true.<br />If true and deduction code is NOT send, value of tax deduction code will be set to loennFraHovedarbeidsgiver <br /> If false and deduction code is NOT send, value of tax deduction code will be set to loennFraBiarbeidsgiver.<br /> For other types of Tax Deduction Codes, isMainEmployer does not influence anything.
     *
     * @return $this
     */
    public function setIsMainEmployer($is_main_employer)
    {
        $this->container['is_main_employer'] = $is_main_employer;

        return $this;
    }

    /**
     * Gets tax_deduction_code
     *
     * @return string
     */
    public function getTaxDeductionCode()
    {
        return $this->container['tax_deduction_code'];
    }

    /**
     * Sets tax_deduction_code
     *
     * @param string $tax_deduction_code EMPTY - represents that a tax deduction code is not set on the employment. It is illegal to set the field to this value.  <br /> Default value of this field is loennFraHovedarbeidsgiver or loennFraBiarbeidsgiver depending on boolean isMainEmployer
     *
     * @return $this
     */
    public function setTaxDeductionCode($tax_deduction_code)
    {
        $allowedValues = $this->getTaxDeductionCodeAllowableValues();
        if (!is_null($tax_deduction_code) && !in_array($tax_deduction_code, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'tax_deduction_code', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['tax_deduction_code'] = $tax_deduction_code;

        return $this;
    }

    /**
     * Gets employment_details
     *
     * @return \Swagger\Client\Model\EmploymentDetails[]
     */
    public function getEmploymentDetails()
    {
        return $this->container['employment_details'];
    }

    /**
     * Sets employment_details
     *
     * @param \Swagger\Client\Model\EmploymentDetails[] $employment_details Employment types tied to the employment
     *
     * @return $this
     */
    public function setEmploymentDetails($employment_details)
    {
        $this->container['employment_details'] = $employment_details;

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

<?php
/**
 * Project
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
 * Project Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Project implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Project';

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
'name' => 'string',
'number' => 'string',
'display_name' => 'string',
'description' => 'string',
'project_manager' => '\Swagger\Client\Model\Employee',
'department' => '\Swagger\Client\Model\Department',
'main_project' => '\Swagger\Client\Model\Project',
'start_date' => 'string',
'end_date' => 'string',
'customer' => '\Swagger\Client\Model\Customer',
'is_closed' => 'bool',
'is_ready_for_invoicing' => 'bool',
'is_internal' => 'bool',
'is_offer' => 'bool',
'is_fixed_price' => 'bool',
'project_category' => '\Swagger\Client\Model\ProjectCategory',
'delivery_address' => '\Swagger\Client\Model\DeliveryAddress',
'display_name_format' => 'string',
'external_accounts_number' => 'string',
'discount_percentage' => 'float',
'extra_percent_order_lines' => 'float',
'vat_type' => '\Swagger\Client\Model\VatType',
'fixedprice' => 'float',
'contribution_margin_percent' => 'float',
'number_of_sub_projects' => 'int',
'number_of_project_participants' => 'int',
'order_lines' => '\Swagger\Client\Model\ProjectOrderLine[]',
'currency' => '\Swagger\Client\Model\Currency',
'mark_up_order_lines' => 'float',
'mark_up_fees_earned' => 'float',
'is_price_ceiling' => 'bool',
'price_ceiling_amount' => 'float',
'project_hourly_rates' => '\Swagger\Client\Model\ProjectHourlyRate[]',
'for_participants_only' => 'bool',
'participants' => '\Swagger\Client\Model\ProjectParticipant[]',
'contact' => '\Swagger\Client\Model\Contact',
'invoicing_plan' => '\Swagger\Client\Model\Invoice[]',
'preliminary_invoice' => '\Swagger\Client\Model\Invoice',
'general_project_activities_per_project_only' => 'bool',
'project_activities' => '\Swagger\Client\Model\ProjectActivity[]'    ];

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
'name' => null,
'number' => null,
'display_name' => null,
'description' => null,
'project_manager' => null,
'department' => null,
'main_project' => null,
'start_date' => null,
'end_date' => null,
'customer' => null,
'is_closed' => null,
'is_ready_for_invoicing' => null,
'is_internal' => null,
'is_offer' => null,
'is_fixed_price' => null,
'project_category' => null,
'delivery_address' => null,
'display_name_format' => null,
'external_accounts_number' => null,
'discount_percentage' => null,
'extra_percent_order_lines' => null,
'vat_type' => null,
'fixedprice' => null,
'contribution_margin_percent' => null,
'number_of_sub_projects' => 'int32',
'number_of_project_participants' => 'int32',
'order_lines' => null,
'currency' => null,
'mark_up_order_lines' => null,
'mark_up_fees_earned' => null,
'is_price_ceiling' => null,
'price_ceiling_amount' => null,
'project_hourly_rates' => null,
'for_participants_only' => null,
'participants' => null,
'contact' => null,
'invoicing_plan' => null,
'preliminary_invoice' => null,
'general_project_activities_per_project_only' => null,
'project_activities' => null    ];

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
'name' => 'name',
'number' => 'number',
'display_name' => 'displayName',
'description' => 'description',
'project_manager' => 'projectManager',
'department' => 'department',
'main_project' => 'mainProject',
'start_date' => 'startDate',
'end_date' => 'endDate',
'customer' => 'customer',
'is_closed' => 'isClosed',
'is_ready_for_invoicing' => 'isReadyForInvoicing',
'is_internal' => 'isInternal',
'is_offer' => 'isOffer',
'is_fixed_price' => 'isFixedPrice',
'project_category' => 'projectCategory',
'delivery_address' => 'deliveryAddress',
'display_name_format' => 'displayNameFormat',
'external_accounts_number' => 'externalAccountsNumber',
'discount_percentage' => 'discountPercentage',
'extra_percent_order_lines' => 'extraPercentOrderLines',
'vat_type' => 'vatType',
'fixedprice' => 'fixedprice',
'contribution_margin_percent' => 'contributionMarginPercent',
'number_of_sub_projects' => 'numberOfSubProjects',
'number_of_project_participants' => 'numberOfProjectParticipants',
'order_lines' => 'orderLines',
'currency' => 'currency',
'mark_up_order_lines' => 'markUpOrderLines',
'mark_up_fees_earned' => 'markUpFeesEarned',
'is_price_ceiling' => 'isPriceCeiling',
'price_ceiling_amount' => 'priceCeilingAmount',
'project_hourly_rates' => 'projectHourlyRates',
'for_participants_only' => 'forParticipantsOnly',
'participants' => 'participants',
'contact' => 'contact',
'invoicing_plan' => 'invoicingPlan',
'preliminary_invoice' => 'preliminaryInvoice',
'general_project_activities_per_project_only' => 'generalProjectActivitiesPerProjectOnly',
'project_activities' => 'projectActivities'    ];

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
'name' => 'setName',
'number' => 'setNumber',
'display_name' => 'setDisplayName',
'description' => 'setDescription',
'project_manager' => 'setProjectManager',
'department' => 'setDepartment',
'main_project' => 'setMainProject',
'start_date' => 'setStartDate',
'end_date' => 'setEndDate',
'customer' => 'setCustomer',
'is_closed' => 'setIsClosed',
'is_ready_for_invoicing' => 'setIsReadyForInvoicing',
'is_internal' => 'setIsInternal',
'is_offer' => 'setIsOffer',
'is_fixed_price' => 'setIsFixedPrice',
'project_category' => 'setProjectCategory',
'delivery_address' => 'setDeliveryAddress',
'display_name_format' => 'setDisplayNameFormat',
'external_accounts_number' => 'setExternalAccountsNumber',
'discount_percentage' => 'setDiscountPercentage',
'extra_percent_order_lines' => 'setExtraPercentOrderLines',
'vat_type' => 'setVatType',
'fixedprice' => 'setFixedprice',
'contribution_margin_percent' => 'setContributionMarginPercent',
'number_of_sub_projects' => 'setNumberOfSubProjects',
'number_of_project_participants' => 'setNumberOfProjectParticipants',
'order_lines' => 'setOrderLines',
'currency' => 'setCurrency',
'mark_up_order_lines' => 'setMarkUpOrderLines',
'mark_up_fees_earned' => 'setMarkUpFeesEarned',
'is_price_ceiling' => 'setIsPriceCeiling',
'price_ceiling_amount' => 'setPriceCeilingAmount',
'project_hourly_rates' => 'setProjectHourlyRates',
'for_participants_only' => 'setForParticipantsOnly',
'participants' => 'setParticipants',
'contact' => 'setContact',
'invoicing_plan' => 'setInvoicingPlan',
'preliminary_invoice' => 'setPreliminaryInvoice',
'general_project_activities_per_project_only' => 'setGeneralProjectActivitiesPerProjectOnly',
'project_activities' => 'setProjectActivities'    ];

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
'name' => 'getName',
'number' => 'getNumber',
'display_name' => 'getDisplayName',
'description' => 'getDescription',
'project_manager' => 'getProjectManager',
'department' => 'getDepartment',
'main_project' => 'getMainProject',
'start_date' => 'getStartDate',
'end_date' => 'getEndDate',
'customer' => 'getCustomer',
'is_closed' => 'getIsClosed',
'is_ready_for_invoicing' => 'getIsReadyForInvoicing',
'is_internal' => 'getIsInternal',
'is_offer' => 'getIsOffer',
'is_fixed_price' => 'getIsFixedPrice',
'project_category' => 'getProjectCategory',
'delivery_address' => 'getDeliveryAddress',
'display_name_format' => 'getDisplayNameFormat',
'external_accounts_number' => 'getExternalAccountsNumber',
'discount_percentage' => 'getDiscountPercentage',
'extra_percent_order_lines' => 'getExtraPercentOrderLines',
'vat_type' => 'getVatType',
'fixedprice' => 'getFixedprice',
'contribution_margin_percent' => 'getContributionMarginPercent',
'number_of_sub_projects' => 'getNumberOfSubProjects',
'number_of_project_participants' => 'getNumberOfProjectParticipants',
'order_lines' => 'getOrderLines',
'currency' => 'getCurrency',
'mark_up_order_lines' => 'getMarkUpOrderLines',
'mark_up_fees_earned' => 'getMarkUpFeesEarned',
'is_price_ceiling' => 'getIsPriceCeiling',
'price_ceiling_amount' => 'getPriceCeilingAmount',
'project_hourly_rates' => 'getProjectHourlyRates',
'for_participants_only' => 'getForParticipantsOnly',
'participants' => 'getParticipants',
'contact' => 'getContact',
'invoicing_plan' => 'getInvoicingPlan',
'preliminary_invoice' => 'getPreliminaryInvoice',
'general_project_activities_per_project_only' => 'getGeneralProjectActivitiesPerProjectOnly',
'project_activities' => 'getProjectActivities'    ];

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

    const DISPLAY_NAME_FORMAT_STANDARD = 'NAME_STANDARD';
const DISPLAY_NAME_FORMAT_INCL_CUSTOMER_NAME = 'NAME_INCL_CUSTOMER_NAME';
const DISPLAY_NAME_FORMAT_INCL_PARENT_NAME = 'NAME_INCL_PARENT_NAME';
const DISPLAY_NAME_FORMAT_INCL_PARENT_NUMBER = 'NAME_INCL_PARENT_NUMBER';
const DISPLAY_NAME_FORMAT_INCL_PARENT_NAME_AND_NUMBER = 'NAME_INCL_PARENT_NAME_AND_NUMBER';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDisplayNameFormatAllowableValues()
    {
        return [
            self::DISPLAY_NAME_FORMAT_STANDARD,
self::DISPLAY_NAME_FORMAT_INCL_CUSTOMER_NAME,
self::DISPLAY_NAME_FORMAT_INCL_PARENT_NAME,
self::DISPLAY_NAME_FORMAT_INCL_PARENT_NUMBER,
self::DISPLAY_NAME_FORMAT_INCL_PARENT_NAME_AND_NUMBER,        ];
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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['number'] = isset($data['number']) ? $data['number'] : null;
        $this->container['display_name'] = isset($data['display_name']) ? $data['display_name'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['project_manager'] = isset($data['project_manager']) ? $data['project_manager'] : null;
        $this->container['department'] = isset($data['department']) ? $data['department'] : null;
        $this->container['main_project'] = isset($data['main_project']) ? $data['main_project'] : null;
        $this->container['start_date'] = isset($data['start_date']) ? $data['start_date'] : null;
        $this->container['end_date'] = isset($data['end_date']) ? $data['end_date'] : null;
        $this->container['customer'] = isset($data['customer']) ? $data['customer'] : null;
        $this->container['is_closed'] = isset($data['is_closed']) ? $data['is_closed'] : false;
        $this->container['is_ready_for_invoicing'] = isset($data['is_ready_for_invoicing']) ? $data['is_ready_for_invoicing'] : false;
        $this->container['is_internal'] = isset($data['is_internal']) ? $data['is_internal'] : false;
        $this->container['is_offer'] = isset($data['is_offer']) ? $data['is_offer'] : false;
        $this->container['is_fixed_price'] = isset($data['is_fixed_price']) ? $data['is_fixed_price'] : false;
        $this->container['project_category'] = isset($data['project_category']) ? $data['project_category'] : null;
        $this->container['delivery_address'] = isset($data['delivery_address']) ? $data['delivery_address'] : null;
        $this->container['display_name_format'] = isset($data['display_name_format']) ? $data['display_name_format'] : null;
        $this->container['external_accounts_number'] = isset($data['external_accounts_number']) ? $data['external_accounts_number'] : null;
        $this->container['discount_percentage'] = isset($data['discount_percentage']) ? $data['discount_percentage'] : null;
        $this->container['extra_percent_order_lines'] = isset($data['extra_percent_order_lines']) ? $data['extra_percent_order_lines'] : null;
        $this->container['vat_type'] = isset($data['vat_type']) ? $data['vat_type'] : null;
        $this->container['fixedprice'] = isset($data['fixedprice']) ? $data['fixedprice'] : null;
        $this->container['contribution_margin_percent'] = isset($data['contribution_margin_percent']) ? $data['contribution_margin_percent'] : null;
        $this->container['number_of_sub_projects'] = isset($data['number_of_sub_projects']) ? $data['number_of_sub_projects'] : null;
        $this->container['number_of_project_participants'] = isset($data['number_of_project_participants']) ? $data['number_of_project_participants'] : null;
        $this->container['order_lines'] = isset($data['order_lines']) ? $data['order_lines'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['mark_up_order_lines'] = isset($data['mark_up_order_lines']) ? $data['mark_up_order_lines'] : null;
        $this->container['mark_up_fees_earned'] = isset($data['mark_up_fees_earned']) ? $data['mark_up_fees_earned'] : null;
        $this->container['is_price_ceiling'] = isset($data['is_price_ceiling']) ? $data['is_price_ceiling'] : false;
        $this->container['price_ceiling_amount'] = isset($data['price_ceiling_amount']) ? $data['price_ceiling_amount'] : null;
        $this->container['project_hourly_rates'] = isset($data['project_hourly_rates']) ? $data['project_hourly_rates'] : null;
        $this->container['for_participants_only'] = isset($data['for_participants_only']) ? $data['for_participants_only'] : false;
        $this->container['participants'] = isset($data['participants']) ? $data['participants'] : null;
        $this->container['contact'] = isset($data['contact']) ? $data['contact'] : null;
        $this->container['invoicing_plan'] = isset($data['invoicing_plan']) ? $data['invoicing_plan'] : null;
        $this->container['preliminary_invoice'] = isset($data['preliminary_invoice']) ? $data['preliminary_invoice'] : null;
        $this->container['general_project_activities_per_project_only'] = isset($data['general_project_activities_per_project_only']) ? $data['general_project_activities_per_project_only'] : false;
        $this->container['project_activities'] = isset($data['project_activities']) ? $data['project_activities'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['project_manager'] === null) {
            $invalidProperties[] = "'project_manager' can't be null";
        }
        if ($this->container['start_date'] === null) {
            $invalidProperties[] = "'start_date' can't be null";
        }
        if ($this->container['is_internal'] === null) {
            $invalidProperties[] = "'is_internal' can't be null";
        }
        $allowedValues = $this->getDisplayNameFormatAllowableValues();
        if (!is_null($this->container['display_name_format']) && !in_array($this->container['display_name_format'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'display_name_format', must be one of '%s'",
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
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->container['number'];
    }

    /**
     * Sets number
     *
     * @param string $number number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->container['number'] = $number;

        return $this;
    }

    /**
     * Gets display_name
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->container['display_name'];
    }

    /**
     * Sets display_name
     *
     * @param string $display_name display_name
     *
     * @return $this
     */
    public function setDisplayName($display_name)
    {
        $this->container['display_name'] = $display_name;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets project_manager
     *
     * @return \Swagger\Client\Model\Employee
     */
    public function getProjectManager()
    {
        return $this->container['project_manager'];
    }

    /**
     * Sets project_manager
     *
     * @param \Swagger\Client\Model\Employee $project_manager project_manager
     *
     * @return $this
     */
    public function setProjectManager($project_manager)
    {
        $this->container['project_manager'] = $project_manager;

        return $this;
    }

    /**
     * Gets department
     *
     * @return \Swagger\Client\Model\Department
     */
    public function getDepartment()
    {
        return $this->container['department'];
    }

    /**
     * Sets department
     *
     * @param \Swagger\Client\Model\Department $department department
     *
     * @return $this
     */
    public function setDepartment($department)
    {
        $this->container['department'] = $department;

        return $this;
    }

    /**
     * Gets main_project
     *
     * @return \Swagger\Client\Model\Project
     */
    public function getMainProject()
    {
        return $this->container['main_project'];
    }

    /**
     * Sets main_project
     *
     * @param \Swagger\Client\Model\Project $main_project main_project
     *
     * @return $this
     */
    public function setMainProject($main_project)
    {
        $this->container['main_project'] = $main_project;

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
     * Gets customer
     *
     * @return \Swagger\Client\Model\Customer
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     *
     * @param \Swagger\Client\Model\Customer $customer customer
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->container['customer'] = $customer;

        return $this;
    }

    /**
     * Gets is_closed
     *
     * @return bool
     */
    public function getIsClosed()
    {
        return $this->container['is_closed'];
    }

    /**
     * Sets is_closed
     *
     * @param bool $is_closed is_closed
     *
     * @return $this
     */
    public function setIsClosed($is_closed)
    {
        $this->container['is_closed'] = $is_closed;

        return $this;
    }

    /**
     * Gets is_ready_for_invoicing
     *
     * @return bool
     */
    public function getIsReadyForInvoicing()
    {
        return $this->container['is_ready_for_invoicing'];
    }

    /**
     * Sets is_ready_for_invoicing
     *
     * @param bool $is_ready_for_invoicing is_ready_for_invoicing
     *
     * @return $this
     */
    public function setIsReadyForInvoicing($is_ready_for_invoicing)
    {
        $this->container['is_ready_for_invoicing'] = $is_ready_for_invoicing;

        return $this;
    }

    /**
     * Gets is_internal
     *
     * @return bool
     */
    public function getIsInternal()
    {
        return $this->container['is_internal'];
    }

    /**
     * Sets is_internal
     *
     * @param bool $is_internal is_internal
     *
     * @return $this
     */
    public function setIsInternal($is_internal)
    {
        $this->container['is_internal'] = $is_internal;

        return $this;
    }

    /**
     * Gets is_offer
     *
     * @return bool
     */
    public function getIsOffer()
    {
        return $this->container['is_offer'];
    }

    /**
     * Sets is_offer
     *
     * @param bool $is_offer is_offer
     *
     * @return $this
     */
    public function setIsOffer($is_offer)
    {
        $this->container['is_offer'] = $is_offer;

        return $this;
    }

    /**
     * Gets is_fixed_price
     *
     * @return bool
     */
    public function getIsFixedPrice()
    {
        return $this->container['is_fixed_price'];
    }

    /**
     * Sets is_fixed_price
     *
     * @param bool $is_fixed_price Project is fixed price if set to true, hourly rate if set to false.
     *
     * @return $this
     */
    public function setIsFixedPrice($is_fixed_price)
    {
        $this->container['is_fixed_price'] = $is_fixed_price;

        return $this;
    }

    /**
     * Gets project_category
     *
     * @return \Swagger\Client\Model\ProjectCategory
     */
    public function getProjectCategory()
    {
        return $this->container['project_category'];
    }

    /**
     * Sets project_category
     *
     * @param \Swagger\Client\Model\ProjectCategory $project_category project_category
     *
     * @return $this
     */
    public function setProjectCategory($project_category)
    {
        $this->container['project_category'] = $project_category;

        return $this;
    }

    /**
     * Gets delivery_address
     *
     * @return \Swagger\Client\Model\DeliveryAddress
     */
    public function getDeliveryAddress()
    {
        return $this->container['delivery_address'];
    }

    /**
     * Sets delivery_address
     *
     * @param \Swagger\Client\Model\DeliveryAddress $delivery_address delivery_address
     *
     * @return $this
     */
    public function setDeliveryAddress($delivery_address)
    {
        $this->container['delivery_address'] = $delivery_address;

        return $this;
    }

    /**
     * Gets display_name_format
     *
     * @return string
     */
    public function getDisplayNameFormat()
    {
        return $this->container['display_name_format'];
    }

    /**
     * Sets display_name_format
     *
     * @param string $display_name_format Defines project name presentation in overviews.
     *
     * @return $this
     */
    public function setDisplayNameFormat($display_name_format)
    {
        $allowedValues = $this->getDisplayNameFormatAllowableValues();
        if (!is_null($display_name_format) && !in_array($display_name_format, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'display_name_format', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['display_name_format'] = $display_name_format;

        return $this;
    }

    /**
     * Gets external_accounts_number
     *
     * @return string
     */
    public function getExternalAccountsNumber()
    {
        return $this->container['external_accounts_number'];
    }

    /**
     * Sets external_accounts_number
     *
     * @param string $external_accounts_number external_accounts_number
     *
     * @return $this
     */
    public function setExternalAccountsNumber($external_accounts_number)
    {
        $this->container['external_accounts_number'] = $external_accounts_number;

        return $this;
    }

    /**
     * Gets discount_percentage
     *
     * @return float
     */
    public function getDiscountPercentage()
    {
        return $this->container['discount_percentage'];
    }

    /**
     * Sets discount_percentage
     *
     * @param float $discount_percentage Project discount percentage.
     *
     * @return $this
     */
    public function setDiscountPercentage($discount_percentage)
    {
        $this->container['discount_percentage'] = $discount_percentage;

        return $this;
    }

    /**
     * Gets extra_percent_order_lines
     *
     * @return float
     */
    public function getExtraPercentOrderLines()
    {
        return $this->container['extra_percent_order_lines'];
    }

    /**
     * Sets extra_percent_order_lines
     *
     * @param float $extra_percent_order_lines Project markup percentage.
     *
     * @return $this
     */
    public function setExtraPercentOrderLines($extra_percent_order_lines)
    {
        $this->container['extra_percent_order_lines'] = $extra_percent_order_lines;

        return $this;
    }

    /**
     * Gets vat_type
     *
     * @return \Swagger\Client\Model\VatType
     */
    public function getVatType()
    {
        return $this->container['vat_type'];
    }

    /**
     * Sets vat_type
     *
     * @param \Swagger\Client\Model\VatType $vat_type vat_type
     *
     * @return $this
     */
    public function setVatType($vat_type)
    {
        $this->container['vat_type'] = $vat_type;

        return $this;
    }

    /**
     * Gets fixedprice
     *
     * @return float
     */
    public function getFixedprice()
    {
        return $this->container['fixedprice'];
    }

    /**
     * Sets fixedprice
     *
     * @param float $fixedprice Fixed price amount, in the project's currency.
     *
     * @return $this
     */
    public function setFixedprice($fixedprice)
    {
        $this->container['fixedprice'] = $fixedprice;

        return $this;
    }

    /**
     * Gets contribution_margin_percent
     *
     * @return float
     */
    public function getContributionMarginPercent()
    {
        return $this->container['contribution_margin_percent'];
    }

    /**
     * Sets contribution_margin_percent
     *
     * @param float $contribution_margin_percent contribution_margin_percent
     *
     * @return $this
     */
    public function setContributionMarginPercent($contribution_margin_percent)
    {
        $this->container['contribution_margin_percent'] = $contribution_margin_percent;

        return $this;
    }

    /**
     * Gets number_of_sub_projects
     *
     * @return int
     */
    public function getNumberOfSubProjects()
    {
        return $this->container['number_of_sub_projects'];
    }

    /**
     * Sets number_of_sub_projects
     *
     * @param int $number_of_sub_projects number_of_sub_projects
     *
     * @return $this
     */
    public function setNumberOfSubProjects($number_of_sub_projects)
    {
        $this->container['number_of_sub_projects'] = $number_of_sub_projects;

        return $this;
    }

    /**
     * Gets number_of_project_participants
     *
     * @return int
     */
    public function getNumberOfProjectParticipants()
    {
        return $this->container['number_of_project_participants'];
    }

    /**
     * Sets number_of_project_participants
     *
     * @param int $number_of_project_participants number_of_project_participants
     *
     * @return $this
     */
    public function setNumberOfProjectParticipants($number_of_project_participants)
    {
        $this->container['number_of_project_participants'] = $number_of_project_participants;

        return $this;
    }

    /**
     * Gets order_lines
     *
     * @return \Swagger\Client\Model\ProjectOrderLine[]
     */
    public function getOrderLines()
    {
        return $this->container['order_lines'];
    }

    /**
     * Sets order_lines
     *
     * @param \Swagger\Client\Model\ProjectOrderLine[] $order_lines Order lines tied to the order
     *
     * @return $this
     */
    public function setOrderLines($order_lines)
    {
        $this->container['order_lines'] = $order_lines;

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
     * Gets mark_up_order_lines
     *
     * @return float
     */
    public function getMarkUpOrderLines()
    {
        return $this->container['mark_up_order_lines'];
    }

    /**
     * Sets mark_up_order_lines
     *
     * @param float $mark_up_order_lines Set mark-up (%) for order lines.
     *
     * @return $this
     */
    public function setMarkUpOrderLines($mark_up_order_lines)
    {
        $this->container['mark_up_order_lines'] = $mark_up_order_lines;

        return $this;
    }

    /**
     * Gets mark_up_fees_earned
     *
     * @return float
     */
    public function getMarkUpFeesEarned()
    {
        return $this->container['mark_up_fees_earned'];
    }

    /**
     * Sets mark_up_fees_earned
     *
     * @param float $mark_up_fees_earned Set mark-up (%) for fees earned.
     *
     * @return $this
     */
    public function setMarkUpFeesEarned($mark_up_fees_earned)
    {
        $this->container['mark_up_fees_earned'] = $mark_up_fees_earned;

        return $this;
    }

    /**
     * Gets is_price_ceiling
     *
     * @return bool
     */
    public function getIsPriceCeiling()
    {
        return $this->container['is_price_ceiling'];
    }

    /**
     * Sets is_price_ceiling
     *
     * @param bool $is_price_ceiling Set to true if an hourly rate project has a price ceiling.
     *
     * @return $this
     */
    public function setIsPriceCeiling($is_price_ceiling)
    {
        $this->container['is_price_ceiling'] = $is_price_ceiling;

        return $this;
    }

    /**
     * Gets price_ceiling_amount
     *
     * @return float
     */
    public function getPriceCeilingAmount()
    {
        return $this->container['price_ceiling_amount'];
    }

    /**
     * Sets price_ceiling_amount
     *
     * @param float $price_ceiling_amount Price ceiling amount, in the project's currency.
     *
     * @return $this
     */
    public function setPriceCeilingAmount($price_ceiling_amount)
    {
        $this->container['price_ceiling_amount'] = $price_ceiling_amount;

        return $this;
    }

    /**
     * Gets project_hourly_rates
     *
     * @return \Swagger\Client\Model\ProjectHourlyRate[]
     */
    public function getProjectHourlyRates()
    {
        return $this->container['project_hourly_rates'];
    }

    /**
     * Sets project_hourly_rates
     *
     * @param \Swagger\Client\Model\ProjectHourlyRate[] $project_hourly_rates Project Rate Types tied to the project.
     *
     * @return $this
     */
    public function setProjectHourlyRates($project_hourly_rates)
    {
        $this->container['project_hourly_rates'] = $project_hourly_rates;

        return $this;
    }

    /**
     * Gets for_participants_only
     *
     * @return bool
     */
    public function getForParticipantsOnly()
    {
        return $this->container['for_participants_only'];
    }

    /**
     * Sets for_participants_only
     *
     * @param bool $for_participants_only Set to true if only project participants can register information on the project
     *
     * @return $this
     */
    public function setForParticipantsOnly($for_participants_only)
    {
        $this->container['for_participants_only'] = $for_participants_only;

        return $this;
    }

    /**
     * Gets participants
     *
     * @return \Swagger\Client\Model\ProjectParticipant[]
     */
    public function getParticipants()
    {
        return $this->container['participants'];
    }

    /**
     * Sets participants
     *
     * @param \Swagger\Client\Model\ProjectParticipant[] $participants Link to individual project participants.
     *
     * @return $this
     */
    public function setParticipants($participants)
    {
        $this->container['participants'] = $participants;

        return $this;
    }

    /**
     * Gets contact
     *
     * @return \Swagger\Client\Model\Contact
     */
    public function getContact()
    {
        return $this->container['contact'];
    }

    /**
     * Sets contact
     *
     * @param \Swagger\Client\Model\Contact $contact contact
     *
     * @return $this
     */
    public function setContact($contact)
    {
        $this->container['contact'] = $contact;

        return $this;
    }

    /**
     * Gets invoicing_plan
     *
     * @return \Swagger\Client\Model\Invoice[]
     */
    public function getInvoicingPlan()
    {
        return $this->container['invoicing_plan'];
    }

    /**
     * Sets invoicing_plan
     *
     * @param \Swagger\Client\Model\Invoice[] $invoicing_plan Invoicing plans tied to the project
     *
     * @return $this
     */
    public function setInvoicingPlan($invoicing_plan)
    {
        $this->container['invoicing_plan'] = $invoicing_plan;

        return $this;
    }

    /**
     * Gets preliminary_invoice
     *
     * @return \Swagger\Client\Model\Invoice
     */
    public function getPreliminaryInvoice()
    {
        return $this->container['preliminary_invoice'];
    }

    /**
     * Sets preliminary_invoice
     *
     * @param \Swagger\Client\Model\Invoice $preliminary_invoice preliminary_invoice
     *
     * @return $this
     */
    public function setPreliminaryInvoice($preliminary_invoice)
    {
        $this->container['preliminary_invoice'] = $preliminary_invoice;

        return $this;
    }

    /**
     * Gets general_project_activities_per_project_only
     *
     * @return bool
     */
    public function getGeneralProjectActivitiesPerProjectOnly()
    {
        return $this->container['general_project_activities_per_project_only'];
    }

    /**
     * Sets general_project_activities_per_project_only
     *
     * @param bool $general_project_activities_per_project_only Set to true if a general project activity must be linked to project to allow time tracking.
     *
     * @return $this
     */
    public function setGeneralProjectActivitiesPerProjectOnly($general_project_activities_per_project_only)
    {
        $this->container['general_project_activities_per_project_only'] = $general_project_activities_per_project_only;

        return $this;
    }

    /**
     * Gets project_activities
     *
     * @return \Swagger\Client\Model\ProjectActivity[]
     */
    public function getProjectActivities()
    {
        return $this->container['project_activities'];
    }

    /**
     * Sets project_activities
     *
     * @param \Swagger\Client\Model\ProjectActivity[] $project_activities Project Activities
     *
     * @return $this
     */
    public function setProjectActivities($project_activities)
    {
        $this->container['project_activities'] = $project_activities;

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

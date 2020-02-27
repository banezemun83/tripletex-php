<?php
/**
 * Posting
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
 * Posting Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Posting implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Posting';

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
'voucher' => '\Swagger\Client\Model\Voucher',
'date' => 'string',
'description' => 'string',
'account' => '\Swagger\Client\Model\Account',
'customer' => '\Swagger\Client\Model\Customer',
'supplier' => '\Swagger\Client\Model\Supplier',
'employee' => '\Swagger\Client\Model\Employee',
'project' => '\Swagger\Client\Model\Project',
'product' => '\Swagger\Client\Model\Product',
'department' => '\Swagger\Client\Model\Department',
'vat_type' => '\Swagger\Client\Model\VatType',
'amount' => 'float',
'amount_currency' => 'float',
'amount_gross' => 'float',
'amount_gross_currency' => 'float',
'currency' => '\Swagger\Client\Model\Currency',
'close_group' => '\Swagger\Client\Model\CloseGroup',
'invoice_number' => 'string',
'term_of_payment' => 'string',
'row' => 'int',
'system_generated' => 'bool'    ];

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
'voucher' => null,
'date' => null,
'description' => null,
'account' => null,
'customer' => null,
'supplier' => null,
'employee' => null,
'project' => null,
'product' => null,
'department' => null,
'vat_type' => null,
'amount' => null,
'amount_currency' => null,
'amount_gross' => null,
'amount_gross_currency' => null,
'currency' => null,
'close_group' => null,
'invoice_number' => null,
'term_of_payment' => null,
'row' => 'int32',
'system_generated' => null    ];

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
'voucher' => 'voucher',
'date' => 'date',
'description' => 'description',
'account' => 'account',
'customer' => 'customer',
'supplier' => 'supplier',
'employee' => 'employee',
'project' => 'project',
'product' => 'product',
'department' => 'department',
'vat_type' => 'vatType',
'amount' => 'amount',
'amount_currency' => 'amountCurrency',
'amount_gross' => 'amountGross',
'amount_gross_currency' => 'amountGrossCurrency',
'currency' => 'currency',
'close_group' => 'closeGroup',
'invoice_number' => 'invoiceNumber',
'term_of_payment' => 'termOfPayment',
'row' => 'row',
'system_generated' => 'systemGenerated'    ];

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
'voucher' => 'setVoucher',
'date' => 'setDate',
'description' => 'setDescription',
'account' => 'setAccount',
'customer' => 'setCustomer',
'supplier' => 'setSupplier',
'employee' => 'setEmployee',
'project' => 'setProject',
'product' => 'setProduct',
'department' => 'setDepartment',
'vat_type' => 'setVatType',
'amount' => 'setAmount',
'amount_currency' => 'setAmountCurrency',
'amount_gross' => 'setAmountGross',
'amount_gross_currency' => 'setAmountGrossCurrency',
'currency' => 'setCurrency',
'close_group' => 'setCloseGroup',
'invoice_number' => 'setInvoiceNumber',
'term_of_payment' => 'setTermOfPayment',
'row' => 'setRow',
'system_generated' => 'setSystemGenerated'    ];

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
'voucher' => 'getVoucher',
'date' => 'getDate',
'description' => 'getDescription',
'account' => 'getAccount',
'customer' => 'getCustomer',
'supplier' => 'getSupplier',
'employee' => 'getEmployee',
'project' => 'getProject',
'product' => 'getProduct',
'department' => 'getDepartment',
'vat_type' => 'getVatType',
'amount' => 'getAmount',
'amount_currency' => 'getAmountCurrency',
'amount_gross' => 'getAmountGross',
'amount_gross_currency' => 'getAmountGrossCurrency',
'currency' => 'getCurrency',
'close_group' => 'getCloseGroup',
'invoice_number' => 'getInvoiceNumber',
'term_of_payment' => 'getTermOfPayment',
'row' => 'getRow',
'system_generated' => 'getSystemGenerated'    ];

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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['version'] = isset($data['version']) ? $data['version'] : null;
        $this->container['changes'] = isset($data['changes']) ? $data['changes'] : null;
        $this->container['url'] = isset($data['url']) ? $data['url'] : null;
        $this->container['voucher'] = isset($data['voucher']) ? $data['voucher'] : null;
        $this->container['date'] = isset($data['date']) ? $data['date'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['account'] = isset($data['account']) ? $data['account'] : null;
        $this->container['customer'] = isset($data['customer']) ? $data['customer'] : null;
        $this->container['supplier'] = isset($data['supplier']) ? $data['supplier'] : null;
        $this->container['employee'] = isset($data['employee']) ? $data['employee'] : null;
        $this->container['project'] = isset($data['project']) ? $data['project'] : null;
        $this->container['product'] = isset($data['product']) ? $data['product'] : null;
        $this->container['department'] = isset($data['department']) ? $data['department'] : null;
        $this->container['vat_type'] = isset($data['vat_type']) ? $data['vat_type'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['amount_currency'] = isset($data['amount_currency']) ? $data['amount_currency'] : null;
        $this->container['amount_gross'] = isset($data['amount_gross']) ? $data['amount_gross'] : null;
        $this->container['amount_gross_currency'] = isset($data['amount_gross_currency']) ? $data['amount_gross_currency'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['close_group'] = isset($data['close_group']) ? $data['close_group'] : null;
        $this->container['invoice_number'] = isset($data['invoice_number']) ? $data['invoice_number'] : null;
        $this->container['term_of_payment'] = isset($data['term_of_payment']) ? $data['term_of_payment'] : null;
        $this->container['row'] = isset($data['row']) ? $data['row'] : null;
        $this->container['system_generated'] = isset($data['system_generated']) ? $data['system_generated'] : false;
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
     * Gets voucher
     *
     * @return \Swagger\Client\Model\Voucher
     */
    public function getVoucher()
    {
        return $this->container['voucher'];
    }

    /**
     * Sets voucher
     *
     * @param \Swagger\Client\Model\Voucher $voucher voucher
     *
     * @return $this
     */
    public function setVoucher($voucher)
    {
        $this->container['voucher'] = $voucher;

        return $this;
    }

    /**
     * Gets date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->container['date'];
    }

    /**
     * Sets date
     *
     * @param string $date date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->container['date'] = $date;

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
     * Gets supplier
     *
     * @return \Swagger\Client\Model\Supplier
     */
    public function getSupplier()
    {
        return $this->container['supplier'];
    }

    /**
     * Sets supplier
     *
     * @param \Swagger\Client\Model\Supplier $supplier supplier
     *
     * @return $this
     */
    public function setSupplier($supplier)
    {
        $this->container['supplier'] = $supplier;

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
     * Gets project
     *
     * @return \Swagger\Client\Model\Project
     */
    public function getProject()
    {
        return $this->container['project'];
    }

    /**
     * Sets project
     *
     * @param \Swagger\Client\Model\Project $project project
     *
     * @return $this
     */
    public function setProject($project)
    {
        $this->container['project'] = $project;

        return $this;
    }

    /**
     * Gets product
     *
     * @return \Swagger\Client\Model\Product
     */
    public function getProduct()
    {
        return $this->container['product'];
    }

    /**
     * Sets product
     *
     * @param \Swagger\Client\Model\Product $product product
     *
     * @return $this
     */
    public function setProduct($product)
    {
        $this->container['product'] = $product;

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
     * Gets amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float $amount amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets amount_currency
     *
     * @return float
     */
    public function getAmountCurrency()
    {
        return $this->container['amount_currency'];
    }

    /**
     * Sets amount_currency
     *
     * @param float $amount_currency amount_currency
     *
     * @return $this
     */
    public function setAmountCurrency($amount_currency)
    {
        $this->container['amount_currency'] = $amount_currency;

        return $this;
    }

    /**
     * Gets amount_gross
     *
     * @return float
     */
    public function getAmountGross()
    {
        return $this->container['amount_gross'];
    }

    /**
     * Sets amount_gross
     *
     * @param float $amount_gross amount_gross
     *
     * @return $this
     */
    public function setAmountGross($amount_gross)
    {
        $this->container['amount_gross'] = $amount_gross;

        return $this;
    }

    /**
     * Gets amount_gross_currency
     *
     * @return float
     */
    public function getAmountGrossCurrency()
    {
        return $this->container['amount_gross_currency'];
    }

    /**
     * Sets amount_gross_currency
     *
     * @param float $amount_gross_currency amount_gross_currency
     *
     * @return $this
     */
    public function setAmountGrossCurrency($amount_gross_currency)
    {
        $this->container['amount_gross_currency'] = $amount_gross_currency;

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
     * Gets close_group
     *
     * @return \Swagger\Client\Model\CloseGroup
     */
    public function getCloseGroup()
    {
        return $this->container['close_group'];
    }

    /**
     * Sets close_group
     *
     * @param \Swagger\Client\Model\CloseGroup $close_group close_group
     *
     * @return $this
     */
    public function setCloseGroup($close_group)
    {
        $this->container['close_group'] = $close_group;

        return $this;
    }

    /**
     * Gets invoice_number
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->container['invoice_number'];
    }

    /**
     * Sets invoice_number
     *
     * @param string $invoice_number invoice_number
     *
     * @return $this
     */
    public function setInvoiceNumber($invoice_number)
    {
        $this->container['invoice_number'] = $invoice_number;

        return $this;
    }

    /**
     * Gets term_of_payment
     *
     * @return string
     */
    public function getTermOfPayment()
    {
        return $this->container['term_of_payment'];
    }

    /**
     * Sets term_of_payment
     *
     * @param string $term_of_payment term_of_payment
     *
     * @return $this
     */
    public function setTermOfPayment($term_of_payment)
    {
        $this->container['term_of_payment'] = $term_of_payment;

        return $this;
    }

    /**
     * Gets row
     *
     * @return int
     */
    public function getRow()
    {
        return $this->container['row'];
    }

    /**
     * Sets row
     *
     * @param int $row row
     *
     * @return $this
     */
    public function setRow($row)
    {
        $this->container['row'] = $row;

        return $this;
    }

    /**
     * Gets system_generated
     *
     * @return bool
     */
    public function getSystemGenerated()
    {
        return $this->container['system_generated'];
    }

    /**
     * Sets system_generated
     *
     * @param bool $system_generated system_generated
     *
     * @return $this
     */
    public function setSystemGenerated($system_generated)
    {
        $this->container['system_generated'] = $system_generated;

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

<?php
/**
 * Invoice
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
 * Invoice Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Invoice implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Invoice';

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
'invoice_number' => 'int',
'invoice_date' => 'string',
'customer' => '\Swagger\Client\Model\Customer',
'invoice_due_date' => 'string',
'kid' => 'string',
'comment' => 'string',
'orders' => '\Swagger\Client\Model\Order[]',
'project_invoice_details' => '\Swagger\Client\Model\ProjectInvoiceDetails[]',
'voucher' => '\Swagger\Client\Model\Voucher',
'delivery_date' => 'string',
'amount' => 'float',
'amount_currency' => 'float',
'amount_excluding_vat' => 'float',
'amount_excluding_vat_currency' => 'float',
'amount_roundoff' => 'float',
'amount_roundoff_currency' => 'float',
'amount_outstanding' => 'float',
'amount_outstanding_total' => 'float',
'sum_remits' => 'float',
'currency' => '\Swagger\Client\Model\Currency',
'is_credit_note' => 'bool',
'is_charged' => 'bool',
'is_approved' => 'bool',
'postings' => '\Swagger\Client\Model\Posting[]',
'reminders' => '\Swagger\Client\Model\Reminder[]',
'ehf_send_status' => 'string'    ];

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
'invoice_number' => 'int32',
'invoice_date' => null,
'customer' => null,
'invoice_due_date' => null,
'kid' => null,
'comment' => null,
'orders' => null,
'project_invoice_details' => null,
'voucher' => null,
'delivery_date' => null,
'amount' => null,
'amount_currency' => null,
'amount_excluding_vat' => null,
'amount_excluding_vat_currency' => null,
'amount_roundoff' => null,
'amount_roundoff_currency' => null,
'amount_outstanding' => null,
'amount_outstanding_total' => null,
'sum_remits' => null,
'currency' => null,
'is_credit_note' => null,
'is_charged' => null,
'is_approved' => null,
'postings' => null,
'reminders' => null,
'ehf_send_status' => null    ];

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
'invoice_number' => 'invoiceNumber',
'invoice_date' => 'invoiceDate',
'customer' => 'customer',
'invoice_due_date' => 'invoiceDueDate',
'kid' => 'kid',
'comment' => 'comment',
'orders' => 'orders',
'project_invoice_details' => 'projectInvoiceDetails',
'voucher' => 'voucher',
'delivery_date' => 'deliveryDate',
'amount' => 'amount',
'amount_currency' => 'amountCurrency',
'amount_excluding_vat' => 'amountExcludingVat',
'amount_excluding_vat_currency' => 'amountExcludingVatCurrency',
'amount_roundoff' => 'amountRoundoff',
'amount_roundoff_currency' => 'amountRoundoffCurrency',
'amount_outstanding' => 'amountOutstanding',
'amount_outstanding_total' => 'amountOutstandingTotal',
'sum_remits' => 'sumRemits',
'currency' => 'currency',
'is_credit_note' => 'isCreditNote',
'is_charged' => 'isCharged',
'is_approved' => 'isApproved',
'postings' => 'postings',
'reminders' => 'reminders',
'ehf_send_status' => 'ehfSendStatus'    ];

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
'invoice_number' => 'setInvoiceNumber',
'invoice_date' => 'setInvoiceDate',
'customer' => 'setCustomer',
'invoice_due_date' => 'setInvoiceDueDate',
'kid' => 'setKid',
'comment' => 'setComment',
'orders' => 'setOrders',
'project_invoice_details' => 'setProjectInvoiceDetails',
'voucher' => 'setVoucher',
'delivery_date' => 'setDeliveryDate',
'amount' => 'setAmount',
'amount_currency' => 'setAmountCurrency',
'amount_excluding_vat' => 'setAmountExcludingVat',
'amount_excluding_vat_currency' => 'setAmountExcludingVatCurrency',
'amount_roundoff' => 'setAmountRoundoff',
'amount_roundoff_currency' => 'setAmountRoundoffCurrency',
'amount_outstanding' => 'setAmountOutstanding',
'amount_outstanding_total' => 'setAmountOutstandingTotal',
'sum_remits' => 'setSumRemits',
'currency' => 'setCurrency',
'is_credit_note' => 'setIsCreditNote',
'is_charged' => 'setIsCharged',
'is_approved' => 'setIsApproved',
'postings' => 'setPostings',
'reminders' => 'setReminders',
'ehf_send_status' => 'setEhfSendStatus'    ];

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
'invoice_number' => 'getInvoiceNumber',
'invoice_date' => 'getInvoiceDate',
'customer' => 'getCustomer',
'invoice_due_date' => 'getInvoiceDueDate',
'kid' => 'getKid',
'comment' => 'getComment',
'orders' => 'getOrders',
'project_invoice_details' => 'getProjectInvoiceDetails',
'voucher' => 'getVoucher',
'delivery_date' => 'getDeliveryDate',
'amount' => 'getAmount',
'amount_currency' => 'getAmountCurrency',
'amount_excluding_vat' => 'getAmountExcludingVat',
'amount_excluding_vat_currency' => 'getAmountExcludingVatCurrency',
'amount_roundoff' => 'getAmountRoundoff',
'amount_roundoff_currency' => 'getAmountRoundoffCurrency',
'amount_outstanding' => 'getAmountOutstanding',
'amount_outstanding_total' => 'getAmountOutstandingTotal',
'sum_remits' => 'getSumRemits',
'currency' => 'getCurrency',
'is_credit_note' => 'getIsCreditNote',
'is_charged' => 'getIsCharged',
'is_approved' => 'getIsApproved',
'postings' => 'getPostings',
'reminders' => 'getReminders',
'ehf_send_status' => 'getEhfSendStatus'    ];

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

    const EHF_SEND_STATUS_DO_NOT_SEND = 'DO_NOT_SEND';
const EHF_SEND_STATUS_SEND = 'SEND';
const EHF_SEND_STATUS_SENT = 'SENT';
const EHF_SEND_STATUS_SEND_FAILURE_RECIPIENT_NOT_FOUND = 'SEND_FAILURE_RECIPIENT_NOT_FOUND';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getEhfSendStatusAllowableValues()
    {
        return [
            self::EHF_SEND_STATUS_DO_NOT_SEND,
self::EHF_SEND_STATUS_SEND,
self::EHF_SEND_STATUS_SENT,
self::EHF_SEND_STATUS_SEND_FAILURE_RECIPIENT_NOT_FOUND,        ];
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
        $this->container['invoice_number'] = isset($data['invoice_number']) ? $data['invoice_number'] : null;
        $this->container['invoice_date'] = isset($data['invoice_date']) ? $data['invoice_date'] : null;
        $this->container['customer'] = isset($data['customer']) ? $data['customer'] : null;
        $this->container['invoice_due_date'] = isset($data['invoice_due_date']) ? $data['invoice_due_date'] : null;
        $this->container['kid'] = isset($data['kid']) ? $data['kid'] : null;
        $this->container['comment'] = isset($data['comment']) ? $data['comment'] : null;
        $this->container['orders'] = isset($data['orders']) ? $data['orders'] : null;
        $this->container['project_invoice_details'] = isset($data['project_invoice_details']) ? $data['project_invoice_details'] : null;
        $this->container['voucher'] = isset($data['voucher']) ? $data['voucher'] : null;
        $this->container['delivery_date'] = isset($data['delivery_date']) ? $data['delivery_date'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['amount_currency'] = isset($data['amount_currency']) ? $data['amount_currency'] : null;
        $this->container['amount_excluding_vat'] = isset($data['amount_excluding_vat']) ? $data['amount_excluding_vat'] : null;
        $this->container['amount_excluding_vat_currency'] = isset($data['amount_excluding_vat_currency']) ? $data['amount_excluding_vat_currency'] : null;
        $this->container['amount_roundoff'] = isset($data['amount_roundoff']) ? $data['amount_roundoff'] : null;
        $this->container['amount_roundoff_currency'] = isset($data['amount_roundoff_currency']) ? $data['amount_roundoff_currency'] : null;
        $this->container['amount_outstanding'] = isset($data['amount_outstanding']) ? $data['amount_outstanding'] : null;
        $this->container['amount_outstanding_total'] = isset($data['amount_outstanding_total']) ? $data['amount_outstanding_total'] : null;
        $this->container['sum_remits'] = isset($data['sum_remits']) ? $data['sum_remits'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['is_credit_note'] = isset($data['is_credit_note']) ? $data['is_credit_note'] : false;
        $this->container['is_charged'] = isset($data['is_charged']) ? $data['is_charged'] : false;
        $this->container['is_approved'] = isset($data['is_approved']) ? $data['is_approved'] : false;
        $this->container['postings'] = isset($data['postings']) ? $data['postings'] : null;
        $this->container['reminders'] = isset($data['reminders']) ? $data['reminders'] : null;
        $this->container['ehf_send_status'] = isset($data['ehf_send_status']) ? $data['ehf_send_status'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['invoice_date'] === null) {
            $invalidProperties[] = "'invoice_date' can't be null";
        }
        if ($this->container['invoice_due_date'] === null) {
            $invalidProperties[] = "'invoice_due_date' can't be null";
        }
        if ($this->container['orders'] === null) {
            $invalidProperties[] = "'orders' can't be null";
        }
        $allowedValues = $this->getEhfSendStatusAllowableValues();
        if (!is_null($this->container['ehf_send_status']) && !in_array($this->container['ehf_send_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'ehf_send_status', must be one of '%s'",
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
     * Gets invoice_number
     *
     * @return int
     */
    public function getInvoiceNumber()
    {
        return $this->container['invoice_number'];
    }

    /**
     * Sets invoice_number
     *
     * @param int $invoice_number If value is set to 0, the invoice number will be generated.
     *
     * @return $this
     */
    public function setInvoiceNumber($invoice_number)
    {
        $this->container['invoice_number'] = $invoice_number;

        return $this;
    }

    /**
     * Gets invoice_date
     *
     * @return string
     */
    public function getInvoiceDate()
    {
        return $this->container['invoice_date'];
    }

    /**
     * Sets invoice_date
     *
     * @param string $invoice_date invoice_date
     *
     * @return $this
     */
    public function setInvoiceDate($invoice_date)
    {
        $this->container['invoice_date'] = $invoice_date;

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
     * Gets invoice_due_date
     *
     * @return string
     */
    public function getInvoiceDueDate()
    {
        return $this->container['invoice_due_date'];
    }

    /**
     * Sets invoice_due_date
     *
     * @param string $invoice_due_date invoice_due_date
     *
     * @return $this
     */
    public function setInvoiceDueDate($invoice_due_date)
    {
        $this->container['invoice_due_date'] = $invoice_due_date;

        return $this;
    }

    /**
     * Gets kid
     *
     * @return string
     */
    public function getKid()
    {
        return $this->container['kid'];
    }

    /**
     * Sets kid
     *
     * @param string $kid KID - Kundeidentifikasjonsnummer.
     *
     * @return $this
     */
    public function setKid($kid)
    {
        $this->container['kid'] = $kid;

        return $this;
    }

    /**
     * Gets comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->container['comment'];
    }

    /**
     * Sets comment
     *
     * @param string $comment comment
     *
     * @return $this
     */
    public function setComment($comment)
    {
        $this->container['comment'] = $comment;

        return $this;
    }

    /**
     * Gets orders
     *
     * @return \Swagger\Client\Model\Order[]
     */
    public function getOrders()
    {
        return $this->container['orders'];
    }

    /**
     * Sets orders
     *
     * @param \Swagger\Client\Model\Order[] $orders Related orders. Only one order per invoice is supported at the moment.
     *
     * @return $this
     */
    public function setOrders($orders)
    {
        $this->container['orders'] = $orders;

        return $this;
    }

    /**
     * Gets project_invoice_details
     *
     * @return \Swagger\Client\Model\ProjectInvoiceDetails[]
     */
    public function getProjectInvoiceDetails()
    {
        return $this->container['project_invoice_details'];
    }

    /**
     * Sets project_invoice_details
     *
     * @param \Swagger\Client\Model\ProjectInvoiceDetails[] $project_invoice_details ProjectInvoiceDetails contains additional information about the invoice, in particular invoices for projects. It contains information about the charged project, the fee amount, extra percent and amount, extra costs, travel expenses, invoice and project comments, akonto amount and values determining if extra costs, akonto and hours should be included. ProjectInvoiceDetails is an object which represents the relation between an invoice and a Project, Orderline and OrderOut object.
     *
     * @return $this
     */
    public function setProjectInvoiceDetails($project_invoice_details)
    {
        $this->container['project_invoice_details'] = $project_invoice_details;

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
     * Gets delivery_date
     *
     * @return string
     */
    public function getDeliveryDate()
    {
        return $this->container['delivery_date'];
    }

    /**
     * Sets delivery_date
     *
     * @param string $delivery_date The delivery date.
     *
     * @return $this
     */
    public function setDeliveryDate($delivery_date)
    {
        $this->container['delivery_date'] = $delivery_date;

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
     * @param float $amount In the company’s currency, typically NOK.
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
     * @param float $amount_currency In the specified currency.
     *
     * @return $this
     */
    public function setAmountCurrency($amount_currency)
    {
        $this->container['amount_currency'] = $amount_currency;

        return $this;
    }

    /**
     * Gets amount_excluding_vat
     *
     * @return float
     */
    public function getAmountExcludingVat()
    {
        return $this->container['amount_excluding_vat'];
    }

    /**
     * Sets amount_excluding_vat
     *
     * @param float $amount_excluding_vat Amount excluding VAT (NOK).
     *
     * @return $this
     */
    public function setAmountExcludingVat($amount_excluding_vat)
    {
        $this->container['amount_excluding_vat'] = $amount_excluding_vat;

        return $this;
    }

    /**
     * Gets amount_excluding_vat_currency
     *
     * @return float
     */
    public function getAmountExcludingVatCurrency()
    {
        return $this->container['amount_excluding_vat_currency'];
    }

    /**
     * Sets amount_excluding_vat_currency
     *
     * @param float $amount_excluding_vat_currency Amount excluding VAT in the specified currency.
     *
     * @return $this
     */
    public function setAmountExcludingVatCurrency($amount_excluding_vat_currency)
    {
        $this->container['amount_excluding_vat_currency'] = $amount_excluding_vat_currency;

        return $this;
    }

    /**
     * Gets amount_roundoff
     *
     * @return float
     */
    public function getAmountRoundoff()
    {
        return $this->container['amount_roundoff'];
    }

    /**
     * Sets amount_roundoff
     *
     * @param float $amount_roundoff Amount of round off to nearest integer.
     *
     * @return $this
     */
    public function setAmountRoundoff($amount_roundoff)
    {
        $this->container['amount_roundoff'] = $amount_roundoff;

        return $this;
    }

    /**
     * Gets amount_roundoff_currency
     *
     * @return float
     */
    public function getAmountRoundoffCurrency()
    {
        return $this->container['amount_roundoff_currency'];
    }

    /**
     * Sets amount_roundoff_currency
     *
     * @param float $amount_roundoff_currency Amount of round off to nearest integer in the specified currency.
     *
     * @return $this
     */
    public function setAmountRoundoffCurrency($amount_roundoff_currency)
    {
        $this->container['amount_roundoff_currency'] = $amount_roundoff_currency;

        return $this;
    }

    /**
     * Gets amount_outstanding
     *
     * @return float
     */
    public function getAmountOutstanding()
    {
        return $this->container['amount_outstanding'];
    }

    /**
     * Sets amount_outstanding
     *
     * @param float $amount_outstanding The amount outstanding based on the history collection, excluding reminders and any existing remits, in the invoice currency.
     *
     * @return $this
     */
    public function setAmountOutstanding($amount_outstanding)
    {
        $this->container['amount_outstanding'] = $amount_outstanding;

        return $this;
    }

    /**
     * Gets amount_outstanding_total
     *
     * @return float
     */
    public function getAmountOutstandingTotal()
    {
        return $this->container['amount_outstanding_total'];
    }

    /**
     * Sets amount_outstanding_total
     *
     * @param float $amount_outstanding_total The amount outstanding based on the history collection and including the last reminder and any existing remits. This is the total invoice balance including reminders and remittances, in the invoice currency.
     *
     * @return $this
     */
    public function setAmountOutstandingTotal($amount_outstanding_total)
    {
        $this->container['amount_outstanding_total'] = $amount_outstanding_total;

        return $this;
    }

    /**
     * Gets sum_remits
     *
     * @return float
     */
    public function getSumRemits()
    {
        return $this->container['sum_remits'];
    }

    /**
     * Sets sum_remits
     *
     * @param float $sum_remits The sum of all open remittances of the invoice. Remittances are reimbursement payments back to the customer and are therefore relevant to the bookkeeping of the invoice in the accounts.
     *
     * @return $this
     */
    public function setSumRemits($sum_remits)
    {
        $this->container['sum_remits'] = $sum_remits;

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
     * Gets is_credit_note
     *
     * @return bool
     */
    public function getIsCreditNote()
    {
        return $this->container['is_credit_note'];
    }

    /**
     * Sets is_credit_note
     *
     * @param bool $is_credit_note is_credit_note
     *
     * @return $this
     */
    public function setIsCreditNote($is_credit_note)
    {
        $this->container['is_credit_note'] = $is_credit_note;

        return $this;
    }

    /**
     * Gets is_charged
     *
     * @return bool
     */
    public function getIsCharged()
    {
        return $this->container['is_charged'];
    }

    /**
     * Sets is_charged
     *
     * @param bool $is_charged is_charged
     *
     * @return $this
     */
    public function setIsCharged($is_charged)
    {
        $this->container['is_charged'] = $is_charged;

        return $this;
    }

    /**
     * Gets is_approved
     *
     * @return bool
     */
    public function getIsApproved()
    {
        return $this->container['is_approved'];
    }

    /**
     * Sets is_approved
     *
     * @param bool $is_approved is_approved
     *
     * @return $this
     */
    public function setIsApproved($is_approved)
    {
        $this->container['is_approved'] = $is_approved;

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
     * @param \Swagger\Client\Model\Posting[] $postings The invoice postings, which includes a posting for the invoice with a positive amount, and one or more posting for the payments with negative amounts.
     *
     * @return $this
     */
    public function setPostings($postings)
    {
        $this->container['postings'] = $postings;

        return $this;
    }

    /**
     * Gets reminders
     *
     * @return \Swagger\Client\Model\Reminder[]
     */
    public function getReminders()
    {
        return $this->container['reminders'];
    }

    /**
     * Sets reminders
     *
     * @param \Swagger\Client\Model\Reminder[] $reminders Invoice debt collection and reminders.
     *
     * @return $this
     */
    public function setReminders($reminders)
    {
        $this->container['reminders'] = $reminders;

        return $this;
    }

    /**
     * Gets ehf_send_status
     *
     * @return string
     */
    public function getEhfSendStatus()
    {
        return $this->container['ehf_send_status'];
    }

    /**
     * Sets ehf_send_status
     *
     * @param string $ehf_send_status [Deprecated] EHF (Peppol) send status. This only shows status for historic EHFs.
     *
     * @return $this
     */
    public function setEhfSendStatus($ehf_send_status)
    {
        $allowedValues = $this->getEhfSendStatusAllowableValues();
        if (!is_null($ehf_send_status) && !in_array($ehf_send_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'ehf_send_status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['ehf_send_status'] = $ehf_send_status;

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

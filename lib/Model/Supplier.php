<?php
/**
 * Supplier
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
 * Supplier Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Supplier implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Supplier';

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
'organization_number' => 'string',
'supplier_number' => 'int',
'customer_number' => 'int',
'is_supplier' => 'bool',
'is_customer' => 'bool',
'is_inactive' => 'bool',
'email' => 'string',
'bank_accounts' => 'string[]',
'invoice_email' => 'string',
'overdue_notice_email' => 'string',
'phone_number' => 'string',
'phone_number_mobile' => 'string',
'description' => 'string',
'is_private_individual' => 'bool',
'show_products' => 'bool',
'account_manager' => '\Swagger\Client\Model\Employee',
'postal_address' => '\Swagger\Client\Model\Address',
'physical_address' => '\Swagger\Client\Model\Address',
'delivery_address' => '\Swagger\Client\Model\DeliveryAddress',
'category1' => '\Swagger\Client\Model\CustomerCategory',
'category2' => '\Swagger\Client\Model\CustomerCategory',
'category3' => '\Swagger\Client\Model\CustomerCategory'    ];

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
'organization_number' => null,
'supplier_number' => 'int32',
'customer_number' => 'int32',
'is_supplier' => null,
'is_customer' => null,
'is_inactive' => null,
'email' => 'email',
'bank_accounts' => null,
'invoice_email' => 'email',
'overdue_notice_email' => 'email',
'phone_number' => null,
'phone_number_mobile' => null,
'description' => null,
'is_private_individual' => null,
'show_products' => null,
'account_manager' => null,
'postal_address' => null,
'physical_address' => null,
'delivery_address' => null,
'category1' => null,
'category2' => null,
'category3' => null    ];

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
'organization_number' => 'organizationNumber',
'supplier_number' => 'supplierNumber',
'customer_number' => 'customerNumber',
'is_supplier' => 'isSupplier',
'is_customer' => 'isCustomer',
'is_inactive' => 'isInactive',
'email' => 'email',
'bank_accounts' => 'bankAccounts',
'invoice_email' => 'invoiceEmail',
'overdue_notice_email' => 'overdueNoticeEmail',
'phone_number' => 'phoneNumber',
'phone_number_mobile' => 'phoneNumberMobile',
'description' => 'description',
'is_private_individual' => 'isPrivateIndividual',
'show_products' => 'showProducts',
'account_manager' => 'accountManager',
'postal_address' => 'postalAddress',
'physical_address' => 'physicalAddress',
'delivery_address' => 'deliveryAddress',
'category1' => 'category1',
'category2' => 'category2',
'category3' => 'category3'    ];

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
'organization_number' => 'setOrganizationNumber',
'supplier_number' => 'setSupplierNumber',
'customer_number' => 'setCustomerNumber',
'is_supplier' => 'setIsSupplier',
'is_customer' => 'setIsCustomer',
'is_inactive' => 'setIsInactive',
'email' => 'setEmail',
'bank_accounts' => 'setBankAccounts',
'invoice_email' => 'setInvoiceEmail',
'overdue_notice_email' => 'setOverdueNoticeEmail',
'phone_number' => 'setPhoneNumber',
'phone_number_mobile' => 'setPhoneNumberMobile',
'description' => 'setDescription',
'is_private_individual' => 'setIsPrivateIndividual',
'show_products' => 'setShowProducts',
'account_manager' => 'setAccountManager',
'postal_address' => 'setPostalAddress',
'physical_address' => 'setPhysicalAddress',
'delivery_address' => 'setDeliveryAddress',
'category1' => 'setCategory1',
'category2' => 'setCategory2',
'category3' => 'setCategory3'    ];

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
'organization_number' => 'getOrganizationNumber',
'supplier_number' => 'getSupplierNumber',
'customer_number' => 'getCustomerNumber',
'is_supplier' => 'getIsSupplier',
'is_customer' => 'getIsCustomer',
'is_inactive' => 'getIsInactive',
'email' => 'getEmail',
'bank_accounts' => 'getBankAccounts',
'invoice_email' => 'getInvoiceEmail',
'overdue_notice_email' => 'getOverdueNoticeEmail',
'phone_number' => 'getPhoneNumber',
'phone_number_mobile' => 'getPhoneNumberMobile',
'description' => 'getDescription',
'is_private_individual' => 'getIsPrivateIndividual',
'show_products' => 'getShowProducts',
'account_manager' => 'getAccountManager',
'postal_address' => 'getPostalAddress',
'physical_address' => 'getPhysicalAddress',
'delivery_address' => 'getDeliveryAddress',
'category1' => 'getCategory1',
'category2' => 'getCategory2',
'category3' => 'getCategory3'    ];

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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['organization_number'] = isset($data['organization_number']) ? $data['organization_number'] : null;
        $this->container['supplier_number'] = isset($data['supplier_number']) ? $data['supplier_number'] : null;
        $this->container['customer_number'] = isset($data['customer_number']) ? $data['customer_number'] : null;
        $this->container['is_supplier'] = isset($data['is_supplier']) ? $data['is_supplier'] : false;
        $this->container['is_customer'] = isset($data['is_customer']) ? $data['is_customer'] : false;
        $this->container['is_inactive'] = isset($data['is_inactive']) ? $data['is_inactive'] : false;
        $this->container['email'] = isset($data['email']) ? $data['email'] : null;
        $this->container['bank_accounts'] = isset($data['bank_accounts']) ? $data['bank_accounts'] : null;
        $this->container['invoice_email'] = isset($data['invoice_email']) ? $data['invoice_email'] : null;
        $this->container['overdue_notice_email'] = isset($data['overdue_notice_email']) ? $data['overdue_notice_email'] : null;
        $this->container['phone_number'] = isset($data['phone_number']) ? $data['phone_number'] : null;
        $this->container['phone_number_mobile'] = isset($data['phone_number_mobile']) ? $data['phone_number_mobile'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['is_private_individual'] = isset($data['is_private_individual']) ? $data['is_private_individual'] : false;
        $this->container['show_products'] = isset($data['show_products']) ? $data['show_products'] : false;
        $this->container['account_manager'] = isset($data['account_manager']) ? $data['account_manager'] : null;
        $this->container['postal_address'] = isset($data['postal_address']) ? $data['postal_address'] : null;
        $this->container['physical_address'] = isset($data['physical_address']) ? $data['physical_address'] : null;
        $this->container['delivery_address'] = isset($data['delivery_address']) ? $data['delivery_address'] : null;
        $this->container['category1'] = isset($data['category1']) ? $data['category1'] : null;
        $this->container['category2'] = isset($data['category2']) ? $data['category2'] : null;
        $this->container['category3'] = isset($data['category3']) ? $data['category3'] : null;
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
     * Gets organization_number
     *
     * @return string
     */
    public function getOrganizationNumber()
    {
        return $this->container['organization_number'];
    }

    /**
     * Sets organization_number
     *
     * @param string $organization_number organization_number
     *
     * @return $this
     */
    public function setOrganizationNumber($organization_number)
    {
        $this->container['organization_number'] = $organization_number;

        return $this;
    }

    /**
     * Gets supplier_number
     *
     * @return int
     */
    public function getSupplierNumber()
    {
        return $this->container['supplier_number'];
    }

    /**
     * Sets supplier_number
     *
     * @param int $supplier_number supplier_number
     *
     * @return $this
     */
    public function setSupplierNumber($supplier_number)
    {
        $this->container['supplier_number'] = $supplier_number;

        return $this;
    }

    /**
     * Gets customer_number
     *
     * @return int
     */
    public function getCustomerNumber()
    {
        return $this->container['customer_number'];
    }

    /**
     * Sets customer_number
     *
     * @param int $customer_number customer_number
     *
     * @return $this
     */
    public function setCustomerNumber($customer_number)
    {
        $this->container['customer_number'] = $customer_number;

        return $this;
    }

    /**
     * Gets is_supplier
     *
     * @return bool
     */
    public function getIsSupplier()
    {
        return $this->container['is_supplier'];
    }

    /**
     * Sets is_supplier
     *
     * @param bool $is_supplier is_supplier
     *
     * @return $this
     */
    public function setIsSupplier($is_supplier)
    {
        $this->container['is_supplier'] = $is_supplier;

        return $this;
    }

    /**
     * Gets is_customer
     *
     * @return bool
     */
    public function getIsCustomer()
    {
        return $this->container['is_customer'];
    }

    /**
     * Sets is_customer
     *
     * @param bool $is_customer Determine if the supplier is also a customer
     *
     * @return $this
     */
    public function setIsCustomer($is_customer)
    {
        $this->container['is_customer'] = $is_customer;

        return $this;
    }

    /**
     * Gets is_inactive
     *
     * @return bool
     */
    public function getIsInactive()
    {
        return $this->container['is_inactive'];
    }

    /**
     * Sets is_inactive
     *
     * @param bool $is_inactive is_inactive
     *
     * @return $this
     */
    public function setIsInactive($is_inactive)
    {
        $this->container['is_inactive'] = $is_inactive;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets bank_accounts
     *
     * @return string[]
     */
    public function getBankAccounts()
    {
        return $this->container['bank_accounts'];
    }

    /**
     * Sets bank_accounts
     *
     * @param string[] $bank_accounts List of the bank account numbers for this supplier.  Norwegian bank account numbers only.
     *
     * @return $this
     */
    public function setBankAccounts($bank_accounts)
    {
        $this->container['bank_accounts'] = $bank_accounts;

        return $this;
    }

    /**
     * Gets invoice_email
     *
     * @return string
     */
    public function getInvoiceEmail()
    {
        return $this->container['invoice_email'];
    }

    /**
     * Sets invoice_email
     *
     * @param string $invoice_email invoice_email
     *
     * @return $this
     */
    public function setInvoiceEmail($invoice_email)
    {
        $this->container['invoice_email'] = $invoice_email;

        return $this;
    }

    /**
     * Gets overdue_notice_email
     *
     * @return string
     */
    public function getOverdueNoticeEmail()
    {
        return $this->container['overdue_notice_email'];
    }

    /**
     * Sets overdue_notice_email
     *
     * @param string $overdue_notice_email The email address of the customer where the noticing emails are sent in case of an overdue
     *
     * @return $this
     */
    public function setOverdueNoticeEmail($overdue_notice_email)
    {
        $this->container['overdue_notice_email'] = $overdue_notice_email;

        return $this;
    }

    /**
     * Gets phone_number
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->container['phone_number'];
    }

    /**
     * Sets phone_number
     *
     * @param string $phone_number phone_number
     *
     * @return $this
     */
    public function setPhoneNumber($phone_number)
    {
        $this->container['phone_number'] = $phone_number;

        return $this;
    }

    /**
     * Gets phone_number_mobile
     *
     * @return string
     */
    public function getPhoneNumberMobile()
    {
        return $this->container['phone_number_mobile'];
    }

    /**
     * Sets phone_number_mobile
     *
     * @param string $phone_number_mobile phone_number_mobile
     *
     * @return $this
     */
    public function setPhoneNumberMobile($phone_number_mobile)
    {
        $this->container['phone_number_mobile'] = $phone_number_mobile;

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
     * Gets is_private_individual
     *
     * @return bool
     */
    public function getIsPrivateIndividual()
    {
        return $this->container['is_private_individual'];
    }

    /**
     * Sets is_private_individual
     *
     * @param bool $is_private_individual is_private_individual
     *
     * @return $this
     */
    public function setIsPrivateIndividual($is_private_individual)
    {
        $this->container['is_private_individual'] = $is_private_individual;

        return $this;
    }

    /**
     * Gets show_products
     *
     * @return bool
     */
    public function getShowProducts()
    {
        return $this->container['show_products'];
    }

    /**
     * Sets show_products
     *
     * @param bool $show_products show_products
     *
     * @return $this
     */
    public function setShowProducts($show_products)
    {
        $this->container['show_products'] = $show_products;

        return $this;
    }

    /**
     * Gets account_manager
     *
     * @return \Swagger\Client\Model\Employee
     */
    public function getAccountManager()
    {
        return $this->container['account_manager'];
    }

    /**
     * Sets account_manager
     *
     * @param \Swagger\Client\Model\Employee $account_manager account_manager
     *
     * @return $this
     */
    public function setAccountManager($account_manager)
    {
        $this->container['account_manager'] = $account_manager;

        return $this;
    }

    /**
     * Gets postal_address
     *
     * @return \Swagger\Client\Model\Address
     */
    public function getPostalAddress()
    {
        return $this->container['postal_address'];
    }

    /**
     * Sets postal_address
     *
     * @param \Swagger\Client\Model\Address $postal_address postal_address
     *
     * @return $this
     */
    public function setPostalAddress($postal_address)
    {
        $this->container['postal_address'] = $postal_address;

        return $this;
    }

    /**
     * Gets physical_address
     *
     * @return \Swagger\Client\Model\Address
     */
    public function getPhysicalAddress()
    {
        return $this->container['physical_address'];
    }

    /**
     * Sets physical_address
     *
     * @param \Swagger\Client\Model\Address $physical_address physical_address
     *
     * @return $this
     */
    public function setPhysicalAddress($physical_address)
    {
        $this->container['physical_address'] = $physical_address;

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
     * Gets category1
     *
     * @return \Swagger\Client\Model\CustomerCategory
     */
    public function getCategory1()
    {
        return $this->container['category1'];
    }

    /**
     * Sets category1
     *
     * @param \Swagger\Client\Model\CustomerCategory $category1 category1
     *
     * @return $this
     */
    public function setCategory1($category1)
    {
        $this->container['category1'] = $category1;

        return $this;
    }

    /**
     * Gets category2
     *
     * @return \Swagger\Client\Model\CustomerCategory
     */
    public function getCategory2()
    {
        return $this->container['category2'];
    }

    /**
     * Sets category2
     *
     * @param \Swagger\Client\Model\CustomerCategory $category2 category2
     *
     * @return $this
     */
    public function setCategory2($category2)
    {
        $this->container['category2'] = $category2;

        return $this;
    }

    /**
     * Gets category3
     *
     * @return \Swagger\Client\Model\CustomerCategory
     */
    public function getCategory3()
    {
        return $this->container['category3'];
    }

    /**
     * Sets category3
     *
     * @param \Swagger\Client\Model\CustomerCategory $category3 category3
     *
     * @return $this
     */
    public function setCategory3($category3)
    {
        $this->container['category3'] = $category3;

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

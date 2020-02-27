<?php
/**
 * AppSpecific
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
 * AppSpecific Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class AppSpecific implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'AppSpecific';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'hour_registration_enabled' => 'bool',
'project_enabled' => 'bool',
'user_is_allowed_to_register_hours' => 'bool',
'payroll_accounting_enabled' => 'bool',
'user_is_auth_wage_menu' => 'bool',
'user_is_auth_my_salary' => 'bool',
'electronic_vouchers_enabled' => 'bool',
'travel_expense_enabled' => 'bool',
'document_archive_enabled' => 'bool',
'archive_reception_enabled' => 'bool',
'user_is_payslip_only' => 'bool',
'travel_expense_rates_enabled' => 'bool',
'tax_free_mileage_rates_enabled' => 'bool',
'approve_travel_expense_enabled' => 'bool',
'user_is_auth_project_info' => 'bool',
'user_is_auth_travel_and_expense_approve' => 'bool',
'user_is_auth_employee_info' => 'bool',
'user_is_auth_voucher_approve' => 'bool',
'user_is_auth_remit_approve' => 'bool',
'vat_on_for_company' => 'bool'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'hour_registration_enabled' => null,
'project_enabled' => null,
'user_is_allowed_to_register_hours' => null,
'payroll_accounting_enabled' => null,
'user_is_auth_wage_menu' => null,
'user_is_auth_my_salary' => null,
'electronic_vouchers_enabled' => null,
'travel_expense_enabled' => null,
'document_archive_enabled' => null,
'archive_reception_enabled' => null,
'user_is_payslip_only' => null,
'travel_expense_rates_enabled' => null,
'tax_free_mileage_rates_enabled' => null,
'approve_travel_expense_enabled' => null,
'user_is_auth_project_info' => null,
'user_is_auth_travel_and_expense_approve' => null,
'user_is_auth_employee_info' => null,
'user_is_auth_voucher_approve' => null,
'user_is_auth_remit_approve' => null,
'vat_on_for_company' => null    ];

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
        'hour_registration_enabled' => 'hourRegistrationEnabled',
'project_enabled' => 'projectEnabled',
'user_is_allowed_to_register_hours' => 'userIsAllowedToRegisterHours',
'payroll_accounting_enabled' => 'payrollAccountingEnabled',
'user_is_auth_wage_menu' => 'userIsAuthWageMenu',
'user_is_auth_my_salary' => 'userIsAuthMySalary',
'electronic_vouchers_enabled' => 'electronicVouchersEnabled',
'travel_expense_enabled' => 'travelExpenseEnabled',
'document_archive_enabled' => 'documentArchiveEnabled',
'archive_reception_enabled' => 'archiveReceptionEnabled',
'user_is_payslip_only' => 'userIsPayslipOnly',
'travel_expense_rates_enabled' => 'travelExpenseRatesEnabled',
'tax_free_mileage_rates_enabled' => 'taxFreeMileageRatesEnabled',
'approve_travel_expense_enabled' => 'approveTravelExpenseEnabled',
'user_is_auth_project_info' => 'userIsAuthProjectInfo',
'user_is_auth_travel_and_expense_approve' => 'userIsAuthTravelAndExpenseApprove',
'user_is_auth_employee_info' => 'userIsAuthEmployeeInfo',
'user_is_auth_voucher_approve' => 'userIsAuthVoucherApprove',
'user_is_auth_remit_approve' => 'userIsAuthRemitApprove',
'vat_on_for_company' => 'vatOnForCompany'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'hour_registration_enabled' => 'setHourRegistrationEnabled',
'project_enabled' => 'setProjectEnabled',
'user_is_allowed_to_register_hours' => 'setUserIsAllowedToRegisterHours',
'payroll_accounting_enabled' => 'setPayrollAccountingEnabled',
'user_is_auth_wage_menu' => 'setUserIsAuthWageMenu',
'user_is_auth_my_salary' => 'setUserIsAuthMySalary',
'electronic_vouchers_enabled' => 'setElectronicVouchersEnabled',
'travel_expense_enabled' => 'setTravelExpenseEnabled',
'document_archive_enabled' => 'setDocumentArchiveEnabled',
'archive_reception_enabled' => 'setArchiveReceptionEnabled',
'user_is_payslip_only' => 'setUserIsPayslipOnly',
'travel_expense_rates_enabled' => 'setTravelExpenseRatesEnabled',
'tax_free_mileage_rates_enabled' => 'setTaxFreeMileageRatesEnabled',
'approve_travel_expense_enabled' => 'setApproveTravelExpenseEnabled',
'user_is_auth_project_info' => 'setUserIsAuthProjectInfo',
'user_is_auth_travel_and_expense_approve' => 'setUserIsAuthTravelAndExpenseApprove',
'user_is_auth_employee_info' => 'setUserIsAuthEmployeeInfo',
'user_is_auth_voucher_approve' => 'setUserIsAuthVoucherApprove',
'user_is_auth_remit_approve' => 'setUserIsAuthRemitApprove',
'vat_on_for_company' => 'setVatOnForCompany'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'hour_registration_enabled' => 'getHourRegistrationEnabled',
'project_enabled' => 'getProjectEnabled',
'user_is_allowed_to_register_hours' => 'getUserIsAllowedToRegisterHours',
'payroll_accounting_enabled' => 'getPayrollAccountingEnabled',
'user_is_auth_wage_menu' => 'getUserIsAuthWageMenu',
'user_is_auth_my_salary' => 'getUserIsAuthMySalary',
'electronic_vouchers_enabled' => 'getElectronicVouchersEnabled',
'travel_expense_enabled' => 'getTravelExpenseEnabled',
'document_archive_enabled' => 'getDocumentArchiveEnabled',
'archive_reception_enabled' => 'getArchiveReceptionEnabled',
'user_is_payslip_only' => 'getUserIsPayslipOnly',
'travel_expense_rates_enabled' => 'getTravelExpenseRatesEnabled',
'tax_free_mileage_rates_enabled' => 'getTaxFreeMileageRatesEnabled',
'approve_travel_expense_enabled' => 'getApproveTravelExpenseEnabled',
'user_is_auth_project_info' => 'getUserIsAuthProjectInfo',
'user_is_auth_travel_and_expense_approve' => 'getUserIsAuthTravelAndExpenseApprove',
'user_is_auth_employee_info' => 'getUserIsAuthEmployeeInfo',
'user_is_auth_voucher_approve' => 'getUserIsAuthVoucherApprove',
'user_is_auth_remit_approve' => 'getUserIsAuthRemitApprove',
'vat_on_for_company' => 'getVatOnForCompany'    ];

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
        $this->container['hour_registration_enabled'] = isset($data['hour_registration_enabled']) ? $data['hour_registration_enabled'] : false;
        $this->container['project_enabled'] = isset($data['project_enabled']) ? $data['project_enabled'] : false;
        $this->container['user_is_allowed_to_register_hours'] = isset($data['user_is_allowed_to_register_hours']) ? $data['user_is_allowed_to_register_hours'] : false;
        $this->container['payroll_accounting_enabled'] = isset($data['payroll_accounting_enabled']) ? $data['payroll_accounting_enabled'] : false;
        $this->container['user_is_auth_wage_menu'] = isset($data['user_is_auth_wage_menu']) ? $data['user_is_auth_wage_menu'] : false;
        $this->container['user_is_auth_my_salary'] = isset($data['user_is_auth_my_salary']) ? $data['user_is_auth_my_salary'] : false;
        $this->container['electronic_vouchers_enabled'] = isset($data['electronic_vouchers_enabled']) ? $data['electronic_vouchers_enabled'] : false;
        $this->container['travel_expense_enabled'] = isset($data['travel_expense_enabled']) ? $data['travel_expense_enabled'] : false;
        $this->container['document_archive_enabled'] = isset($data['document_archive_enabled']) ? $data['document_archive_enabled'] : false;
        $this->container['archive_reception_enabled'] = isset($data['archive_reception_enabled']) ? $data['archive_reception_enabled'] : false;
        $this->container['user_is_payslip_only'] = isset($data['user_is_payslip_only']) ? $data['user_is_payslip_only'] : false;
        $this->container['travel_expense_rates_enabled'] = isset($data['travel_expense_rates_enabled']) ? $data['travel_expense_rates_enabled'] : false;
        $this->container['tax_free_mileage_rates_enabled'] = isset($data['tax_free_mileage_rates_enabled']) ? $data['tax_free_mileage_rates_enabled'] : false;
        $this->container['approve_travel_expense_enabled'] = isset($data['approve_travel_expense_enabled']) ? $data['approve_travel_expense_enabled'] : false;
        $this->container['user_is_auth_project_info'] = isset($data['user_is_auth_project_info']) ? $data['user_is_auth_project_info'] : false;
        $this->container['user_is_auth_travel_and_expense_approve'] = isset($data['user_is_auth_travel_and_expense_approve']) ? $data['user_is_auth_travel_and_expense_approve'] : false;
        $this->container['user_is_auth_employee_info'] = isset($data['user_is_auth_employee_info']) ? $data['user_is_auth_employee_info'] : false;
        $this->container['user_is_auth_voucher_approve'] = isset($data['user_is_auth_voucher_approve']) ? $data['user_is_auth_voucher_approve'] : false;
        $this->container['user_is_auth_remit_approve'] = isset($data['user_is_auth_remit_approve']) ? $data['user_is_auth_remit_approve'] : false;
        $this->container['vat_on_for_company'] = isset($data['vat_on_for_company']) ? $data['vat_on_for_company'] : false;
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
     * Gets hour_registration_enabled
     *
     * @return bool
     */
    public function getHourRegistrationEnabled()
    {
        return $this->container['hour_registration_enabled'];
    }

    /**
     * Sets hour_registration_enabled
     *
     * @param bool $hour_registration_enabled hour_registration_enabled
     *
     * @return $this
     */
    public function setHourRegistrationEnabled($hour_registration_enabled)
    {
        $this->container['hour_registration_enabled'] = $hour_registration_enabled;

        return $this;
    }

    /**
     * Gets project_enabled
     *
     * @return bool
     */
    public function getProjectEnabled()
    {
        return $this->container['project_enabled'];
    }

    /**
     * Sets project_enabled
     *
     * @param bool $project_enabled project_enabled
     *
     * @return $this
     */
    public function setProjectEnabled($project_enabled)
    {
        $this->container['project_enabled'] = $project_enabled;

        return $this;
    }

    /**
     * Gets user_is_allowed_to_register_hours
     *
     * @return bool
     */
    public function getUserIsAllowedToRegisterHours()
    {
        return $this->container['user_is_allowed_to_register_hours'];
    }

    /**
     * Sets user_is_allowed_to_register_hours
     *
     * @param bool $user_is_allowed_to_register_hours user_is_allowed_to_register_hours
     *
     * @return $this
     */
    public function setUserIsAllowedToRegisterHours($user_is_allowed_to_register_hours)
    {
        $this->container['user_is_allowed_to_register_hours'] = $user_is_allowed_to_register_hours;

        return $this;
    }

    /**
     * Gets payroll_accounting_enabled
     *
     * @return bool
     */
    public function getPayrollAccountingEnabled()
    {
        return $this->container['payroll_accounting_enabled'];
    }

    /**
     * Sets payroll_accounting_enabled
     *
     * @param bool $payroll_accounting_enabled payroll_accounting_enabled
     *
     * @return $this
     */
    public function setPayrollAccountingEnabled($payroll_accounting_enabled)
    {
        $this->container['payroll_accounting_enabled'] = $payroll_accounting_enabled;

        return $this;
    }

    /**
     * Gets user_is_auth_wage_menu
     *
     * @return bool
     */
    public function getUserIsAuthWageMenu()
    {
        return $this->container['user_is_auth_wage_menu'];
    }

    /**
     * Sets user_is_auth_wage_menu
     *
     * @param bool $user_is_auth_wage_menu user_is_auth_wage_menu
     *
     * @return $this
     */
    public function setUserIsAuthWageMenu($user_is_auth_wage_menu)
    {
        $this->container['user_is_auth_wage_menu'] = $user_is_auth_wage_menu;

        return $this;
    }

    /**
     * Gets user_is_auth_my_salary
     *
     * @return bool
     */
    public function getUserIsAuthMySalary()
    {
        return $this->container['user_is_auth_my_salary'];
    }

    /**
     * Sets user_is_auth_my_salary
     *
     * @param bool $user_is_auth_my_salary user_is_auth_my_salary
     *
     * @return $this
     */
    public function setUserIsAuthMySalary($user_is_auth_my_salary)
    {
        $this->container['user_is_auth_my_salary'] = $user_is_auth_my_salary;

        return $this;
    }

    /**
     * Gets electronic_vouchers_enabled
     *
     * @return bool
     */
    public function getElectronicVouchersEnabled()
    {
        return $this->container['electronic_vouchers_enabled'];
    }

    /**
     * Sets electronic_vouchers_enabled
     *
     * @param bool $electronic_vouchers_enabled electronic_vouchers_enabled
     *
     * @return $this
     */
    public function setElectronicVouchersEnabled($electronic_vouchers_enabled)
    {
        $this->container['electronic_vouchers_enabled'] = $electronic_vouchers_enabled;

        return $this;
    }

    /**
     * Gets travel_expense_enabled
     *
     * @return bool
     */
    public function getTravelExpenseEnabled()
    {
        return $this->container['travel_expense_enabled'];
    }

    /**
     * Sets travel_expense_enabled
     *
     * @param bool $travel_expense_enabled travel_expense_enabled
     *
     * @return $this
     */
    public function setTravelExpenseEnabled($travel_expense_enabled)
    {
        $this->container['travel_expense_enabled'] = $travel_expense_enabled;

        return $this;
    }

    /**
     * Gets document_archive_enabled
     *
     * @return bool
     */
    public function getDocumentArchiveEnabled()
    {
        return $this->container['document_archive_enabled'];
    }

    /**
     * Sets document_archive_enabled
     *
     * @param bool $document_archive_enabled document_archive_enabled
     *
     * @return $this
     */
    public function setDocumentArchiveEnabled($document_archive_enabled)
    {
        $this->container['document_archive_enabled'] = $document_archive_enabled;

        return $this;
    }

    /**
     * Gets archive_reception_enabled
     *
     * @return bool
     */
    public function getArchiveReceptionEnabled()
    {
        return $this->container['archive_reception_enabled'];
    }

    /**
     * Sets archive_reception_enabled
     *
     * @param bool $archive_reception_enabled archive_reception_enabled
     *
     * @return $this
     */
    public function setArchiveReceptionEnabled($archive_reception_enabled)
    {
        $this->container['archive_reception_enabled'] = $archive_reception_enabled;

        return $this;
    }

    /**
     * Gets user_is_payslip_only
     *
     * @return bool
     */
    public function getUserIsPayslipOnly()
    {
        return $this->container['user_is_payslip_only'];
    }

    /**
     * Sets user_is_payslip_only
     *
     * @param bool $user_is_payslip_only user_is_payslip_only
     *
     * @return $this
     */
    public function setUserIsPayslipOnly($user_is_payslip_only)
    {
        $this->container['user_is_payslip_only'] = $user_is_payslip_only;

        return $this;
    }

    /**
     * Gets travel_expense_rates_enabled
     *
     * @return bool
     */
    public function getTravelExpenseRatesEnabled()
    {
        return $this->container['travel_expense_rates_enabled'];
    }

    /**
     * Sets travel_expense_rates_enabled
     *
     * @param bool $travel_expense_rates_enabled travel_expense_rates_enabled
     *
     * @return $this
     */
    public function setTravelExpenseRatesEnabled($travel_expense_rates_enabled)
    {
        $this->container['travel_expense_rates_enabled'] = $travel_expense_rates_enabled;

        return $this;
    }

    /**
     * Gets tax_free_mileage_rates_enabled
     *
     * @return bool
     */
    public function getTaxFreeMileageRatesEnabled()
    {
        return $this->container['tax_free_mileage_rates_enabled'];
    }

    /**
     * Sets tax_free_mileage_rates_enabled
     *
     * @param bool $tax_free_mileage_rates_enabled tax_free_mileage_rates_enabled
     *
     * @return $this
     */
    public function setTaxFreeMileageRatesEnabled($tax_free_mileage_rates_enabled)
    {
        $this->container['tax_free_mileage_rates_enabled'] = $tax_free_mileage_rates_enabled;

        return $this;
    }

    /**
     * Gets approve_travel_expense_enabled
     *
     * @return bool
     */
    public function getApproveTravelExpenseEnabled()
    {
        return $this->container['approve_travel_expense_enabled'];
    }

    /**
     * Sets approve_travel_expense_enabled
     *
     * @param bool $approve_travel_expense_enabled approve_travel_expense_enabled
     *
     * @return $this
     */
    public function setApproveTravelExpenseEnabled($approve_travel_expense_enabled)
    {
        $this->container['approve_travel_expense_enabled'] = $approve_travel_expense_enabled;

        return $this;
    }

    /**
     * Gets user_is_auth_project_info
     *
     * @return bool
     */
    public function getUserIsAuthProjectInfo()
    {
        return $this->container['user_is_auth_project_info'];
    }

    /**
     * Sets user_is_auth_project_info
     *
     * @param bool $user_is_auth_project_info user_is_auth_project_info
     *
     * @return $this
     */
    public function setUserIsAuthProjectInfo($user_is_auth_project_info)
    {
        $this->container['user_is_auth_project_info'] = $user_is_auth_project_info;

        return $this;
    }

    /**
     * Gets user_is_auth_travel_and_expense_approve
     *
     * @return bool
     */
    public function getUserIsAuthTravelAndExpenseApprove()
    {
        return $this->container['user_is_auth_travel_and_expense_approve'];
    }

    /**
     * Sets user_is_auth_travel_and_expense_approve
     *
     * @param bool $user_is_auth_travel_and_expense_approve user_is_auth_travel_and_expense_approve
     *
     * @return $this
     */
    public function setUserIsAuthTravelAndExpenseApprove($user_is_auth_travel_and_expense_approve)
    {
        $this->container['user_is_auth_travel_and_expense_approve'] = $user_is_auth_travel_and_expense_approve;

        return $this;
    }

    /**
     * Gets user_is_auth_employee_info
     *
     * @return bool
     */
    public function getUserIsAuthEmployeeInfo()
    {
        return $this->container['user_is_auth_employee_info'];
    }

    /**
     * Sets user_is_auth_employee_info
     *
     * @param bool $user_is_auth_employee_info user_is_auth_employee_info
     *
     * @return $this
     */
    public function setUserIsAuthEmployeeInfo($user_is_auth_employee_info)
    {
        $this->container['user_is_auth_employee_info'] = $user_is_auth_employee_info;

        return $this;
    }

    /**
     * Gets user_is_auth_voucher_approve
     *
     * @return bool
     */
    public function getUserIsAuthVoucherApprove()
    {
        return $this->container['user_is_auth_voucher_approve'];
    }

    /**
     * Sets user_is_auth_voucher_approve
     *
     * @param bool $user_is_auth_voucher_approve user_is_auth_voucher_approve
     *
     * @return $this
     */
    public function setUserIsAuthVoucherApprove($user_is_auth_voucher_approve)
    {
        $this->container['user_is_auth_voucher_approve'] = $user_is_auth_voucher_approve;

        return $this;
    }

    /**
     * Gets user_is_auth_remit_approve
     *
     * @return bool
     */
    public function getUserIsAuthRemitApprove()
    {
        return $this->container['user_is_auth_remit_approve'];
    }

    /**
     * Sets user_is_auth_remit_approve
     *
     * @param bool $user_is_auth_remit_approve user_is_auth_remit_approve
     *
     * @return $this
     */
    public function setUserIsAuthRemitApprove($user_is_auth_remit_approve)
    {
        $this->container['user_is_auth_remit_approve'] = $user_is_auth_remit_approve;

        return $this;
    }

    /**
     * Gets vat_on_for_company
     *
     * @return bool
     */
    public function getVatOnForCompany()
    {
        return $this->container['vat_on_for_company'];
    }

    /**
     * Sets vat_on_for_company
     *
     * @param bool $vat_on_for_company vat_on_for_company
     *
     * @return $this
     */
    public function setVatOnForCompany($vat_on_for_company)
    {
        $this->container['vat_on_for_company'] = $vat_on_for_company;

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

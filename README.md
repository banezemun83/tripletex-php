# SwaggerClient-php
The Tripletex API is a **RESTful API**, which does not implement PATCH, but uses a PUT with optional fields.  **Actions** or commands are represented in our RESTful path with a prefixed `:`. Example: `/v2/hours/123/:approve`.  **Summaries** or aggregated results are represented in our RESTful path with a prefixed <code>&gt;</code>. Example: <code>/v2/hours/&gt;thisWeeksBillables</code>.  **\"requestID\"** is a key found in all responses in the header with the name `x-tlx-request-id`. For validation and error responses it is also in the response body. If additional log information is absolutely necessary, our support division can locate the key value.  **Download** the [swagger.json](/v2/swagger.json) file [OpenAPI Specification](https://github.com/OAI/OpenAPI-Specification) to [generate code](https://github.com/swagger-api/swagger-codegen). This document was generated from the Swagger JSON file.  **version:** This is a versioning number found on all DB records. If included, it will prevent your PUT/POST from overriding any updates to the record since your GET.  **Date & DateTime** follows the **ISO 8601** standard. Date: `YYYY-MM-DD`. DateTime: `YYYY-MM-DDThh:mm:ssZ`  **Sorting** is done by specifying a comma separated list, where a `-` prefix denotes descending. You can sort by sub object with the following format: `project.name, -date`.  **Searching:** is done by entering values in the optional fields for each API call. The values fall into the following categories: range, in, exact and like.  **Missing fields or even no response data** can occur because result objects and fields are filtered on authorization.  **See [FAQ](https://tripletex.no/execute/docViewer?articleId=906&language=0) for more additional information.**   ## Authentication: - **Tokens:** The Tripletex API uses 3 different tokens - **consumerToken**, **employeeToken** and **sessionToken**.  - **consumerToken** is a token provided to the consumer by Tripletex after the API 2.0 registration is completed.  - **employeeToken** is a token created by an administrator in your Tripletex account via the user settings and the tab \"API access\". Each employee token must be given a set of entitlements. [Read more here.](https://tripletex.no/execute/docViewer?articleId=853&language=0)  - **sessionToken** is the token from `/token/session/:create` which requires a consumerToken and an employeeToken created with the same consumer token, but not an authentication header. See how to create a sessionToken [here](https://tripletex.no/execute/docViewer?articleId=855&language=0). - The session token is used as the password in \"Basic Authentication Header\" for API calls.  - Use blank or `0` as username for accessing the account with regular employee token, or if a company owned employee token accesses <code>/company/&gt;withLoginAccess</code> or <code>/token/session/&gt;whoAmI</code>.  - For company owned employee tokens (accounting offices) the ID from <code>/company/&gt;withLoginAccess</code> can be used as username for accessing client accounts.  - If you need to create the header yourself use <code>Authorization: Basic &lt;base64encode('0:sessionToken')&gt;</code>.   ## Tags: - **[BETA]** This is a beta endpoint and can be subject to change. - **[DEPRECATED]** Deprecated means that we intend to remove/change this feature or capability in a future \"major\" API release. We therefore discourage all use of this feature/capability.  ## Fields: Use the `fields` parameter to specify which fields should be returned. This also supports fields from sub elements. Example values: - `project,activity,hours`  returns `{project:..., activity:...., hours:...}`. - just `project` returns `\"project\" : { \"id\": 12345, \"url\": \"tripletex.no/v2/projects/12345\"  }`. - `project(*)` returns `\"project\" : { \"id\": 12345 \"name\":\"ProjectName\" \"number.....startDate\": \"2013-01-07\" }`. - `project(name)` returns `\"project\" : { \"name\":\"ProjectName\" }`. - All elements and some subElements :  `*,activity(name),employee(*)`.  ## Changes: To get the changes for a resource, `changes` have to be explicitly specified as part of the `fields` parameter, e.g. `*,changes`. There are currently two types of change available:  - `CREATE` for when the resource was created - `UPDATE` for when the resource was updated  NOTE: For objects created prior to October 24th 2018 the list may be incomplete, but will always contain the CREATE and the last change (if the object has been changed after creation).  ## Rate limiting in each response header: Rate limiting is performed on the API calls for an employee for each API consumer. Status regarding the rate limit is returned as headers: - `X-Rate-Limit-Limit` - The number of allowed requests in the current period. - `X-Rate-Limit-Remaining` - The number of remaining requests. - `X-Rate-Limit-Reset` - The number of seconds left in the current period.  Once the rate limit is hit, all requests will return HTTP status code `429` for the remainder of the current period.   ## Response envelope: ```json {   \"fullResultSize\": ###,   \"from\": ###, // Paging starting from   \"count\": ###, // Paging count   \"versionDigest\": \"Hash of full result\",   \"values\": [...list of objects...] } {   \"value\": {...single object...} } ```   ## WebHook envelope: ```json {   \"subscriptionId\": ###,   \"event\": \"object.verb\", // As listed from /v2/event/   \"id\": ###, // Object id   \"value\": {... single object, null if object.deleted ...} } ```    ## Error/warning envelope: ```json {   \"status\": ###, // HTTP status code   \"code\": #####, // internal status code of event   \"message\": \"Basic feedback message in your language\",   \"link\": \"Link to doc\",   \"developerMessage\": \"More technical message\",   \"validationMessages\": [ // Will be null if Error     {       \"field\": \"Name of field\",       \"message\": \"Validation failure information\"     }   ],   \"requestId\": \"UUID used in any logs\" } ```   ## Status codes / Error codes: - **200 OK** - **201 Created** - From POSTs that create something new. - **204 No Content** - When there is no answer, ex: \"/:anAction\" or DELETE. - **400 Bad request** -   - **4000** Bad Request Exception   - **11000** Illegal Filter Exception   - **12000** Path Param Exception   - **24000**   Cryptography Exception - **401 Unauthorized** - When authentication is required and has failed or has not yet been provided   -  **3000** Authentication Exception - **403 Forbidden** - When AuthorisationManager says no.   -  **9000** Security Exception - **404 Not Found** - For content/IDs that does not exist.   -  **6000** Not Found Exception - **409 Conflict** - Such as an edit conflict between multiple simultaneous updates   -  **7000** Object Exists Exception   -  **8000** Revision Exception   - **10000** Locked Exception   - **14000** Duplicate entry - **422 Bad Request** - For Required fields or things like malformed payload.   - **15000** Value Validation Exception   - **16000** Mapping Exception   - **17000** Sorting Exception   - **18000** Validation Exception   - **21000** Param Exception   - **22000** Invalid JSON Exception   - **23000**   Result Set Too Large Exception - **429 Too Many Requests** - Request rate limit hit - **500 Internal Error** -  Unexpected condition was encountered and no more specific message is suitable   -  **1000** Exception

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 2.39.4-oas3
- Build package: io.swagger.codegen.v3.generators.php.PhpClientCodegen
For more information, please visit [https://github.com/Tripletex/tripletex-api2](https://github.com/Tripletex/tripletex-api2)

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/SwaggerClient-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
    ->setUsername('YOUR_USERNAME')
    ->setPassword('YOUR_PASSWORD');

$apiInstance = new Swagger\Client\Api\ActivityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->get($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivityApi->get: ', $e->getMessage(), PHP_EOL;
}
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
    ->setUsername('YOUR_USERNAME')
    ->setPassword('YOUR_PASSWORD');

$apiInstance = new Swagger\Client\Api\ActivityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 56; // int | Project ID
$employee_id = 56; // int | Employee ID. Defaults to ID of token owner.
$date = "date_example"; // string | yyyy-MM-dd. Defaults to today.
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->getForTimeSheet($project_id, $employee_id, $date, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivityApi->getForTimeSheet: ', $e->getMessage(), PHP_EOL;
}
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
    ->setUsername('YOUR_USERNAME')
    ->setPassword('YOUR_PASSWORD');

$apiInstance = new Swagger\Client\Api\ActivityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Activity(); // \Swagger\Client\Model\Activity | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->post($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivityApi->post: ', $e->getMessage(), PHP_EOL;
}
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
    ->setUsername('YOUR_USERNAME')
    ->setPassword('YOUR_PASSWORD');

$apiInstance = new Swagger\Client\Api\ActivityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Activity()); // \Swagger\Client\Model\Activity[] | JSON representing a list of new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->postList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivityApi->postList: ', $e->getMessage(), PHP_EOL;
}
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
    ->setUsername('YOUR_USERNAME')
    ->setPassword('YOUR_PASSWORD');

$apiInstance = new Swagger\Client\Api\ActivityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$name = "name_example"; // string | Containing
$number = "number_example"; // string | Equals
$description = "description_example"; // string | Containing
$is_project_activity = true; // bool | Equals
$is_general = true; // bool | Equals
$is_chargeable = true; // bool | Equals
$is_task = true; // bool | Equals
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->search($id, $name, $number, $description, $is_project_activity, $is_general, $is_chargeable, $is_task, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivityApi->search: ', $e->getMessage(), PHP_EOL;
}
?>
```

## Documentation for API Endpoints

All URIs are relative to *https://tripletex.no/v2*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ActivityApi* | [**get**](docs/Api/ActivityApi.md#get) | **GET** /activity/{id} | Find activity by ID.
*ActivityApi* | [**getForTimeSheet**](docs/Api/ActivityApi.md#getfortimesheet) | **GET** /activity/&gt;forTimeSheet | Find applicable time sheet activities for an employee on a specific day.
*ActivityApi* | [**post**](docs/Api/ActivityApi.md#post) | **POST** /activity | Add activity.
*ActivityApi* | [**postList**](docs/Api/ActivityApi.md#postlist) | **POST** /activity/list | Add multiple activities.
*ActivityApi* | [**search**](docs/Api/ActivityApi.md#search) | **GET** /activity | Find activities corresponding with sent data.
*AddressApi* | [**get**](docs/Api/AddressApi.md#get) | **GET** /address/{id} | Get address by ID.
*AddressApi* | [**put**](docs/Api/AddressApi.md#put) | **PUT** /address/{id} | Update address.
*AddressApi* | [**put_0**](docs/Api/AddressApi.md#put_0) | **PUT** /deliveryAddress/{id} | Update address.
*AddressApi* | [**search**](docs/Api/AddressApi.md#search) | **GET** /address | Find addresses corresponding with sent data.
*BankApi* | [**search**](docs/Api/BankApi.md#search) | **GET** /bank | [BETA] Find bank corresponding with sent data.
*BankreconciliationApi* | [**adjustment**](docs/Api/BankreconciliationApi.md#adjustment) | **PUT** /bank/reconciliation/{id}/:adjustment | [BETA] Add an adjustment to reconciliation by ID.
*BankreconciliationApi* | [**delete**](docs/Api/BankreconciliationApi.md#delete) | **DELETE** /bank/reconciliation/{id} | [BETA] Delete bank reconciliation by ID.
*BankreconciliationApi* | [**get**](docs/Api/BankreconciliationApi.md#get) | **GET** /bank/reconciliation/{id} | [BETA] Get bank reconciliation.
*BankreconciliationApi* | [**lastClosed**](docs/Api/BankreconciliationApi.md#lastclosed) | **GET** /bank/reconciliation/&gt;lastClosed | [BETA] Get last closed reconciliation by account ID.
*BankreconciliationApi* | [**post**](docs/Api/BankreconciliationApi.md#post) | **POST** /bank/reconciliation | [BETA] Post a bank reconciliation.
*BankreconciliationApi* | [**put**](docs/Api/BankreconciliationApi.md#put) | **PUT** /bank/reconciliation/{id} | [BETA] Update a bank reconciliation.
*BankreconciliationApi* | [**search**](docs/Api/BankreconciliationApi.md#search) | **GET** /bank/reconciliation | [BETA] Find bank reconciliation corresponding with sent data.
*BankreconciliationmatchApi* | [**delete**](docs/Api/BankreconciliationmatchApi.md#delete) | **DELETE** /bank/reconciliation/match/{id} | [BETA] Delete a bank reconciliation match by ID.
*BankreconciliationmatchApi* | [**get**](docs/Api/BankreconciliationmatchApi.md#get) | **GET** /bank/reconciliation/match/{id} | [BETA] Get bank reconciliation match by ID.
*BankreconciliationmatchApi* | [**post**](docs/Api/BankreconciliationmatchApi.md#post) | **POST** /bank/reconciliation/match | [BETA] Create a bank reconciliation match.
*BankreconciliationmatchApi* | [**put**](docs/Api/BankreconciliationmatchApi.md#put) | **PUT** /bank/reconciliation/match/{id} | [BETA] Update a bank reconciliation match by ID.
*BankreconciliationmatchApi* | [**search**](docs/Api/BankreconciliationmatchApi.md#search) | **GET** /bank/reconciliation/match | [BETA] Find bank reconciliation match corresponding with sent data.
*BankreconciliationmatchApi* | [**suggest**](docs/Api/BankreconciliationmatchApi.md#suggest) | **PUT** /bank/reconciliation/match/:suggest | [BETA] Suggest matches for a bank reconciliation by ID.
*BankreconciliationpaymentTypeApi* | [**get**](docs/Api/BankreconciliationpaymentTypeApi.md#get) | **GET** /bank/reconciliation/paymentType/{id} | [BETA] Get payment type by ID.
*BankreconciliationpaymentTypeApi* | [**search**](docs/Api/BankreconciliationpaymentTypeApi.md#search) | **GET** /bank/reconciliation/paymentType | [BETA] Find payment type corresponding with sent data.
*BankstatementApi* | [**delete**](docs/Api/BankstatementApi.md#delete) | **DELETE** /bank/statement/{id} | [BETA] Delete bank statement by ID.
*BankstatementApi* | [**get**](docs/Api/BankstatementApi.md#get) | **GET** /bank/statement/{id} | [BETA] Get bank statement.
*BankstatementApi* | [**importBankStatement**](docs/Api/BankstatementApi.md#importbankstatement) | **POST** /bank/statement/import | [BETA] Upload bank statement file.
*BankstatementApi* | [**search**](docs/Api/BankstatementApi.md#search) | **GET** /bank/statement | [BETA] Find bank statement corresponding with sent data.
*BankstatementtransactionApi* | [**get**](docs/Api/BankstatementtransactionApi.md#get) | **GET** /bank/statement/transaction/{id} | [BETA] Get bank transaction by ID.
*BankstatementtransactionApi* | [**getDetails**](docs/Api/BankstatementtransactionApi.md#getdetails) | **GET** /bank/statement/transaction/{id}/details | [BETA] Get additional details about transaction by ID.
*BankstatementtransactionApi* | [**search**](docs/Api/BankstatementtransactionApi.md#search) | **GET** /bank/statement/transaction | [BETA] Find bank transaction corresponding with sent data.
*CompanyApi* | [**get**](docs/Api/CompanyApi.md#get) | **GET** /company/{id} | Find company by ID.
*CompanyApi* | [**getDivisions**](docs/Api/CompanyApi.md#getdivisions) | **GET** /company/divisions | [DEPRECATED] Find divisions.
*CompanyApi* | [**getWithLoginAccess**](docs/Api/CompanyApi.md#getwithloginaccess) | **GET** /company/&gt;withLoginAccess | Returns client customers (with accountant/auditor relation) where the current user has login access (proxy login).
*CompanyApi* | [**put**](docs/Api/CompanyApi.md#put) | **PUT** /company | Update company information.
*CompanyaltinnApi* | [**put**](docs/Api/CompanyaltinnApi.md#put) | **PUT** /company/settings/altinn | [BETA] Update AltInn id and password.
*CompanyaltinnApi* | [**search**](docs/Api/CompanyaltinnApi.md#search) | **GET** /company/settings/altinn | [BETA] Find Altinn id for login in company.
*CompanysalesmodulesApi* | [**get**](docs/Api/CompanysalesmodulesApi.md#get) | **GET** /company/salesmodules | [BETA] Get active sales modules.
*CompanysalesmodulesApi* | [**post**](docs/Api/CompanysalesmodulesApi.md#post) | **POST** /company/salesmodules | [BETA] Add (activate) a new sales module.
*ContactApi* | [**get**](docs/Api/ContactApi.md#get) | **GET** /contact/{id} | Get contact by ID.
*ContactApi* | [**post**](docs/Api/ContactApi.md#post) | **POST** /contact | Create contact.
*ContactApi* | [**put**](docs/Api/ContactApi.md#put) | **PUT** /contact/{id} | [BETA] Update contact.
*ContactApi* | [**search**](docs/Api/ContactApi.md#search) | **GET** /contact | Find contacts corresponding with sent data.
*CountryApi* | [**get**](docs/Api/CountryApi.md#get) | **GET** /country/{id} | Get country by ID.
*CountryApi* | [**search**](docs/Api/CountryApi.md#search) | **GET** /country | Find countries corresponding with sent data.
*CrmprospectApi* | [**get**](docs/Api/CrmprospectApi.md#get) | **GET** /crm/prospect/{id} | Get prospect by ID.
*CrmprospectApi* | [**search**](docs/Api/CrmprospectApi.md#search) | **GET** /crm/prospect | Find prospects corresponding with sent data.
*CurrencyApi* | [**get**](docs/Api/CurrencyApi.md#get) | **GET** /currency/{id} | Get currency by ID.
*CurrencyApi* | [**getRate**](docs/Api/CurrencyApi.md#getrate) | **GET** /currency/{id}/rate | Find currency exchange rate corresponding with sent data.
*CurrencyApi* | [**search**](docs/Api/CurrencyApi.md#search) | **GET** /currency | Find currencies corresponding with sent data.
*CustomerApi* | [**get**](docs/Api/CustomerApi.md#get) | **GET** /customer/{id} | Get customer by ID.
*CustomerApi* | [**post**](docs/Api/CustomerApi.md#post) | **POST** /customer | Create customer. Related customer addresses may also be created.
*CustomerApi* | [**postList**](docs/Api/CustomerApi.md#postlist) | **POST** /customer/list | [BETA] Create multiple customers. Related supplier addresses may also be created.
*CustomerApi* | [**put**](docs/Api/CustomerApi.md#put) | **PUT** /customer/{id} | Update customer.
*CustomerApi* | [**putList**](docs/Api/CustomerApi.md#putlist) | **PUT** /customer/list | [BETA] Update multiple customers. Addresses can also be updated.
*CustomerApi* | [**search**](docs/Api/CustomerApi.md#search) | **GET** /customer | Find customers corresponding with sent data.
*CustomercategoryApi* | [**get**](docs/Api/CustomercategoryApi.md#get) | **GET** /customer/category/{id} | Find customer/supplier category by ID.
*CustomercategoryApi* | [**post**](docs/Api/CustomercategoryApi.md#post) | **POST** /customer/category | Add new customer/supplier category.
*CustomercategoryApi* | [**put**](docs/Api/CustomercategoryApi.md#put) | **PUT** /customer/category/{id} | Update customer/supplier category.
*CustomercategoryApi* | [**search**](docs/Api/CustomercategoryApi.md#search) | **GET** /customer/category | Find customer/supplier categories corresponding with sent data.
*DeliveryAddressApi* | [**get**](docs/Api/DeliveryAddressApi.md#get) | **GET** /deliveryAddress/{id} | Get address by ID.
*DeliveryAddressApi* | [**search**](docs/Api/DeliveryAddressApi.md#search) | **GET** /deliveryAddress | Find addresses corresponding with sent data.
*DepartmentApi* | [**delete**](docs/Api/DepartmentApi.md#delete) | **DELETE** /department/{id} | Delete department by ID
*DepartmentApi* | [**get**](docs/Api/DepartmentApi.md#get) | **GET** /department/{id} | Get department by ID.
*DepartmentApi* | [**post**](docs/Api/DepartmentApi.md#post) | **POST** /department | [BETA] Add new department.
*DepartmentApi* | [**postList**](docs/Api/DepartmentApi.md#postlist) | **POST** /department/list | [BETA] Register new departments.
*DepartmentApi* | [**put**](docs/Api/DepartmentApi.md#put) | **PUT** /department/{id} | [BETA] Update department.
*DepartmentApi* | [**putList**](docs/Api/DepartmentApi.md#putlist) | **PUT** /department/list | [BETA] Update multiple departments.
*DepartmentApi* | [**search**](docs/Api/DepartmentApi.md#search) | **GET** /department | Find department corresponding with sent data.
*DivisionApi* | [**post**](docs/Api/DivisionApi.md#post) | **POST** /division | [BETA] Create division.
*DivisionApi* | [**postList**](docs/Api/DivisionApi.md#postlist) | **POST** /division/list | [BETA] Create divisions.
*DivisionApi* | [**put**](docs/Api/DivisionApi.md#put) | **PUT** /division/{id} | [BETA] Update division information.
*DivisionApi* | [**putList**](docs/Api/DivisionApi.md#putlist) | **PUT** /division/list | [BETA] Update multiple divisions.
*DivisionApi* | [**search**](docs/Api/DivisionApi.md#search) | **GET** /division | [BETA] Get divisions.
*DocumentApi* | [**downloadContent**](docs/Api/DocumentApi.md#downloadcontent) | **GET** /document/{id}/content | [BETA] Get content of document given by ID.
*DocumentApi* | [**get**](docs/Api/DocumentApi.md#get) | **GET** /document/{id} | [BETA] Get document by ID.
*DocumentArchiveApi* | [**accountPost**](docs/Api/DocumentArchiveApi.md#accountpost) | **POST** /documentArchive/account/{id} | [BETA] Upload file to Account Document Archive.
*DocumentArchiveApi* | [**customerPost**](docs/Api/DocumentArchiveApi.md#customerpost) | **POST** /documentArchive/customer/{id} | [BETA] Upload file to Customer Document Archive.
*DocumentArchiveApi* | [**delete**](docs/Api/DocumentArchiveApi.md#delete) | **DELETE** /documentArchive/{id} | [BETA] Delete document archive.
*DocumentArchiveApi* | [**employeePost**](docs/Api/DocumentArchiveApi.md#employeepost) | **POST** /documentArchive/employee/{id} | [BETA] Upload file to Employee Document Archive.
*DocumentArchiveApi* | [**getAccount**](docs/Api/DocumentArchiveApi.md#getaccount) | **GET** /documentArchive/account/{id} | [BETA] Find documents archived associated with account object type.
*DocumentArchiveApi* | [**getCustomer**](docs/Api/DocumentArchiveApi.md#getcustomer) | **GET** /documentArchive/customer/{id} | [BETA] Find documents archived associated with customer object type.
*DocumentArchiveApi* | [**getEmployee**](docs/Api/DocumentArchiveApi.md#getemployee) | **GET** /documentArchive/employee/{id} | [BETA] Find documents archived associated with employee object type.
*DocumentArchiveApi* | [**getProduct**](docs/Api/DocumentArchiveApi.md#getproduct) | **GET** /documentArchive/product/{id} | [BETA] Find documents archived associated with product object type.
*DocumentArchiveApi* | [**getProject**](docs/Api/DocumentArchiveApi.md#getproject) | **GET** /documentArchive/project/{id} | [BETA] Find documents archived associated with project object type.
*DocumentArchiveApi* | [**getProspect**](docs/Api/DocumentArchiveApi.md#getprospect) | **GET** /documentArchive/prospect/{id} | [BETA] Find documents archived associated with prospect object type.
*DocumentArchiveApi* | [**getSupplier**](docs/Api/DocumentArchiveApi.md#getsupplier) | **GET** /documentArchive/supplier/{id} | [BETA] Find documents archived associated with supplier object type.
*DocumentArchiveApi* | [**productPost**](docs/Api/DocumentArchiveApi.md#productpost) | **POST** /documentArchive/product/{id} | [BETA] Upload file to Product Document Archive.
*DocumentArchiveApi* | [**projectPost**](docs/Api/DocumentArchiveApi.md#projectpost) | **POST** /documentArchive/project/{id} | [BETA] Upload file to Project Document Archive.
*DocumentArchiveApi* | [**prospectPost**](docs/Api/DocumentArchiveApi.md#prospectpost) | **POST** /documentArchive/prospect/{id} | [BETA] Upload file to Prospect Document Archive.
*DocumentArchiveApi* | [**put**](docs/Api/DocumentArchiveApi.md#put) | **PUT** /documentArchive/{id} | [BETA] Update document archive.
*DocumentArchiveApi* | [**receptionPost**](docs/Api/DocumentArchiveApi.md#receptionpost) | **POST** /documentArchive/reception | [BETA] Upload a file to the document archive reception. Send as multipart form.
*DocumentArchiveApi* | [**supplierPost**](docs/Api/DocumentArchiveApi.md#supplierpost) | **POST** /documentArchive/supplier/{id} | [BETA] Upload file to Supplier Document Archive.
*EmployeeApi* | [**get**](docs/Api/EmployeeApi.md#get) | **GET** /employee/{id} | Get employee by ID.
*EmployeeApi* | [**post**](docs/Api/EmployeeApi.md#post) | **POST** /employee | [BETA] Create one employee.
*EmployeeApi* | [**postList**](docs/Api/EmployeeApi.md#postlist) | **POST** /employee/list | [BETA] Create several employees.
*EmployeeApi* | [**put**](docs/Api/EmployeeApi.md#put) | **PUT** /employee/{id} | Update employee.
*EmployeeApi* | [**search**](docs/Api/EmployeeApi.md#search) | **GET** /employee | Find employees corresponding with sent data.
*EmployeeemploymentApi* | [**get**](docs/Api/EmployeeemploymentApi.md#get) | **GET** /employee/employment/{id} | Find employment by ID.
*EmployeeemploymentApi* | [**post**](docs/Api/EmployeeemploymentApi.md#post) | **POST** /employee/employment | [BETA] Create employment.
*EmployeeemploymentApi* | [**put**](docs/Api/EmployeeemploymentApi.md#put) | **PUT** /employee/employment/{id} | [BETA] Update employemnt.
*EmployeeemploymentApi* | [**search**](docs/Api/EmployeeemploymentApi.md#search) | **GET** /employee/employment | Find all employments for employee.
*EmployeeemploymentdetailsApi* | [**get**](docs/Api/EmployeeemploymentdetailsApi.md#get) | **GET** /employee/employment/details/{id} | [BETA] Find employment details by ID.
*EmployeeemploymentdetailsApi* | [**post**](docs/Api/EmployeeemploymentdetailsApi.md#post) | **POST** /employee/employment/details | [BETA] Create employment details.
*EmployeeemploymentdetailsApi* | [**put**](docs/Api/EmployeeemploymentdetailsApi.md#put) | **PUT** /employee/employment/details/{id} | [BETA] Update employment details.
*EmployeeemploymentdetailsApi* | [**search**](docs/Api/EmployeeemploymentdetailsApi.md#search) | **GET** /employee/employment/details | [BETA] Find all employmentdetails for employment.
*EmployeeemploymentemploymentTypeApi* | [**getMaritimeEmploymentType**](docs/Api/EmployeeemploymentemploymentTypeApi.md#getmaritimeemploymenttype) | **GET** /employee/employment/employmentType/maritimeEmploymentType | [BETA] Find all maritime employment type IDs.
*EmployeeemploymentemploymentTypeApi* | [**getSalaryType**](docs/Api/EmployeeemploymentemploymentTypeApi.md#getsalarytype) | **GET** /employee/employment/employmentType/salaryType | [BETA] Find all salary type IDs.
*EmployeeemploymentemploymentTypeApi* | [**getScheduleType**](docs/Api/EmployeeemploymentemploymentTypeApi.md#getscheduletype) | **GET** /employee/employment/employmentType/scheduleType | [BETA] Find all schedule type IDs.
*EmployeeemploymentemploymentTypeApi* | [**search**](docs/Api/EmployeeemploymentemploymentTypeApi.md#search) | **GET** /employee/employment/employmentType | [BETA] Find all employment type IDs.
*EmployeeemploymentleaveOfAbsenceApi* | [**get**](docs/Api/EmployeeemploymentleaveOfAbsenceApi.md#get) | **GET** /employee/employment/leaveOfAbsence/{id} | [BETA] Find leave of absence by ID.
*EmployeeemploymentleaveOfAbsenceApi* | [**post**](docs/Api/EmployeeemploymentleaveOfAbsenceApi.md#post) | **POST** /employee/employment/leaveOfAbsence | [BETA] Create leave of absence.
*EmployeeemploymentleaveOfAbsenceApi* | [**postList**](docs/Api/EmployeeemploymentleaveOfAbsenceApi.md#postlist) | **POST** /employee/employment/leaveOfAbsence/list | [BETA] Create multiple leave of absences.
*EmployeeemploymentleaveOfAbsenceApi* | [**put**](docs/Api/EmployeeemploymentleaveOfAbsenceApi.md#put) | **PUT** /employee/employment/leaveOfAbsence/{id} | [BETA] Update leave of absence.
*EmployeeemploymentleaveOfAbsenceTypeApi* | [**search**](docs/Api/EmployeeemploymentleaveOfAbsenceTypeApi.md#search) | **GET** /employee/employment/leaveOfAbsenceType | [BETA] Find all leave of absence type IDs.
*EmployeeemploymentoccupationCodeApi* | [**search**](docs/Api/EmployeeemploymentoccupationCodeApi.md#search) | **GET** /employee/employment/occupationCode | [BETA] Find all profession codes.
*EmployeeemploymentremunerationTypeApi* | [**search**](docs/Api/EmployeeemploymentremunerationTypeApi.md#search) | **GET** /employee/employment/remunerationType | [BETA] Find all remuneration type IDs.
*EmployeeemploymentworkingHoursSchemeApi* | [**search**](docs/Api/EmployeeemploymentworkingHoursSchemeApi.md#search) | **GET** /employee/employment/workingHoursScheme | [BETA] Find working hours scheme ID.
*EmployeeentitlementApi* | [**client**](docs/Api/EmployeeentitlementApi.md#client) | **GET** /employee/entitlement/client | [BETA] Find all entitlements at client for user.
*EmployeeentitlementApi* | [**get**](docs/Api/EmployeeentitlementApi.md#get) | **GET** /employee/entitlement/{id} | Get entitlement by ID.
*EmployeeentitlementApi* | [**grantClientEntitlementsByTemplate**](docs/Api/EmployeeentitlementApi.md#grantcliententitlementsbytemplate) | **PUT** /employee/entitlement/:grantClientEntitlementsByTemplate | [BETA] Update employee entitlements in client account.
*EmployeeentitlementApi* | [**grantEntitlementsByTemplate**](docs/Api/EmployeeentitlementApi.md#grantentitlementsbytemplate) | **PUT** /employee/entitlement/:grantEntitlementsByTemplate | [BETA] Update employee entitlements.
*EmployeeentitlementApi* | [**search**](docs/Api/EmployeeentitlementApi.md#search) | **GET** /employee/entitlement | Find all entitlements for user.
*EmployeehourlyCostAndRateApi* | [**get**](docs/Api/EmployeehourlyCostAndRateApi.md#get) | **GET** /employee/hourlyCostAndRate/{id} | [BETA] Find hourly cost and rate by ID.
*EmployeehourlyCostAndRateApi* | [**post**](docs/Api/EmployeehourlyCostAndRateApi.md#post) | **POST** /employee/hourlyCostAndRate | [BETA] Create hourly cost and rate.
*EmployeehourlyCostAndRateApi* | [**put**](docs/Api/EmployeehourlyCostAndRateApi.md#put) | **PUT** /employee/hourlyCostAndRate/{id} | [BETA] Update hourly cost and rate.
*EmployeehourlyCostAndRateApi* | [**search**](docs/Api/EmployeehourlyCostAndRateApi.md#search) | **GET** /employee/hourlyCostAndRate | Find all hourly cost and rates for employee.
*EmployeenextOfKinApi* | [**get**](docs/Api/EmployeenextOfKinApi.md#get) | **GET** /employee/nextOfKin/{id} | [BETA] Find next of kin by ID.
*EmployeenextOfKinApi* | [**post**](docs/Api/EmployeenextOfKinApi.md#post) | **POST** /employee/nextOfKin | [BETA] Create next of kin.
*EmployeenextOfKinApi* | [**put**](docs/Api/EmployeenextOfKinApi.md#put) | **PUT** /employee/nextOfKin/{id} | [BETA] Update next of kin.
*EmployeenextOfKinApi* | [**search**](docs/Api/EmployeenextOfKinApi.md#search) | **GET** /employee/nextOfKin | Find all next of kin for employee.
*EmployeestandardTimeApi* | [**get**](docs/Api/EmployeestandardTimeApi.md#get) | **GET** /employee/standardTime/{id} | [BETA] Find standard time by ID.
*EmployeestandardTimeApi* | [**post**](docs/Api/EmployeestandardTimeApi.md#post) | **POST** /employee/standardTime | [BETA] Create standard time.
*EmployeestandardTimeApi* | [**put**](docs/Api/EmployeestandardTimeApi.md#put) | **PUT** /employee/standardTime/{id} | [BETA] Update standard time.
*EmployeestandardTimeApi* | [**search**](docs/Api/EmployeestandardTimeApi.md#search) | **GET** /employee/standardTime | [BETA] Find all standard times for employee.
*EventApi* | [**example**](docs/Api/EventApi.md#example) | **GET** /event/{eventType} | [BETA] Get example webhook payload
*EventApi* | [**get**](docs/Api/EventApi.md#get) | **GET** /event | [BETA] Get all (WebHook) event keys.
*EventsubscriptionApi* | [**delete**](docs/Api/EventsubscriptionApi.md#delete) | **DELETE** /event/subscription/{id} | [BETA] Delete the given subscription.
*EventsubscriptionApi* | [**get**](docs/Api/EventsubscriptionApi.md#get) | **GET** /event/subscription/{id} | [BETA] Get subscription by ID.
*EventsubscriptionApi* | [**post**](docs/Api/EventsubscriptionApi.md#post) | **POST** /event/subscription | [BETA] Create a new subscription for current EmployeeToken.
*EventsubscriptionApi* | [**put**](docs/Api/EventsubscriptionApi.md#put) | **PUT** /event/subscription/{id} | [BETA] Change a current subscription, based on id.
*EventsubscriptionApi* | [**search**](docs/Api/EventsubscriptionApi.md#search) | **GET** /event/subscription | [BETA] Find all ongoing subscriptions.
*InventoryApi* | [**delete**](docs/Api/InventoryApi.md#delete) | **DELETE** /inventory/{id} | [BETA] Delete inventory.
*InventoryApi* | [**get**](docs/Api/InventoryApi.md#get) | **GET** /inventory/{id} | Get inventory by ID.
*InventoryApi* | [**post**](docs/Api/InventoryApi.md#post) | **POST** /inventory | [BETA] Create new inventory.
*InventoryApi* | [**put**](docs/Api/InventoryApi.md#put) | **PUT** /inventory/{id} | [BETA] Update inventory.
*InventoryApi* | [**search**](docs/Api/InventoryApi.md#search) | **GET** /inventory | Find inventory corresponding with sent data.
*InventoryinventoriesApi* | [**search**](docs/Api/InventoryinventoriesApi.md#search) | **GET** /inventory/inventories | [BETA] Find inventories corresponding with sent data.
*InventorystocktakingApi* | [**delete**](docs/Api/InventorystocktakingApi.md#delete) | **DELETE** /inventory/stocktaking/{id} | [BETA] Delete stocktaking.
*InventorystocktakingApi* | [**get**](docs/Api/InventorystocktakingApi.md#get) | **GET** /inventory/stocktaking/{id} | [BETA] Get stocktaking by ID.
*InventorystocktakingApi* | [**post**](docs/Api/InventorystocktakingApi.md#post) | **POST** /inventory/stocktaking | [BETA] Create new stocktaking.
*InventorystocktakingApi* | [**put**](docs/Api/InventorystocktakingApi.md#put) | **PUT** /inventory/stocktaking/{id} | [BETA] Update stocktaking.
*InventorystocktakingApi* | [**search**](docs/Api/InventorystocktakingApi.md#search) | **GET** /inventory/stocktaking | [BETA] Find stocktaking corresponding with sent data.
*InventorystocktakingproductlineApi* | [**delete**](docs/Api/InventorystocktakingproductlineApi.md#delete) | **DELETE** /inventory/stocktaking/productline/{id} | [BETA] Delete product line.
*InventorystocktakingproductlineApi* | [**get**](docs/Api/InventorystocktakingproductlineApi.md#get) | **GET** /inventory/stocktaking/productline/{id} | [BETA] Get product line by ID.
*InventorystocktakingproductlineApi* | [**post**](docs/Api/InventorystocktakingproductlineApi.md#post) | **POST** /inventory/stocktaking/productline | [BETA] Create product line. When creating several product lines, use /list for better performance.
*InventorystocktakingproductlineApi* | [**put**](docs/Api/InventorystocktakingproductlineApi.md#put) | **PUT** /inventory/stocktaking/productline/{id} | [BETA] Update product line.
*InventorystocktakingproductlineApi* | [**search**](docs/Api/InventorystocktakingproductlineApi.md#search) | **GET** /inventory/stocktaking/productline | [BETA] Find all product lines by stocktaking ID.
*InvoiceApi* | [**createCreditNote**](docs/Api/InvoiceApi.md#createcreditnote) | **PUT** /invoice/{id}/:createCreditNote | Creates a new Invoice representing a credit memo that nullifies the given invoice. Updates this invoice and any pre-existing inverse invoice.
*InvoiceApi* | [**createReminder**](docs/Api/InvoiceApi.md#createreminder) | **PUT** /invoice/{id}/:createReminder | Create invoice reminder and sends it by the given dispatch type. Supports the reminder types SOFT_REMINDER, REMINDER and NOTICE_OF_DEBT_COLLECTION. DispatchType NETS_PRINT must have type NOTICE_OF_DEBT_COLLECTION. SMS and NETS_PRINT must be activated prior to usage in the API.
*InvoiceApi* | [**downloadPdf**](docs/Api/InvoiceApi.md#downloadpdf) | **GET** /invoice/{invoiceId}/pdf | Get invoice document by invoice ID.
*InvoiceApi* | [**get**](docs/Api/InvoiceApi.md#get) | **GET** /invoice/{id} | Get invoice by ID.
*InvoiceApi* | [**payment**](docs/Api/InvoiceApi.md#payment) | **PUT** /invoice/{id}/:payment | Update invoice. The invoice is updated with payment information. The amount is in the invoice’s currency.
*InvoiceApi* | [**post**](docs/Api/InvoiceApi.md#post) | **POST** /invoice | Create invoice.
*InvoiceApi* | [**search**](docs/Api/InvoiceApi.md#search) | **GET** /invoice | Find invoices corresponding with sent data. Includes charged outgoing invoices only.
*InvoiceApi* | [**send**](docs/Api/InvoiceApi.md#send) | **PUT** /invoice/{id}/:send | Send invoice by ID and sendType. Optionally override email recipient.
*InvoicedetailsApi* | [**get**](docs/Api/InvoicedetailsApi.md#get) | **GET** /invoice/details/{id} | Get ProjectInvoiceDetails by ID.
*InvoicedetailsApi* | [**search**](docs/Api/InvoicedetailsApi.md#search) | **GET** /invoice/details | Find ProjectInvoiceDetails corresponding with sent data.
*InvoicepaymentTypeApi* | [**get**](docs/Api/InvoicepaymentTypeApi.md#get) | **GET** /invoice/paymentType/{id} | Get payment type by ID.
*InvoicepaymentTypeApi* | [**search**](docs/Api/InvoicepaymentTypeApi.md#search) | **GET** /invoice/paymentType | Find payment type corresponding with sent data.
*LedgerApi* | [**openPost**](docs/Api/LedgerApi.md#openpost) | **GET** /ledger/openPost | Find open posts corresponding with sent data.
*LedgerApi* | [**search**](docs/Api/LedgerApi.md#search) | **GET** /ledger | Get ledger (hovedbok).
*LedgeraccountApi* | [**delete**](docs/Api/LedgeraccountApi.md#delete) | **DELETE** /ledger/account/{id} | [BETA] Delete account.
*LedgeraccountApi* | [**deleteByIds**](docs/Api/LedgeraccountApi.md#deletebyids) | **DELETE** /ledger/account/list | [BETA] Delete multiple accounts.
*LedgeraccountApi* | [**get**](docs/Api/LedgeraccountApi.md#get) | **GET** /ledger/account/{id} | Get account by ID.
*LedgeraccountApi* | [**post**](docs/Api/LedgeraccountApi.md#post) | **POST** /ledger/account | [BETA] Create a new account.
*LedgeraccountApi* | [**postList**](docs/Api/LedgeraccountApi.md#postlist) | **POST** /ledger/account/list | [BETA] Create several accounts.
*LedgeraccountApi* | [**put**](docs/Api/LedgeraccountApi.md#put) | **PUT** /ledger/account/{id} | [BETA] Update account.
*LedgeraccountApi* | [**putList**](docs/Api/LedgeraccountApi.md#putlist) | **PUT** /ledger/account/list | [BETA] Update multiple accounts.
*LedgeraccountApi* | [**search**](docs/Api/LedgeraccountApi.md#search) | **GET** /ledger/account | Find accounts corresponding with sent data.
*LedgeraccountingPeriodApi* | [**get**](docs/Api/LedgeraccountingPeriodApi.md#get) | **GET** /ledger/accountingPeriod/{id} | Get accounting period by ID.
*LedgeraccountingPeriodApi* | [**search**](docs/Api/LedgeraccountingPeriodApi.md#search) | **GET** /ledger/accountingPeriod | Find accounting periods corresponding with sent data.
*LedgerannualAccountApi* | [**get**](docs/Api/LedgerannualAccountApi.md#get) | **GET** /ledger/annualAccount/{id} | Get annual account by ID.
*LedgerannualAccountApi* | [**search**](docs/Api/LedgerannualAccountApi.md#search) | **GET** /ledger/annualAccount | Find annual accounts corresponding with sent data.
*LedgercloseGroupApi* | [**get**](docs/Api/LedgercloseGroupApi.md#get) | **GET** /ledger/closeGroup/{id} | Get close group by ID.
*LedgercloseGroupApi* | [**search**](docs/Api/LedgercloseGroupApi.md#search) | **GET** /ledger/closeGroup | Find close groups corresponding with sent data.
*LedgerpaymentTypeOutApi* | [**delete**](docs/Api/LedgerpaymentTypeOutApi.md#delete) | **DELETE** /ledger/paymentTypeOut/{id} | [BETA] Delete payment type for outgoing payments by ID.
*LedgerpaymentTypeOutApi* | [**get**](docs/Api/LedgerpaymentTypeOutApi.md#get) | **GET** /ledger/paymentTypeOut/{id} | [BETA] Get payment type for outgoing payments by ID.
*LedgerpaymentTypeOutApi* | [**post**](docs/Api/LedgerpaymentTypeOutApi.md#post) | **POST** /ledger/paymentTypeOut | [BETA] Create new payment type for outgoing payments
*LedgerpaymentTypeOutApi* | [**postList**](docs/Api/LedgerpaymentTypeOutApi.md#postlist) | **POST** /ledger/paymentTypeOut/list | [BETA] Create multiple payment types for outgoing payments at once
*LedgerpaymentTypeOutApi* | [**put**](docs/Api/LedgerpaymentTypeOutApi.md#put) | **PUT** /ledger/paymentTypeOut/{id} | [BETA] Update existing payment type for outgoing payments
*LedgerpaymentTypeOutApi* | [**putList**](docs/Api/LedgerpaymentTypeOutApi.md#putlist) | **PUT** /ledger/paymentTypeOut/list | [BETA] Update multiple payment types for outgoing payments at once
*LedgerpaymentTypeOutApi* | [**search**](docs/Api/LedgerpaymentTypeOutApi.md#search) | **GET** /ledger/paymentTypeOut | [BETA] Gets payment types for outgoing payments
*LedgerpostingApi* | [**get**](docs/Api/LedgerpostingApi.md#get) | **GET** /ledger/posting/{id} | Find postings by ID.
*LedgerpostingApi* | [**openPost**](docs/Api/LedgerpostingApi.md#openpost) | **GET** /ledger/posting/openPost | Find open posts corresponding with sent data.
*LedgerpostingApi* | [**search**](docs/Api/LedgerpostingApi.md#search) | **GET** /ledger/posting | Find postings corresponding with sent data.
*LedgervatTypeApi* | [**get**](docs/Api/LedgervatTypeApi.md#get) | **GET** /ledger/vatType/{id} | Get vat type by ID.
*LedgervatTypeApi* | [**search**](docs/Api/LedgervatTypeApi.md#search) | **GET** /ledger/vatType | Find vat types corresponding with sent data.
*LedgervoucherApi* | [**delete**](docs/Api/LedgervoucherApi.md#delete) | **DELETE** /ledger/voucher/{id} | [BETA] Delete voucher by ID.
*LedgervoucherApi* | [**deleteAttachment**](docs/Api/LedgervoucherApi.md#deleteattachment) | **DELETE** /ledger/voucher/{id}/attachment | [BETA] Delete attachment.
*LedgervoucherApi* | [**downloadPdf**](docs/Api/LedgervoucherApi.md#downloadpdf) | **GET** /ledger/voucher/{voucherId}/pdf | Get PDF representation of voucher by ID.
*LedgervoucherApi* | [**get**](docs/Api/LedgervoucherApi.md#get) | **GET** /ledger/voucher/{id} | Get voucher by ID.
*LedgervoucherApi* | [**importDocument**](docs/Api/LedgervoucherApi.md#importdocument) | **POST** /ledger/voucher/importDocument | [BETA] Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.
*LedgervoucherApi* | [**importGbat10**](docs/Api/LedgervoucherApi.md#importgbat10) | **POST** /ledger/voucher/importGbat10 | Import GBAT10. Send as multipart form.
*LedgervoucherApi* | [**nonPosted**](docs/Api/LedgervoucherApi.md#nonposted) | **GET** /ledger/voucher/&gt;nonPosted | [BETA] Find non-posted vouchers.
*LedgervoucherApi* | [**options**](docs/Api/LedgervoucherApi.md#options) | **GET** /ledger/voucher/{id}/options | [BETA] Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.
*LedgervoucherApi* | [**post**](docs/Api/LedgervoucherApi.md#post) | **POST** /ledger/voucher | Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used
*LedgervoucherApi* | [**put**](docs/Api/LedgervoucherApi.md#put) | **PUT** /ledger/voucher/{id} | [BETA] Update voucher. Postings with guiRow&#x3D;&#x3D;0 will be deleted and regenerated.
*LedgervoucherApi* | [**putList**](docs/Api/LedgervoucherApi.md#putlist) | **PUT** /ledger/voucher/list | [BETA] Update multiple vouchers. Postings with guiRow&#x3D;&#x3D;0 will be deleted and regenerated.
*LedgervoucherApi* | [**reverse**](docs/Api/LedgervoucherApi.md#reverse) | **PUT** /ledger/voucher/{id}/:reverse | Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.
*LedgervoucherApi* | [**search**](docs/Api/LedgervoucherApi.md#search) | **GET** /ledger/voucher | Find vouchers corresponding with sent data.
*LedgervoucherApi* | [**sendToInbox**](docs/Api/LedgervoucherApi.md#sendtoinbox) | **PUT** /ledger/voucher/{id}/:sendToInbox | [BETA] Send voucher to inbox.
*LedgervoucherApi* | [**sendToLedger**](docs/Api/LedgervoucherApi.md#sendtoledger) | **PUT** /ledger/voucher/{id}/:sendToLedger | [BETA] Send voucher to ledger.
*LedgervoucherApi* | [**uploadAttachment**](docs/Api/LedgervoucherApi.md#uploadattachment) | **POST** /ledger/voucher/{voucherId}/attachment | Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
*LedgervoucherApi* | [**uploadPdf**](docs/Api/LedgervoucherApi.md#uploadpdf) | **POST** /ledger/voucher/{voucherId}/pdf/{fileName} | [DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.
*LedgervoucherTypeApi* | [**get**](docs/Api/LedgervoucherTypeApi.md#get) | **GET** /ledger/voucherType/{id} | Get voucher type by ID.
*LedgervoucherTypeApi* | [**search**](docs/Api/LedgervoucherTypeApi.md#search) | **GET** /ledger/voucherType | Find voucher types corresponding with sent data.
*MunicipalityApi* | [**search**](docs/Api/MunicipalityApi.md#search) | **GET** /municipality | [BETA] Get municipalities.
*OrderApi* | [**approveSubscriptionInvoice**](docs/Api/OrderApi.md#approvesubscriptioninvoice) | **PUT** /order/{id}/:approveSubscriptionInvoice | To create a subscription invoice, first create a order with the subscription enabled, then approve it with this method. This approves the order for subscription invoicing.
*OrderApi* | [**attach**](docs/Api/OrderApi.md#attach) | **PUT** /order/{id}/:attach | Attach document to specified order ID.
*OrderApi* | [**get**](docs/Api/OrderApi.md#get) | **GET** /order/{id} | Get order by ID.
*OrderApi* | [**invoice**](docs/Api/OrderApi.md#invoice) | **PUT** /order/{id}/:invoice | Create new invoice from order.
*OrderApi* | [**invoiceMultipleOrders**](docs/Api/OrderApi.md#invoicemultipleorders) | **PUT** /order/:invoiceMultipleOrders | [BETA] Charges a single customer invoice from multiple orders. The orders must be to the same customer, currency, due date, receiver email and attn.
*OrderApi* | [**post**](docs/Api/OrderApi.md#post) | **POST** /order | Create order.
*OrderApi* | [**put**](docs/Api/OrderApi.md#put) | **PUT** /order/{id} | Update order.
*OrderApi* | [**search**](docs/Api/OrderApi.md#search) | **GET** /order | Find orders corresponding with sent data.
*OrderApi* | [**unApproveSubscriptionInvoice**](docs/Api/OrderApi.md#unapprovesubscriptioninvoice) | **PUT** /order/{id}/:unApproveSubscriptionInvoice | Unapproves the order for subscription invoicing.
*OrderorderlineApi* | [**delete**](docs/Api/OrderorderlineApi.md#delete) | **DELETE** /order/orderline/{id} | [BETA] Delete order line by ID.
*OrderorderlineApi* | [**get**](docs/Api/OrderorderlineApi.md#get) | **GET** /order/orderline/{id} | Get order line by ID.
*OrderorderlineApi* | [**post**](docs/Api/OrderorderlineApi.md#post) | **POST** /order/orderline | Create order line. When creating several order lines, use /list for better performance.
*OrderorderlineApi* | [**postList**](docs/Api/OrderorderlineApi.md#postlist) | **POST** /order/orderline/list | Create multiple order lines.
*ProductApi* | [**get**](docs/Api/ProductApi.md#get) | **GET** /product/{id} | Get product by ID.
*ProductApi* | [**post**](docs/Api/ProductApi.md#post) | **POST** /product | Create new product.
*ProductApi* | [**postList**](docs/Api/ProductApi.md#postlist) | **POST** /product/list | [BETA] Add multiple products.
*ProductApi* | [**put**](docs/Api/ProductApi.md#put) | **PUT** /product/{id} | Update product.
*ProductApi* | [**putList**](docs/Api/ProductApi.md#putlist) | **PUT** /product/list | [BETA] Update a list of products.
*ProductApi* | [**search**](docs/Api/ProductApi.md#search) | **GET** /product | Find products corresponding with sent data.
*ProductexternalApi* | [**get**](docs/Api/ProductexternalApi.md#get) | **GET** /product/external/{id} | [BETA] Get external product by ID.
*ProductexternalApi* | [**search**](docs/Api/ProductexternalApi.md#search) | **GET** /product/external | [BETA] Find external products corresponding with sent data. The sorting-field is not in use on this endpoint.
*ProductunitApi* | [**get**](docs/Api/ProductunitApi.md#get) | **GET** /product/unit/{id} | Get product unit by ID.
*ProductunitApi* | [**search**](docs/Api/ProductunitApi.md#search) | **GET** /product/unit | Find product units corresponding with sent data.
*ProjectApi* | [**delete**](docs/Api/ProjectApi.md#delete) | **DELETE** /project/{id} | [BETA] Delete project.
*ProjectApi* | [**deleteByIds**](docs/Api/ProjectApi.md#deletebyids) | **DELETE** /project/list | [BETA] Delete projects.
*ProjectApi* | [**deleteList**](docs/Api/ProjectApi.md#deletelist) | **DELETE** /project | [BETA] Delete multiple projects.
*ProjectApi* | [**get**](docs/Api/ProjectApi.md#get) | **GET** /project/{id} | Find project by ID.
*ProjectApi* | [**getForTimeSheet**](docs/Api/ProjectApi.md#getfortimesheet) | **GET** /project/&gt;forTimeSheet | Find projects applicable for time sheet registration on a specific day.
*ProjectApi* | [**post**](docs/Api/ProjectApi.md#post) | **POST** /project | [BETA] Add new project.
*ProjectApi* | [**postList**](docs/Api/ProjectApi.md#postlist) | **POST** /project/list | [BETA] Register new projects. Multiple projects for different users can be sent in the same request.
*ProjectApi* | [**put**](docs/Api/ProjectApi.md#put) | **PUT** /project/{id} | [BETA] Update project.
*ProjectApi* | [**putList**](docs/Api/ProjectApi.md#putlist) | **PUT** /project/list | [BETA] Update multiple projects.
*ProjectApi* | [**search**](docs/Api/ProjectApi.md#search) | **GET** /project | Find projects corresponding with sent data.
*ProjectcategoryApi* | [**get**](docs/Api/ProjectcategoryApi.md#get) | **GET** /project/category/{id} | Find project category by ID.
*ProjectcategoryApi* | [**post**](docs/Api/ProjectcategoryApi.md#post) | **POST** /project/category | Add new project category.
*ProjectcategoryApi* | [**put**](docs/Api/ProjectcategoryApi.md#put) | **PUT** /project/category/{id} | Update project category.
*ProjectcategoryApi* | [**search**](docs/Api/ProjectcategoryApi.md#search) | **GET** /project/category | Find project categories corresponding with sent data.
*ProjectcontrolFormApi* | [**get**](docs/Api/ProjectcontrolFormApi.md#get) | **GET** /project/controlForm/{id} | [BETA] Get project control form by ID.
*ProjectcontrolFormApi* | [**search**](docs/Api/ProjectcontrolFormApi.md#search) | **GET** /project/controlForm | [BETA] Get project control forms by project ID.
*ProjecthourlyRatesApi* | [**delete**](docs/Api/ProjecthourlyRatesApi.md#delete) | **DELETE** /project/hourlyRates/{id} | Delete Project Hourly Rate
*ProjecthourlyRatesApi* | [**deleteByIds**](docs/Api/ProjecthourlyRatesApi.md#deletebyids) | **DELETE** /project/hourlyRates/list | Delete project hourly rates.
*ProjecthourlyRatesApi* | [**get**](docs/Api/ProjecthourlyRatesApi.md#get) | **GET** /project/hourlyRates/{id} | Find project hourly rate by ID.
*ProjecthourlyRatesApi* | [**post**](docs/Api/ProjecthourlyRatesApi.md#post) | **POST** /project/hourlyRates | Create a project hourly rate.
*ProjecthourlyRatesApi* | [**postList**](docs/Api/ProjecthourlyRatesApi.md#postlist) | **POST** /project/hourlyRates/list | Create multiple project hourly rates.
*ProjecthourlyRatesApi* | [**put**](docs/Api/ProjecthourlyRatesApi.md#put) | **PUT** /project/hourlyRates/{id} | Update a project hourly rate.
*ProjecthourlyRatesApi* | [**putList**](docs/Api/ProjecthourlyRatesApi.md#putlist) | **PUT** /project/hourlyRates/list | Update multiple project hourly rates.
*ProjecthourlyRatesApi* | [**search**](docs/Api/ProjecthourlyRatesApi.md#search) | **GET** /project/hourlyRates | Find project hourly rates corresponding with sent data.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**delete**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#delete) | **DELETE** /project/hourlyRates/projectSpecificRates/{id} | Delete project specific rate
*ProjecthourlyRatesprojectSpecificRatesApi* | [**deleteByIds**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#deletebyids) | **DELETE** /project/hourlyRates/projectSpecificRates/list | Delete project specific rates.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**get**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#get) | **GET** /project/hourlyRates/projectSpecificRates/{id} | Find project specific rate by ID.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**post**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#post) | **POST** /project/hourlyRates/projectSpecificRates | Create new project specific rate.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**postList**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#postlist) | **POST** /project/hourlyRates/projectSpecificRates/list | Create multiple new project specific rates.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**put**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#put) | **PUT** /project/hourlyRates/projectSpecificRates/{id} | Update a project specific rate.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**putList**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#putlist) | **PUT** /project/hourlyRates/projectSpecificRates/list | Update multiple project specific rates.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**search**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#search) | **GET** /project/hourlyRates/projectSpecificRates | Find project specific rates corresponding with sent data.
*ProjectorderlineApi* | [**delete**](docs/Api/ProjectorderlineApi.md#delete) | **DELETE** /project/orderline/{id} | Delete order line by ID.
*ProjectorderlineApi* | [**get**](docs/Api/ProjectorderlineApi.md#get) | **GET** /project/orderline/{id} | [BETA] Get order line by ID.
*ProjectorderlineApi* | [**post**](docs/Api/ProjectorderlineApi.md#post) | **POST** /project/orderline | [BETA] Create order line. When creating several order lines, use /list for better performance.
*ProjectorderlineApi* | [**postList**](docs/Api/ProjectorderlineApi.md#postlist) | **POST** /project/orderline/list | [BETA] Create multiple order lines.
*ProjectorderlineApi* | [**put**](docs/Api/ProjectorderlineApi.md#put) | **PUT** /project/orderline/{id} | [BETA] Update project orderline.
*ProjectorderlineApi* | [**search**](docs/Api/ProjectorderlineApi.md#search) | **GET** /project/orderline | [BETA] Find all order lines for project.
*ProjectparticipantApi* | [**deleteByIds**](docs/Api/ProjectparticipantApi.md#deletebyids) | **DELETE** /project/participant/list | [BETA] Delete project participants.
*ProjectparticipantApi* | [**get**](docs/Api/ProjectparticipantApi.md#get) | **GET** /project/participant/{id} | [BETA] Find project participant by ID.
*ProjectparticipantApi* | [**post**](docs/Api/ProjectparticipantApi.md#post) | **POST** /project/participant | [BETA] Add new project participant.
*ProjectparticipantApi* | [**postList**](docs/Api/ProjectparticipantApi.md#postlist) | **POST** /project/participant/list | [BETA] Add new project participant. Multiple project participants can be sent in the same request.
*ProjectparticipantApi* | [**put**](docs/Api/ProjectparticipantApi.md#put) | **PUT** /project/participant/{id} | [BETA] Update project participant.
*ProjectperiodApi* | [**hourlistReport**](docs/Api/ProjectperiodApi.md#hourlistreport) | **GET** /project/{id}/period/hourlistReport | Find hourlist report by project period.
*ProjectperiodApi* | [**invoiced**](docs/Api/ProjectperiodApi.md#invoiced) | **GET** /project/{id}/period/invoiced | Find invoiced info by project period.
*ProjectperiodApi* | [**invoicingReserve**](docs/Api/ProjectperiodApi.md#invoicingreserve) | **GET** /project/{id}/period/invoicingReserve | Find invoicing reserve by project period.
*ProjectperiodApi* | [**monthlyStatus**](docs/Api/ProjectperiodApi.md#monthlystatus) | **GET** /project/{id}/period/monthlyStatus | Find overall status by project period.
*ProjectperiodApi* | [**overallStatus**](docs/Api/ProjectperiodApi.md#overallstatus) | **GET** /project/{id}/period/overallStatus | Find overall status by project period.
*ProjectprojectActivityApi* | [**delete**](docs/Api/ProjectprojectActivityApi.md#delete) | **DELETE** /project/projectActivity/{id} | Delete project activity
*ProjectprojectActivityApi* | [**deleteByIds**](docs/Api/ProjectprojectActivityApi.md#deletebyids) | **DELETE** /project/projectActivity/list | Delete project activities
*ProjectprojectActivityApi* | [**get**](docs/Api/ProjectprojectActivityApi.md#get) | **GET** /project/projectActivity/{id} | Find project activity by id
*ProjectprojectActivityApi* | [**post**](docs/Api/ProjectprojectActivityApi.md#post) | **POST** /project/projectActivity | Add project activity.
*ProjecttaskApi* | [**search**](docs/Api/ProjecttaskApi.md#search) | **GET** /project/task | Find all tasks for project.
*PurchaseOrderApi* | [**delete**](docs/Api/PurchaseOrderApi.md#delete) | **DELETE** /purchaseOrder/{id} | [BETA] Delete purchase order.
*PurchaseOrderApi* | [**get**](docs/Api/PurchaseOrderApi.md#get) | **GET** /purchaseOrder/{id} | [BETA] Find purchase order by ID.
*PurchaseOrderApi* | [**post**](docs/Api/PurchaseOrderApi.md#post) | **POST** /purchaseOrder | [BETA] Creates a new purchase order
*PurchaseOrderApi* | [**put**](docs/Api/PurchaseOrderApi.md#put) | **PUT** /purchaseOrder/{id} | [BETA] Update purchase order.
*PurchaseOrderApi* | [**search**](docs/Api/PurchaseOrderApi.md#search) | **GET** /purchaseOrder | [BETA] Find purchase orders with send data
*ReminderApi* | [**get**](docs/Api/ReminderApi.md#get) | **GET** /reminder/{id} | Get reminder by ID.
*ReminderApi* | [**search**](docs/Api/ReminderApi.md#search) | **GET** /reminder | Find reminders corresponding with sent data.
*SalarycompilationApi* | [**downloadPdf**](docs/Api/SalarycompilationApi.md#downloadpdf) | **GET** /salary/compilation/pdf | [BETA] Find salary compilation (PDF document) by employee.
*SalarycompilationApi* | [**get**](docs/Api/SalarycompilationApi.md#get) | **GET** /salary/compilation | [BETA] Find salary compilation by employee.
*SalarypayslipApi* | [**downloadPdf**](docs/Api/SalarypayslipApi.md#downloadpdf) | **GET** /salary/payslip/{id}/pdf | [BETA] Find payslip (PDF document) by ID.
*SalarypayslipApi* | [**get**](docs/Api/SalarypayslipApi.md#get) | **GET** /salary/payslip/{id} | [BETA] Find payslip by ID.
*SalarypayslipApi* | [**search**](docs/Api/SalarypayslipApi.md#search) | **GET** /salary/payslip | [BETA] Find payslips corresponding with sent data.
*SalarysettingsApi* | [**get**](docs/Api/SalarysettingsApi.md#get) | **GET** /salary/settings | [BETA] Get salary settings of logged in company.
*SalarysettingsApi* | [**put**](docs/Api/SalarysettingsApi.md#put) | **PUT** /salary/settings | [BETA] Update settings of logged in company.
*SalarysettingsholidayApi* | [**deleteByIds**](docs/Api/SalarysettingsholidayApi.md#deletebyids) | **DELETE** /salary/settings/holiday/list | [BETA] delete multiple holiday settings of current logged in company.
*SalarysettingsholidayApi* | [**post**](docs/Api/SalarysettingsholidayApi.md#post) | **POST** /salary/settings/holiday | [BETA] Create a holiday setting of current logged in company.
*SalarysettingsholidayApi* | [**postList**](docs/Api/SalarysettingsholidayApi.md#postlist) | **POST** /salary/settings/holiday/list | [BETA] Create multiple holiday settings of current logged in company.
*SalarysettingsholidayApi* | [**put**](docs/Api/SalarysettingsholidayApi.md#put) | **PUT** /salary/settings/holiday/{id} | [BETA] update a holiday setting of current logged in company.
*SalarysettingsholidayApi* | [**putList**](docs/Api/SalarysettingsholidayApi.md#putlist) | **PUT** /salary/settings/holiday/list | [BETA] update multiple holiday settings of current logged in company.
*SalarysettingsholidayApi* | [**search**](docs/Api/SalarysettingsholidayApi.md#search) | **GET** /salary/settings/holiday | [BETA] Find holiday settings of current logged in company.
*SalarytransactionApi* | [**delete**](docs/Api/SalarytransactionApi.md#delete) | **DELETE** /salary/transaction/{id} | [BETA] Delete salary transaction by ID.
*SalarytransactionApi* | [**get**](docs/Api/SalarytransactionApi.md#get) | **GET** /salary/transaction/{id} | [BETA] Find salary transaction by ID.
*SalarytransactionApi* | [**post**](docs/Api/SalarytransactionApi.md#post) | **POST** /salary/transaction | [BETA] Create a new salary transaction.
*SalarytypeApi* | [**get**](docs/Api/SalarytypeApi.md#get) | **GET** /salary/type/{id} | [BETA] Find salary type by ID.
*SalarytypeApi* | [**search**](docs/Api/SalarytypeApi.md#search) | **GET** /salary/type | [BETA] Find salary type corresponding with sent data.
*SupplierApi* | [**get**](docs/Api/SupplierApi.md#get) | **GET** /supplier/{id} | Get supplier by ID.
*SupplierApi* | [**post**](docs/Api/SupplierApi.md#post) | **POST** /supplier | Create supplier. Related supplier addresses may also be created.
*SupplierApi* | [**postList**](docs/Api/SupplierApi.md#postlist) | **POST** /supplier/list | [BETA] Create multiple suppliers. Related supplier addresses may also be created.
*SupplierApi* | [**put**](docs/Api/SupplierApi.md#put) | **PUT** /supplier/{id} | Update supplier.
*SupplierApi* | [**putList**](docs/Api/SupplierApi.md#putlist) | **PUT** /supplier/list | [BETA] Update multiple suppliers. Addresses can also be updated.
*SupplierApi* | [**search**](docs/Api/SupplierApi.md#search) | **GET** /supplier | Find suppliers corresponding with sent data.
*TimesheetentryApi* | [**delete**](docs/Api/TimesheetentryApi.md#delete) | **DELETE** /timesheet/entry/{id} | Delete timesheet entry by ID.
*TimesheetentryApi* | [**get**](docs/Api/TimesheetentryApi.md#get) | **GET** /timesheet/entry/{id} | Find timesheet entry by ID.
*TimesheetentryApi* | [**getRecentActivities**](docs/Api/TimesheetentryApi.md#getrecentactivities) | **GET** /timesheet/entry/&gt;recentActivities | Find recently used timesheet activities.
*TimesheetentryApi* | [**getRecentProjects**](docs/Api/TimesheetentryApi.md#getrecentprojects) | **GET** /timesheet/entry/&gt;recentProjects | Find projects with recent activities (timesheet entry registered).
*TimesheetentryApi* | [**getTotalHours**](docs/Api/TimesheetentryApi.md#gettotalhours) | **GET** /timesheet/entry/&gt;totalHours | Find total hours registered on an employee in a specific period.
*TimesheetentryApi* | [**post**](docs/Api/TimesheetentryApi.md#post) | **POST** /timesheet/entry | Add new timesheet entry. Only one entry per employee/date/activity/project combination is supported.
*TimesheetentryApi* | [**postList**](docs/Api/TimesheetentryApi.md#postlist) | **POST** /timesheet/entry/list | Add new timesheet entry. Multiple objects for several users can be sent in the same request.
*TimesheetentryApi* | [**put**](docs/Api/TimesheetentryApi.md#put) | **PUT** /timesheet/entry/{id} | Update timesheet entry by ID. Note: Timesheet entry object fields which are present but not set, or set to 0, will be nulled.
*TimesheetentryApi* | [**putList**](docs/Api/TimesheetentryApi.md#putlist) | **PUT** /timesheet/entry/list | Update timesheet entry. Multiple objects for different users can be sent in the same request.
*TimesheetentryApi* | [**search**](docs/Api/TimesheetentryApi.md#search) | **GET** /timesheet/entry | Find timesheet entry corresponding with sent data.
*TimesheetsalaryTypeSpecificationApi* | [**delete**](docs/Api/TimesheetsalaryTypeSpecificationApi.md#delete) | **DELETE** /timesheet/salaryTypeSpecification/{id} | [BETA] Delete a timesheet SalaryType Specification
*TimesheetsalaryTypeSpecificationApi* | [**get**](docs/Api/TimesheetsalaryTypeSpecificationApi.md#get) | **GET** /timesheet/salaryTypeSpecification/{id} | [BETA] Get timesheet SalaryType Specification for a specific ID
*TimesheetsalaryTypeSpecificationApi* | [**post**](docs/Api/TimesheetsalaryTypeSpecificationApi.md#post) | **POST** /timesheet/salaryTypeSpecification | [BETA] Create a timesheet SalaryType Specification. Only one entry per employee/date/SalaryType
*TimesheetsalaryTypeSpecificationApi* | [**put**](docs/Api/TimesheetsalaryTypeSpecificationApi.md#put) | **PUT** /timesheet/salaryTypeSpecification/{id} | [BETA] Update a timesheet SalaryType Specification
*TimesheetsalaryTypeSpecificationApi* | [**search**](docs/Api/TimesheetsalaryTypeSpecificationApi.md#search) | **GET** /timesheet/salaryTypeSpecification | [BETA] Get list of timesheet SalaryType Specifications
*TimesheetsettingsApi* | [**get**](docs/Api/TimesheetsettingsApi.md#get) | **GET** /timesheet/settings | [BETA] Get timesheet settings of logged in company.
*TimesheettimeClockApi* | [**get**](docs/Api/TimesheettimeClockApi.md#get) | **GET** /timesheet/timeClock/{id} | Find time clock entry by ID.
*TimesheettimeClockApi* | [**getPresent**](docs/Api/TimesheettimeClockApi.md#getpresent) | **GET** /timesheet/timeClock/present | Find a user’s present running time clock.
*TimesheettimeClockApi* | [**put**](docs/Api/TimesheettimeClockApi.md#put) | **PUT** /timesheet/timeClock/{id} | Update time clock by ID.
*TimesheettimeClockApi* | [**search**](docs/Api/TimesheettimeClockApi.md#search) | **GET** /timesheet/timeClock | Find time clock entries corresponding with sent data.
*TimesheettimeClockApi* | [**start**](docs/Api/TimesheettimeClockApi.md#start) | **PUT** /timesheet/timeClock/:start | Start time clock.
*TimesheettimeClockApi* | [**stop**](docs/Api/TimesheettimeClockApi.md#stop) | **PUT** /timesheet/timeClock/{id}/:stop | Stop time clock.
*TimesheetweekApi* | [**approve**](docs/Api/TimesheetweekApi.md#approve) | **PUT** /timesheet/week/:approve | Approve week. By ID or (ISO-8601 week and employeeId combination).
*TimesheetweekApi* | [**complete**](docs/Api/TimesheetweekApi.md#complete) | **PUT** /timesheet/week/:complete | Complete week. By ID or (ISO-8601 week and employeeId combination).
*TimesheetweekApi* | [**reopen**](docs/Api/TimesheetweekApi.md#reopen) | **PUT** /timesheet/week/:reopen | Reopen week. By ID or (ISO-8601 week and employeeId combination).
*TimesheetweekApi* | [**search**](docs/Api/TimesheetweekApi.md#search) | **GET** /timesheet/week | Find weekly status By ID, week/year combination, employeeId. or an approver
*TimesheetweekApi* | [**unapprove**](docs/Api/TimesheetweekApi.md#unapprove) | **PUT** /timesheet/week/:unapprove | Unapprove week. By ID or (ISO-8601 week and employeeId combination).
*TokenconsumerApi* | [**getByToken**](docs/Api/TokenconsumerApi.md#getbytoken) | **GET** /token/consumer/byToken | Get consumer token by token string.
*TokenemployeeApi* | [**create**](docs/Api/TokenemployeeApi.md#create) | **PUT** /token/employee/:create | Create an employee token. Only selected consumers are allowed
*TokensessionApi* | [**create**](docs/Api/TokensessionApi.md#create) | **PUT** /token/session/:create | Create session token.
*TokensessionApi* | [**delete**](docs/Api/TokensessionApi.md#delete) | **DELETE** /token/session/{token} | Delete session token.
*TokensessionApi* | [**whoAmI**](docs/Api/TokensessionApi.md#whoami) | **GET** /token/session/&gt;whoAmI | Find information about the current user.
*TravelExpenseApi* | [**approve**](docs/Api/TravelExpenseApi.md#approve) | **PUT** /travelExpense/:approve | [BETA] Approve travel expenses.
*TravelExpenseApi* | [**copy**](docs/Api/TravelExpenseApi.md#copy) | **PUT** /travelExpense/:copy | [BETA] Copy travel expense.
*TravelExpenseApi* | [**createVouchers**](docs/Api/TravelExpenseApi.md#createvouchers) | **PUT** /travelExpense/:createVouchers | [BETA] Create vouchers
*TravelExpenseApi* | [**delete**](docs/Api/TravelExpenseApi.md#delete) | **DELETE** /travelExpense/{id} | [BETA] Delete travel expense.
*TravelExpenseApi* | [**deleteAttachment**](docs/Api/TravelExpenseApi.md#deleteattachment) | **DELETE** /travelExpense/{travelExpenseId}/attachment | [BETA] Delete attachment.
*TravelExpenseApi* | [**deliver**](docs/Api/TravelExpenseApi.md#deliver) | **PUT** /travelExpense/:deliver | [BETA] Deliver travel expenses.
*TravelExpenseApi* | [**downloadAttachment**](docs/Api/TravelExpenseApi.md#downloadattachment) | **GET** /travelExpense/{travelExpenseId}/attachment | Get attachment by travel expense ID.
*TravelExpenseApi* | [**get**](docs/Api/TravelExpenseApi.md#get) | **GET** /travelExpense/{id} | [BETA] Get travel expense by ID.
*TravelExpenseApi* | [**post**](docs/Api/TravelExpenseApi.md#post) | **POST** /travelExpense | [BETA] Create travel expense.
*TravelExpenseApi* | [**put**](docs/Api/TravelExpenseApi.md#put) | **PUT** /travelExpense/{id} | [BETA] Update travel expense.
*TravelExpenseApi* | [**search**](docs/Api/TravelExpenseApi.md#search) | **GET** /travelExpense | [BETA] Find travel expenses corresponding with sent data.
*TravelExpenseApi* | [**unapprove**](docs/Api/TravelExpenseApi.md#unapprove) | **PUT** /travelExpense/:unapprove | [BETA] Unapprove travel expenses.
*TravelExpenseApi* | [**undeliver**](docs/Api/TravelExpenseApi.md#undeliver) | **PUT** /travelExpense/:undeliver | [BETA] Undeliver travel expenses.
*TravelExpenseApi* | [**uploadAttachment**](docs/Api/TravelExpenseApi.md#uploadattachment) | **POST** /travelExpense/{travelExpenseId}/attachment | Upload attachment to travel expense.
*TravelExpenseApi* | [**uploadAttachments**](docs/Api/TravelExpenseApi.md#uploadattachments) | **POST** /travelExpense/{travelExpenseId}/attachment/list | Upload multiple attachments to travel expense.
*TravelExpenseaccommodationAllowanceApi* | [**delete**](docs/Api/TravelExpenseaccommodationAllowanceApi.md#delete) | **DELETE** /travelExpense/accommodationAllowance/{id} | [BETA] Delete accommodation allowance.
*TravelExpenseaccommodationAllowanceApi* | [**get**](docs/Api/TravelExpenseaccommodationAllowanceApi.md#get) | **GET** /travelExpense/accommodationAllowance/{id} | [BETA] Get travel accommodation allowance by ID.
*TravelExpenseaccommodationAllowanceApi* | [**post**](docs/Api/TravelExpenseaccommodationAllowanceApi.md#post) | **POST** /travelExpense/accommodationAllowance | [BETA] Create accommodation allowance.
*TravelExpenseaccommodationAllowanceApi* | [**put**](docs/Api/TravelExpenseaccommodationAllowanceApi.md#put) | **PUT** /travelExpense/accommodationAllowance/{id} | [BETA] Update accommodation allowance.
*TravelExpenseaccommodationAllowanceApi* | [**search**](docs/Api/TravelExpenseaccommodationAllowanceApi.md#search) | **GET** /travelExpense/accommodationAllowance | [BETA] Find accommodation allowances corresponding with sent data.
*TravelExpensecostApi* | [**delete**](docs/Api/TravelExpensecostApi.md#delete) | **DELETE** /travelExpense/cost/{id} | [BETA] Delete cost.
*TravelExpensecostApi* | [**get**](docs/Api/TravelExpensecostApi.md#get) | **GET** /travelExpense/cost/{id} | [BETA] Get cost by ID.
*TravelExpensecostApi* | [**post**](docs/Api/TravelExpensecostApi.md#post) | **POST** /travelExpense/cost | [BETA] Create cost.
*TravelExpensecostApi* | [**put**](docs/Api/TravelExpensecostApi.md#put) | **PUT** /travelExpense/cost/{id} | [BETA] Update cost.
*TravelExpensecostApi* | [**search**](docs/Api/TravelExpensecostApi.md#search) | **GET** /travelExpense/cost | [BETA] Find costs corresponding with sent data.
*TravelExpensecostCategoryApi* | [**get**](docs/Api/TravelExpensecostCategoryApi.md#get) | **GET** /travelExpense/costCategory/{id} | [BETA] Get cost category by ID.
*TravelExpensecostCategoryApi* | [**search**](docs/Api/TravelExpensecostCategoryApi.md#search) | **GET** /travelExpense/costCategory | [BETA] Find cost category corresponding with sent data.
*TravelExpensemileageAllowanceApi* | [**delete**](docs/Api/TravelExpensemileageAllowanceApi.md#delete) | **DELETE** /travelExpense/mileageAllowance/{id} | [BETA] Delete mileage allowance.
*TravelExpensemileageAllowanceApi* | [**get**](docs/Api/TravelExpensemileageAllowanceApi.md#get) | **GET** /travelExpense/mileageAllowance/{id} | [BETA] Get mileage allowance by ID.
*TravelExpensemileageAllowanceApi* | [**post**](docs/Api/TravelExpensemileageAllowanceApi.md#post) | **POST** /travelExpense/mileageAllowance | [BETA] Create mileage allowance.
*TravelExpensemileageAllowanceApi* | [**put**](docs/Api/TravelExpensemileageAllowanceApi.md#put) | **PUT** /travelExpense/mileageAllowance/{id} | [BETA] Update mileage allowance.
*TravelExpensemileageAllowanceApi* | [**search**](docs/Api/TravelExpensemileageAllowanceApi.md#search) | **GET** /travelExpense/mileageAllowance | [BETA] Find mileage allowances corresponding with sent data.
*TravelExpensepassengerApi* | [**delete**](docs/Api/TravelExpensepassengerApi.md#delete) | **DELETE** /travelExpense/passenger/{id} | [BETA] Delete passenger.
*TravelExpensepassengerApi* | [**get**](docs/Api/TravelExpensepassengerApi.md#get) | **GET** /travelExpense/passenger/{id} | [BETA] Get passenger by ID.
*TravelExpensepassengerApi* | [**post**](docs/Api/TravelExpensepassengerApi.md#post) | **POST** /travelExpense/passenger | [BETA] Create passenger.
*TravelExpensepassengerApi* | [**put**](docs/Api/TravelExpensepassengerApi.md#put) | **PUT** /travelExpense/passenger/{id} | [BETA] Update passenger.
*TravelExpensepassengerApi* | [**search**](docs/Api/TravelExpensepassengerApi.md#search) | **GET** /travelExpense/passenger | [BETA] Find passengers corresponding with sent data.
*TravelExpensepaymentTypeApi* | [**get**](docs/Api/TravelExpensepaymentTypeApi.md#get) | **GET** /travelExpense/paymentType/{id} | [BETA] Get payment type by ID.
*TravelExpensepaymentTypeApi* | [**search**](docs/Api/TravelExpensepaymentTypeApi.md#search) | **GET** /travelExpense/paymentType | [BETA] Find payment type corresponding with sent data.
*TravelExpenseperDiemCompensationApi* | [**delete**](docs/Api/TravelExpenseperDiemCompensationApi.md#delete) | **DELETE** /travelExpense/perDiemCompensation/{id} | [BETA] Delete per diem compensation.
*TravelExpenseperDiemCompensationApi* | [**get**](docs/Api/TravelExpenseperDiemCompensationApi.md#get) | **GET** /travelExpense/perDiemCompensation/{id} | [BETA] Get per diem compensation by ID.
*TravelExpenseperDiemCompensationApi* | [**post**](docs/Api/TravelExpenseperDiemCompensationApi.md#post) | **POST** /travelExpense/perDiemCompensation | [BETA] Create per diem compensation.
*TravelExpenseperDiemCompensationApi* | [**put**](docs/Api/TravelExpenseperDiemCompensationApi.md#put) | **PUT** /travelExpense/perDiemCompensation/{id} | [BETA] Update per diem compensation.
*TravelExpenseperDiemCompensationApi* | [**search**](docs/Api/TravelExpenseperDiemCompensationApi.md#search) | **GET** /travelExpense/perDiemCompensation | [BETA] Find per diem compensations corresponding with sent data.
*TravelExpenserateApi* | [**get**](docs/Api/TravelExpenserateApi.md#get) | **GET** /travelExpense/rate/{id} | [BETA] Get travel expense rate by ID.
*TravelExpenserateApi* | [**search**](docs/Api/TravelExpenserateApi.md#search) | **GET** /travelExpense/rate | [BETA] Find rates corresponding with sent data.
*TravelExpenserateCategoryApi* | [**get**](docs/Api/TravelExpenserateCategoryApi.md#get) | **GET** /travelExpense/rateCategory/{id} | [BETA] Get travel expense rate category by ID.
*TravelExpenserateCategoryApi* | [**search**](docs/Api/TravelExpenserateCategoryApi.md#search) | **GET** /travelExpense/rateCategory | [BETA] Find rate categories corresponding with sent data.
*TravelExpenserateCategoryGroupApi* | [**get**](docs/Api/TravelExpenserateCategoryGroupApi.md#get) | **GET** /travelExpense/rateCategoryGroup/{id} | [BETA] Get travel report rate category group by ID.
*TravelExpenserateCategoryGroupApi* | [**search**](docs/Api/TravelExpenserateCategoryGroupApi.md#search) | **GET** /travelExpense/rateCategoryGroup | [BETA] Find rate categoriy groups corresponding with sent data.
*TravelExpensesettingsApi* | [**get**](docs/Api/TravelExpensesettingsApi.md#get) | **GET** /travelExpense/settings | [BETA] Get travel expense settings of logged in company.

## Documentation For Models

 - [AccommodationAllowance](docs/Model/AccommodationAllowance.md)
 - [Account](docs/Model/Account.md)
 - [AccountingPeriod](docs/Model/AccountingPeriod.md)
 - [Activity](docs/Model/Activity.md)
 - [Address](docs/Model/Address.md)
 - [AltinnCompanyModule](docs/Model/AltinnCompanyModule.md)
 - [AnnualAccount](docs/Model/AnnualAccount.md)
 - [ApiConsumer](docs/Model/ApiConsumer.md)
 - [ApiError](docs/Model/ApiError.md)
 - [ApiValidationMessage](docs/Model/ApiValidationMessage.md)
 - [AppSpecific](docs/Model/AppSpecific.md)
 - [AutoPayMessageDTO](docs/Model/AutoPayMessageDTO.md)
 - [Bank](docs/Model/Bank.md)
 - [BankReconciliation](docs/Model/BankReconciliation.md)
 - [BankReconciliationAdjustment](docs/Model/BankReconciliationAdjustment.md)
 - [BankReconciliationMatch](docs/Model/BankReconciliationMatch.md)
 - [BankReconciliationPaymentType](docs/Model/BankReconciliationPaymentType.md)
 - [BankStatement](docs/Model/BankStatement.md)
 - [BankTransaction](docs/Model/BankTransaction.md)
 - [Banner](docs/Model/Banner.md)
 - [Body](docs/Model/Body.md)
 - [Body1](docs/Model/Body1.md)
 - [Body2](docs/Model/Body2.md)
 - [BodyPart](docs/Model/BodyPart.md)
 - [Change](docs/Model/Change.md)
 - [CloseGroup](docs/Model/CloseGroup.md)
 - [Company](docs/Model/Company.md)
 - [CompanyAutoCompleteDTO](docs/Model/CompanyAutoCompleteDTO.md)
 - [CompanyHoliday](docs/Model/CompanyHoliday.md)
 - [ConsumerToken](docs/Model/ConsumerToken.md)
 - [Contact](docs/Model/Contact.md)
 - [ContentDisposition](docs/Model/ContentDisposition.md)
 - [Cost](docs/Model/Cost.md)
 - [Country](docs/Model/Country.md)
 - [Credentials](docs/Model/Credentials.md)
 - [Currency](docs/Model/Currency.md)
 - [CurrencyExchangeRate](docs/Model/CurrencyExchangeRate.md)
 - [Customer](docs/Model/Customer.md)
 - [CustomerCategory](docs/Model/CustomerCategory.md)
 - [CustomerTripletexAccount](docs/Model/CustomerTripletexAccount.md)
 - [CustomerTripletexAccount2](docs/Model/CustomerTripletexAccount2.md)
 - [DashboardDTO](docs/Model/DashboardDTO.md)
 - [Delete](docs/Model/Delete.md)
 - [DeliveryAddress](docs/Model/DeliveryAddress.md)
 - [Department](docs/Model/Department.md)
 - [Division](docs/Model/Division.md)
 - [Document](docs/Model/Document.md)
 - [DocumentArchive](docs/Model/DocumentArchive.md)
 - [Employee](docs/Model/Employee.md)
 - [EmployeeCompanyDTO](docs/Model/EmployeeCompanyDTO.md)
 - [EmployeeEmail](docs/Model/EmployeeEmail.md)
 - [EmployeeToken](docs/Model/EmployeeToken.md)
 - [Employment](docs/Model/Employment.md)
 - [EmploymentDetails](docs/Model/EmploymentDetails.md)
 - [EmploymentType](docs/Model/EmploymentType.md)
 - [Entitlement](docs/Model/Entitlement.md)
 - [EventInfoDTO](docs/Model/EventInfoDTO.md)
 - [EventInfoDescription](docs/Model/EventInfoDescription.md)
 - [ExternalProduct](docs/Model/ExternalProduct.md)
 - [FormDataBodyPart](docs/Model/FormDataBodyPart.md)
 - [FormDataContentDisposition](docs/Model/FormDataContentDisposition.md)
 - [FormDataMultiPart](docs/Model/FormDataMultiPart.md)
 - [HolidayAllowanceEarned](docs/Model/HolidayAllowanceEarned.md)
 - [HourlyCostAndRate](docs/Model/HourlyCostAndRate.md)
 - [InternationalId](docs/Model/InternationalId.md)
 - [Inventories](docs/Model/Inventories.md)
 - [Inventory](docs/Model/Inventory.md)
 - [Invoice](docs/Model/Invoice.md)
 - [Job](docs/Model/Job.md)
 - [JobDetailDTO](docs/Model/JobDetailDTO.md)
 - [LeaveOfAbsence](docs/Model/LeaveOfAbsence.md)
 - [LeaveOfAbsenceType](docs/Model/LeaveOfAbsenceType.md)
 - [LedgerAccount](docs/Model/LedgerAccount.md)
 - [LegacyAddress](docs/Model/LegacyAddress.md)
 - [Link](docs/Model/Link.md)
 - [ListResponseAccommodationAllowance](docs/Model/ListResponseAccommodationAllowance.md)
 - [ListResponseAccount](docs/Model/ListResponseAccount.md)
 - [ListResponseAccountingPeriod](docs/Model/ListResponseAccountingPeriod.md)
 - [ListResponseActivity](docs/Model/ListResponseActivity.md)
 - [ListResponseAnnualAccount](docs/Model/ListResponseAnnualAccount.md)
 - [ListResponseBank](docs/Model/ListResponseBank.md)
 - [ListResponseBankReconciliation](docs/Model/ListResponseBankReconciliation.md)
 - [ListResponseBankReconciliationAdjustment](docs/Model/ListResponseBankReconciliationAdjustment.md)
 - [ListResponseBankReconciliationMatch](docs/Model/ListResponseBankReconciliationMatch.md)
 - [ListResponseBankReconciliationPaymentType](docs/Model/ListResponseBankReconciliationPaymentType.md)
 - [ListResponseBankStatement](docs/Model/ListResponseBankStatement.md)
 - [ListResponseBankTransaction](docs/Model/ListResponseBankTransaction.md)
 - [ListResponseBanner](docs/Model/ListResponseBanner.md)
 - [ListResponseCloseGroup](docs/Model/ListResponseCloseGroup.md)
 - [ListResponseCompany](docs/Model/ListResponseCompany.md)
 - [ListResponseCompanyAutoCompleteDTO](docs/Model/ListResponseCompanyAutoCompleteDTO.md)
 - [ListResponseCompanyHoliday](docs/Model/ListResponseCompanyHoliday.md)
 - [ListResponseContact](docs/Model/ListResponseContact.md)
 - [ListResponseCost](docs/Model/ListResponseCost.md)
 - [ListResponseCountry](docs/Model/ListResponseCountry.md)
 - [ListResponseCurrency](docs/Model/ListResponseCurrency.md)
 - [ListResponseCustomer](docs/Model/ListResponseCustomer.md)
 - [ListResponseCustomerCategory](docs/Model/ListResponseCustomerCategory.md)
 - [ListResponseDeliveryAddress](docs/Model/ListResponseDeliveryAddress.md)
 - [ListResponseDepartment](docs/Model/ListResponseDepartment.md)
 - [ListResponseDivision](docs/Model/ListResponseDivision.md)
 - [ListResponseDocumentArchive](docs/Model/ListResponseDocumentArchive.md)
 - [ListResponseEmployee](docs/Model/ListResponseEmployee.md)
 - [ListResponseEmployeeCompanyDTO](docs/Model/ListResponseEmployeeCompanyDTO.md)
 - [ListResponseEmployment](docs/Model/ListResponseEmployment.md)
 - [ListResponseEmploymentDetails](docs/Model/ListResponseEmploymentDetails.md)
 - [ListResponseEmploymentType](docs/Model/ListResponseEmploymentType.md)
 - [ListResponseEntitlement](docs/Model/ListResponseEntitlement.md)
 - [ListResponseExternalProduct](docs/Model/ListResponseExternalProduct.md)
 - [ListResponseHourlyCostAndRate](docs/Model/ListResponseHourlyCostAndRate.md)
 - [ListResponseInventories](docs/Model/ListResponseInventories.md)
 - [ListResponseInventory](docs/Model/ListResponseInventory.md)
 - [ListResponseInvoice](docs/Model/ListResponseInvoice.md)
 - [ListResponseLeaveOfAbsence](docs/Model/ListResponseLeaveOfAbsence.md)
 - [ListResponseLeaveOfAbsenceType](docs/Model/ListResponseLeaveOfAbsenceType.md)
 - [ListResponseLedgerAccount](docs/Model/ListResponseLedgerAccount.md)
 - [ListResponseLegacyAddress](docs/Model/ListResponseLegacyAddress.md)
 - [ListResponseMileageAllowance](docs/Model/ListResponseMileageAllowance.md)
 - [ListResponseMunicipality](docs/Model/ListResponseMunicipality.md)
 - [ListResponseNextOfKin](docs/Model/ListResponseNextOfKin.md)
 - [ListResponseNotification](docs/Model/ListResponseNotification.md)
 - [ListResponseOccupationCode](docs/Model/ListResponseOccupationCode.md)
 - [ListResponseOrder](docs/Model/ListResponseOrder.md)
 - [ListResponseOrderLine](docs/Model/ListResponseOrderLine.md)
 - [ListResponseOrderOffer](docs/Model/ListResponseOrderOffer.md)
 - [ListResponsePassenger](docs/Model/ListResponsePassenger.md)
 - [ListResponsePaymentType](docs/Model/ListResponsePaymentType.md)
 - [ListResponsePaymentTypeOut](docs/Model/ListResponsePaymentTypeOut.md)
 - [ListResponsePayslip](docs/Model/ListResponsePayslip.md)
 - [ListResponsePerDiemCompensation](docs/Model/ListResponsePerDiemCompensation.md)
 - [ListResponsePersonAutoCompleteDTO](docs/Model/ListResponsePersonAutoCompleteDTO.md)
 - [ListResponsePosting](docs/Model/ListResponsePosting.md)
 - [ListResponseProduct](docs/Model/ListResponseProduct.md)
 - [ListResponseProductLine](docs/Model/ListResponseProductLine.md)
 - [ListResponseProductUnit](docs/Model/ListResponseProductUnit.md)
 - [ListResponseProject](docs/Model/ListResponseProject.md)
 - [ListResponseProjectCategory](docs/Model/ListResponseProjectCategory.md)
 - [ListResponseProjectControlForm](docs/Model/ListResponseProjectControlForm.md)
 - [ListResponseProjectHourlyRate](docs/Model/ListResponseProjectHourlyRate.md)
 - [ListResponseProjectInvoiceDetails](docs/Model/ListResponseProjectInvoiceDetails.md)
 - [ListResponseProjectOrderLine](docs/Model/ListResponseProjectOrderLine.md)
 - [ListResponseProjectParticipant](docs/Model/ListResponseProjectParticipant.md)
 - [ListResponseProjectPeriodMonthlyStatus](docs/Model/ListResponseProjectPeriodMonthlyStatus.md)
 - [ListResponseProjectSpecificRate](docs/Model/ListResponseProjectSpecificRate.md)
 - [ListResponseProspect](docs/Model/ListResponseProspect.md)
 - [ListResponsePurchaseOrder](docs/Model/ListResponsePurchaseOrder.md)
 - [ListResponseReminder](docs/Model/ListResponseReminder.md)
 - [ListResponseRemunerationType](docs/Model/ListResponseRemunerationType.md)
 - [ListResponseSalarySpecification](docs/Model/ListResponseSalarySpecification.md)
 - [ListResponseSalaryTransaction](docs/Model/ListResponseSalaryTransaction.md)
 - [ListResponseSalaryType](docs/Model/ListResponseSalaryType.md)
 - [ListResponseSalesForceAccountInfo](docs/Model/ListResponseSalesForceAccountInfo.md)
 - [ListResponseSalesForceEmployee](docs/Model/ListResponseSalesForceEmployee.md)
 - [ListResponseSalesModuleDTO](docs/Model/ListResponseSalesModuleDTO.md)
 - [ListResponseSearchCompletionDTO](docs/Model/ListResponseSearchCompletionDTO.md)
 - [ListResponseStandardTime](docs/Model/ListResponseStandardTime.md)
 - [ListResponseStocktaking](docs/Model/ListResponseStocktaking.md)
 - [ListResponseSubscription](docs/Model/ListResponseSubscription.md)
 - [ListResponseSupplier](docs/Model/ListResponseSupplier.md)
 - [ListResponseSupplierBalance](docs/Model/ListResponseSupplierBalance.md)
 - [ListResponseTask](docs/Model/ListResponseTask.md)
 - [ListResponseTimeClock](docs/Model/ListResponseTimeClock.md)
 - [ListResponseTimesheetEntry](docs/Model/ListResponseTimesheetEntry.md)
 - [ListResponseTimesheetSalaryTypeSpecification](docs/Model/ListResponseTimesheetSalaryTypeSpecification.md)
 - [ListResponseTravelCostCategory](docs/Model/ListResponseTravelCostCategory.md)
 - [ListResponseTravelExpense](docs/Model/ListResponseTravelExpense.md)
 - [ListResponseTravelExpenseRate](docs/Model/ListResponseTravelExpenseRate.md)
 - [ListResponseTravelExpenseRateCategory](docs/Model/ListResponseTravelExpenseRateCategory.md)
 - [ListResponseTravelExpenseRateCategoryGroup](docs/Model/ListResponseTravelExpenseRateCategoryGroup.md)
 - [ListResponseTravelPaymentType](docs/Model/ListResponseTravelPaymentType.md)
 - [ListResponseVatType](docs/Model/ListResponseVatType.md)
 - [ListResponseVoucher](docs/Model/ListResponseVoucher.md)
 - [ListResponseVoucherType](docs/Model/ListResponseVoucherType.md)
 - [ListResponseWeek](docs/Model/ListResponseWeek.md)
 - [ListResponseWorkingHoursScheme](docs/Model/ListResponseWorkingHoursScheme.md)
 - [LoggedInUserInfoDTO](docs/Model/LoggedInUserInfoDTO.md)
 - [MaritimeEmployment](docs/Model/MaritimeEmployment.md)
 - [MaventaEventDataDTO](docs/Model/MaventaEventDataDTO.md)
 - [MaventaStatusDTO](docs/Model/MaventaStatusDTO.md)
 - [MediaType](docs/Model/MediaType.md)
 - [MessageBodyWorkers](docs/Model/MessageBodyWorkers.md)
 - [MileageAllowance](docs/Model/MileageAllowance.md)
 - [MobileAppLogin](docs/Model/MobileAppLogin.md)
 - [Modules](docs/Model/Modules.md)
 - [MonthlyStatus](docs/Model/MonthlyStatus.md)
 - [MultiPart](docs/Model/MultiPart.md)
 - [Municipality](docs/Model/Municipality.md)
 - [NextOfKin](docs/Model/NextOfKin.md)
 - [Notification](docs/Model/Notification.md)
 - [OccupationCode](docs/Model/OccupationCode.md)
 - [Order](docs/Model/Order.md)
 - [OrderLine](docs/Model/OrderLine.md)
 - [OrderOffer](docs/Model/OrderOffer.md)
 - [PG2CallbackDTO](docs/Model/PG2CallbackDTO.md)
 - [ParameterizedHeader](docs/Model/ParameterizedHeader.md)
 - [Passenger](docs/Model/Passenger.md)
 - [PaymentType](docs/Model/PaymentType.md)
 - [PaymentTypeOut](docs/Model/PaymentTypeOut.md)
 - [Payslip](docs/Model/Payslip.md)
 - [PerDiemCompensation](docs/Model/PerDiemCompensation.md)
 - [PersonAutoCompleteDTO](docs/Model/PersonAutoCompleteDTO.md)
 - [Posting](docs/Model/Posting.md)
 - [Product](docs/Model/Product.md)
 - [ProductLine](docs/Model/ProductLine.md)
 - [ProductUnit](docs/Model/ProductUnit.md)
 - [Project](docs/Model/Project.md)
 - [ProjectActivity](docs/Model/ProjectActivity.md)
 - [ProjectCategory](docs/Model/ProjectCategory.md)
 - [ProjectControlForm](docs/Model/ProjectControlForm.md)
 - [ProjectHourlyRate](docs/Model/ProjectHourlyRate.md)
 - [ProjectInvoiceDetails](docs/Model/ProjectInvoiceDetails.md)
 - [ProjectOrderLine](docs/Model/ProjectOrderLine.md)
 - [ProjectParticipant](docs/Model/ProjectParticipant.md)
 - [ProjectPeriodHourlyReport](docs/Model/ProjectPeriodHourlyReport.md)
 - [ProjectPeriodInvoiced](docs/Model/ProjectPeriodInvoiced.md)
 - [ProjectPeriodInvoicingReserve](docs/Model/ProjectPeriodInvoicingReserve.md)
 - [ProjectPeriodMonthlyStatus](docs/Model/ProjectPeriodMonthlyStatus.md)
 - [ProjectPeriodOverallStatus](docs/Model/ProjectPeriodOverallStatus.md)
 - [ProjectSpecificRate](docs/Model/ProjectSpecificRate.md)
 - [Prospect](docs/Model/Prospect.md)
 - [Providers](docs/Model/Providers.md)
 - [PurchaseOrder](docs/Model/PurchaseOrder.md)
 - [Reminder](docs/Model/Reminder.md)
 - [RemunerationType](docs/Model/RemunerationType.md)
 - [ResponseWrapperAccommodationAllowance](docs/Model/ResponseWrapperAccommodationAllowance.md)
 - [ResponseWrapperAccount](docs/Model/ResponseWrapperAccount.md)
 - [ResponseWrapperAccountingPeriod](docs/Model/ResponseWrapperAccountingPeriod.md)
 - [ResponseWrapperActivity](docs/Model/ResponseWrapperActivity.md)
 - [ResponseWrapperAltinnCompanyModule](docs/Model/ResponseWrapperAltinnCompanyModule.md)
 - [ResponseWrapperAnnualAccount](docs/Model/ResponseWrapperAnnualAccount.md)
 - [ResponseWrapperApiConsumer](docs/Model/ResponseWrapperApiConsumer.md)
 - [ResponseWrapperAppSpecific](docs/Model/ResponseWrapperAppSpecific.md)
 - [ResponseWrapperBankReconciliation](docs/Model/ResponseWrapperBankReconciliation.md)
 - [ResponseWrapperBankReconciliationMatch](docs/Model/ResponseWrapperBankReconciliationMatch.md)
 - [ResponseWrapperBankReconciliationPaymentType](docs/Model/ResponseWrapperBankReconciliationPaymentType.md)
 - [ResponseWrapperBankStatement](docs/Model/ResponseWrapperBankStatement.md)
 - [ResponseWrapperBankTransaction](docs/Model/ResponseWrapperBankTransaction.md)
 - [ResponseWrapperBanner](docs/Model/ResponseWrapperBanner.md)
 - [ResponseWrapperBoolean](docs/Model/ResponseWrapperBoolean.md)
 - [ResponseWrapperCloseGroup](docs/Model/ResponseWrapperCloseGroup.md)
 - [ResponseWrapperCompany](docs/Model/ResponseWrapperCompany.md)
 - [ResponseWrapperCompanyHoliday](docs/Model/ResponseWrapperCompanyHoliday.md)
 - [ResponseWrapperConsumerToken](docs/Model/ResponseWrapperConsumerToken.md)
 - [ResponseWrapperContact](docs/Model/ResponseWrapperContact.md)
 - [ResponseWrapperCost](docs/Model/ResponseWrapperCost.md)
 - [ResponseWrapperCountry](docs/Model/ResponseWrapperCountry.md)
 - [ResponseWrapperCurrency](docs/Model/ResponseWrapperCurrency.md)
 - [ResponseWrapperCurrencyExchangeRate](docs/Model/ResponseWrapperCurrencyExchangeRate.md)
 - [ResponseWrapperCustomer](docs/Model/ResponseWrapperCustomer.md)
 - [ResponseWrapperCustomerCategory](docs/Model/ResponseWrapperCustomerCategory.md)
 - [ResponseWrapperDashboardDTO](docs/Model/ResponseWrapperDashboardDTO.md)
 - [ResponseWrapperDeliveryAddress](docs/Model/ResponseWrapperDeliveryAddress.md)
 - [ResponseWrapperDepartment](docs/Model/ResponseWrapperDepartment.md)
 - [ResponseWrapperDivision](docs/Model/ResponseWrapperDivision.md)
 - [ResponseWrapperDocument](docs/Model/ResponseWrapperDocument.md)
 - [ResponseWrapperDocumentArchive](docs/Model/ResponseWrapperDocumentArchive.md)
 - [ResponseWrapperDouble](docs/Model/ResponseWrapperDouble.md)
 - [ResponseWrapperEmployee](docs/Model/ResponseWrapperEmployee.md)
 - [ResponseWrapperEmployeeToken](docs/Model/ResponseWrapperEmployeeToken.md)
 - [ResponseWrapperEmployment](docs/Model/ResponseWrapperEmployment.md)
 - [ResponseWrapperEmploymentDetails](docs/Model/ResponseWrapperEmploymentDetails.md)
 - [ResponseWrapperEntitlement](docs/Model/ResponseWrapperEntitlement.md)
 - [ResponseWrapperEventInfoDTO](docs/Model/ResponseWrapperEventInfoDTO.md)
 - [ResponseWrapperExternalProduct](docs/Model/ResponseWrapperExternalProduct.md)
 - [ResponseWrapperHourlyCostAndRate](docs/Model/ResponseWrapperHourlyCostAndRate.md)
 - [ResponseWrapperInteger](docs/Model/ResponseWrapperInteger.md)
 - [ResponseWrapperInventory](docs/Model/ResponseWrapperInventory.md)
 - [ResponseWrapperInvoice](docs/Model/ResponseWrapperInvoice.md)
 - [ResponseWrapperLeaveOfAbsence](docs/Model/ResponseWrapperLeaveOfAbsence.md)
 - [ResponseWrapperLegacyAddress](docs/Model/ResponseWrapperLegacyAddress.md)
 - [ResponseWrapperListJob](docs/Model/ResponseWrapperListJob.md)
 - [ResponseWrapperLoggedInUserInfoDTO](docs/Model/ResponseWrapperLoggedInUserInfoDTO.md)
 - [ResponseWrapperMapStringEventInfoDescription](docs/Model/ResponseWrapperMapStringEventInfoDescription.md)
 - [ResponseWrapperMileageAllowance](docs/Model/ResponseWrapperMileageAllowance.md)
 - [ResponseWrapperModules](docs/Model/ResponseWrapperModules.md)
 - [ResponseWrapperMonthlyStatus](docs/Model/ResponseWrapperMonthlyStatus.md)
 - [ResponseWrapperNextOfKin](docs/Model/ResponseWrapperNextOfKin.md)
 - [ResponseWrapperNotification](docs/Model/ResponseWrapperNotification.md)
 - [ResponseWrapperObject](docs/Model/ResponseWrapperObject.md)
 - [ResponseWrapperOrder](docs/Model/ResponseWrapperOrder.md)
 - [ResponseWrapperOrderLine](docs/Model/ResponseWrapperOrderLine.md)
 - [ResponseWrapperOrderOffer](docs/Model/ResponseWrapperOrderOffer.md)
 - [ResponseWrapperPassenger](docs/Model/ResponseWrapperPassenger.md)
 - [ResponseWrapperPaymentType](docs/Model/ResponseWrapperPaymentType.md)
 - [ResponseWrapperPaymentTypeOut](docs/Model/ResponseWrapperPaymentTypeOut.md)
 - [ResponseWrapperPayslip](docs/Model/ResponseWrapperPayslip.md)
 - [ResponseWrapperPerDiemCompensation](docs/Model/ResponseWrapperPerDiemCompensation.md)
 - [ResponseWrapperPosting](docs/Model/ResponseWrapperPosting.md)
 - [ResponseWrapperProduct](docs/Model/ResponseWrapperProduct.md)
 - [ResponseWrapperProductLine](docs/Model/ResponseWrapperProductLine.md)
 - [ResponseWrapperProductUnit](docs/Model/ResponseWrapperProductUnit.md)
 - [ResponseWrapperProject](docs/Model/ResponseWrapperProject.md)
 - [ResponseWrapperProjectActivity](docs/Model/ResponseWrapperProjectActivity.md)
 - [ResponseWrapperProjectCategory](docs/Model/ResponseWrapperProjectCategory.md)
 - [ResponseWrapperProjectControlForm](docs/Model/ResponseWrapperProjectControlForm.md)
 - [ResponseWrapperProjectHourlyRate](docs/Model/ResponseWrapperProjectHourlyRate.md)
 - [ResponseWrapperProjectInvoiceDetails](docs/Model/ResponseWrapperProjectInvoiceDetails.md)
 - [ResponseWrapperProjectOrderLine](docs/Model/ResponseWrapperProjectOrderLine.md)
 - [ResponseWrapperProjectParticipant](docs/Model/ResponseWrapperProjectParticipant.md)
 - [ResponseWrapperProjectPeriodHourlyReport](docs/Model/ResponseWrapperProjectPeriodHourlyReport.md)
 - [ResponseWrapperProjectPeriodInvoiced](docs/Model/ResponseWrapperProjectPeriodInvoiced.md)
 - [ResponseWrapperProjectPeriodInvoicingReserve](docs/Model/ResponseWrapperProjectPeriodInvoicingReserve.md)
 - [ResponseWrapperProjectPeriodOverallStatus](docs/Model/ResponseWrapperProjectPeriodOverallStatus.md)
 - [ResponseWrapperProjectSpecificRate](docs/Model/ResponseWrapperProjectSpecificRate.md)
 - [ResponseWrapperProspect](docs/Model/ResponseWrapperProspect.md)
 - [ResponseWrapperPurchaseOrder](docs/Model/ResponseWrapperPurchaseOrder.md)
 - [ResponseWrapperReminder](docs/Model/ResponseWrapperReminder.md)
 - [ResponseWrapperSalaryCompilation](docs/Model/ResponseWrapperSalaryCompilation.md)
 - [ResponseWrapperSalarySettings](docs/Model/ResponseWrapperSalarySettings.md)
 - [ResponseWrapperSalarySpecification](docs/Model/ResponseWrapperSalarySpecification.md)
 - [ResponseWrapperSalaryTransaction](docs/Model/ResponseWrapperSalaryTransaction.md)
 - [ResponseWrapperSalaryType](docs/Model/ResponseWrapperSalaryType.md)
 - [ResponseWrapperSalesForceAccountInfo](docs/Model/ResponseWrapperSalesForceAccountInfo.md)
 - [ResponseWrapperSalesForceEmployee](docs/Model/ResponseWrapperSalesForceEmployee.md)
 - [ResponseWrapperSalesForceEmployeeRole](docs/Model/ResponseWrapperSalesForceEmployeeRole.md)
 - [ResponseWrapperSalesForceOpportunity](docs/Model/ResponseWrapperSalesForceOpportunity.md)
 - [ResponseWrapperSalesModuleDTO](docs/Model/ResponseWrapperSalesModuleDTO.md)
 - [ResponseWrapperSessionToken](docs/Model/ResponseWrapperSessionToken.md)
 - [ResponseWrapperStandardTime](docs/Model/ResponseWrapperStandardTime.md)
 - [ResponseWrapperStocktaking](docs/Model/ResponseWrapperStocktaking.md)
 - [ResponseWrapperString](docs/Model/ResponseWrapperString.md)
 - [ResponseWrapperSubscription](docs/Model/ResponseWrapperSubscription.md)
 - [ResponseWrapperSupplier](docs/Model/ResponseWrapperSupplier.md)
 - [ResponseWrapperSystemMessage](docs/Model/ResponseWrapperSystemMessage.md)
 - [ResponseWrapperTimeClock](docs/Model/ResponseWrapperTimeClock.md)
 - [ResponseWrapperTimesheetEntry](docs/Model/ResponseWrapperTimesheetEntry.md)
 - [ResponseWrapperTimesheetSalaryTypeSpecification](docs/Model/ResponseWrapperTimesheetSalaryTypeSpecification.md)
 - [ResponseWrapperTimesheetSettings](docs/Model/ResponseWrapperTimesheetSettings.md)
 - [ResponseWrapperTravelCostCategory](docs/Model/ResponseWrapperTravelCostCategory.md)
 - [ResponseWrapperTravelExpense](docs/Model/ResponseWrapperTravelExpense.md)
 - [ResponseWrapperTravelExpenseRate](docs/Model/ResponseWrapperTravelExpenseRate.md)
 - [ResponseWrapperTravelExpenseRateCategory](docs/Model/ResponseWrapperTravelExpenseRateCategory.md)
 - [ResponseWrapperTravelExpenseRateCategoryGroup](docs/Model/ResponseWrapperTravelExpenseRateCategoryGroup.md)
 - [ResponseWrapperTravelExpenseSettings](docs/Model/ResponseWrapperTravelExpenseSettings.md)
 - [ResponseWrapperTravelPaymentType](docs/Model/ResponseWrapperTravelPaymentType.md)
 - [ResponseWrapperTripDTO](docs/Model/ResponseWrapperTripDTO.md)
 - [ResponseWrapperTripletexAccountReturn](docs/Model/ResponseWrapperTripletexAccountReturn.md)
 - [ResponseWrapperUnreadCountDTO](docs/Model/ResponseWrapperUnreadCountDTO.md)
 - [ResponseWrapperVatType](docs/Model/ResponseWrapperVatType.md)
 - [ResponseWrapperVoucher](docs/Model/ResponseWrapperVoucher.md)
 - [ResponseWrapperVoucherOptions](docs/Model/ResponseWrapperVoucherOptions.md)
 - [ResponseWrapperVoucherType](docs/Model/ResponseWrapperVoucherType.md)
 - [ResponseWrapperWeek](docs/Model/ResponseWrapperWeek.md)
 - [RestrictedEntitlementChangeDTO](docs/Model/RestrictedEntitlementChangeDTO.md)
 - [SalaryCompilation](docs/Model/SalaryCompilation.md)
 - [SalaryCompilationLine](docs/Model/SalaryCompilationLine.md)
 - [SalarySettings](docs/Model/SalarySettings.md)
 - [SalarySpecification](docs/Model/SalarySpecification.md)
 - [SalaryTransaction](docs/Model/SalaryTransaction.md)
 - [SalaryType](docs/Model/SalaryType.md)
 - [SalesForceAccountInfo](docs/Model/SalesForceAccountInfo.md)
 - [SalesForceAddressDTO](docs/Model/SalesForceAddressDTO.md)
 - [SalesForceCountryDTO](docs/Model/SalesForceCountryDTO.md)
 - [SalesForceEmployee](docs/Model/SalesForceEmployee.md)
 - [SalesForceEmployeeRole](docs/Model/SalesForceEmployeeRole.md)
 - [SalesForceOpportunity](docs/Model/SalesForceOpportunity.md)
 - [SalesModuleDTO](docs/Model/SalesModuleDTO.md)
 - [SearchCompletionDTO](docs/Model/SearchCompletionDTO.md)
 - [SessionToken](docs/Model/SessionToken.md)
 - [StandardTime](docs/Model/StandardTime.md)
 - [Stock](docs/Model/Stock.md)
 - [Stocktaking](docs/Model/Stocktaking.md)
 - [Subscription](docs/Model/Subscription.md)
 - [Supplier](docs/Model/Supplier.md)
 - [SupplierBalance](docs/Model/SupplierBalance.md)
 - [SystemMessage](docs/Model/SystemMessage.md)
 - [Task](docs/Model/Task.md)
 - [TimeClock](docs/Model/TimeClock.md)
 - [TimesheetEntry](docs/Model/TimesheetEntry.md)
 - [TimesheetEntrySearchResponse](docs/Model/TimesheetEntrySearchResponse.md)
 - [TimesheetSalaryTypeSpecification](docs/Model/TimesheetSalaryTypeSpecification.md)
 - [TimesheetSettings](docs/Model/TimesheetSettings.md)
 - [TravelCostCategory](docs/Model/TravelCostCategory.md)
 - [TravelDetails](docs/Model/TravelDetails.md)
 - [TravelExpense](docs/Model/TravelExpense.md)
 - [TravelExpenseRate](docs/Model/TravelExpenseRate.md)
 - [TravelExpenseRateCategory](docs/Model/TravelExpenseRateCategory.md)
 - [TravelExpenseRateCategoryGroup](docs/Model/TravelExpenseRateCategoryGroup.md)
 - [TravelExpenseSettings](docs/Model/TravelExpenseSettings.md)
 - [TravelPaymentType](docs/Model/TravelPaymentType.md)
 - [TriggerDTO](docs/Model/TriggerDTO.md)
 - [TripDTO](docs/Model/TripDTO.md)
 - [TripletexAccount](docs/Model/TripletexAccount.md)
 - [TripletexAccount2](docs/Model/TripletexAccount2.md)
 - [TripletexAccountReturn](docs/Model/TripletexAccountReturn.md)
 - [UnreadCountDTO](docs/Model/UnreadCountDTO.md)
 - [VNTCStatusDTO](docs/Model/VNTCStatusDTO.md)
 - [VatType](docs/Model/VatType.md)
 - [Voucher](docs/Model/Voucher.md)
 - [VoucherOptions](docs/Model/VoucherOptions.md)
 - [VoucherSearchResponse](docs/Model/VoucherSearchResponse.md)
 - [VoucherType](docs/Model/VoucherType.md)
 - [WebHookWrapper](docs/Model/WebHookWrapper.md)
 - [Week](docs/Model/Week.md)
 - [WorkingHoursScheme](docs/Model/WorkingHoursScheme.md)

## Documentation For Authorization


## tokenAuthScheme

- **Type**: HTTP basic authentication


## Author




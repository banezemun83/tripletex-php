# Swagger\Client\TravelExpenseApi

All URIs are relative to *https://tripletex.no/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**approve**](TravelExpenseApi.md#approve) | **PUT** /travelExpense/:approve | [BETA] Approve travel expenses.
[**copy**](TravelExpenseApi.md#copy) | **PUT** /travelExpense/:copy | [BETA] Copy travel expense.
[**createVouchers**](TravelExpenseApi.md#createvouchers) | **PUT** /travelExpense/:createVouchers | [BETA] Create vouchers
[**delete**](TravelExpenseApi.md#delete) | **DELETE** /travelExpense/{id} | [BETA] Delete travel expense.
[**deleteAttachment**](TravelExpenseApi.md#deleteattachment) | **DELETE** /travelExpense/{travelExpenseId}/attachment | [BETA] Delete attachment.
[**deliver**](TravelExpenseApi.md#deliver) | **PUT** /travelExpense/:deliver | [BETA] Deliver travel expenses.
[**downloadAttachment**](TravelExpenseApi.md#downloadattachment) | **GET** /travelExpense/{travelExpenseId}/attachment | Get attachment by travel expense ID.
[**get**](TravelExpenseApi.md#get) | **GET** /travelExpense/{id} | [BETA] Get travel expense by ID.
[**post**](TravelExpenseApi.md#post) | **POST** /travelExpense | [BETA] Create travel expense.
[**put**](TravelExpenseApi.md#put) | **PUT** /travelExpense/{id} | [BETA] Update travel expense.
[**search**](TravelExpenseApi.md#search) | **GET** /travelExpense | [BETA] Find travel expenses corresponding with sent data.
[**unapprove**](TravelExpenseApi.md#unapprove) | **PUT** /travelExpense/:unapprove | [BETA] Unapprove travel expenses.
[**undeliver**](TravelExpenseApi.md#undeliver) | **PUT** /travelExpense/:undeliver | [BETA] Undeliver travel expenses.
[**uploadAttachment**](TravelExpenseApi.md#uploadattachment) | **POST** /travelExpense/{travelExpenseId}/attachment | Upload attachment to travel expense.
[**uploadAttachments**](TravelExpenseApi.md#uploadattachments) | **POST** /travelExpense/{travelExpenseId}/attachment/list | Upload multiple attachments to travel expense.

# **approve**
> \Swagger\Client\Model\ListResponseTravelExpense approve($id)

[BETA] Approve travel expenses.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | ID of the elements

try {
    $result = $apiInstance->approve($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->approve: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID of the elements | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTravelExpense**](../Model/ListResponseTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **copy**
> \Swagger\Client\Model\ResponseWrapperTravelExpense copy($id)

[BETA] Copy travel expense.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $result = $apiInstance->copy($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->copy: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |

### Return type

[**\Swagger\Client\Model\ResponseWrapperTravelExpense**](../Model/ResponseWrapperTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createVouchers**
> \Swagger\Client\Model\ListResponseTravelExpense createVouchers($date, $id)

[BETA] Create vouchers

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date = "date_example"; // string | yyyy-MM-dd. Defaults to today.
$id = "id_example"; // string | ID of the elements

try {
    $result = $apiInstance->createVouchers($date, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->createVouchers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date** | **string**| yyyy-MM-dd. Defaults to today. |
 **id** | **string**| ID of the elements | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTravelExpense**](../Model/ListResponseTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **delete**
> delete($id)

[BETA] Delete travel expense.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->delete($id);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->delete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteAttachment**
> deleteAttachment($travel_expense_id, $version, $send_to_inbox, $split)

[BETA] Delete attachment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$travel_expense_id = 56; // int | ID of attachment containing the attachment to delete.
$version = 56; // int | Version of voucher containing the attachment to delete.
$send_to_inbox = true; // bool | Should the attachment be sent to inbox rather than deleted?
$split = true; // bool | If sendToInbox is true, should the attachment be split into one voucher per page?

try {
    $apiInstance->deleteAttachment($travel_expense_id, $version, $send_to_inbox, $split);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->deleteAttachment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **travel_expense_id** | **int**| ID of attachment containing the attachment to delete. |
 **version** | **int**| Version of voucher containing the attachment to delete. | [optional]
 **send_to_inbox** | **bool**| Should the attachment be sent to inbox rather than deleted? | [optional]
 **split** | **bool**| If sendToInbox is true, should the attachment be split into one voucher per page? | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deliver**
> \Swagger\Client\Model\ListResponseTravelExpense deliver($id)

[BETA] Deliver travel expenses.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | ID of the elements

try {
    $result = $apiInstance->deliver($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->deliver: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID of the elements | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTravelExpense**](../Model/ListResponseTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **downloadAttachment**
> string downloadAttachment($travel_expense_id)

Get attachment by travel expense ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$travel_expense_id = 56; // int | Travel Expense ID from which PDF is downloaded.

try {
    $result = $apiInstance->downloadAttachment($travel_expense_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->downloadAttachment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **travel_expense_id** | **int**| Travel Expense ID from which PDF is downloaded. |

### Return type

**string**

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/octet-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **get**
> \Swagger\Client\Model\ResponseWrapperTravelExpense get($id, $fields)

[BETA] Get travel expense by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
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
    echo 'Exception when calling TravelExpenseApi->get: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTravelExpense**](../Model/ResponseWrapperTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **post**
> \Swagger\Client\Model\ResponseWrapperTravelExpense post($body)

[BETA] Create travel expense.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\TravelExpense(); // \Swagger\Client\Model\TravelExpense | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->post($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->post: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TravelExpense**](../Model/TravelExpense.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTravelExpense**](../Model/ResponseWrapperTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **put**
> \Swagger\Client\Model\ResponseWrapperTravelExpense put($id, $body)

[BETA] Update travel expense.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\TravelExpense(); // \Swagger\Client\Model\TravelExpense | Partial object describing what should be updated

try {
    $result = $apiInstance->put($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->put: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\TravelExpense**](../Model/TravelExpense.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTravelExpense**](../Model/ResponseWrapperTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **search**
> \Swagger\Client\Model\ListResponseTravelExpense search($employee_id, $department_id, $project_id, $project_manager_id, $departure_date_from, $return_date_to, $state, $from, $count, $sorting, $fields)

[BETA] Find travel expenses corresponding with sent data.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = "employee_id_example"; // string | Equals
$department_id = "department_id_example"; // string | Equals
$project_id = "project_id_example"; // string | Equals
$project_manager_id = "project_manager_id_example"; // string | Equals
$departure_date_from = "departure_date_from_example"; // string | From and including
$return_date_to = "return_date_to_example"; // string | To and excluding
$state = "state_example"; // string | category
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->search($employee_id, $department_id, $project_id, $project_manager_id, $departure_date_from, $return_date_to, $state, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->search: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **string**| Equals | [optional]
 **department_id** | **string**| Equals | [optional]
 **project_id** | **string**| Equals | [optional]
 **project_manager_id** | **string**| Equals | [optional]
 **departure_date_from** | **string**| From and including | [optional]
 **return_date_to** | **string**| To and excluding | [optional]
 **state** | **string**| category | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTravelExpense**](../Model/ListResponseTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **unapprove**
> \Swagger\Client\Model\ListResponseTravelExpense unapprove($id)

[BETA] Unapprove travel expenses.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | ID of the elements

try {
    $result = $apiInstance->unapprove($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->unapprove: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID of the elements | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTravelExpense**](../Model/ListResponseTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **undeliver**
> \Swagger\Client\Model\ListResponseTravelExpense undeliver($id)

[BETA] Undeliver travel expenses.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | ID of the elements

try {
    $result = $apiInstance->undeliver($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->undeliver: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| ID of the elements | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTravelExpense**](../Model/ListResponseTravelExpense.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadAttachment**
> uploadAttachment($travel_expense_id, $file, $create_new_cost)

Upload attachment to travel expense.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$travel_expense_id = 56; // int | Travel Expense ID to upload attachment to.
$file = "file_example"; // string | 
$create_new_cost = true; // bool | Create new cost row when you add the attachment

try {
    $apiInstance->uploadAttachment($travel_expense_id, $file, $create_new_cost);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->uploadAttachment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **travel_expense_id** | **int**| Travel Expense ID to upload attachment to. |
 **file** | **string****string**|  | [optional]
 **create_new_cost** | **bool**| Create new cost row when you add the attachment | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadAttachments**
> uploadAttachments($content_disposition, $entity, $headers, $media_type, $message_body_workers, $parent, $providers, $body_parts, $fields, $parameterized_headers, $travel_expense_id, $create_new_cost)

Upload multiple attachments to travel expense.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$content_disposition = new \Swagger\Client\Model\ContentDisposition(); // \Swagger\Client\Model\ContentDisposition | 
$entity = new \stdClass; // object | 
$headers = array('key' => new \Swagger\Client\Model\string[]()); // map[string,string[]] | 
$media_type = new \Swagger\Client\Model\MediaType(); // \Swagger\Client\Model\MediaType | 
$message_body_workers = new \Swagger\Client\Model\MessageBodyWorkers(); // \Swagger\Client\Model\MessageBodyWorkers | 
$parent = new \Swagger\Client\Model\MultiPart(); // \Swagger\Client\Model\MultiPart | 
$providers = new \Swagger\Client\Model\Providers(); // \Swagger\Client\Model\Providers | 
$body_parts = array(new \Swagger\Client\Model\BodyPart()); // \Swagger\Client\Model\BodyPart[] | 
$fields = array('key' => new \Swagger\Client\Model\FormDataBodyPart[]()); // map[string,\Swagger\Client\Model\FormDataBodyPart[]] | 
$parameterized_headers = array('key' => new \Swagger\Client\Model\ParameterizedHeader[]()); // map[string,\Swagger\Client\Model\ParameterizedHeader[]] | 
$travel_expense_id = 56; // int | Travel Expense ID to upload attachment to.
$create_new_cost = true; // bool | Create new cost row when you add the attachment

try {
    $apiInstance->uploadAttachments($content_disposition, $entity, $headers, $media_type, $message_body_workers, $parent, $providers, $body_parts, $fields, $parameterized_headers, $travel_expense_id, $create_new_cost);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseApi->uploadAttachments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **content_disposition** | [**\Swagger\Client\Model\ContentDisposition**](../Model/.md)|  |
 **entity** | [**object**](../Model/.md)|  |
 **headers** | [**map[string,string[]]**](../Model/string[].md)|  |
 **media_type** | [**\Swagger\Client\Model\MediaType**](../Model/.md)|  |
 **message_body_workers** | [**\Swagger\Client\Model\MessageBodyWorkers**](../Model/.md)|  |
 **parent** | [**\Swagger\Client\Model\MultiPart**](../Model/.md)|  |
 **providers** | [**\Swagger\Client\Model\Providers**](../Model/.md)|  |
 **body_parts** | [**\Swagger\Client\Model\BodyPart[]**](../Model/\Swagger\Client\Model\BodyPart.md)|  |
 **fields** | [**map[string,\Swagger\Client\Model\FormDataBodyPart[]]**](../Model/\Swagger\Client\Model\FormDataBodyPart[].md)|  |
 **parameterized_headers** | [**map[string,\Swagger\Client\Model\ParameterizedHeader[]]**](../Model/\Swagger\Client\Model\ParameterizedHeader[].md)|  |
 **travel_expense_id** | **int**| Travel Expense ID to upload attachment to. |
 **create_new_cost** | **bool**| Create new cost row when you add the attachment | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


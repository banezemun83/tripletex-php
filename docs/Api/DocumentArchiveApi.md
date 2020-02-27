# Swagger\Client\DocumentArchiveApi

All URIs are relative to *https://tripletex.no/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**accountPost**](DocumentArchiveApi.md#accountpost) | **POST** /documentArchive/account/{id} | [BETA] Upload file to Account Document Archive.
[**customerPost**](DocumentArchiveApi.md#customerpost) | **POST** /documentArchive/customer/{id} | [BETA] Upload file to Customer Document Archive.
[**delete**](DocumentArchiveApi.md#delete) | **DELETE** /documentArchive/{id} | [BETA] Delete document archive.
[**employeePost**](DocumentArchiveApi.md#employeepost) | **POST** /documentArchive/employee/{id} | [BETA] Upload file to Employee Document Archive.
[**getAccount**](DocumentArchiveApi.md#getaccount) | **GET** /documentArchive/account/{id} | [BETA] Find documents archived associated with account object type.
[**getCustomer**](DocumentArchiveApi.md#getcustomer) | **GET** /documentArchive/customer/{id} | [BETA] Find documents archived associated with customer object type.
[**getEmployee**](DocumentArchiveApi.md#getemployee) | **GET** /documentArchive/employee/{id} | [BETA] Find documents archived associated with employee object type.
[**getProduct**](DocumentArchiveApi.md#getproduct) | **GET** /documentArchive/product/{id} | [BETA] Find documents archived associated with product object type.
[**getProject**](DocumentArchiveApi.md#getproject) | **GET** /documentArchive/project/{id} | [BETA] Find documents archived associated with project object type.
[**getProspect**](DocumentArchiveApi.md#getprospect) | **GET** /documentArchive/prospect/{id} | [BETA] Find documents archived associated with prospect object type.
[**getSupplier**](DocumentArchiveApi.md#getsupplier) | **GET** /documentArchive/supplier/{id} | [BETA] Find documents archived associated with supplier object type.
[**productPost**](DocumentArchiveApi.md#productpost) | **POST** /documentArchive/product/{id} | [BETA] Upload file to Product Document Archive.
[**projectPost**](DocumentArchiveApi.md#projectpost) | **POST** /documentArchive/project/{id} | [BETA] Upload file to Project Document Archive.
[**prospectPost**](DocumentArchiveApi.md#prospectpost) | **POST** /documentArchive/prospect/{id} | [BETA] Upload file to Prospect Document Archive.
[**put**](DocumentArchiveApi.md#put) | **PUT** /documentArchive/{id} | [BETA] Update document archive.
[**receptionPost**](DocumentArchiveApi.md#receptionpost) | **POST** /documentArchive/reception | [BETA] Upload a file to the document archive reception. Send as multipart form.
[**supplierPost**](DocumentArchiveApi.md#supplierpost) | **POST** /documentArchive/supplier/{id} | [BETA] Upload file to Supplier Document Archive.

# **accountPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive accountPost($id, $file)

[BETA] Upload file to Account Document Archive.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$file = "file_example"; // string | 

try {
    $result = $apiInstance->accountPost($id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->accountPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **file** | **string****string**|  | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **customerPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive customerPost($id, $file)

[BETA] Upload file to Customer Document Archive.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$file = "file_example"; // string | 

try {
    $result = $apiInstance->customerPost($id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->customerPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **file** | **string****string**|  | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **delete**
> delete($id)

[BETA] Delete document archive.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->delete($id);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->delete: ', $e->getMessage(), PHP_EOL;
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

# **employeePost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive employeePost($id, $file)

[BETA] Upload file to Employee Document Archive.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$file = "file_example"; // string | 

try {
    $result = $apiInstance->employeePost($id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->employeePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **file** | **string****string**|  | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAccount**
> \Swagger\Client\Model\ListResponseDocumentArchive getAccount($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with account object type.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->getAccount($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->getAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCustomer**
> \Swagger\Client\Model\ListResponseDocumentArchive getCustomer($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with customer object type.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->getCustomer($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->getCustomer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getEmployee**
> \Swagger\Client\Model\ListResponseDocumentArchive getEmployee($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with employee object type.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->getEmployee($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->getEmployee: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProduct**
> \Swagger\Client\Model\ListResponseDocumentArchive getProduct($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with product object type.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->getProduct($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->getProduct: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProject**
> \Swagger\Client\Model\ListResponseDocumentArchive getProject($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with project object type.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->getProject($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->getProject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProspect**
> \Swagger\Client\Model\ListResponseDocumentArchive getProspect($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with prospect object type.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->getProspect($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->getProspect: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSupplier**
> \Swagger\Client\Model\ListResponseDocumentArchive getSupplier($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields)

[BETA] Find documents archived associated with supplier object type.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$period_date_from = "period_date_from_example"; // string | From and including
$period_date_to = "period_date_to_example"; // string | To and excluding
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->getSupplier($id, $period_date_from, $period_date_to, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->getSupplier: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **period_date_from** | **string**| From and including | [optional]
 **period_date_to** | **string**| To and excluding | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDocumentArchive**](../Model/ListResponseDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive productPost($id, $file)

[BETA] Upload file to Product Document Archive.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$file = "file_example"; // string | 

try {
    $result = $apiInstance->productPost($id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->productPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **file** | **string****string**|  | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive projectPost($id, $file)

[BETA] Upload file to Project Document Archive.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$file = "file_example"; // string | 

try {
    $result = $apiInstance->projectPost($id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->projectPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **file** | **string****string**|  | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **prospectPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive prospectPost($id, $file)

[BETA] Upload file to Prospect Document Archive.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$file = "file_example"; // string | 

try {
    $result = $apiInstance->prospectPost($id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->prospectPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **file** | **string****string**|  | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **put**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive put($id, $body)

[BETA] Update document archive.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\DocumentArchive(); // \Swagger\Client\Model\DocumentArchive | Partial object describing what should be updated

try {
    $result = $apiInstance->put($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->put: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\DocumentArchive**](../Model/DocumentArchive.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **receptionPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive receptionPost($file)

[BETA] Upload a file to the document archive reception. Send as multipart form.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "file_example"; // string | 

try {
    $result = $apiInstance->receptionPost($file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->receptionPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **string****string**|  | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supplierPost**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive supplierPost($id, $file)

[BETA] Upload file to Supplier Document Archive.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\DocumentArchiveApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$file = "file_example"; // string | 

try {
    $result = $apiInstance->supplierPost($id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentArchiveApi->supplierPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **file** | **string****string**|  | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDocumentArchive**](../Model/ResponseWrapperDocumentArchive.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


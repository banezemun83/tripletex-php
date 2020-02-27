# Swagger\Client\TravelExpenseperDiemCompensationApi

All URIs are relative to *https://tripletex.no/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete**](TravelExpenseperDiemCompensationApi.md#delete) | **DELETE** /travelExpense/perDiemCompensation/{id} | [BETA] Delete per diem compensation.
[**get**](TravelExpenseperDiemCompensationApi.md#get) | **GET** /travelExpense/perDiemCompensation/{id} | [BETA] Get per diem compensation by ID.
[**post**](TravelExpenseperDiemCompensationApi.md#post) | **POST** /travelExpense/perDiemCompensation | [BETA] Create per diem compensation.
[**put**](TravelExpenseperDiemCompensationApi.md#put) | **PUT** /travelExpense/perDiemCompensation/{id} | [BETA] Update per diem compensation.
[**search**](TravelExpenseperDiemCompensationApi.md#search) | **GET** /travelExpense/perDiemCompensation | [BETA] Find per diem compensations corresponding with sent data.

# **delete**
> delete($id)

[BETA] Delete per diem compensation.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseperDiemCompensationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->delete($id);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseperDiemCompensationApi->delete: ', $e->getMessage(), PHP_EOL;
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

# **get**
> \Swagger\Client\Model\ResponseWrapperPerDiemCompensation get($id, $fields)

[BETA] Get per diem compensation by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseperDiemCompensationApi(
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
    echo 'Exception when calling TravelExpenseperDiemCompensationApi->get: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPerDiemCompensation**](../Model/ResponseWrapperPerDiemCompensation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **post**
> \Swagger\Client\Model\ResponseWrapperPerDiemCompensation post($body)

[BETA] Create per diem compensation.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseperDiemCompensationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\PerDiemCompensation(); // \Swagger\Client\Model\PerDiemCompensation | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->post($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseperDiemCompensationApi->post: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\PerDiemCompensation**](../Model/PerDiemCompensation.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPerDiemCompensation**](../Model/ResponseWrapperPerDiemCompensation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **put**
> \Swagger\Client\Model\ResponseWrapperPerDiemCompensation put($id, $body)

[BETA] Update per diem compensation.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseperDiemCompensationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\PerDiemCompensation(); // \Swagger\Client\Model\PerDiemCompensation | Partial object describing what should be updated

try {
    $result = $apiInstance->put($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseperDiemCompensationApi->put: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\PerDiemCompensation**](../Model/PerDiemCompensation.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPerDiemCompensation**](../Model/ResponseWrapperPerDiemCompensation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **search**
> \Swagger\Client\Model\ListResponsePerDiemCompensation search($travel_expense_id, $rate_type_id, $rate_category_id, $overnight_accommodation, $count_from, $count_to, $rate_from, $rate_to, $amount_from, $amount_to, $location, $address, $is_deduction_for_breakfast, $is_lunch_deduction, $is_dinner_deduction, $from, $count, $sorting, $fields)

[BETA] Find per diem compensations corresponding with sent data.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseperDiemCompensationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$travel_expense_id = "travel_expense_id_example"; // string | Equals
$rate_type_id = "rate_type_id_example"; // string | Equals
$rate_category_id = "rate_category_id_example"; // string | Equals
$overnight_accommodation = "overnight_accommodation_example"; // string | Equals
$count_from = 56; // int | From and including
$count_to = 56; // int | To and excluding
$rate_from = 1.2; // float | From and including
$rate_to = 1.2; // float | To and excluding
$amount_from = 1.2; // float | From and including
$amount_to = 1.2; // float | To and excluding
$location = "location_example"; // string | Containing
$address = "address_example"; // string | Containing
$is_deduction_for_breakfast = true; // bool | Equals
$is_lunch_deduction = true; // bool | Equals
$is_dinner_deduction = true; // bool | Equals
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->search($travel_expense_id, $rate_type_id, $rate_category_id, $overnight_accommodation, $count_from, $count_to, $rate_from, $rate_to, $amount_from, $amount_to, $location, $address, $is_deduction_for_breakfast, $is_lunch_deduction, $is_dinner_deduction, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseperDiemCompensationApi->search: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **travel_expense_id** | **string**| Equals | [optional]
 **rate_type_id** | **string**| Equals | [optional]
 **rate_category_id** | **string**| Equals | [optional]
 **overnight_accommodation** | **string**| Equals | [optional]
 **count_from** | **int**| From and including | [optional]
 **count_to** | **int**| To and excluding | [optional]
 **rate_from** | **float**| From and including | [optional]
 **rate_to** | **float**| To and excluding | [optional]
 **amount_from** | **float**| From and including | [optional]
 **amount_to** | **float**| To and excluding | [optional]
 **location** | **string**| Containing | [optional]
 **address** | **string**| Containing | [optional]
 **is_deduction_for_breakfast** | **bool**| Equals | [optional]
 **is_lunch_deduction** | **bool**| Equals | [optional]
 **is_dinner_deduction** | **bool**| Equals | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponsePerDiemCompensation**](../Model/ListResponsePerDiemCompensation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


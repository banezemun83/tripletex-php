# Swagger\Client\TravelExpensemileageAllowanceApi

All URIs are relative to *https://tripletex.no/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete**](TravelExpensemileageAllowanceApi.md#delete) | **DELETE** /travelExpense/mileageAllowance/{id} | [BETA] Delete mileage allowance.
[**get**](TravelExpensemileageAllowanceApi.md#get) | **GET** /travelExpense/mileageAllowance/{id} | [BETA] Get mileage allowance by ID.
[**post**](TravelExpensemileageAllowanceApi.md#post) | **POST** /travelExpense/mileageAllowance | [BETA] Create mileage allowance.
[**put**](TravelExpensemileageAllowanceApi.md#put) | **PUT** /travelExpense/mileageAllowance/{id} | [BETA] Update mileage allowance.
[**search**](TravelExpensemileageAllowanceApi.md#search) | **GET** /travelExpense/mileageAllowance | [BETA] Find mileage allowances corresponding with sent data.

# **delete**
> delete($id)

[BETA] Delete mileage allowance.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensemileageAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->delete($id);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensemileageAllowanceApi->delete: ', $e->getMessage(), PHP_EOL;
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
> \Swagger\Client\Model\ResponseWrapperMileageAllowance get($id, $fields)

[BETA] Get mileage allowance by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensemileageAllowanceApi(
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
    echo 'Exception when calling TravelExpensemileageAllowanceApi->get: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperMileageAllowance**](../Model/ResponseWrapperMileageAllowance.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **post**
> \Swagger\Client\Model\ResponseWrapperMileageAllowance post($body)

[BETA] Create mileage allowance.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensemileageAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\MileageAllowance(); // \Swagger\Client\Model\MileageAllowance | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->post($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensemileageAllowanceApi->post: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\MileageAllowance**](../Model/MileageAllowance.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperMileageAllowance**](../Model/ResponseWrapperMileageAllowance.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **put**
> \Swagger\Client\Model\ResponseWrapperMileageAllowance put($id, $body)

[BETA] Update mileage allowance.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensemileageAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\MileageAllowance(); // \Swagger\Client\Model\MileageAllowance | Partial object describing what should be updated

try {
    $result = $apiInstance->put($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensemileageAllowanceApi->put: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\MileageAllowance**](../Model/MileageAllowance.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperMileageAllowance**](../Model/ResponseWrapperMileageAllowance.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **search**
> \Swagger\Client\Model\ListResponseMileageAllowance search($travel_expense_id, $rate_type_id, $rate_category_id, $km_from, $km_to, $rate_from, $rate_to, $amount_from, $amount_to, $departure_location, $destination, $date_from, $date_to, $is_company_car, $from, $count, $sorting, $fields)

[BETA] Find mileage allowances corresponding with sent data.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensemileageAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$travel_expense_id = "travel_expense_id_example"; // string | Equals
$rate_type_id = "rate_type_id_example"; // string | Equals
$rate_category_id = "rate_category_id_example"; // string | Equals
$km_from = 1.2; // float | From and including
$km_to = 1.2; // float | To and excluding
$rate_from = 1.2; // float | From and including
$rate_to = 1.2; // float | To and excluding
$amount_from = 1.2; // float | From and including
$amount_to = 1.2; // float | To and excluding
$departure_location = "departure_location_example"; // string | Containing
$destination = "destination_example"; // string | Containing
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$is_company_car = true; // bool | Equals
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->search($travel_expense_id, $rate_type_id, $rate_category_id, $km_from, $km_to, $rate_from, $rate_to, $amount_from, $amount_to, $departure_location, $destination, $date_from, $date_to, $is_company_car, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensemileageAllowanceApi->search: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **travel_expense_id** | **string**| Equals | [optional]
 **rate_type_id** | **string**| Equals | [optional]
 **rate_category_id** | **string**| Equals | [optional]
 **km_from** | **float**| From and including | [optional]
 **km_to** | **float**| To and excluding | [optional]
 **rate_from** | **float**| From and including | [optional]
 **rate_to** | **float**| To and excluding | [optional]
 **amount_from** | **float**| From and including | [optional]
 **amount_to** | **float**| To and excluding | [optional]
 **departure_location** | **string**| Containing | [optional]
 **destination** | **string**| Containing | [optional]
 **date_from** | **string**| From and including | [optional]
 **date_to** | **string**| To and excluding | [optional]
 **is_company_car** | **bool**| Equals | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseMileageAllowance**](../Model/ListResponseMileageAllowance.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


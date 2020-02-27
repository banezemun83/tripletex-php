# Swagger\Client\LedgeraccountingPeriodApi

All URIs are relative to *https://tripletex.no/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**get**](LedgeraccountingPeriodApi.md#get) | **GET** /ledger/accountingPeriod/{id} | Get accounting period by ID.
[**search**](LedgeraccountingPeriodApi.md#search) | **GET** /ledger/accountingPeriod | Find accounting periods corresponding with sent data.

# **get**
> \Swagger\Client\Model\ResponseWrapperAccountingPeriod get($id, $fields)

Get accounting period by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgeraccountingPeriodApi(
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
    echo 'Exception when calling LedgeraccountingPeriodApi->get: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperAccountingPeriod**](../Model/ResponseWrapperAccountingPeriod.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **search**
> \Swagger\Client\Model\ListResponseAccountingPeriod search($id, $number_from, $number_to, $start_from, $start_to, $end_from, $end_to, $count, $from, $sorting, $fields)

Find accounting periods corresponding with sent data.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgeraccountingPeriodApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$number_from = 56; // int | From and including
$number_to = 56; // int | To and excluding
$start_from = "start_from_example"; // string | From and including
$start_to = "start_to_example"; // string | To and excluding
$end_from = "end_from_example"; // string | From and including
$end_to = "end_to_example"; // string | To and excluding
$count = 56; // int | Number of elements to return
$from = 56; // int | From index
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->search($id, $number_from, $number_to, $start_from, $start_to, $end_from, $end_to, $count, $from, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgeraccountingPeriodApi->search: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **number_from** | **int**| From and including | [optional]
 **number_to** | **int**| To and excluding | [optional]
 **start_from** | **string**| From and including | [optional]
 **start_to** | **string**| To and excluding | [optional]
 **end_from** | **string**| From and including | [optional]
 **end_to** | **string**| To and excluding | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **from** | **int**| From index | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseAccountingPeriod**](../Model/ListResponseAccountingPeriod.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


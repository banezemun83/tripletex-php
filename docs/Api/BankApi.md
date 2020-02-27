# Swagger\Client\BankApi

All URIs are relative to *https://tripletex.no/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**search**](BankApi.md#search) | **GET** /bank | [BETA] Find bank corresponding with sent data.

# **search**
> \Swagger\Client\Model\ListResponseBank search($id, $register_numbers, $is_bank_reconciliation_support, $from, $count, $sorting, $fields)

[BETA] Find bank corresponding with sent data.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$register_numbers = "register_numbers_example"; // string | Bank register number (four digits)
$is_bank_reconciliation_support = true; // bool | Equals
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->search($id, $register_numbers, $is_bank_reconciliation_support, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankApi->search: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **register_numbers** | **string**| Bank register number (four digits) | [optional]
 **is_bank_reconciliation_support** | **bool**| Equals | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseBank**](../Model/ListResponseBank.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


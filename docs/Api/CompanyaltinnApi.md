# Swagger\Client\CompanyaltinnApi

All URIs are relative to *https://tripletex.no/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**put**](CompanyaltinnApi.md#put) | **PUT** /company/settings/altinn | [BETA] Update AltInn id and password.
[**search**](CompanyaltinnApi.md#search) | **GET** /company/settings/altinn | [BETA] Find Altinn id for login in company.

# **put**
> \Swagger\Client\Model\ResponseWrapperAltinnCompanyModule put($body)

[BETA] Update AltInn id and password.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CompanyaltinnApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\AltinnCompanyModule(); // \Swagger\Client\Model\AltinnCompanyModule | Partial object describing what should be updated

try {
    $result = $apiInstance->put($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyaltinnApi->put: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\AltinnCompanyModule**](../Model/AltinnCompanyModule.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperAltinnCompanyModule**](../Model/ResponseWrapperAltinnCompanyModule.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **search**
> \Swagger\Client\Model\ResponseWrapperAltinnCompanyModule search($fields)

[BETA] Find Altinn id for login in company.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CompanyaltinnApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->search($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyaltinnApi->search: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperAltinnCompanyModule**](../Model/ResponseWrapperAltinnCompanyModule.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


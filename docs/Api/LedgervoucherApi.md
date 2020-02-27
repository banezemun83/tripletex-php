# Swagger\Client\LedgervoucherApi

All URIs are relative to *https://tripletex.no/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete**](LedgervoucherApi.md#delete) | **DELETE** /ledger/voucher/{id} | [BETA] Delete voucher by ID.
[**deleteAttachment**](LedgervoucherApi.md#deleteattachment) | **DELETE** /ledger/voucher/{id}/attachment | [BETA] Delete attachment.
[**downloadPdf**](LedgervoucherApi.md#downloadpdf) | **GET** /ledger/voucher/{voucherId}/pdf | Get PDF representation of voucher by ID.
[**get**](LedgervoucherApi.md#get) | **GET** /ledger/voucher/{id} | Get voucher by ID.
[**importDocument**](LedgervoucherApi.md#importdocument) | **POST** /ledger/voucher/importDocument | [BETA] Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.
[**importGbat10**](LedgervoucherApi.md#importgbat10) | **POST** /ledger/voucher/importGbat10 | Import GBAT10. Send as multipart form.
[**nonPosted**](LedgervoucherApi.md#nonposted) | **GET** /ledger/voucher/&gt;nonPosted | [BETA] Find non-posted vouchers.
[**options**](LedgervoucherApi.md#options) | **GET** /ledger/voucher/{id}/options | [BETA] Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.
[**post**](LedgervoucherApi.md#post) | **POST** /ledger/voucher | Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used
[**put**](LedgervoucherApi.md#put) | **PUT** /ledger/voucher/{id} | [BETA] Update voucher. Postings with guiRow&#x3D;&#x3D;0 will be deleted and regenerated.
[**putList**](LedgervoucherApi.md#putlist) | **PUT** /ledger/voucher/list | [BETA] Update multiple vouchers. Postings with guiRow&#x3D;&#x3D;0 will be deleted and regenerated.
[**reverse**](LedgervoucherApi.md#reverse) | **PUT** /ledger/voucher/{id}/:reverse | Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.
[**search**](LedgervoucherApi.md#search) | **GET** /ledger/voucher | Find vouchers corresponding with sent data.
[**sendToInbox**](LedgervoucherApi.md#sendtoinbox) | **PUT** /ledger/voucher/{id}/:sendToInbox | [BETA] Send voucher to inbox.
[**sendToLedger**](LedgervoucherApi.md#sendtoledger) | **PUT** /ledger/voucher/{id}/:sendToLedger | [BETA] Send voucher to ledger.
[**uploadAttachment**](LedgervoucherApi.md#uploadattachment) | **POST** /ledger/voucher/{voucherId}/attachment | Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
[**uploadPdf**](LedgervoucherApi.md#uploadpdf) | **POST** /ledger/voucher/{voucherId}/pdf/{fileName} | [DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.

# **delete**
> delete($id)

[BETA] Delete voucher by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->delete($id);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->delete: ', $e->getMessage(), PHP_EOL;
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
> deleteAttachment($id, $version, $send_to_inbox, $split)

[BETA] Delete attachment.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | ID of voucher containing the attachment to delete.
$version = 56; // int | Version of voucher containing the attachment to delete.
$send_to_inbox = true; // bool | Should the attachment be sent to inbox rather than deleted?
$split = true; // bool | If sendToInbox is true, should the attachment be split into one voucher per page?

try {
    $apiInstance->deleteAttachment($id, $version, $send_to_inbox, $split);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->deleteAttachment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| ID of voucher containing the attachment to delete. |
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

# **downloadPdf**
> string downloadPdf($voucher_id)

Get PDF representation of voucher by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$voucher_id = 56; // int | Voucher ID from which PDF is downloaded.

try {
    $result = $apiInstance->downloadPdf($voucher_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->downloadPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **voucher_id** | **int**| Voucher ID from which PDF is downloaded. |

### Return type

**string**

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/octet-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **get**
> \Swagger\Client\Model\ResponseWrapperVoucher get($id, $fields)

Get voucher by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
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
    echo 'Exception when calling LedgervoucherApi->get: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **importDocument**
> \Swagger\Client\Model\ListResponseVoucher importDocument($file, $description, $split)

[BETA] Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "file_example"; // string | 
$description = "description_example"; // string | 
$split = true; // bool | If the document consists of several pages, should the document be split into one voucher per page?

try {
    $result = $apiInstance->importDocument($file, $description, $split);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->importDocument: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **string****string**|  | [optional]
 **description** | **string**|  | [optional]
 **split** | **bool**| If the document consists of several pages, should the document be split into one voucher per page? | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseVoucher**](../Model/ListResponseVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **importGbat10**
> importGbat10($generate_vat_postings, $file, $encoding)

Import GBAT10. Send as multipart form.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$generate_vat_postings = true; // bool | 
$file = "file_example"; // string | 
$encoding = "encoding_example"; // string | 

try {
    $apiInstance->importGbat10($generate_vat_postings, $file, $encoding);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->importGbat10: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **generate_vat_postings** | **bool**|  | [optional]
 **file** | **string****string**|  | [optional]
 **encoding** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **nonPosted**
> \Swagger\Client\Model\ListResponseVoucher nonPosted($include_non_approved, $date_from, $date_to, $changed_since, $from, $count, $sorting, $fields)

[BETA] Find non-posted vouchers.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$include_non_approved = true; // bool | Include non-approved vouchers in the result.
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$changed_since = "changed_since_example"; // string | Only return elements that have changed since this date and time
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->nonPosted($include_non_approved, $date_from, $date_to, $changed_since, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->nonPosted: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **include_non_approved** | **bool**| Include non-approved vouchers in the result. |
 **date_from** | **string**| From and including | [optional]
 **date_to** | **string**| To and excluding | [optional]
 **changed_since** | **string**| Only return elements that have changed since this date and time | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseVoucher**](../Model/ListResponseVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **options**
> \Swagger\Client\Model\ResponseWrapperVoucherOptions options($id, $fields)

[BETA] Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->options($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->options: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucherOptions**](../Model/ResponseWrapperVoucherOptions.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **post**
> \Swagger\Client\Model\ResponseWrapperVoucher post($body, $send_to_ledger)

Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Voucher(); // \Swagger\Client\Model\Voucher | JSON representing the new object to be created. Should not have ID and version set.
$send_to_ledger = true; // bool | Should the voucher be sent to ledger? Requires the \"Advanced Voucher\" permission.

try {
    $result = $apiInstance->post($body, $send_to_ledger);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->post: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Voucher**](../Model/Voucher.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]
 **send_to_ledger** | **bool**| Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **put**
> \Swagger\Client\Model\ResponseWrapperVoucher put($id, $body, $send_to_ledger)

[BETA] Update voucher. Postings with guiRow==0 will be deleted and regenerated.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\Voucher(); // \Swagger\Client\Model\Voucher | Partial object describing what should be updated
$send_to_ledger = true; // bool | Should the voucher be sent to ledger? Requires the \"Advanced Voucher\" permission.

try {
    $result = $apiInstance->put($id, $body, $send_to_ledger);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->put: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\Voucher**](../Model/Voucher.md)| Partial object describing what should be updated | [optional]
 **send_to_ledger** | **bool**| Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **putList**
> \Swagger\Client\Model\ListResponseVoucher putList($body, $send_to_ledger)

[BETA] Update multiple vouchers. Postings with guiRow==0 will be deleted and regenerated.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Voucher()); // \Swagger\Client\Model\Voucher[] | JSON representing updates to object. Should have ID and version set.
$send_to_ledger = true; // bool | Should the voucher be sent to ledger? Requires the \"Advanced Voucher\" permission.

try {
    $result = $apiInstance->putList($body, $send_to_ledger);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->putList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Voucher[]**](../Model/Voucher.md)| JSON representing updates to object. Should have ID and version set. | [optional]
 **send_to_ledger** | **bool**| Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseVoucher**](../Model/ListResponseVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **reverse**
> \Swagger\Client\Model\ResponseWrapperVoucher reverse($id, $date)

Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | ID of voucher that should be reversed.
$date = "date_example"; // string | Reverse voucher date

try {
    $result = $apiInstance->reverse($id, $date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->reverse: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| ID of voucher that should be reversed. |
 **date** | **string**| Reverse voucher date |

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **search**
> \Swagger\Client\Model\VoucherSearchResponse search($date_from, $date_to, $id, $number, $number_from, $number_to, $type_id, $from, $count, $sorting, $fields)

Find vouchers corresponding with sent data.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$id = "id_example"; // string | List of IDs
$number = "number_example"; // string | List of IDs
$number_from = 56; // int | From and including
$number_to = 56; // int | To and excluding
$type_id = "type_id_example"; // string | List of IDs
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->search($date_from, $date_to, $id, $number, $number_from, $number_to, $type_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->search: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| From and including |
 **date_to** | **string**| To and excluding |
 **id** | **string**| List of IDs | [optional]
 **number** | **string**| List of IDs | [optional]
 **number_from** | **int**| From and including | [optional]
 **number_to** | **int**| To and excluding | [optional]
 **type_id** | **string**| List of IDs | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\VoucherSearchResponse**](../Model/VoucherSearchResponse.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendToInbox**
> \Swagger\Client\Model\ResponseWrapperVoucher sendToInbox($id, $version, $comment)

[BETA] Send voucher to inbox.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | ID of voucher that should be sent to inbox.
$version = 56; // int | Version of voucher that should be sent to inbox.
$comment = "comment_example"; // string | Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled.

try {
    $result = $apiInstance->sendToInbox($id, $version, $comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->sendToInbox: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| ID of voucher that should be sent to inbox. |
 **version** | **int**| Version of voucher that should be sent to inbox. | [optional]
 **comment** | **string**| Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendToLedger**
> \Swagger\Client\Model\ResponseWrapperVoucher sendToLedger($id, $version, $number)

[BETA] Send voucher to ledger.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | ID of voucher that should be sent to ledger.
$version = 56; // int | Version of voucher that should be sent to ledger.
$number = 56; // int | Voucher number to use. If omitted or 0 the system will assign the number.

try {
    $result = $apiInstance->sendToLedger($id, $version, $number);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->sendToLedger: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| ID of voucher that should be sent to ledger. |
 **version** | **int**| Version of voucher that should be sent to ledger. | [optional]
 **number** | **int**| Voucher number to use. If omitted or 0 the system will assign the number. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucher**](../Model/ResponseWrapperVoucher.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadAttachment**
> uploadAttachment($voucher_id, $file)

Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$voucher_id = 56; // int | Voucher ID to upload attachment to.
$file = "file_example"; // string | 

try {
    $apiInstance->uploadAttachment($voucher_id, $file);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->uploadAttachment: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **voucher_id** | **int**| Voucher ID to upload attachment to. |
 **file** | **string****string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadPdf**
> uploadPdf($voucher_id, $file_name, $file)

[DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgervoucherApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$voucher_id = 56; // int | Voucher ID to upload PDF to.
$file_name = "file_name_example"; // string | File name to store the pdf under. Will not be the same as the filename on the file returned.
$file = "file_example"; // string | 

try {
    $apiInstance->uploadPdf($voucher_id, $file_name, $file);
} catch (Exception $e) {
    echo 'Exception when calling LedgervoucherApi->uploadPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **voucher_id** | **int**| Voucher ID to upload PDF to. |
 **file_name** | **string**| File name to store the pdf under. Will not be the same as the filename on the file returned. |
 **file** | **string****string**|  | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


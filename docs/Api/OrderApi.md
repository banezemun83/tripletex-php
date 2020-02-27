# Swagger\Client\OrderApi

All URIs are relative to *https://tripletex.no/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**approveSubscriptionInvoice**](OrderApi.md#approvesubscriptioninvoice) | **PUT** /order/{id}/:approveSubscriptionInvoice | To create a subscription invoice, first create a order with the subscription enabled, then approve it with this method. This approves the order for subscription invoicing.
[**attach**](OrderApi.md#attach) | **PUT** /order/{id}/:attach | Attach document to specified order ID.
[**get**](OrderApi.md#get) | **GET** /order/{id} | Get order by ID.
[**invoice**](OrderApi.md#invoice) | **PUT** /order/{id}/:invoice | Create new invoice from order.
[**invoiceMultipleOrders**](OrderApi.md#invoicemultipleorders) | **PUT** /order/:invoiceMultipleOrders | [BETA] Charges a single customer invoice from multiple orders. The orders must be to the same customer, currency, due date, receiver email and attn.
[**post**](OrderApi.md#post) | **POST** /order | Create order.
[**put**](OrderApi.md#put) | **PUT** /order/{id} | Update order.
[**search**](OrderApi.md#search) | **GET** /order | Find orders corresponding with sent data.
[**unApproveSubscriptionInvoice**](OrderApi.md#unapprovesubscriptioninvoice) | **PUT** /order/{id}/:unApproveSubscriptionInvoice | Unapproves the order for subscription invoicing.

# **approveSubscriptionInvoice**
> \Swagger\Client\Model\ResponseWrapperInvoice approveSubscriptionInvoice($id, $invoice_date)

To create a subscription invoice, first create a order with the subscription enabled, then approve it with this method. This approves the order for subscription invoicing.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | ID of order to approve for subscription invoicing.
$invoice_date = "invoice_date_example"; // string | The approval date for the subscription.

try {
    $result = $apiInstance->approveSubscriptionInvoice($id, $invoice_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderApi->approveSubscriptionInvoice: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| ID of order to approve for subscription invoicing. |
 **invoice_date** | **string**| The approval date for the subscription. |

### Return type

[**\Swagger\Client\Model\ResponseWrapperInvoice**](../Model/ResponseWrapperInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **attach**
> \Swagger\Client\Model\ResponseWrapperDocumentArchive attach($id, $file)

Attach document to specified order ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$file = "file_example"; // string | 

try {
    $result = $apiInstance->attach($id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderApi->attach: ', $e->getMessage(), PHP_EOL;
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

# **get**
> \Swagger\Client\Model\ResponseWrapperOrder get($id, $fields)

Get order by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderApi(
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
    echo 'Exception when calling OrderApi->get: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperOrder**](../Model/ResponseWrapperOrder.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **invoice**
> \Swagger\Client\Model\ResponseWrapperInvoice invoice($id, $invoice_date, $send_to_customer, $payment_type_id, $paid_amount)

Create new invoice from order.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | ID of order to invoice.
$invoice_date = "invoice_date_example"; // string | The invoice date
$send_to_customer = true; // bool | Send invoice to customer
$payment_type_id = 56; // int | Payment type to register prepayment of the invoice. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. The payment type must be related to an account with the same currency as the invoice.
$paid_amount = 1.2; // float | Paid amount to register prepayment of the invoice, in invoice currency. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. This amount is in the invoice currency.

try {
    $result = $apiInstance->invoice($id, $invoice_date, $send_to_customer, $payment_type_id, $paid_amount);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderApi->invoice: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| ID of order to invoice. |
 **invoice_date** | **string**| The invoice date |
 **send_to_customer** | **bool**| Send invoice to customer | [optional]
 **payment_type_id** | **int**| Payment type to register prepayment of the invoice. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. The payment type must be related to an account with the same currency as the invoice. | [optional]
 **paid_amount** | **float**| Paid amount to register prepayment of the invoice, in invoice currency. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. This amount is in the invoice currency. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperInvoice**](../Model/ResponseWrapperInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **invoiceMultipleOrders**
> \Swagger\Client\Model\ResponseWrapperInvoice invoiceMultipleOrders($id, $invoice_date)

[BETA] Charges a single customer invoice from multiple orders. The orders must be to the same customer, currency, due date, receiver email and attn.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of Order IDs - to the same customer, separated by comma.
$invoice_date = "invoice_date_example"; // string | The invoice date

try {
    $result = $apiInstance->invoiceMultipleOrders($id, $invoice_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderApi->invoiceMultipleOrders: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of Order IDs - to the same customer, separated by comma. |
 **invoice_date** | **string**| The invoice date |

### Return type

[**\Swagger\Client\Model\ResponseWrapperInvoice**](../Model/ResponseWrapperInvoice.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **post**
> \Swagger\Client\Model\ResponseWrapperOrder post($body)

Create order.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Order(); // \Swagger\Client\Model\Order | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->post($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderApi->post: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Order**](../Model/Order.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperOrder**](../Model/ResponseWrapperOrder.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **put**
> \Swagger\Client\Model\ResponseWrapperOrder put($id, $body)

Update order.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\Order(); // \Swagger\Client\Model\Order | Partial object describing what should be updated

try {
    $result = $apiInstance->put($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderApi->put: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\Order**](../Model/Order.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperOrder**](../Model/ResponseWrapperOrder.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **search**
> \Swagger\Client\Model\ListResponseOrder search($order_date_from, $order_date_to, $id, $number, $customer_id, $is_closed, $is_subscription, $from, $count, $sorting, $fields)

Find orders corresponding with sent data.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_date_from = "order_date_from_example"; // string | From and including
$order_date_to = "order_date_to_example"; // string | To and excluding
$id = "id_example"; // string | List of IDs
$number = "number_example"; // string | Equals
$customer_id = "customer_id_example"; // string | List of IDs
$is_closed = true; // bool | Equals
$is_subscription = true; // bool | Equals
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->search($order_date_from, $order_date_to, $id, $number, $customer_id, $is_closed, $is_subscription, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderApi->search: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_date_from** | **string**| From and including |
 **order_date_to** | **string**| To and excluding |
 **id** | **string**| List of IDs | [optional]
 **number** | **string**| Equals | [optional]
 **customer_id** | **string**| List of IDs | [optional]
 **is_closed** | **bool**| Equals | [optional]
 **is_subscription** | **bool**| Equals | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseOrder**](../Model/ListResponseOrder.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **unApproveSubscriptionInvoice**
> unApproveSubscriptionInvoice($id)

Unapproves the order for subscription invoicing.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | ID of order to unapprove for subscription invoicing.

try {
    $apiInstance->unApproveSubscriptionInvoice($id);
} catch (Exception $e) {
    echo 'Exception when calling OrderApi->unApproveSubscriptionInvoice: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| ID of order to unapprove for subscription invoicing. |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


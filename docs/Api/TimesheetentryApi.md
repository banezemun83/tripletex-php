# Swagger\Client\TimesheetentryApi

All URIs are relative to *https://tripletex.no/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete**](TimesheetentryApi.md#delete) | **DELETE** /timesheet/entry/{id} | Delete timesheet entry by ID.
[**get**](TimesheetentryApi.md#get) | **GET** /timesheet/entry/{id} | Find timesheet entry by ID.
[**getRecentActivities**](TimesheetentryApi.md#getrecentactivities) | **GET** /timesheet/entry/&gt;recentActivities | Find recently used timesheet activities.
[**getRecentProjects**](TimesheetentryApi.md#getrecentprojects) | **GET** /timesheet/entry/&gt;recentProjects | Find projects with recent activities (timesheet entry registered).
[**getTotalHours**](TimesheetentryApi.md#gettotalhours) | **GET** /timesheet/entry/&gt;totalHours | Find total hours registered on an employee in a specific period.
[**post**](TimesheetentryApi.md#post) | **POST** /timesheet/entry | Add new timesheet entry. Only one entry per employee/date/activity/project combination is supported.
[**postList**](TimesheetentryApi.md#postlist) | **POST** /timesheet/entry/list | Add new timesheet entry. Multiple objects for several users can be sent in the same request.
[**put**](TimesheetentryApi.md#put) | **PUT** /timesheet/entry/{id} | Update timesheet entry by ID. Note: Timesheet entry object fields which are present but not set, or set to 0, will be nulled.
[**putList**](TimesheetentryApi.md#putlist) | **PUT** /timesheet/entry/list | Update timesheet entry. Multiple objects for different users can be sent in the same request.
[**search**](TimesheetentryApi.md#search) | **GET** /timesheet/entry | Find timesheet entry corresponding with sent data.

# **delete**
> delete($id, $version)

Delete timesheet entry by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$version = 56; // int | Number of current version

try {
    $apiInstance->delete($id, $version);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->delete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **version** | **int**| Number of current version | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **get**
> \Swagger\Client\Model\ResponseWrapperTimesheetEntry get($id, $fields)

Find timesheet entry by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
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
    echo 'Exception when calling TimesheetentryApi->get: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetEntry**](../Model/ResponseWrapperTimesheetEntry.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getRecentActivities**
> \Swagger\Client\Model\ListResponseActivity getRecentActivities($project_id, $employee_id, $from, $count, $sorting, $fields)

Find recently used timesheet activities.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 56; // int | ID of project to find activities for
$employee_id = 56; // int | ID of employee to find activities for. Defaults to ID of token owner.
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->getRecentActivities($project_id, $employee_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->getRecentActivities: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**| ID of project to find activities for |
 **employee_id** | **int**| ID of employee to find activities for. Defaults to ID of token owner. | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseActivity**](../Model/ListResponseActivity.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getRecentProjects**
> \Swagger\Client\Model\ListResponseProject getRecentProjects($employee_id, $from, $count, $sorting, $fields)

Find projects with recent activities (timesheet entry registered).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | ID of employee with recent project hours Defaults to ID of token owner.
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->getRecentProjects($employee_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->getRecentProjects: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| ID of employee with recent project hours Defaults to ID of token owner. | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProject**](../Model/ListResponseProject.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getTotalHours**
> \Swagger\Client\Model\ResponseWrapperDouble getTotalHours($employee_id, $start_date, $end_date, $fields)

Find total hours registered on an employee in a specific period.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | ID of employee to find hours for. Defaults to ID of token owner.
$start_date = "start_date_example"; // string | Format is yyyy-MM-dd (from and incl.). Defaults to today.
$end_date = "end_date_example"; // string | Format is yyyy-MM-dd (to and excl.). Defaults to tomorrow.
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->getTotalHours($employee_id, $start_date, $end_date, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->getTotalHours: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| ID of employee to find hours for. Defaults to ID of token owner. | [optional]
 **start_date** | **string**| Format is yyyy-MM-dd (from and incl.). Defaults to today. | [optional]
 **end_date** | **string**| Format is yyyy-MM-dd (to and excl.). Defaults to tomorrow. | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDouble**](../Model/ResponseWrapperDouble.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **post**
> \Swagger\Client\Model\ResponseWrapperTimesheetEntry post($body)

Add new timesheet entry. Only one entry per employee/date/activity/project combination is supported.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\TimesheetEntry(); // \Swagger\Client\Model\TimesheetEntry | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->post($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->post: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TimesheetEntry**](../Model/TimesheetEntry.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetEntry**](../Model/ResponseWrapperTimesheetEntry.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postList**
> \Swagger\Client\Model\ListResponseTimesheetEntry postList($body)

Add new timesheet entry. Multiple objects for several users can be sent in the same request.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\TimesheetEntry()); // \Swagger\Client\Model\TimesheetEntry[] | List of timesheet entry objects

try {
    $result = $apiInstance->postList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->postList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TimesheetEntry[]**](../Model/TimesheetEntry.md)| List of timesheet entry objects | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTimesheetEntry**](../Model/ListResponseTimesheetEntry.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **put**
> \Swagger\Client\Model\ResponseWrapperTimesheetEntry put($id, $body)

Update timesheet entry by ID. Note: Timesheet entry object fields which are present but not set, or set to 0, will be nulled.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\TimesheetEntry(); // \Swagger\Client\Model\TimesheetEntry | Partial object describing what should be updated

try {
    $result = $apiInstance->put($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->put: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\TimesheetEntry**](../Model/TimesheetEntry.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetEntry**](../Model/ResponseWrapperTimesheetEntry.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **putList**
> \Swagger\Client\Model\ListResponseTimesheetEntry putList($body)

Update timesheet entry. Multiple objects for different users can be sent in the same request.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\TimesheetEntry()); // \Swagger\Client\Model\TimesheetEntry[] | List of timesheet entry objects to update

try {
    $result = $apiInstance->putList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->putList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TimesheetEntry[]**](../Model/TimesheetEntry.md)| List of timesheet entry objects to update | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTimesheetEntry**](../Model/ListResponseTimesheetEntry.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **search**
> \Swagger\Client\Model\TimesheetEntrySearchResponse search($date_from, $date_to, $id, $employee_id, $project_id, $activity_id, $comment, $from, $count, $sorting, $fields)

Find timesheet entry corresponding with sent data.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetentryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$id = "id_example"; // string | List of IDs
$employee_id = "employee_id_example"; // string | List of IDs
$project_id = "project_id_example"; // string | List of IDs
$activity_id = "activity_id_example"; // string | List of IDs
$comment = "comment_example"; // string | Containing
$from = 56; // int | From index
$count = 56; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->search($date_from, $date_to, $id, $employee_id, $project_id, $activity_id, $comment, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetentryApi->search: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| From and including |
 **date_to** | **string**| To and excluding |
 **id** | **string**| List of IDs | [optional]
 **employee_id** | **string**| List of IDs | [optional]
 **project_id** | **string**| List of IDs | [optional]
 **activity_id** | **string**| List of IDs | [optional]
 **comment** | **string**| Containing | [optional]
 **from** | **int**| From index | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\TimesheetEntrySearchResponse**](../Model/TimesheetEntrySearchResponse.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)


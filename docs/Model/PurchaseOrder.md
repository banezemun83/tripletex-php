# PurchaseOrder

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**number** | **string** | Purchase order number | [optional] 
**supplier** | [**\Swagger\Client\Model\Supplier**](Supplier.md) |  | 
**delivery_date** | **string** |  | 
**order_lines** | [**\Swagger\Client\Model\OrderLine[]**](OrderLine.md) | Order lines tied to the purchase order | [optional] 
**project** | [**\Swagger\Client\Model\Project**](Project.md) |  | [optional] 
**department** | [**\Swagger\Client\Model\Department**](Department.md) |  | [optional] 
**delivery_address** | [**\Swagger\Client\Model\Address**](Address.md) |  | [optional] 
**creation_date** | **string** |  | [optional] 
**is_closed** | **bool** |  | [optional] [default to false]
**contact** | [**\Swagger\Client\Model\Employee**](Employee.md) |  | 
**status** | **string** |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


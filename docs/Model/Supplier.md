# Supplier

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**name** | **string** |  | 
**organization_number** | **string** |  | [optional] 
**supplier_number** | **int** |  | [optional] 
**customer_number** | **int** |  | [optional] 
**is_supplier** | **bool** |  | [optional] [default to false]
**is_customer** | **bool** | Determine if the supplier is also a customer | [optional] [default to false]
**is_inactive** | **bool** |  | [optional] [default to false]
**email** | **string** |  | [optional] 
**bank_accounts** | **string[]** | List of the bank account numbers for this supplier.  Norwegian bank account numbers only. | [optional] 
**invoice_email** | **string** |  | [optional] 
**overdue_notice_email** | **string** | The email address of the customer where the noticing emails are sent in case of an overdue | [optional] 
**phone_number** | **string** |  | [optional] 
**phone_number_mobile** | **string** |  | [optional] 
**description** | **string** |  | [optional] 
**is_private_individual** | **bool** |  | [optional] [default to false]
**show_products** | **bool** |  | [optional] [default to false]
**account_manager** | [**\Swagger\Client\Model\Employee**](Employee.md) |  | [optional] 
**postal_address** | [**\Swagger\Client\Model\Address**](Address.md) |  | [optional] 
**physical_address** | [**\Swagger\Client\Model\Address**](Address.md) |  | [optional] 
**delivery_address** | [**\Swagger\Client\Model\DeliveryAddress**](DeliveryAddress.md) |  | [optional] 
**category1** | [**\Swagger\Client\Model\CustomerCategory**](CustomerCategory.md) |  | [optional] 
**category2** | [**\Swagger\Client\Model\CustomerCategory**](CustomerCategory.md) |  | [optional] 
**category3** | [**\Swagger\Client\Model\CustomerCategory**](CustomerCategory.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


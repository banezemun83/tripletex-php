# ProjectOrderLine

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**product** | [**\Swagger\Client\Model\Product**](Product.md) |  | [optional] 
**inventory** | [**\Swagger\Client\Model\Inventory**](Inventory.md) |  | [optional] 
**description** | **string** |  | [optional] 
**count** | **double** |  | [optional] 
**unit_cost_currency** | **float** | Unit price purchase (cost) excluding VAT in the order&#x27;s currency | [optional] 
**unit_price_excluding_vat_currency** | **float** | Unit price of purchase excluding VAT in the order&#x27;s currency | [optional] 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) |  | [optional] 
**markup** | **double** | Markup given as a percentage (%) | [optional] 
**discount** | **double** | Discount given as a percentage (%) | [optional] 
**vat_type** | [**\Swagger\Client\Model\VatType**](VatType.md) |  | [optional] 
**amount_excluding_vat_currency** | **float** | Total amount on order line excluding VAT in the order&#x27;s currency | [optional] 
**amount_including_vat_currency** | **float** | Total amount on order line including VAT in the order&#x27;s currency | [optional] 
**project** | [**\Swagger\Client\Model\Project**](Project.md) |  | 
**date** | **string** |  | 
**is_chargeable** | **bool** |  | [optional] [default to false]
**is_budget** | **bool** |  | [optional] [default to false]
**invoice** | [**\Swagger\Client\Model\Invoice**](Invoice.md) |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


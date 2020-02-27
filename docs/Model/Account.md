# Account

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**number** | **int** |  | 
**name** | **string** |  | 
**description** | **string** |  | [optional] 
**type** | **string** |  | [optional] 
**vat_type** | [**\Swagger\Client\Model\VatType**](VatType.md) |  | [optional] 
**vat_locked** | **bool** | True if all entries on this account must have the vat type given by vatType. | [optional] [default to false]
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) |  | [optional] 
**is_closeable** | **bool** | True if it should be possible to close entries on this account and it is possible to filter on open entries. | [optional] [default to false]
**is_applicable_for_supplier_invoice** | **bool** | True if this account is applicable for supplier invoice registration. | [optional] [default to false]
**require_reconciliation** | **bool** | True if this account must be reconciled before the accounting period closure. | [optional] [default to false]
**is_inactive** | **bool** | Inactive accounts will not show up in UI lists. | [optional] [default to false]
**is_bank_account** | **bool** |  | [optional] [default to false]
**is_invoice_account** | **bool** |  | [optional] [default to false]
**bank_account_number** | **string** |  | [optional] 
**bank_account_country** | [**\Swagger\Client\Model\Country**](Country.md) |  | [optional] 
**bank_name** | **string** |  | [optional] 
**bank_account_iban** | **string** |  | [optional] 
**bank_account_swift** | **string** |  | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


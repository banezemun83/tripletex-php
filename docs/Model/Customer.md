# Customer

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
**is_supplier** | **bool** | Defines if the customer is also a supplier. | [optional] [default to false]
**is_customer** | **bool** |  | [optional] [default to false]
**is_inactive** | **bool** |  | [optional] [default to false]
**account_manager** | [**\Swagger\Client\Model\Employee**](Employee.md) |  | [optional] 
**email** | **string** |  | [optional] 
**invoice_email** | **string** |  | [optional] 
**overdue_notice_email** | **string** | The email address of the customer where the noticing emails are sent in case of an overdue | [optional] 
**bank_accounts** | **string[]** | List of the bank account numbers for this customer. Norwegian bank account numbers only. | [optional] 
**phone_number** | **string** |  | [optional] 
**phone_number_mobile** | **string** |  | [optional] 
**description** | **string** |  | [optional] 
**is_private_individual** | **bool** |  | [optional] [default to false]
**single_customer_invoice** | **bool** | Enables various orders on one customer invoice. | [optional] [default to false]
**invoice_send_method** | **string** | Define the invoicing method for the customer.&lt;br&gt;EMAIL: Send invoices as email.&lt;br&gt;EHF: Send invoices as EHF.&lt;br&gt;EFAKTURA: Send invoices as EFAKTURA.&lt;br&gt;VIPPS: Send invoices through VIPPS.&lt;br&gt;PAPER: Send invoices as paper invoice.&lt;br&gt; | [optional] 
**email_attachment_type** | **string** | Define the invoice attachment type for emailing to the customer.&lt;br&gt;LINK: Send invoice as link in email.&lt;br&gt;ATTACHMENT: Send invoice as attachment in email.&lt;br&gt; | [optional] 
**postal_address** | [**\Swagger\Client\Model\Address**](Address.md) |  | [optional] 
**physical_address** | [**\Swagger\Client\Model\Address**](Address.md) |  | [optional] 
**delivery_address** | [**\Swagger\Client\Model\DeliveryAddress**](DeliveryAddress.md) |  | [optional] 
**category1** | [**\Swagger\Client\Model\CustomerCategory**](CustomerCategory.md) |  | [optional] 
**category2** | [**\Swagger\Client\Model\CustomerCategory**](CustomerCategory.md) |  | [optional] 
**category3** | [**\Swagger\Client\Model\CustomerCategory**](CustomerCategory.md) |  | [optional] 
**invoices_due_in** | **int** | Number of days/months in which invoices created from this customer is due | [optional] 
**invoices_due_in_type** | **string** | Set the time unit of invoicesDueIn. The special case RECURRING_DAY_OF_MONTH enables the due date to be fixed to a specific day of the month, in this case the fixed due date will automatically be set as standard on all invoices created from this customer. Note that when RECURRING_DAY_OF_MONTH is set, the due date will be set to the last day of month if \&quot;31\&quot; is set in invoicesDueIn. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


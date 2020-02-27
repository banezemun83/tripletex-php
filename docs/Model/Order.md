# Order

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**customer** | [**\Swagger\Client\Model\Customer**](Customer.md) |  | 
**contact** | [**\Swagger\Client\Model\Contact**](Contact.md) |  | [optional] 
**attn** | [**\Swagger\Client\Model\Contact**](Contact.md) |  | [optional] 
**receiver_email** | **string** |  | [optional] 
**overdue_notice_email** | **string** |  | [optional] 
**number** | **string** |  | [optional] 
**reference** | **string** |  | [optional] 
**our_contact** | [**\Swagger\Client\Model\Contact**](Contact.md) |  | [optional] 
**our_contact_employee** | [**\Swagger\Client\Model\Employee**](Employee.md) |  | [optional] 
**department** | [**\Swagger\Client\Model\Department**](Department.md) |  | [optional] 
**order_date** | **string** |  | 
**project** | [**\Swagger\Client\Model\Project**](Project.md) |  | [optional] 
**invoice_comment** | **string** |  | [optional] 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) |  | [optional] 
**invoices_due_in** | **int** | Number of days/months in which invoices created from this order is due | [optional] 
**invoices_due_in_type** | **string** | Set the time unit of invoicesDueIn. The special case RECURRING_DAY_OF_MONTH enables the due date to be fixed to a specific day of the month, in this case the fixed due date will automatically be set as standard on all invoices created from this order. Note that when RECURRING_DAY_OF_MONTH is set, the due date will be set to the last day of month if \&quot;31\&quot; is set in invoicesDueIn. | [optional] 
**is_show_open_posts_on_invoices** | **bool** | Show account statement - open posts on invoices created from this order | [optional] [default to false]
**is_closed** | **bool** | Denotes if this order is closed. A closed order can no longer be invoiced unless it is opened again. | [optional] [default to false]
**delivery_date** | **string** |  | 
**delivery_address** | [**\Swagger\Client\Model\DeliveryAddress**](DeliveryAddress.md) |  | [optional] 
**delivery_comment** | **string** |  | [optional] 
**is_prioritize_amounts_including_vat** | **bool** |  | [optional] [default to false]
**order_line_sorting** | **string** |  | [optional] 
**order_lines** | [**\Swagger\Client\Model\OrderLine[]**](OrderLine.md) | Order lines tied to the order | [optional] 
**is_subscription** | **bool** | If true, the order is a subscription, which enables periodical invoicing of order lines. First, create an order with isSubscription&#x3D;true, then approve it for subscription invoicing with the :approveSubscriptionInvoice method. | [optional] [default to false]
**subscription_duration** | **int** | Number of months/years the subscription shall run | [optional] 
**subscription_duration_type** | **string** | The time unit of subscriptionDuration | [optional] 
**subscription_periods_on_invoice** | **int** | Number of periods on each invoice | [optional] 
**subscription_periods_on_invoice_type** | **string** | The time unit of subscriptionPeriodsOnInvoice | [optional] 
**subscription_invoicing_time_in_advance_or_arrears** | **string** | Invoicing in advance/in arrears | [optional] 
**subscription_invoicing_time** | **int** | Number of days/months invoicing in advance/in arrears | [optional] 
**subscription_invoicing_time_type** | **string** | The time unit of subscriptionInvoicingTime | [optional] 
**is_subscription_auto_invoicing** | **bool** | Automatic invoicing. Starts when the subscription is approved | [optional] [default to false]

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


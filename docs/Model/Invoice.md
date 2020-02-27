# Invoice

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**invoice_number** | **int** | If value is set to 0, the invoice number will be generated. | [optional] 
**invoice_date** | **string** |  | 
**customer** | [**\Swagger\Client\Model\Customer**](Customer.md) |  | [optional] 
**invoice_due_date** | **string** |  | 
**kid** | **string** | KID - Kundeidentifikasjonsnummer. | [optional] 
**comment** | **string** |  | [optional] 
**orders** | [**\Swagger\Client\Model\Order[]**](Order.md) | Related orders. Only one order per invoice is supported at the moment. | 
**project_invoice_details** | [**\Swagger\Client\Model\ProjectInvoiceDetails[]**](ProjectInvoiceDetails.md) | ProjectInvoiceDetails contains additional information about the invoice, in particular invoices for projects. It contains information about the charged project, the fee amount, extra percent and amount, extra costs, travel expenses, invoice and project comments, akonto amount and values determining if extra costs, akonto and hours should be included. ProjectInvoiceDetails is an object which represents the relation between an invoice and a Project, Orderline and OrderOut object. | [optional] 
**voucher** | [**\Swagger\Client\Model\Voucher**](Voucher.md) |  | [optional] 
**delivery_date** | **string** | The delivery date. | [optional] 
**amount** | **float** | In the company’s currency, typically NOK. | [optional] 
**amount_currency** | **float** | In the specified currency. | [optional] 
**amount_excluding_vat** | **float** | Amount excluding VAT (NOK). | [optional] 
**amount_excluding_vat_currency** | **float** | Amount excluding VAT in the specified currency. | [optional] 
**amount_roundoff** | **float** | Amount of round off to nearest integer. | [optional] 
**amount_roundoff_currency** | **float** | Amount of round off to nearest integer in the specified currency. | [optional] 
**amount_outstanding** | **float** | The amount outstanding based on the history collection, excluding reminders and any existing remits, in the invoice currency. | [optional] 
**amount_outstanding_total** | **float** | The amount outstanding based on the history collection and including the last reminder and any existing remits. This is the total invoice balance including reminders and remittances, in the invoice currency. | [optional] 
**sum_remits** | **float** | The sum of all open remittances of the invoice. Remittances are reimbursement payments back to the customer and are therefore relevant to the bookkeeping of the invoice in the accounts. | [optional] 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) |  | [optional] 
**is_credit_note** | **bool** |  | [optional] [default to false]
**is_charged** | **bool** |  | [optional] [default to false]
**is_approved** | **bool** |  | [optional] [default to false]
**postings** | [**\Swagger\Client\Model\Posting[]**](Posting.md) | The invoice postings, which includes a posting for the invoice with a positive amount, and one or more posting for the payments with negative amounts. | [optional] 
**reminders** | [**\Swagger\Client\Model\Reminder[]**](Reminder.md) | Invoice debt collection and reminders. | [optional] 
**ehf_send_status** | **string** | [Deprecated] EHF (Peppol) send status. This only shows status for historic EHFs. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)


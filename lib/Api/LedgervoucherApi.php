<?php
/**
 * LedgervoucherApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Tripletex API
 *
 * The Tripletex API is a **RESTful API**, which does not implement PATCH, but uses a PUT with optional fields.  **Actions** or commands are represented in our RESTful path with a prefixed `:`. Example: `/v2/hours/123/:approve`.  **Summaries** or aggregated results are represented in our RESTful path with a prefixed <code>&gt;</code>. Example: <code>/v2/hours/&gt;thisWeeksBillables</code>.  **\"requestID\"** is a key found in all responses in the header with the name `x-tlx-request-id`. For validation and error responses it is also in the response body. If additional log information is absolutely necessary, our support division can locate the key value.  **Download** the [swagger.json](/v2/swagger.json) file [OpenAPI Specification](https://github.com/OAI/OpenAPI-Specification) to [generate code](https://github.com/swagger-api/swagger-codegen). This document was generated from the Swagger JSON file.  **version:** This is a versioning number found on all DB records. If included, it will prevent your PUT/POST from overriding any updates to the record since your GET.  **Date & DateTime** follows the **ISO 8601** standard. Date: `YYYY-MM-DD`. DateTime: `YYYY-MM-DDThh:mm:ssZ`  **Sorting** is done by specifying a comma separated list, where a `-` prefix denotes descending. You can sort by sub object with the following format: `project.name, -date`.  **Searching:** is done by entering values in the optional fields for each API call. The values fall into the following categories: range, in, exact and like.  **Missing fields or even no response data** can occur because result objects and fields are filtered on authorization.  **See [FAQ](https://tripletex.no/execute/docViewer?articleId=906&language=0) for more additional information.**   ## Authentication: - **Tokens:** The Tripletex API uses 3 different tokens - **consumerToken**, **employeeToken** and **sessionToken**.  - **consumerToken** is a token provided to the consumer by Tripletex after the API 2.0 registration is completed.  - **employeeToken** is a token created by an administrator in your Tripletex account via the user settings and the tab \"API access\". Each employee token must be given a set of entitlements. [Read more here.](https://tripletex.no/execute/docViewer?articleId=853&language=0)  - **sessionToken** is the token from `/token/session/:create` which requires a consumerToken and an employeeToken created with the same consumer token, but not an authentication header. See how to create a sessionToken [here](https://tripletex.no/execute/docViewer?articleId=855&language=0). - The session token is used as the password in \"Basic Authentication Header\" for API calls.  - Use blank or `0` as username for accessing the account with regular employee token, or if a company owned employee token accesses <code>/company/&gt;withLoginAccess</code> or <code>/token/session/&gt;whoAmI</code>.  - For company owned employee tokens (accounting offices) the ID from <code>/company/&gt;withLoginAccess</code> can be used as username for accessing client accounts.  - If you need to create the header yourself use <code>Authorization: Basic &lt;base64encode('0:sessionToken')&gt;</code>.   ## Tags: - **[BETA]** This is a beta endpoint and can be subject to change. - **[DEPRECATED]** Deprecated means that we intend to remove/change this feature or capability in a future \"major\" API release. We therefore discourage all use of this feature/capability.  ## Fields: Use the `fields` parameter to specify which fields should be returned. This also supports fields from sub elements. Example values: - `project,activity,hours`  returns `{project:..., activity:...., hours:...}`. - just `project` returns `\"project\" : { \"id\": 12345, \"url\": \"tripletex.no/v2/projects/12345\"  }`. - `project(*)` returns `\"project\" : { \"id\": 12345 \"name\":\"ProjectName\" \"number.....startDate\": \"2013-01-07\" }`. - `project(name)` returns `\"project\" : { \"name\":\"ProjectName\" }`. - All elements and some subElements :  `*,activity(name),employee(*)`.  ## Changes: To get the changes for a resource, `changes` have to be explicitly specified as part of the `fields` parameter, e.g. `*,changes`. There are currently two types of change available:  - `CREATE` for when the resource was created - `UPDATE` for when the resource was updated  NOTE: For objects created prior to October 24th 2018 the list may be incomplete, but will always contain the CREATE and the last change (if the object has been changed after creation).  ## Rate limiting in each response header: Rate limiting is performed on the API calls for an employee for each API consumer. Status regarding the rate limit is returned as headers: - `X-Rate-Limit-Limit` - The number of allowed requests in the current period. - `X-Rate-Limit-Remaining` - The number of remaining requests. - `X-Rate-Limit-Reset` - The number of seconds left in the current period.  Once the rate limit is hit, all requests will return HTTP status code `429` for the remainder of the current period.   ## Response envelope: ```json {   \"fullResultSize\": ###,   \"from\": ###, // Paging starting from   \"count\": ###, // Paging count   \"versionDigest\": \"Hash of full result\",   \"values\": [...list of objects...] } {   \"value\": {...single object...} } ```   ## WebHook envelope: ```json {   \"subscriptionId\": ###,   \"event\": \"object.verb\", // As listed from /v2/event/   \"id\": ###, // Object id   \"value\": {... single object, null if object.deleted ...} } ```    ## Error/warning envelope: ```json {   \"status\": ###, // HTTP status code   \"code\": #####, // internal status code of event   \"message\": \"Basic feedback message in your language\",   \"link\": \"Link to doc\",   \"developerMessage\": \"More technical message\",   \"validationMessages\": [ // Will be null if Error     {       \"field\": \"Name of field\",       \"message\": \"Validation failure information\"     }   ],   \"requestId\": \"UUID used in any logs\" } ```   ## Status codes / Error codes: - **200 OK** - **201 Created** - From POSTs that create something new. - **204 No Content** - When there is no answer, ex: \"/:anAction\" or DELETE. - **400 Bad request** -   - **4000** Bad Request Exception   - **11000** Illegal Filter Exception   - **12000** Path Param Exception   - **24000**   Cryptography Exception - **401 Unauthorized** - When authentication is required and has failed or has not yet been provided   -  **3000** Authentication Exception - **403 Forbidden** - When AuthorisationManager says no.   -  **9000** Security Exception - **404 Not Found** - For content/IDs that does not exist.   -  **6000** Not Found Exception - **409 Conflict** - Such as an edit conflict between multiple simultaneous updates   -  **7000** Object Exists Exception   -  **8000** Revision Exception   - **10000** Locked Exception   - **14000** Duplicate entry - **422 Bad Request** - For Required fields or things like malformed payload.   - **15000** Value Validation Exception   - **16000** Mapping Exception   - **17000** Sorting Exception   - **18000** Validation Exception   - **21000** Param Exception   - **22000** Invalid JSON Exception   - **23000**   Result Set Too Large Exception - **429 Too Many Requests** - Request rate limit hit - **500 Internal Error** -  Unexpected condition was encountered and no more specific message is suitable   -  **1000** Exception
 *
 * OpenAPI spec version: 2.39.4-oas3
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.14
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * LedgervoucherApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class LedgervoucherApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation delete
     *
     * [BETA] Delete voucher by ID.
     *
     * @param  int $id Element ID (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function delete($id)
    {
        $this->deleteWithHttpInfo($id);
    }

    /**
     * Operation deleteWithHttpInfo
     *
     * [BETA] Delete voucher by ID.
     *
     * @param  int $id Element ID (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteWithHttpInfo($id)
    {
        $returnType = '';
        $request = $this->deleteRequest($id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation deleteAsync
     *
     * [BETA] Delete voucher by ID.
     *
     * @param  int $id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAsync($id)
    {
        return $this->deleteAsyncWithHttpInfo($id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteAsyncWithHttpInfo
     *
     * [BETA] Delete voucher by ID.
     *
     * @param  int $id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAsyncWithHttpInfo($id)
    {
        $returnType = '';
        $request = $this->deleteRequest($id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'delete'
     *
     * @param  int $id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteRequest($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling delete'
            );
        }

        $resourcePath = '/ledger/voucher/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteAttachment
     *
     * [BETA] Delete attachment.
     *
     * @param  int $id ID of voucher containing the attachment to delete. (required)
     * @param  int $version Version of voucher containing the attachment to delete. (optional)
     * @param  bool $send_to_inbox Should the attachment be sent to inbox rather than deleted? (optional)
     * @param  bool $split If sendToInbox is true, should the attachment be split into one voucher per page? (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteAttachment($id, $version = null, $send_to_inbox = null, $split = null)
    {
        $this->deleteAttachmentWithHttpInfo($id, $version, $send_to_inbox, $split);
    }

    /**
     * Operation deleteAttachmentWithHttpInfo
     *
     * [BETA] Delete attachment.
     *
     * @param  int $id ID of voucher containing the attachment to delete. (required)
     * @param  int $version Version of voucher containing the attachment to delete. (optional)
     * @param  bool $send_to_inbox Should the attachment be sent to inbox rather than deleted? (optional)
     * @param  bool $split If sendToInbox is true, should the attachment be split into one voucher per page? (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteAttachmentWithHttpInfo($id, $version = null, $send_to_inbox = null, $split = null)
    {
        $returnType = '';
        $request = $this->deleteAttachmentRequest($id, $version, $send_to_inbox, $split);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation deleteAttachmentAsync
     *
     * [BETA] Delete attachment.
     *
     * @param  int $id ID of voucher containing the attachment to delete. (required)
     * @param  int $version Version of voucher containing the attachment to delete. (optional)
     * @param  bool $send_to_inbox Should the attachment be sent to inbox rather than deleted? (optional)
     * @param  bool $split If sendToInbox is true, should the attachment be split into one voucher per page? (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAttachmentAsync($id, $version = null, $send_to_inbox = null, $split = null)
    {
        return $this->deleteAttachmentAsyncWithHttpInfo($id, $version, $send_to_inbox, $split)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteAttachmentAsyncWithHttpInfo
     *
     * [BETA] Delete attachment.
     *
     * @param  int $id ID of voucher containing the attachment to delete. (required)
     * @param  int $version Version of voucher containing the attachment to delete. (optional)
     * @param  bool $send_to_inbox Should the attachment be sent to inbox rather than deleted? (optional)
     * @param  bool $split If sendToInbox is true, should the attachment be split into one voucher per page? (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAttachmentAsyncWithHttpInfo($id, $version = null, $send_to_inbox = null, $split = null)
    {
        $returnType = '';
        $request = $this->deleteAttachmentRequest($id, $version, $send_to_inbox, $split);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'deleteAttachment'
     *
     * @param  int $id ID of voucher containing the attachment to delete. (required)
     * @param  int $version Version of voucher containing the attachment to delete. (optional)
     * @param  bool $send_to_inbox Should the attachment be sent to inbox rather than deleted? (optional)
     * @param  bool $split If sendToInbox is true, should the attachment be split into one voucher per page? (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteAttachmentRequest($id, $version = null, $send_to_inbox = null, $split = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling deleteAttachment'
            );
        }

        $resourcePath = '/ledger/voucher/{id}/attachment';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($version !== null) {
            $queryParams['version'] = ObjectSerializer::toQueryValue($version);
        }
        // query params
        if ($send_to_inbox !== null) {
            $queryParams['sendToInbox'] = ObjectSerializer::toQueryValue($send_to_inbox);
        }
        // query params
        if ($split !== null) {
            $queryParams['split'] = ObjectSerializer::toQueryValue($split);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation downloadPdf
     *
     * Get PDF representation of voucher by ID.
     *
     * @param  int $voucher_id Voucher ID from which PDF is downloaded. (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function downloadPdf($voucher_id)
    {
        list($response) = $this->downloadPdfWithHttpInfo($voucher_id);
        return $response;
    }

    /**
     * Operation downloadPdfWithHttpInfo
     *
     * Get PDF representation of voucher by ID.
     *
     * @param  int $voucher_id Voucher ID from which PDF is downloaded. (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function downloadPdfWithHttpInfo($voucher_id)
    {
        $returnType = 'string';
        $request = $this->downloadPdfRequest($voucher_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation downloadPdfAsync
     *
     * Get PDF representation of voucher by ID.
     *
     * @param  int $voucher_id Voucher ID from which PDF is downloaded. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function downloadPdfAsync($voucher_id)
    {
        return $this->downloadPdfAsyncWithHttpInfo($voucher_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation downloadPdfAsyncWithHttpInfo
     *
     * Get PDF representation of voucher by ID.
     *
     * @param  int $voucher_id Voucher ID from which PDF is downloaded. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function downloadPdfAsyncWithHttpInfo($voucher_id)
    {
        $returnType = 'string';
        $request = $this->downloadPdfRequest($voucher_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'downloadPdf'
     *
     * @param  int $voucher_id Voucher ID from which PDF is downloaded. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function downloadPdfRequest($voucher_id)
    {
        // verify the required parameter 'voucher_id' is set
        if ($voucher_id === null || (is_array($voucher_id) && count($voucher_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $voucher_id when calling downloadPdf'
            );
        }

        $resourcePath = '/ledger/voucher/{voucherId}/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($voucher_id !== null) {
            $resourcePath = str_replace(
                '{' . 'voucherId' . '}',
                ObjectSerializer::toPathValue($voucher_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/octet-stream']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/octet-stream'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation get
     *
     * Get voucher by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucher
     */
    public function get($id, $fields = null)
    {
        list($response) = $this->getWithHttpInfo($id, $fields);
        return $response;
    }

    /**
     * Operation getWithHttpInfo
     *
     * Get voucher by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function getWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->getRequest($id, $fields);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ResponseWrapperVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAsync
     *
     * Get voucher by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAsync($id, $fields = null)
    {
        return $this->getAsyncWithHttpInfo($id, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAsyncWithHttpInfo
     *
     * Get voucher by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAsyncWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->getRequest($id, $fields);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'get'
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getRequest($id, $fields = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling get'
            );
        }

        $resourcePath = '/ledger/voucher/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($fields !== null) {
            $queryParams['fields'] = ObjectSerializer::toQueryValue($fields);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation importDocument
     *
     * [BETA] Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.
     *
     * @param  string $file file (optional)
     * @param  string $description description (optional)
     * @param  bool $split If the document consists of several pages, should the document be split into one voucher per page? (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseVoucher
     */
    public function importDocument($file = null, $description = null, $split = null)
    {
        list($response) = $this->importDocumentWithHttpInfo($file, $description, $split);
        return $response;
    }

    /**
     * Operation importDocumentWithHttpInfo
     *
     * [BETA] Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.
     *
     * @param  string $file (optional)
     * @param  string $description (optional)
     * @param  bool $split If the document consists of several pages, should the document be split into one voucher per page? (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function importDocumentWithHttpInfo($file = null, $description = null, $split = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->importDocumentRequest($file, $description, $split);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ListResponseVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation importDocumentAsync
     *
     * [BETA] Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.
     *
     * @param  string $file (optional)
     * @param  string $description (optional)
     * @param  bool $split If the document consists of several pages, should the document be split into one voucher per page? (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importDocumentAsync($file = null, $description = null, $split = null)
    {
        return $this->importDocumentAsyncWithHttpInfo($file, $description, $split)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation importDocumentAsyncWithHttpInfo
     *
     * [BETA] Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.
     *
     * @param  string $file (optional)
     * @param  string $description (optional)
     * @param  bool $split If the document consists of several pages, should the document be split into one voucher per page? (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importDocumentAsyncWithHttpInfo($file = null, $description = null, $split = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->importDocumentRequest($file, $description, $split);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'importDocument'
     *
     * @param  string $file (optional)
     * @param  string $description (optional)
     * @param  bool $split If the document consists of several pages, should the document be split into one voucher per page? (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function importDocumentRequest($file = null, $description = null, $split = null)
    {

        $resourcePath = '/ledger/voucher/importDocument';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($split !== null) {
            $queryParams['split'] = ObjectSerializer::toQueryValue($split);
        }


        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($file), 'rb');
        }
        // form params
        if ($description !== null) {
            $formParams['description'] = ObjectSerializer::toFormValue($description);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation importGbat10
     *
     * Import GBAT10. Send as multipart form.
     *
     * @param  bool $generate_vat_postings generate_vat_postings (optional)
     * @param  string $file file (optional)
     * @param  string $encoding encoding (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function importGbat10($generate_vat_postings = null, $file = null, $encoding = null)
    {
        $this->importGbat10WithHttpInfo($generate_vat_postings, $file, $encoding);
    }

    /**
     * Operation importGbat10WithHttpInfo
     *
     * Import GBAT10. Send as multipart form.
     *
     * @param  bool $generate_vat_postings (optional)
     * @param  string $file (optional)
     * @param  string $encoding (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function importGbat10WithHttpInfo($generate_vat_postings = null, $file = null, $encoding = null)
    {
        $returnType = '';
        $request = $this->importGbat10Request($generate_vat_postings, $file, $encoding);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation importGbat10Async
     *
     * Import GBAT10. Send as multipart form.
     *
     * @param  bool $generate_vat_postings (optional)
     * @param  string $file (optional)
     * @param  string $encoding (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importGbat10Async($generate_vat_postings = null, $file = null, $encoding = null)
    {
        return $this->importGbat10AsyncWithHttpInfo($generate_vat_postings, $file, $encoding)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation importGbat10AsyncWithHttpInfo
     *
     * Import GBAT10. Send as multipart form.
     *
     * @param  bool $generate_vat_postings (optional)
     * @param  string $file (optional)
     * @param  string $encoding (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function importGbat10AsyncWithHttpInfo($generate_vat_postings = null, $file = null, $encoding = null)
    {
        $returnType = '';
        $request = $this->importGbat10Request($generate_vat_postings, $file, $encoding);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'importGbat10'
     *
     * @param  bool $generate_vat_postings (optional)
     * @param  string $file (optional)
     * @param  string $encoding (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function importGbat10Request($generate_vat_postings = null, $file = null, $encoding = null)
    {

        $resourcePath = '/ledger/voucher/importGbat10';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($generate_vat_postings !== null) {
            $formParams['generateVatPostings'] = ObjectSerializer::toFormValue($generate_vat_postings);
        }
        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($file), 'rb');
        }
        // form params
        if ($encoding !== null) {
            $formParams['encoding'] = ObjectSerializer::toFormValue($encoding);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation nonPosted
     *
     * [BETA] Find non-posted vouchers.
     *
     * @param  bool $include_non_approved Include non-approved vouchers in the result. (required)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $changed_since Only return elements that have changed since this date and time (optional)
     * @param  int $from From index (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseVoucher
     */
    public function nonPosted($include_non_approved, $date_from = null, $date_to = null, $changed_since = null, $from = null, $count = null, $sorting = null, $fields = null)
    {
        list($response) = $this->nonPostedWithHttpInfo($include_non_approved, $date_from, $date_to, $changed_since, $from, $count, $sorting, $fields);
        return $response;
    }

    /**
     * Operation nonPostedWithHttpInfo
     *
     * [BETA] Find non-posted vouchers.
     *
     * @param  bool $include_non_approved Include non-approved vouchers in the result. (required)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $changed_since Only return elements that have changed since this date and time (optional)
     * @param  int $from From index (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function nonPostedWithHttpInfo($include_non_approved, $date_from = null, $date_to = null, $changed_since = null, $from = null, $count = null, $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->nonPostedRequest($include_non_approved, $date_from, $date_to, $changed_since, $from, $count, $sorting, $fields);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ListResponseVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation nonPostedAsync
     *
     * [BETA] Find non-posted vouchers.
     *
     * @param  bool $include_non_approved Include non-approved vouchers in the result. (required)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $changed_since Only return elements that have changed since this date and time (optional)
     * @param  int $from From index (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function nonPostedAsync($include_non_approved, $date_from = null, $date_to = null, $changed_since = null, $from = null, $count = null, $sorting = null, $fields = null)
    {
        return $this->nonPostedAsyncWithHttpInfo($include_non_approved, $date_from, $date_to, $changed_since, $from, $count, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation nonPostedAsyncWithHttpInfo
     *
     * [BETA] Find non-posted vouchers.
     *
     * @param  bool $include_non_approved Include non-approved vouchers in the result. (required)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $changed_since Only return elements that have changed since this date and time (optional)
     * @param  int $from From index (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function nonPostedAsyncWithHttpInfo($include_non_approved, $date_from = null, $date_to = null, $changed_since = null, $from = null, $count = null, $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->nonPostedRequest($include_non_approved, $date_from, $date_to, $changed_since, $from, $count, $sorting, $fields);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'nonPosted'
     *
     * @param  bool $include_non_approved Include non-approved vouchers in the result. (required)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $changed_since Only return elements that have changed since this date and time (optional)
     * @param  int $from From index (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function nonPostedRequest($include_non_approved, $date_from = null, $date_to = null, $changed_since = null, $from = null, $count = null, $sorting = null, $fields = null)
    {
        // verify the required parameter 'include_non_approved' is set
        if ($include_non_approved === null || (is_array($include_non_approved) && count($include_non_approved) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $include_non_approved when calling nonPosted'
            );
        }

        $resourcePath = '/ledger/voucher/>nonPosted';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($date_from !== null) {
            $queryParams['dateFrom'] = ObjectSerializer::toQueryValue($date_from);
        }
        // query params
        if ($date_to !== null) {
            $queryParams['dateTo'] = ObjectSerializer::toQueryValue($date_to);
        }
        // query params
        if ($include_non_approved !== null) {
            $queryParams['includeNonApproved'] = ObjectSerializer::toQueryValue($include_non_approved);
        }
        // query params
        if ($changed_since !== null) {
            $queryParams['changedSince'] = ObjectSerializer::toQueryValue($changed_since);
        }
        // query params
        if ($from !== null) {
            $queryParams['from'] = ObjectSerializer::toQueryValue($from);
        }
        // query params
        if ($count !== null) {
            $queryParams['count'] = ObjectSerializer::toQueryValue($count);
        }
        // query params
        if ($sorting !== null) {
            $queryParams['sorting'] = ObjectSerializer::toQueryValue($sorting);
        }
        // query params
        if ($fields !== null) {
            $queryParams['fields'] = ObjectSerializer::toQueryValue($fields);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation options
     *
     * [BETA] Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucherOptions
     */
    public function options($id, $fields = null)
    {
        list($response) = $this->optionsWithHttpInfo($id, $fields);
        return $response;
    }

    /**
     * Operation optionsWithHttpInfo
     *
     * [BETA] Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucherOptions, HTTP status code, HTTP response headers (array of strings)
     */
    public function optionsWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucherOptions';
        $request = $this->optionsRequest($id, $fields);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ResponseWrapperVoucherOptions',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation optionsAsync
     *
     * [BETA] Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function optionsAsync($id, $fields = null)
    {
        return $this->optionsAsyncWithHttpInfo($id, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation optionsAsyncWithHttpInfo
     *
     * [BETA] Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function optionsAsyncWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucherOptions';
        $request = $this->optionsRequest($id, $fields);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'options'
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function optionsRequest($id, $fields = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling options'
            );
        }

        $resourcePath = '/ledger/voucher/{id}/options';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($fields !== null) {
            $queryParams['fields'] = ObjectSerializer::toQueryValue($fields);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation post
     *
     * Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used
     *
     * @param  \Swagger\Client\Model\Voucher $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucher
     */
    public function post($body = null, $send_to_ledger = null)
    {
        list($response) = $this->postWithHttpInfo($body, $send_to_ledger);
        return $response;
    }

    /**
     * Operation postWithHttpInfo
     *
     * Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used
     *
     * @param  \Swagger\Client\Model\Voucher $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function postWithHttpInfo($body = null, $send_to_ledger = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->postRequest($body, $send_to_ledger);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ResponseWrapperVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation postAsync
     *
     * Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used
     *
     * @param  \Swagger\Client\Model\Voucher $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postAsync($body = null, $send_to_ledger = null)
    {
        return $this->postAsyncWithHttpInfo($body, $send_to_ledger)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postAsyncWithHttpInfo
     *
     * Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used
     *
     * @param  \Swagger\Client\Model\Voucher $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postAsyncWithHttpInfo($body = null, $send_to_ledger = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->postRequest($body, $send_to_ledger);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'post'
     *
     * @param  \Swagger\Client\Model\Voucher $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function postRequest($body = null, $send_to_ledger = null)
    {

        $resourcePath = '/ledger/voucher';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($send_to_ledger !== null) {
            $queryParams['sendToLedger'] = ObjectSerializer::toQueryValue($send_to_ledger);
        }


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                ['application/json; charset=utf-8']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation put
     *
     * [BETA] Update voucher. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\Voucher $body Partial object describing what should be updated (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucher
     */
    public function put($id, $body = null, $send_to_ledger = null)
    {
        list($response) = $this->putWithHttpInfo($id, $body, $send_to_ledger);
        return $response;
    }

    /**
     * Operation putWithHttpInfo
     *
     * [BETA] Update voucher. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\Voucher $body Partial object describing what should be updated (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function putWithHttpInfo($id, $body = null, $send_to_ledger = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->putRequest($id, $body, $send_to_ledger);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ResponseWrapperVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation putAsync
     *
     * [BETA] Update voucher. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\Voucher $body Partial object describing what should be updated (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putAsync($id, $body = null, $send_to_ledger = null)
    {
        return $this->putAsyncWithHttpInfo($id, $body, $send_to_ledger)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation putAsyncWithHttpInfo
     *
     * [BETA] Update voucher. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\Voucher $body Partial object describing what should be updated (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putAsyncWithHttpInfo($id, $body = null, $send_to_ledger = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->putRequest($id, $body, $send_to_ledger);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'put'
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\Voucher $body Partial object describing what should be updated (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function putRequest($id, $body = null, $send_to_ledger = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling put'
            );
        }

        $resourcePath = '/ledger/voucher/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($send_to_ledger !== null) {
            $queryParams['sendToLedger'] = ObjectSerializer::toQueryValue($send_to_ledger);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                ['application/json; charset=utf-8']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation putList
     *
     * [BETA] Update multiple vouchers. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  \Swagger\Client\Model\Voucher[] $body JSON representing updates to object. Should have ID and version set. (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseVoucher
     */
    public function putList($body = null, $send_to_ledger = null)
    {
        list($response) = $this->putListWithHttpInfo($body, $send_to_ledger);
        return $response;
    }

    /**
     * Operation putListWithHttpInfo
     *
     * [BETA] Update multiple vouchers. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  \Swagger\Client\Model\Voucher[] $body JSON representing updates to object. Should have ID and version set. (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function putListWithHttpInfo($body = null, $send_to_ledger = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->putListRequest($body, $send_to_ledger);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ListResponseVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation putListAsync
     *
     * [BETA] Update multiple vouchers. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  \Swagger\Client\Model\Voucher[] $body JSON representing updates to object. Should have ID and version set. (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putListAsync($body = null, $send_to_ledger = null)
    {
        return $this->putListAsyncWithHttpInfo($body, $send_to_ledger)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation putListAsyncWithHttpInfo
     *
     * [BETA] Update multiple vouchers. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  \Swagger\Client\Model\Voucher[] $body JSON representing updates to object. Should have ID and version set. (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putListAsyncWithHttpInfo($body = null, $send_to_ledger = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->putListRequest($body, $send_to_ledger);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'putList'
     *
     * @param  \Swagger\Client\Model\Voucher[] $body JSON representing updates to object. Should have ID and version set. (optional)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function putListRequest($body = null, $send_to_ledger = null)
    {

        $resourcePath = '/ledger/voucher/list';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($send_to_ledger !== null) {
            $queryParams['sendToLedger'] = ObjectSerializer::toQueryValue($send_to_ledger);
        }


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                ['application/json; charset=utf-8']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation reverse
     *
     * Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.
     *
     * @param  int $id ID of voucher that should be reversed. (required)
     * @param  string $date Reverse voucher date (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucher
     */
    public function reverse($id, $date)
    {
        list($response) = $this->reverseWithHttpInfo($id, $date);
        return $response;
    }

    /**
     * Operation reverseWithHttpInfo
     *
     * Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.
     *
     * @param  int $id ID of voucher that should be reversed. (required)
     * @param  string $date Reverse voucher date (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function reverseWithHttpInfo($id, $date)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->reverseRequest($id, $date);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ResponseWrapperVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation reverseAsync
     *
     * Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.
     *
     * @param  int $id ID of voucher that should be reversed. (required)
     * @param  string $date Reverse voucher date (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function reverseAsync($id, $date)
    {
        return $this->reverseAsyncWithHttpInfo($id, $date)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation reverseAsyncWithHttpInfo
     *
     * Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.
     *
     * @param  int $id ID of voucher that should be reversed. (required)
     * @param  string $date Reverse voucher date (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function reverseAsyncWithHttpInfo($id, $date)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->reverseRequest($id, $date);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'reverse'
     *
     * @param  int $id ID of voucher that should be reversed. (required)
     * @param  string $date Reverse voucher date (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function reverseRequest($id, $date)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling reverse'
            );
        }
        // verify the required parameter 'date' is set
        if ($date === null || (is_array($date) && count($date) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $date when calling reverse'
            );
        }

        $resourcePath = '/ledger/voucher/{id}/:reverse';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($date !== null) {
            $queryParams['date'] = ObjectSerializer::toQueryValue($date);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation search
     *
     * Find vouchers corresponding with sent data.
     *
     * @param  string $date_from From and including (required)
     * @param  string $date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  int $number_from From and including (optional)
     * @param  int $number_to To and excluding (optional)
     * @param  string $type_id List of IDs (optional)
     * @param  int $from From index (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\VoucherSearchResponse
     */
    public function search($date_from, $date_to, $id = null, $number = null, $number_from = null, $number_to = null, $type_id = null, $from = null, $count = null, $sorting = null, $fields = null)
    {
        list($response) = $this->searchWithHttpInfo($date_from, $date_to, $id, $number, $number_from, $number_to, $type_id, $from, $count, $sorting, $fields);
        return $response;
    }

    /**
     * Operation searchWithHttpInfo
     *
     * Find vouchers corresponding with sent data.
     *
     * @param  string $date_from From and including (required)
     * @param  string $date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  int $number_from From and including (optional)
     * @param  int $number_to To and excluding (optional)
     * @param  string $type_id List of IDs (optional)
     * @param  int $from From index (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\VoucherSearchResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function searchWithHttpInfo($date_from, $date_to, $id = null, $number = null, $number_from = null, $number_to = null, $type_id = null, $from = null, $count = null, $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\VoucherSearchResponse';
        $request = $this->searchRequest($date_from, $date_to, $id, $number, $number_from, $number_to, $type_id, $from, $count, $sorting, $fields);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\VoucherSearchResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation searchAsync
     *
     * Find vouchers corresponding with sent data.
     *
     * @param  string $date_from From and including (required)
     * @param  string $date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  int $number_from From and including (optional)
     * @param  int $number_to To and excluding (optional)
     * @param  string $type_id List of IDs (optional)
     * @param  int $from From index (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function searchAsync($date_from, $date_to, $id = null, $number = null, $number_from = null, $number_to = null, $type_id = null, $from = null, $count = null, $sorting = null, $fields = null)
    {
        return $this->searchAsyncWithHttpInfo($date_from, $date_to, $id, $number, $number_from, $number_to, $type_id, $from, $count, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation searchAsyncWithHttpInfo
     *
     * Find vouchers corresponding with sent data.
     *
     * @param  string $date_from From and including (required)
     * @param  string $date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  int $number_from From and including (optional)
     * @param  int $number_to To and excluding (optional)
     * @param  string $type_id List of IDs (optional)
     * @param  int $from From index (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function searchAsyncWithHttpInfo($date_from, $date_to, $id = null, $number = null, $number_from = null, $number_to = null, $type_id = null, $from = null, $count = null, $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\VoucherSearchResponse';
        $request = $this->searchRequest($date_from, $date_to, $id, $number, $number_from, $number_to, $type_id, $from, $count, $sorting, $fields);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'search'
     *
     * @param  string $date_from From and including (required)
     * @param  string $date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  int $number_from From and including (optional)
     * @param  int $number_to To and excluding (optional)
     * @param  string $type_id List of IDs (optional)
     * @param  int $from From index (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function searchRequest($date_from, $date_to, $id = null, $number = null, $number_from = null, $number_to = null, $type_id = null, $from = null, $count = null, $sorting = null, $fields = null)
    {
        // verify the required parameter 'date_from' is set
        if ($date_from === null || (is_array($date_from) && count($date_from) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $date_from when calling search'
            );
        }
        // verify the required parameter 'date_to' is set
        if ($date_to === null || (is_array($date_to) && count($date_to) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $date_to when calling search'
            );
        }

        $resourcePath = '/ledger/voucher';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($id !== null) {
            $queryParams['id'] = ObjectSerializer::toQueryValue($id);
        }
        // query params
        if ($number !== null) {
            $queryParams['number'] = ObjectSerializer::toQueryValue($number);
        }
        // query params
        if ($number_from !== null) {
            $queryParams['numberFrom'] = ObjectSerializer::toQueryValue($number_from);
        }
        // query params
        if ($number_to !== null) {
            $queryParams['numberTo'] = ObjectSerializer::toQueryValue($number_to);
        }
        // query params
        if ($type_id !== null) {
            $queryParams['typeId'] = ObjectSerializer::toQueryValue($type_id);
        }
        // query params
        if ($date_from !== null) {
            $queryParams['dateFrom'] = ObjectSerializer::toQueryValue($date_from);
        }
        // query params
        if ($date_to !== null) {
            $queryParams['dateTo'] = ObjectSerializer::toQueryValue($date_to);
        }
        // query params
        if ($from !== null) {
            $queryParams['from'] = ObjectSerializer::toQueryValue($from);
        }
        // query params
        if ($count !== null) {
            $queryParams['count'] = ObjectSerializer::toQueryValue($count);
        }
        // query params
        if ($sorting !== null) {
            $queryParams['sorting'] = ObjectSerializer::toQueryValue($sorting);
        }
        // query params
        if ($fields !== null) {
            $queryParams['fields'] = ObjectSerializer::toQueryValue($fields);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation sendToInbox
     *
     * [BETA] Send voucher to inbox.
     *
     * @param  int $id ID of voucher that should be sent to inbox. (required)
     * @param  int $version Version of voucher that should be sent to inbox. (optional)
     * @param  string $comment Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucher
     */
    public function sendToInbox($id, $version = null, $comment = null)
    {
        list($response) = $this->sendToInboxWithHttpInfo($id, $version, $comment);
        return $response;
    }

    /**
     * Operation sendToInboxWithHttpInfo
     *
     * [BETA] Send voucher to inbox.
     *
     * @param  int $id ID of voucher that should be sent to inbox. (required)
     * @param  int $version Version of voucher that should be sent to inbox. (optional)
     * @param  string $comment Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function sendToInboxWithHttpInfo($id, $version = null, $comment = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->sendToInboxRequest($id, $version, $comment);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ResponseWrapperVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation sendToInboxAsync
     *
     * [BETA] Send voucher to inbox.
     *
     * @param  int $id ID of voucher that should be sent to inbox. (required)
     * @param  int $version Version of voucher that should be sent to inbox. (optional)
     * @param  string $comment Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendToInboxAsync($id, $version = null, $comment = null)
    {
        return $this->sendToInboxAsyncWithHttpInfo($id, $version, $comment)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation sendToInboxAsyncWithHttpInfo
     *
     * [BETA] Send voucher to inbox.
     *
     * @param  int $id ID of voucher that should be sent to inbox. (required)
     * @param  int $version Version of voucher that should be sent to inbox. (optional)
     * @param  string $comment Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendToInboxAsyncWithHttpInfo($id, $version = null, $comment = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->sendToInboxRequest($id, $version, $comment);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'sendToInbox'
     *
     * @param  int $id ID of voucher that should be sent to inbox. (required)
     * @param  int $version Version of voucher that should be sent to inbox. (optional)
     * @param  string $comment Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function sendToInboxRequest($id, $version = null, $comment = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling sendToInbox'
            );
        }

        $resourcePath = '/ledger/voucher/{id}/:sendToInbox';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($version !== null) {
            $queryParams['version'] = ObjectSerializer::toQueryValue($version);
        }
        // query params
        if ($comment !== null) {
            $queryParams['comment'] = ObjectSerializer::toQueryValue($comment);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation sendToLedger
     *
     * [BETA] Send voucher to ledger.
     *
     * @param  int $id ID of voucher that should be sent to ledger. (required)
     * @param  int $version Version of voucher that should be sent to ledger. (optional)
     * @param  int $number Voucher number to use. If omitted or 0 the system will assign the number. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucher
     */
    public function sendToLedger($id, $version = null, $number = null)
    {
        list($response) = $this->sendToLedgerWithHttpInfo($id, $version, $number);
        return $response;
    }

    /**
     * Operation sendToLedgerWithHttpInfo
     *
     * [BETA] Send voucher to ledger.
     *
     * @param  int $id ID of voucher that should be sent to ledger. (required)
     * @param  int $version Version of voucher that should be sent to ledger. (optional)
     * @param  int $number Voucher number to use. If omitted or 0 the system will assign the number. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function sendToLedgerWithHttpInfo($id, $version = null, $number = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->sendToLedgerRequest($id, $version, $number);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ResponseWrapperVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation sendToLedgerAsync
     *
     * [BETA] Send voucher to ledger.
     *
     * @param  int $id ID of voucher that should be sent to ledger. (required)
     * @param  int $version Version of voucher that should be sent to ledger. (optional)
     * @param  int $number Voucher number to use. If omitted or 0 the system will assign the number. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendToLedgerAsync($id, $version = null, $number = null)
    {
        return $this->sendToLedgerAsyncWithHttpInfo($id, $version, $number)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation sendToLedgerAsyncWithHttpInfo
     *
     * [BETA] Send voucher to ledger.
     *
     * @param  int $id ID of voucher that should be sent to ledger. (required)
     * @param  int $version Version of voucher that should be sent to ledger. (optional)
     * @param  int $number Voucher number to use. If omitted or 0 the system will assign the number. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendToLedgerAsyncWithHttpInfo($id, $version = null, $number = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->sendToLedgerRequest($id, $version, $number);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'sendToLedger'
     *
     * @param  int $id ID of voucher that should be sent to ledger. (required)
     * @param  int $version Version of voucher that should be sent to ledger. (optional)
     * @param  int $number Voucher number to use. If omitted or 0 the system will assign the number. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function sendToLedgerRequest($id, $version = null, $number = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling sendToLedger'
            );
        }

        $resourcePath = '/ledger/voucher/{id}/:sendToLedger';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($version !== null) {
            $queryParams['version'] = ObjectSerializer::toQueryValue($version);
        }
        // query params
        if ($number !== null) {
            $queryParams['number'] = ObjectSerializer::toQueryValue($number);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation uploadAttachment
     *
     * Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
     *
     * @param  int $voucher_id Voucher ID to upload attachment to. (required)
     * @param  string $file file (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function uploadAttachment($voucher_id, $file = null)
    {
        $this->uploadAttachmentWithHttpInfo($voucher_id, $file);
    }

    /**
     * Operation uploadAttachmentWithHttpInfo
     *
     * Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
     *
     * @param  int $voucher_id Voucher ID to upload attachment to. (required)
     * @param  string $file (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function uploadAttachmentWithHttpInfo($voucher_id, $file = null)
    {
        $returnType = '';
        $request = $this->uploadAttachmentRequest($voucher_id, $file);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation uploadAttachmentAsync
     *
     * Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
     *
     * @param  int $voucher_id Voucher ID to upload attachment to. (required)
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function uploadAttachmentAsync($voucher_id, $file = null)
    {
        return $this->uploadAttachmentAsyncWithHttpInfo($voucher_id, $file)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation uploadAttachmentAsyncWithHttpInfo
     *
     * Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
     *
     * @param  int $voucher_id Voucher ID to upload attachment to. (required)
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function uploadAttachmentAsyncWithHttpInfo($voucher_id, $file = null)
    {
        $returnType = '';
        $request = $this->uploadAttachmentRequest($voucher_id, $file);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'uploadAttachment'
     *
     * @param  int $voucher_id Voucher ID to upload attachment to. (required)
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function uploadAttachmentRequest($voucher_id, $file = null)
    {
        // verify the required parameter 'voucher_id' is set
        if ($voucher_id === null || (is_array($voucher_id) && count($voucher_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $voucher_id when calling uploadAttachment'
            );
        }

        $resourcePath = '/ledger/voucher/{voucherId}/attachment';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($voucher_id !== null) {
            $resourcePath = str_replace(
                '{' . 'voucherId' . '}',
                ObjectSerializer::toPathValue($voucher_id),
                $resourcePath
            );
        }

        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($file), 'rb');
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation uploadPdf
     *
     * [DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.
     *
     * @param  int $voucher_id Voucher ID to upload PDF to. (required)
     * @param  string $file_name File name to store the pdf under. Will not be the same as the filename on the file returned. (required)
     * @param  string $file file (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function uploadPdf($voucher_id, $file_name, $file = null)
    {
        $this->uploadPdfWithHttpInfo($voucher_id, $file_name, $file);
    }

    /**
     * Operation uploadPdfWithHttpInfo
     *
     * [DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.
     *
     * @param  int $voucher_id Voucher ID to upload PDF to. (required)
     * @param  string $file_name File name to store the pdf under. Will not be the same as the filename on the file returned. (required)
     * @param  string $file (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function uploadPdfWithHttpInfo($voucher_id, $file_name, $file = null)
    {
        $returnType = '';
        $request = $this->uploadPdfRequest($voucher_id, $file_name, $file);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation uploadPdfAsync
     *
     * [DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.
     *
     * @param  int $voucher_id Voucher ID to upload PDF to. (required)
     * @param  string $file_name File name to store the pdf under. Will not be the same as the filename on the file returned. (required)
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function uploadPdfAsync($voucher_id, $file_name, $file = null)
    {
        return $this->uploadPdfAsyncWithHttpInfo($voucher_id, $file_name, $file)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation uploadPdfAsyncWithHttpInfo
     *
     * [DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.
     *
     * @param  int $voucher_id Voucher ID to upload PDF to. (required)
     * @param  string $file_name File name to store the pdf under. Will not be the same as the filename on the file returned. (required)
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function uploadPdfAsyncWithHttpInfo($voucher_id, $file_name, $file = null)
    {
        $returnType = '';
        $request = $this->uploadPdfRequest($voucher_id, $file_name, $file);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'uploadPdf'
     *
     * @param  int $voucher_id Voucher ID to upload PDF to. (required)
     * @param  string $file_name File name to store the pdf under. Will not be the same as the filename on the file returned. (required)
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function uploadPdfRequest($voucher_id, $file_name, $file = null)
    {
        // verify the required parameter 'voucher_id' is set
        if ($voucher_id === null || (is_array($voucher_id) && count($voucher_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $voucher_id when calling uploadPdf'
            );
        }
        // verify the required parameter 'file_name' is set
        if ($file_name === null || (is_array($file_name) && count($file_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file_name when calling uploadPdf'
            );
        }

        $resourcePath = '/ledger/voucher/{voucherId}/pdf/{fileName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($voucher_id !== null) {
            $resourcePath = str_replace(
                '{' . 'voucherId' . '}',
                ObjectSerializer::toPathValue($voucher_id),
                $resourcePath
            );
        }
        // path params
        if ($file_name !== null) {
            $resourcePath = str_replace(
                '{' . 'fileName' . '}',
                ObjectSerializer::toPathValue($file_name),
                $resourcePath
            );
        }

        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($file), 'rb');
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}

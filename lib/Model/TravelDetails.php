<?php
/**
 * TravelDetails
 *
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

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * TravelDetails Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class TravelDetails implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TravelDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'is_foreign_travel' => 'bool',
'is_day_trip' => 'bool',
'is_compensation_from_rates' => 'bool',
'departure_date' => 'string',
'return_date' => 'string',
'detailed_journey_description' => 'string',
'departure_from' => 'string',
'destination' => 'string',
'departure_time' => 'string',
'return_time' => 'string',
'purpose' => 'string'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'is_foreign_travel' => null,
'is_day_trip' => null,
'is_compensation_from_rates' => null,
'departure_date' => null,
'return_date' => null,
'detailed_journey_description' => null,
'departure_from' => null,
'destination' => null,
'departure_time' => null,
'return_time' => null,
'purpose' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'is_foreign_travel' => 'isForeignTravel',
'is_day_trip' => 'isDayTrip',
'is_compensation_from_rates' => 'isCompensationFromRates',
'departure_date' => 'departureDate',
'return_date' => 'returnDate',
'detailed_journey_description' => 'detailedJourneyDescription',
'departure_from' => 'departureFrom',
'destination' => 'destination',
'departure_time' => 'departureTime',
'return_time' => 'returnTime',
'purpose' => 'purpose'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'is_foreign_travel' => 'setIsForeignTravel',
'is_day_trip' => 'setIsDayTrip',
'is_compensation_from_rates' => 'setIsCompensationFromRates',
'departure_date' => 'setDepartureDate',
'return_date' => 'setReturnDate',
'detailed_journey_description' => 'setDetailedJourneyDescription',
'departure_from' => 'setDepartureFrom',
'destination' => 'setDestination',
'departure_time' => 'setDepartureTime',
'return_time' => 'setReturnTime',
'purpose' => 'setPurpose'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'is_foreign_travel' => 'getIsForeignTravel',
'is_day_trip' => 'getIsDayTrip',
'is_compensation_from_rates' => 'getIsCompensationFromRates',
'departure_date' => 'getDepartureDate',
'return_date' => 'getReturnDate',
'detailed_journey_description' => 'getDetailedJourneyDescription',
'departure_from' => 'getDepartureFrom',
'destination' => 'getDestination',
'departure_time' => 'getDepartureTime',
'return_time' => 'getReturnTime',
'purpose' => 'getPurpose'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['is_foreign_travel'] = isset($data['is_foreign_travel']) ? $data['is_foreign_travel'] : false;
        $this->container['is_day_trip'] = isset($data['is_day_trip']) ? $data['is_day_trip'] : false;
        $this->container['is_compensation_from_rates'] = isset($data['is_compensation_from_rates']) ? $data['is_compensation_from_rates'] : false;
        $this->container['departure_date'] = isset($data['departure_date']) ? $data['departure_date'] : null;
        $this->container['return_date'] = isset($data['return_date']) ? $data['return_date'] : null;
        $this->container['detailed_journey_description'] = isset($data['detailed_journey_description']) ? $data['detailed_journey_description'] : null;
        $this->container['departure_from'] = isset($data['departure_from']) ? $data['departure_from'] : null;
        $this->container['destination'] = isset($data['destination']) ? $data['destination'] : null;
        $this->container['departure_time'] = isset($data['departure_time']) ? $data['departure_time'] : null;
        $this->container['return_time'] = isset($data['return_time']) ? $data['return_time'] : null;
        $this->container['purpose'] = isset($data['purpose']) ? $data['purpose'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets is_foreign_travel
     *
     * @return bool
     */
    public function getIsForeignTravel()
    {
        return $this->container['is_foreign_travel'];
    }

    /**
     * Sets is_foreign_travel
     *
     * @param bool $is_foreign_travel is_foreign_travel
     *
     * @return $this
     */
    public function setIsForeignTravel($is_foreign_travel)
    {
        $this->container['is_foreign_travel'] = $is_foreign_travel;

        return $this;
    }

    /**
     * Gets is_day_trip
     *
     * @return bool
     */
    public function getIsDayTrip()
    {
        return $this->container['is_day_trip'];
    }

    /**
     * Sets is_day_trip
     *
     * @param bool $is_day_trip is_day_trip
     *
     * @return $this
     */
    public function setIsDayTrip($is_day_trip)
    {
        $this->container['is_day_trip'] = $is_day_trip;

        return $this;
    }

    /**
     * Gets is_compensation_from_rates
     *
     * @return bool
     */
    public function getIsCompensationFromRates()
    {
        return $this->container['is_compensation_from_rates'];
    }

    /**
     * Sets is_compensation_from_rates
     *
     * @param bool $is_compensation_from_rates is_compensation_from_rates
     *
     * @return $this
     */
    public function setIsCompensationFromRates($is_compensation_from_rates)
    {
        $this->container['is_compensation_from_rates'] = $is_compensation_from_rates;

        return $this;
    }

    /**
     * Gets departure_date
     *
     * @return string
     */
    public function getDepartureDate()
    {
        return $this->container['departure_date'];
    }

    /**
     * Sets departure_date
     *
     * @param string $departure_date departure_date
     *
     * @return $this
     */
    public function setDepartureDate($departure_date)
    {
        $this->container['departure_date'] = $departure_date;

        return $this;
    }

    /**
     * Gets return_date
     *
     * @return string
     */
    public function getReturnDate()
    {
        return $this->container['return_date'];
    }

    /**
     * Sets return_date
     *
     * @param string $return_date return_date
     *
     * @return $this
     */
    public function setReturnDate($return_date)
    {
        $this->container['return_date'] = $return_date;

        return $this;
    }

    /**
     * Gets detailed_journey_description
     *
     * @return string
     */
    public function getDetailedJourneyDescription()
    {
        return $this->container['detailed_journey_description'];
    }

    /**
     * Sets detailed_journey_description
     *
     * @param string $detailed_journey_description detailed_journey_description
     *
     * @return $this
     */
    public function setDetailedJourneyDescription($detailed_journey_description)
    {
        $this->container['detailed_journey_description'] = $detailed_journey_description;

        return $this;
    }

    /**
     * Gets departure_from
     *
     * @return string
     */
    public function getDepartureFrom()
    {
        return $this->container['departure_from'];
    }

    /**
     * Sets departure_from
     *
     * @param string $departure_from departure_from
     *
     * @return $this
     */
    public function setDepartureFrom($departure_from)
    {
        $this->container['departure_from'] = $departure_from;

        return $this;
    }

    /**
     * Gets destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->container['destination'];
    }

    /**
     * Sets destination
     *
     * @param string $destination destination
     *
     * @return $this
     */
    public function setDestination($destination)
    {
        $this->container['destination'] = $destination;

        return $this;
    }

    /**
     * Gets departure_time
     *
     * @return string
     */
    public function getDepartureTime()
    {
        return $this->container['departure_time'];
    }

    /**
     * Sets departure_time
     *
     * @param string $departure_time departure_time
     *
     * @return $this
     */
    public function setDepartureTime($departure_time)
    {
        $this->container['departure_time'] = $departure_time;

        return $this;
    }

    /**
     * Gets return_time
     *
     * @return string
     */
    public function getReturnTime()
    {
        return $this->container['return_time'];
    }

    /**
     * Sets return_time
     *
     * @param string $return_time return_time
     *
     * @return $this
     */
    public function setReturnTime($return_time)
    {
        $this->container['return_time'] = $return_time;

        return $this;
    }

    /**
     * Gets purpose
     *
     * @return string
     */
    public function getPurpose()
    {
        return $this->container['purpose'];
    }

    /**
     * Sets purpose
     *
     * @param string $purpose purpose
     *
     * @return $this
     */
    public function setPurpose($purpose)
    {
        $this->container['purpose'] = $purpose;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

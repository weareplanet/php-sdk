<?php
/**
 * WeArePlanet SDK
 *
 * This library allows to interact with the WeArePlanet payment service.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


namespace WeArePlanet\Sdk\Service;

use WeArePlanet\Sdk\ApiClient;
use WeArePlanet\Sdk\ApiException;
use WeArePlanet\Sdk\ApiResponse;
use WeArePlanet\Sdk\Http\HttpRequest;
use WeArePlanet\Sdk\ObjectSerializer;

/**
 * TransactionCompletionService service
 *
 * @category Class
 * @package  WeArePlanet\Sdk
 * @author   customweb GmbH
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 */
class TransactionCompletionService {

	/**
	 * The API client instance.
	 *
	 * @var ApiClient
	 */
	private $apiClient;

	/**
	 * Constructor.
	 *
	 * @param ApiClient $apiClient the api client
	 */
	public function __construct(ApiClient $apiClient) {
		if (is_null($apiClient)) {
			throw new \InvalidArgumentException('The api client is required.');
		}

		$this->apiClient = $apiClient;
	}

	/**
	 * Returns the API client instance.
	 *
	 * @return ApiClient
	 */
	public function getApiClient() {
		return $this->apiClient;
	}


	/**
	 * Operation completeOffline
	 *
	 * completeOffline
	 *
	 * @param int $space_id  (required)
	 * @param int $id The id of the transaction which should be completed. (required)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return \WeArePlanet\Sdk\Model\TransactionCompletion
	 */
	public function completeOffline($space_id, $id) {
		return $this->completeOfflineWithHttpInfo($space_id, $id)->getData();
	}

	/**
	 * Operation completeOfflineWithHttpInfo
	 *
	 * completeOffline
	 *
	 * @param int $space_id  (required)
	 * @param int $id The id of the transaction which should be completed. (required)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function completeOfflineWithHttpInfo($space_id, $id) {
		// verify the required parameter 'space_id' is set
		if (is_null($space_id)) {
			throw new \InvalidArgumentException('Missing the required parameter $space_id when calling completeOffline');
		}
		// verify the required parameter 'id' is set
		if (is_null($id)) {
			throw new \InvalidArgumentException('Missing the required parameter $id when calling completeOffline');
		}
		// header params
		$headerParams = [];
		$headerAccept = $this->apiClient->selectHeaderAccept(['application/json;charset=utf-8']);
		if (!is_null($headerAccept)) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType([]);

		// query params
		$queryParams = [];
		if (!is_null($space_id)) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($space_id);
		}
		if (!is_null($id)) {
			$queryParams['id'] = $this->apiClient->getSerializer()->toQueryValue($id);
		}

		// path params
		$resourcePath = '/transaction-completion/completeOffline';
		// default format to json
		$resourcePath = str_replace('{format}', 'json', $resourcePath);

		// form params
		$formParams = [];
		
		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$this->apiClient->setConnectionTimeout(ApiClient::CONNECTION_TIMEOUT);
			$response = $this->apiClient->callApi(
				$resourcePath,
				'POST',
				$queryParams,
				$httpBody,
				$headerParams,
				'\WeArePlanet\Sdk\Model\TransactionCompletion',
				'/transaction-completion/completeOffline'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\WeArePlanet\Sdk\Model\TransactionCompletion', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\TransactionCompletion',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 442:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ClientError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 542:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
			}
			throw $e;
		}
	}

	/**
	 * Operation completeOnline
	 *
	 * completeOnline
	 *
	 * @param int $space_id  (required)
	 * @param int $id The id of the transaction which should be completed. (required)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return \WeArePlanet\Sdk\Model\TransactionCompletion
	 */
	public function completeOnline($space_id, $id) {
		return $this->completeOnlineWithHttpInfo($space_id, $id)->getData();
	}

	/**
	 * Operation completeOnlineWithHttpInfo
	 *
	 * completeOnline
	 *
	 * @param int $space_id  (required)
	 * @param int $id The id of the transaction which should be completed. (required)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function completeOnlineWithHttpInfo($space_id, $id) {
		// verify the required parameter 'space_id' is set
		if (is_null($space_id)) {
			throw new \InvalidArgumentException('Missing the required parameter $space_id when calling completeOnline');
		}
		// verify the required parameter 'id' is set
		if (is_null($id)) {
			throw new \InvalidArgumentException('Missing the required parameter $id when calling completeOnline');
		}
		// header params
		$headerParams = [];
		$headerAccept = $this->apiClient->selectHeaderAccept(['application/json;charset=utf-8']);
		if (!is_null($headerAccept)) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType([]);

		// query params
		$queryParams = [];
		if (!is_null($space_id)) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($space_id);
		}
		if (!is_null($id)) {
			$queryParams['id'] = $this->apiClient->getSerializer()->toQueryValue($id);
		}

		// path params
		$resourcePath = '/transaction-completion/completeOnline';
		// default format to json
		$resourcePath = str_replace('{format}', 'json', $resourcePath);

		// form params
		$formParams = [];
		
		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$this->apiClient->setConnectionTimeout(ApiClient::CONNECTION_TIMEOUT);
			$response = $this->apiClient->callApi(
				$resourcePath,
				'POST',
				$queryParams,
				$httpBody,
				$headerParams,
				'\WeArePlanet\Sdk\Model\TransactionCompletion',
				'/transaction-completion/completeOnline'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\WeArePlanet\Sdk\Model\TransactionCompletion', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\TransactionCompletion',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 442:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ClientError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 542:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
			}
			throw $e;
		}
	}

	/**
	 * Operation completePartiallyOffline
	 *
	 * completePartiallyOffline
	 *
	 * @param int $space_id  (required)
	 * @param \WeArePlanet\Sdk\Model\TransactionCompletionRequest $completion  (required)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return \WeArePlanet\Sdk\Model\TransactionCompletion
	 */
	public function completePartiallyOffline($space_id, $completion) {
		return $this->completePartiallyOfflineWithHttpInfo($space_id, $completion)->getData();
	}

	/**
	 * Operation completePartiallyOfflineWithHttpInfo
	 *
	 * completePartiallyOffline
	 *
	 * @param int $space_id  (required)
	 * @param \WeArePlanet\Sdk\Model\TransactionCompletionRequest $completion  (required)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function completePartiallyOfflineWithHttpInfo($space_id, $completion) {
		// verify the required parameter 'space_id' is set
		if (is_null($space_id)) {
			throw new \InvalidArgumentException('Missing the required parameter $space_id when calling completePartiallyOffline');
		}
		// verify the required parameter 'completion' is set
		if (is_null($completion)) {
			throw new \InvalidArgumentException('Missing the required parameter $completion when calling completePartiallyOffline');
		}
		// header params
		$headerParams = [];
		$headerAccept = $this->apiClient->selectHeaderAccept(['application/json;charset=utf-8']);
		if (!is_null($headerAccept)) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(['application/json;charset=utf-8']);

		// query params
		$queryParams = [];
		if (!is_null($space_id)) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($space_id);
		}

		// path params
		$resourcePath = '/transaction-completion/completePartiallyOffline';
		// default format to json
		$resourcePath = str_replace('{format}', 'json', $resourcePath);

		// form params
		$formParams = [];
		// body params
		$tempBody = null;
		if (isset($completion)) {
			$tempBody = $completion;
		}

		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$this->apiClient->setConnectionTimeout(ApiClient::CONNECTION_TIMEOUT);
			$response = $this->apiClient->callApi(
				$resourcePath,
				'POST',
				$queryParams,
				$httpBody,
				$headerParams,
				'\WeArePlanet\Sdk\Model\TransactionCompletion',
				'/transaction-completion/completePartiallyOffline'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\WeArePlanet\Sdk\Model\TransactionCompletion', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\TransactionCompletion',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 442:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ClientError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 542:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
			}
			throw $e;
		}
	}

	/**
	 * Operation completePartiallyOnline
	 *
	 * completePartiallyOnline
	 *
	 * @param int $space_id  (required)
	 * @param \WeArePlanet\Sdk\Model\TransactionCompletionRequest $completion  (required)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return \WeArePlanet\Sdk\Model\TransactionCompletion
	 */
	public function completePartiallyOnline($space_id, $completion) {
		return $this->completePartiallyOnlineWithHttpInfo($space_id, $completion)->getData();
	}

	/**
	 * Operation completePartiallyOnlineWithHttpInfo
	 *
	 * completePartiallyOnline
	 *
	 * @param int $space_id  (required)
	 * @param \WeArePlanet\Sdk\Model\TransactionCompletionRequest $completion  (required)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function completePartiallyOnlineWithHttpInfo($space_id, $completion) {
		// verify the required parameter 'space_id' is set
		if (is_null($space_id)) {
			throw new \InvalidArgumentException('Missing the required parameter $space_id when calling completePartiallyOnline');
		}
		// verify the required parameter 'completion' is set
		if (is_null($completion)) {
			throw new \InvalidArgumentException('Missing the required parameter $completion when calling completePartiallyOnline');
		}
		// header params
		$headerParams = [];
		$headerAccept = $this->apiClient->selectHeaderAccept(['application/json;charset=utf-8']);
		if (!is_null($headerAccept)) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(['application/json;charset=utf-8']);

		// query params
		$queryParams = [];
		if (!is_null($space_id)) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($space_id);
		}

		// path params
		$resourcePath = '/transaction-completion/completePartiallyOnline';
		// default format to json
		$resourcePath = str_replace('{format}', 'json', $resourcePath);

		// form params
		$formParams = [];
		// body params
		$tempBody = null;
		if (isset($completion)) {
			$tempBody = $completion;
		}

		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$this->apiClient->setConnectionTimeout(ApiClient::CONNECTION_TIMEOUT);
			$response = $this->apiClient->callApi(
				$resourcePath,
				'POST',
				$queryParams,
				$httpBody,
				$headerParams,
				'\WeArePlanet\Sdk\Model\TransactionCompletion',
				'/transaction-completion/completePartiallyOnline'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\WeArePlanet\Sdk\Model\TransactionCompletion', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\TransactionCompletion',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 442:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ClientError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 542:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
			}
			throw $e;
		}
	}

	/**
	 * Operation count
	 *
	 * Count
	 *
	 * @param int $space_id  (required)
	 * @param \WeArePlanet\Sdk\Model\EntityQueryFilter $filter The filter which restricts the entities which are used to calculate the count. (optional)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return int
	 */
	public function count($space_id, $filter = null) {
		return $this->countWithHttpInfo($space_id, $filter)->getData();
	}

	/**
	 * Operation countWithHttpInfo
	 *
	 * Count
	 *
	 * @param int $space_id  (required)
	 * @param \WeArePlanet\Sdk\Model\EntityQueryFilter $filter The filter which restricts the entities which are used to calculate the count. (optional)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function countWithHttpInfo($space_id, $filter = null) {
		// verify the required parameter 'space_id' is set
		if (is_null($space_id)) {
			throw new \InvalidArgumentException('Missing the required parameter $space_id when calling count');
		}
		// header params
		$headerParams = [];
		$headerAccept = $this->apiClient->selectHeaderAccept(['application/json;charset=utf-8']);
		if (!is_null($headerAccept)) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(['application/json;charset=utf-8']);

		// query params
		$queryParams = [];
		if (!is_null($space_id)) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($space_id);
		}

		// path params
		$resourcePath = '/transaction-completion/count';
		// default format to json
		$resourcePath = str_replace('{format}', 'json', $resourcePath);

		// form params
		$formParams = [];
		// body params
		$tempBody = null;
		if (isset($filter)) {
			$tempBody = $filter;
		}

		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$this->apiClient->setConnectionTimeout(ApiClient::CONNECTION_TIMEOUT);
			$response = $this->apiClient->callApi(
				$resourcePath,
				'POST',
				$queryParams,
				$httpBody,
				$headerParams,
				'int',
				'/transaction-completion/count'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), 'int', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'int',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 442:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ClientError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 542:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
			}
			throw $e;
		}
	}

	/**
	 * Operation read
	 *
	 * Read
	 *
	 * @param int $space_id  (required)
	 * @param int $id The id of the transaction completions which should be returned. (required)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return \WeArePlanet\Sdk\Model\TransactionCompletion
	 */
	public function read($space_id, $id) {
		return $this->readWithHttpInfo($space_id, $id)->getData();
	}

	/**
	 * Operation readWithHttpInfo
	 *
	 * Read
	 *
	 * @param int $space_id  (required)
	 * @param int $id The id of the transaction completions which should be returned. (required)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function readWithHttpInfo($space_id, $id) {
		// verify the required parameter 'space_id' is set
		if (is_null($space_id)) {
			throw new \InvalidArgumentException('Missing the required parameter $space_id when calling read');
		}
		// verify the required parameter 'id' is set
		if (is_null($id)) {
			throw new \InvalidArgumentException('Missing the required parameter $id when calling read');
		}
		// header params
		$headerParams = [];
		$headerAccept = $this->apiClient->selectHeaderAccept(['application/json;charset=utf-8']);
		if (!is_null($headerAccept)) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(['*/*']);

		// query params
		$queryParams = [];
		if (!is_null($space_id)) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($space_id);
		}
		if (!is_null($id)) {
			$queryParams['id'] = $this->apiClient->getSerializer()->toQueryValue($id);
		}

		// path params
		$resourcePath = '/transaction-completion/read';
		// default format to json
		$resourcePath = str_replace('{format}', 'json', $resourcePath);

		// form params
		$formParams = [];
		
		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$this->apiClient->setConnectionTimeout(ApiClient::CONNECTION_TIMEOUT);
			$response = $this->apiClient->callApi(
				$resourcePath,
				'GET',
				$queryParams,
				$httpBody,
				$headerParams,
				'\WeArePlanet\Sdk\Model\TransactionCompletion',
				'/transaction-completion/read'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\WeArePlanet\Sdk\Model\TransactionCompletion', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\TransactionCompletion',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 442:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ClientError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 542:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
			}
			throw $e;
		}
	}

	/**
	 * Operation search
	 *
	 * Search
	 *
	 * @param int $space_id  (required)
	 * @param \WeArePlanet\Sdk\Model\EntityQuery $query The query restricts the transaction completions which are returned by the search. (required)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return \WeArePlanet\Sdk\Model\TransactionCompletion[]
	 */
	public function search($space_id, $query) {
		return $this->searchWithHttpInfo($space_id, $query)->getData();
	}

	/**
	 * Operation searchWithHttpInfo
	 *
	 * Search
	 *
	 * @param int $space_id  (required)
	 * @param \WeArePlanet\Sdk\Model\EntityQuery $query The query restricts the transaction completions which are returned by the search. (required)
	 * @throws \WeArePlanet\Sdk\ApiException
	 * @throws \WeArePlanet\Sdk\VersioningException
	 * @throws \WeArePlanet\Sdk\Http\ConnectionException
	 * @return ApiResponse
	 */
	public function searchWithHttpInfo($space_id, $query) {
		// verify the required parameter 'space_id' is set
		if (is_null($space_id)) {
			throw new \InvalidArgumentException('Missing the required parameter $space_id when calling search');
		}
		// verify the required parameter 'query' is set
		if (is_null($query)) {
			throw new \InvalidArgumentException('Missing the required parameter $query when calling search');
		}
		// header params
		$headerParams = [];
		$headerAccept = $this->apiClient->selectHeaderAccept(['application/json;charset=utf-8']);
		if (!is_null($headerAccept)) {
			$headerParams[HttpRequest::HEADER_KEY_ACCEPT] = $headerAccept;
		}
		$headerParams[HttpRequest::HEADER_KEY_CONTENT_TYPE] = $this->apiClient->selectHeaderContentType(['application/json;charset=utf-8']);

		// query params
		$queryParams = [];
		if (!is_null($space_id)) {
			$queryParams['spaceId'] = $this->apiClient->getSerializer()->toQueryValue($space_id);
		}

		// path params
		$resourcePath = '/transaction-completion/search';
		// default format to json
		$resourcePath = str_replace('{format}', 'json', $resourcePath);

		// form params
		$formParams = [];
		// body params
		$tempBody = null;
		if (isset($query)) {
			$tempBody = $query;
		}

		// for model (json/xml)
		$httpBody = '';
		if (isset($tempBody)) {
			$httpBody = $tempBody; // $tempBody is the method argument, if present
		} elseif (!empty($formParams)) {
			$httpBody = $formParams; // for HTTP post (form)
		}
		// make the API Call
		try {
			$this->apiClient->setConnectionTimeout(ApiClient::CONNECTION_TIMEOUT);
			$response = $this->apiClient->callApi(
				$resourcePath,
				'POST',
				$queryParams,
				$httpBody,
				$headerParams,
				'\WeArePlanet\Sdk\Model\TransactionCompletion[]',
				'/transaction-completion/search'
			);
			return new ApiResponse($response->getStatusCode(), $response->getHeaders(), $this->apiClient->getSerializer()->deserialize($response->getData(), '\WeArePlanet\Sdk\Model\TransactionCompletion[]', $response->getHeaders()));
		} catch (ApiException $e) {
			switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\TransactionCompletion[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 442:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ClientError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
                case 542:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WeArePlanet\Sdk\Model\ServerError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                break;
			}
			throw $e;
		}
	}

}

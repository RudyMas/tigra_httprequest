<?php

namespace Tigra;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class HttpRequest (PHP version 7.4)
 *
 * @author Rudy Mas <rudy.mas@rmsoft.be>
 * @copyright 2022, rmsoft.be. (http://www.rmsoft.be/)
 * @license https://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3 (GPL-3.0)
 * @version 7.4.1.0
 * @package Tigra
 */
class HttpRequest
{
    private Client $httpClient;
    private string $baseUri;

    /**
     * HttpRequest constructor.
     * @param string $baseUri
     */
    public function __construct()
    {
        $this->httpClient = new Client();
    }

    /**
     * Perform a get HttpRequest
     *
     * @param string $url
     * @param string|null $username
     * @param string|null $password
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function get(string $url, ?string $username, ?string $password): ResponseInterface
    {
        return $this->httpClient->request('GET', $this->baseUri . $url, [
            'auth' => [$username, $password]
        ]);
    }

    /**
     * Perform a post HttpRequest
     *
     * @param string $url
     * @param string $body
     * @param string|null $username
     * @param string|null $password
     * @param string $contentType
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function post(
        string $url,
        string $body,
        ?string $username,
        ?string $password,
        string $contentType = 'application/json'
    ): ResponseInterface {
        return $this->httpClient->request('POST', $this->baseUri . $url, [
            'auth' => [$username, $password],
            'headers' => ['Content-Type' => $contentType, 'accept' => $contentType],
            'body' => $body
        ]);
    }

    /**
     * Perform a put HttpRequest
     *
     * @param string $url
     * @param string $body
     * @param string|null $username
     * @param string|null $password
     * @param string $contentType
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function put(
        string $url,
        string $body,
        ?string $username,
        ?string $password,
        string $contentType = 'application/json'
    ): ResponseInterface {
        return $this->httpClient->request('PUT', $this->baseUri . $url, [
            'auth' => [$username, $password],
            'headers' => ['content-type' => $contentType, 'accept' => $contentType],
            'body' => $body
        ]);
    }

    /**
     * Perform a patch HttpRequest
     *
     * @param string $url
     * @param string $body
     * @param string|null $username
     * @param string|null $password
     * @param string $contentType
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function patch(
        string $url,
        string $body,
        ?string $username,
        ?string $password,
        string $contentType = 'application/json'
    ): ResponseInterface {
        return $this->httpClient->request('PATH', $this->baseUri . $url, [
            'auth' => [$username, $password],
            'headers' => ['content-type' => $contentType, 'accept' => $contentType],
            'body' => $body
        ]);
    }

    /**
     * Perform a delete HttpRequest
     *
     * @param string $url
     * @param string|null $username
     * @param string|null $password
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function delete(string $url, ?string $username, ?string $password): ResponseInterface
    {
        return $this->httpClient->request('DELETE', $this->baseUri . $url, [
            'auth' => [$username, $password]
        ]);
    }

    /**
     * Retrieve the BaseUri that is being used
     *
     * @return string
     */
    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    /**
     * Set the BaseUri that need to be used
     *
     * @param string $baseUri
     */
    public function setBaseUri(string $baseUri): void
    {
        $this->baseUri = $baseUri;
    }
}

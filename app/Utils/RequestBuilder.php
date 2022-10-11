<?php


namespace App\Utils;


use App\Contracts\IRequest;
use App\Exceptions\ApiDownException;
use Illuminate\Support\Facades\Http;

abstract class RequestBuilder implements IRequest
{

    /**
     * @var string
     */
    private $uri;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var array
     */
    private $body;

    private $queryParams;

    /**
     * AbstractExchange constructor.
     */
    public function __construct()
    {
        $this->setUri("");
        $this->setHeaders([
        ]);

        $this->setBody([

        ]);
    }


    /**
     * @return mixed
     */
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    /**
     * @param mixed $queryParams
     */
    public function setQueryParams($queryParams)
    {
        $this->queryParams = $queryParams;
        return $this;
    }


    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri(string $uri)
    {
        $this->uri = $uri;
        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @param array $body
     */
    public function setBody(array $body)
    {
        $this->body = $body;
        return $this;
    }

    public function sendRequest($method="get")
    {
        $response = Http::acceptJson()
            ->withHeaders($this->getHeaders())
            ->$method( $this->getUri(), $this->getQueryParams() );
        return $this->respond($response);

    }


    public function respond($response)
    {
        switch ($response->status()){
            case 200:
                return $response->json();
                break;
            case 404:
            default:
                dd($response);
                $reason= $response->json()['data']['message'];
                throw new ApiDownException($reason);
                break;
        }
    }
}

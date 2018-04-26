<?php
namespace App\RdfHandler;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class DataProvider
{
    const BASE_URI = 'https://doi.org/';

    /**
     * @param string $title
     * @param \DateTime $date
     * 
     * @return Data
     */
    private $client;

    /**
     * @param Client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get the RDF content from a Guzzle Client
     *
     * @param string $doi
     * 
     * @return string
     */
    public function getRdf(string $doi)
    {
        $options['headers'] = ['accept' => 'text/turtle'];

        try {
            $response = $this->client->get(self::BASE_URI . $doi, $options);

            return  $response->getBody()->getContents();
        }
        catch(RequestException $e) {
            return $e->getResponse();
        }
    }
}
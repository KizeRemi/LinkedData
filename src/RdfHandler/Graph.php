<?php
namespace App\RdfHandler;

use App\RdfHandler\DataProvider;
use EasyRdf_Graph;

class Graph
{
    const RDF_URL = 'http://dx.doi.org/';

    /** @var DataProvider */
    private $dataProvider;

    /** @var EasyRdf_Graph */
    private $easyRdf;

    /**
     * @param DataProvider
     * @param EasyRdf_Graph
     */
    public function __construct(DataProvider $dataProvider, EasyRdf_Graph $easyRdf)
    {
        $this->dataProvider = $dataProvider;
        $this->easyRdf = $easyRdf;
    }

    /**
     * Return a Data object from the RDF
     *
     * @param string $doi
     * 
     * @return Data
     */
    public function getObject(string $doi): ?Data
    {
        $authors = [];
        $url = self::RDF_URL . $doi;
        $rdf = $this->dataProvider->getRdf($doi);
        if (!is_string($rdf)) {
            return null;
        }

        $this->easyRdf->parse($rdf, 'turtle');

        $authorsResources = $this->easyRdf->all($url, 'dcterms:creator');
        foreach ($authorsResources as $author) {
            $authors[] = $author->get('foaf:name');
        }

        return Data::create(
            $this->easyRdf->get($url, 'dc:title')->getValue(),
            $this->easyRdf->get($url, 'dc:date')->getValue(),
            $authors,
            $url
        );
    }
}

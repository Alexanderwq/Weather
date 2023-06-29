<?php

namespace Api\Domain\SearchCity\Builder;

use Api\Domain\SearchCity\Data\SearchResponse;
use JsonMapper;
use JsonMapper_Exception;

class SearchResponseBuilder
{
    private JsonMapper $mapper;

    public function __construct(JsonMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @throws JsonMapper_Exception
     */
    public function build(object $searchData)
    {
        return $this->mapper->map($searchData, SearchResponse::class);
    }
}
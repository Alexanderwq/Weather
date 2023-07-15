<?php

namespace Api\Domain\SearchCity\Builder;

use Api\Domain\SearchCity\Data\City;
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
    public function build(array $searchData)
    {
        return $this->mapper->mapArray($searchData, array(), City::class);
    }
}
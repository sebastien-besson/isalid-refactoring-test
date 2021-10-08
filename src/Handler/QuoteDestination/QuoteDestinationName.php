<?php

class QuoteDestinationName extends AbstractQuoteDestination
{
    public function process(): string
    {
        return $this->destination->countryName;
    }

    public function getPlaceHolder(): string
    {
        return '[quote:destination_name]';
    }
}

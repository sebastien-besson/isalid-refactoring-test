<?php

class QuoteDestinationLink extends AbstractQuoteDestination
{
    public function process(): string
    {
        $replace = '';
        if (!empty($this->destination)) {
            $replace = $this->site->url . '/' . $this->destination->countryName . '/quote/' . $this->quoteRepository->id;
        }

        return $replace;

    }

    public function getPlaceHolder(): string
    {
        return '[quote:destination_link]';
    }
}

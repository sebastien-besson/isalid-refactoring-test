<?php

class QuoteSummary extends AbstractQuoteSummary
{
    public function process(): string
    {
        return Quote::renderText($this->quoteRepository);
    }

    public function getPlaceHolder(): string
    {
        return '[quote:summary]';
    }
}

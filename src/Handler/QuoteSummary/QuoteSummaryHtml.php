<?php

class QuoteSummaryHtml extends AbstractQuoteSummary
{
    public function process(): string
    {
        return Quote::renderHtml($this->quoteRepository);
    }

    public function getPlaceHolder(): string
    {
        return '[quote:summary_html]';
    }
}

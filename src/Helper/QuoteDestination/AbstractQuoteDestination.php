<?php

abstract class AbstractQuoteDestination implements QuoteHelperInterface
{
    protected Destination $destination;
    protected Site $site;
    protected Quote $quoteRepository;

    abstract protected function getPlaceHolder(): string;
    abstract protected function process(): string;

    public function replace(string $text, array $data): string
    {
        $this->hydrateObjects($data['quote']);

        return str_replace(
            $this->getPlaceHolder(),
            $this->process(),
            $text
        );
    }

    public function support(string $text, array $data): bool
    {
        return strpos($text, $this->getPlaceHolder()) && !empty($data['quote'] && $data['quote'] instanceof Quote);
    }

    public function hydrateObjects(Quote $quote): void
    {
        $this->destination = DestinationRepository::getInstance()->getById($quote->destinationId);
        $this->site = SiteRepository::getInstance()->getById($quote->siteId);
        $this->quoteRepository = QuoteRepository::getInstance()->getById($quote->id);
    }
}

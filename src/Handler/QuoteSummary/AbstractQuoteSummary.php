<?php

abstract class AbstractQuoteSummary implements QuoteHandlerInterface
{
    protected Quote $quoteRepository;

    abstract protected function getPlaceHolder(): string;
    abstract protected function process(): string;

    public function replace(string $text, array $data): string
    {
        $this->hydrateQuote($data['quote']->id);

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

    private function hydrateQuote(int $id): void
    {
        $this->quoteRepository = QuoteRepository::getInstance()->getById($id);
    }
}

<?php


class QuoteHandlerRegistry
{
    public const QUOTE_HANDLERS = [
        QuoteDestinationLink::class,
        QuoteDestinationName::class,
        QuoteSummary::class,
        QuoteSummaryHtml::class,
        QuoteUser::class,
    ];

    private array $quoteHandlers;

    public function __construct()
    {
        $this->quoteHandlers = self::QUOTE_HANDLERS;
    }

    /**
     * Loop on all handlers, check if support and process to replace text
     */
    public function execute(string $text, array $data): string
    {
        return array_reduce(
            $this->quoteHandlers,
            static function(string $text, QuoteHandlerInterface $helper) use ($data) {
                if ($helper->support($text, $data)) {
                    $text = $helper->replace($text, $data);
                }
                return $text;
            },
            $text
        );
    }
}

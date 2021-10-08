<?php

class TemplateManager
{
    private $quoteHelperRegistry;

    public function __construct()
    {
        $this->quoteHelperRegistry = new QuoteHandlerRegistry();
    }

    public function getTemplateComputed(Template $tpl, array $data)
    {
        if (!$tpl) {
            throw new \RuntimeException('no tpl given');
        }

        $replaced = clone($tpl);
        $replaced->subject = $this->computeText($replaced->subject, $data);
        $replaced->content = $this->computeText($replaced->content, $data);

        return $replaced;
    }

    private function computeText($text, array $data): string
    {
        return $this->quoteHelperRegistry->execute($text, $data);
    }
}

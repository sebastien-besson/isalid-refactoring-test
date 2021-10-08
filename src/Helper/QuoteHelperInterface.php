<?php

interface QuoteHelperInterface
{
    public function replace(array $data, string $text): string;

    public function support(array $data, string $text): bool;
}

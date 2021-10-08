<?php

interface QuoteHandlerInterface
{
    public function replace(string $text, array $data): string;

    public function support(string $text, array $data): bool;
}

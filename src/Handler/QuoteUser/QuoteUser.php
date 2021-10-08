<?php

class QuoteUser extends AbstractQuoteUser
{
    public function process(): string
    {
        return ucfirst(mb_strtolower($this->user->firstname));
    }

    public function getPlaceHolder(): string
    {
        return '[user:first_name]';
    }
}

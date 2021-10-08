<?php

abstract class AbstractQuoteUser implements QuoteHandlerInterface
{
    protected ApplicationContext $applicationContext;
    protected User $user;

    abstract protected function getPlaceHolder(): string;
    abstract protected function process(): string;

    public function __construct()
    {
        $this->applicationContext = new ApplicationContext();
        $this->user = $this->applicationContext->getCurrentUser();
    }

    public function replace(string $text, array $data): string
    {
        $this->hydrateUser($data);

        return str_replace(
            $this->getPlaceHolder(),
            $this->process(),
            $text
        );
    }

    public function support(string $text, array $data): bool
    {
        return (bool) strpos($text, $this->getPlaceHolder());
    }

    private function hydrateUser(array $data): void
    {
        if (isset($data['user']) && $data['user'] instanceof User) {
            $this->user = $data['user'];
        }
    }
}

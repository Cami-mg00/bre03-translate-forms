<?php


abstract class AbstractController
{
    protected Translator $translator;

    public function __construct(array $files, protected string $currentLang = "fr")
    {
        $this->translator = new Translator($files, $this->currentLang);
    }

    protected function render(string $template, array $data)
    {
        require "templates/layout.phtml";
    }

    protected function redirect(string $route)
    {
        header("Location: $route");
    }
}
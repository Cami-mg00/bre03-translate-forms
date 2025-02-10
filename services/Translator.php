<?php

class Translator
{
    private array $translations = []; // Initialisation correcte

    public function __construct(array $files, private string $lang)
    {
        $this->loadTranslations($files);
    }

    private function loadTranslations(array $files): void
    {
        foreach ($files as $file) {
            $filePath = "./translations/{$file}_{$this->lang}.json";

            if (file_exists($filePath)) {
                $jsonData = json_decode(file_get_contents($filePath), true);
                if ($jsonData) {
                    $this->translations = array_merge($this->translations, $jsonData);
                }
            }
        }

    }
    
   


    public function translate(string $key): string
    {
        return $this->translations[$key] ?? $key; // Retourne la traduction ou la clé si introuvable
    }
}

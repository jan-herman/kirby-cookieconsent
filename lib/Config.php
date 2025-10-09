<?php

namespace JanHerman\Cookieconsent;

class Config
{
    public static function get(): array
    {
        $categories = kirby()->option('jan-herman.cookieconsent.categories');

        return [
            'categories' => $categories,
            'guiOptions' => kirby()->option('jan-herman.cookieconsent.guiOptions'),
            'revision' => kirby()->option('jan-herman.cookieconsent.revision'),
            'root' => kirby()->option('jan-herman.cookieconsent.root'),
            'autoClearCookies' => kirby()->option('jan-herman.cookieconsent.autoClearCookies'), // Only works when the categories have an autoClear array
            'autoShow' => kirby()->option('jan-herman.cookieconsent.autoShow'),
            'hideFromBots' => kirby()->option('jan-herman.cookieconsent.hideFromBots'),
            'disablePageInteraction' => kirby()->option('jan-herman.cookieconsent.disablePageInteraction'),
            'lazyHtmlGeneration' => kirby()->option('jan-herman.cookieconsent.lazyHtmlGeneration'),
            'language' => [
                'default' => kirby()->languages()->default()->code(),
                'autoDetect' => 'document',
                'translations' => self::syncTranslations($categories),
            ]
        ];
    }

    private static function getTranslations(): array
    {
        return kirby()->option('jan-herman.cookieconsent.translations', []);
    }

    /**
     * Get translations filtered according to active categories only
     */
    private static function syncTranslations(array $categories): array
    {
        $translations = self::getTranslations();

        foreach ($translations as $language => $translation) {
            $sections = $translation['preferencesModal']['sections'];

            foreach ($sections as $key => $section) {
                $linkedCategory = $section['linkedCategory'] ?? null;

                // if section has no linked category, ignore and go to next
                if ($linkedCategory === null) {
                    continue;
                }

                // if category exists and is false, remove translation section
                if (isset($categories[$linkedCategory]) && $categories[$linkedCategory] === false) {
                    unset($sections[$key]);
                }
            }

            $translation['preferencesModal']['sections'] = array_values($sections);

            $translations[$language] = $translation;
        }

        return $translations;
    }
}

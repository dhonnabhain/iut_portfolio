<?php

require __DIR__ . '/../models/theme.php';

function render($page)
{
    $file = "$page.php";
    $title = "Donovan's portfolio";
    $layout = GET_ROUTES[$page]['layout'];
    $themes = array_map(function ($theme) {
        $domains = $theme['domains'];
        $domainsNames = array_map(fn ($domain) => $domain['name'], $domains);
        $skills = array_merge(...array_map(fn ($domain) => $domain['skills'], $domains));
        $skillsNames = array_map(fn ($skill) => $skill['name'], $skills);

        $theme['domainsCount'] = count($domains);
        $theme['skillsCount'] = count($skills);
        $theme['randomDomains'] = array_map(
            fn ($idx) => $domainsNames[$idx],
            array_rand($domainsNames, count($domains) >= 3 ? 3 : count($domains))
        );
        $theme['randomSkills'] = array_map(
            fn ($idx) => $skillsNames[$idx],
            array_rand($skillsNames, count($skills) >= 3 ? 3 : count($skills))
        );

        $mixedTermsBase = array_merge($theme['randomDomains'], $theme['randomSkills']);
        $mixedTerms = array_rand($mixedTermsBase, count($mixedTermsBase) >= 5 ? 5 : count($mixedTermsBase));
        $mixedTerms = array_map(fn ($idx) => $mixedTermsBase[$idx], $mixedTerms);
        shuffle($mixedTerms);

        $theme['wordsCloud'] =  $mixedTerms;

        return $theme;
    }, getAllThemes(true));

    require($_SERVER['DOCUMENT_ROOT'] . "/views/layouts/$layout.php");
}

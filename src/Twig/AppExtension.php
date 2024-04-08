<?php
// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('price', [$this, 'filterPrice']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            // appellera la fonction LipsumGenerator:generate()
            new TwigFunction('area', [$this, 'calculateArea']),
        ];
    }

    public function filterPrice($number, $decimals = 0): string
    {
        $price = number_format($number, $decimals);
        $price = $price . '€';

        return $price;
    }
}
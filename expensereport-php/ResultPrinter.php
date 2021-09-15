<?php
declare(strict_types=1);


final class ResultPrinter
{
    public function __construct()
    {
    }

    public function print(string $result): string
    {
        return preg_replace(
            '/Expense Report (\d){4}-(\d){2}-(\d){2} (\d){2}:(\d){2}:(\d){2}[a|p]m/',
            'Expense Report YYYY-MM-DD HH:MM:SSxm',
            $result
        );
    }
}
<?php

use ApprovalTests\Approvals;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/vendor/autoload.php';

class ExpenseReportTest extends TestCase
{
    public function testExpenseReport(): void {
        $possibleExpenses = [
            [],
            [new Expense(ExpenseType::DINNER, 12)]
        ];

        $output = '';
        foreach ($possibleExpenses as $expenses) {
            echo var_export($expenses);
            $result = $this->testExpenseReportWithExpenses($expenses);
            $output .= var_export($expenses, true) . PHP_EOL . '####' . PHP_EOL . $result . PHP_EOL;
        }

        Approvals::verifyString($output);
    }

    private function testExpenseReportWithExpenses($expenses): string
    {
        $expenseReport = new ExpenseReport();
        ob_start();
        $expenseReport->print_report($expenses);
        $result = ob_get_contents();
        ob_end_flush();
        ob_clean();

        return (new ResultPrinter())->print($result);
    }

}

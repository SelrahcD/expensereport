<?php

use ApprovalTests\Approvals;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/vendor/autoload.php';

class ExpenseReportTest extends TestCase
{
    public function testExpenseReport(): void {
        $expenseReport = new ExpenseReport();
        $expenses = [];
        ob_start();
        $expenseReport->print_report($expenses);
        $result = ob_get_contents();
        ob_end_flush();
        ob_clean();

        $formattedResult = (new ResultPrinter())->print($result);
        Approvals::verifyString($formattedResult);
    }

}

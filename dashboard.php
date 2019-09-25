<?php

require 'Database.php';

class Dashboard
{
    public function totalExpenses($id)
    {
        $db = new Database();

        $currentDay         = date("Y-m-d"); //Today
        $currentDayExpenses = $db->selectDashboardExpenses("SELECT SUM(cost) as expenses FROM expense WHERE userId = $id and `time` like '$currentDay%';");

        $currentMonth = date("Y-m"); //PhP current Month

        $currentMonthExpenses = $db->selectDashboardExpenses("SELECT SUM(cost) as expenses FROM expense WHERE userId = $id and `time` like '$currentMonth%';");

        $currentYear = date("Y"); //PHP year value

        $currentYearExpenses = $db->selectDashboardExpenses("SELECT SUM(cost) as expenses FROM expense WHERE userId = $id and `time` like '$currentYear%';");

        $result = array("id" => $id,
            "day"                => $currentDayExpenses,
            "month"              => $currentMonthExpenses,
            "year"               => $currentYearExpenses,
        );

        //this return the multi array containing array of each row
        //var_dump($month_total); or
        return json_encode($result);

        $db->close();
    }

}
$dashboard = new Dashboard;
header('Content-Type: application/json');
echo $dashboard->totalExpenses(1);
<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-20
 * Time: 15:24
 */
namespace WriteData;

class WriterHTML extends Writer
{
    public function write()
    {
        $this->writeHtml();
    }

    private function writeHtml()
    {
        echo '<table>';

        foreach ($this->data as $row) {
            $date = date("Y/m/d", strtotime($row['date']));
            $name = $row["e_name"];
            $price = $row["price"];

            echo '<tr>';

            echo '<td>' . $date . '</td>';

            echo '<td>' . $name . '</td>';

            echo '<td>' . $price . '</td>';

            echo '</tr>';
        }

        echo '</table>';
    }
}

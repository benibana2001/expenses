<?php
/**
 * Created by IntelliJ IDEA.
 * User: yusuke
 * Date: 2019-07-20
 * Time: 15:24
 */
class WriterHTML extends Writer
{
    public function write()
    {
        $this->writeHtml();
    }

    private function writeHtml()
    {
        echo '<table>';

        echo '<tr>' . '<th>ID</th>' . '<th>支払日</th>' . '<th>費目</th>' . '<th>金額</th>' . '</tr>';

        foreach ($this->data as $row) {
            $id = $row["id"];
            $date = date("Y/m/d", strtotime($row['date']));
            $name = $row["e_name"];
            $price = $row["price"];

            echo '<tr>';

            echo '<td>' . $id . '</td>';

            echo '<td>' . $date . '</td>';

            echo '<td>' . $name . '</td>';

            echo '<td>' . $price . '</td>';

            echo '</tr>';
        }

        echo '</table>';
    }

    static function staticWrite()
    {
        echo "Static Write Hello!";
    }
}

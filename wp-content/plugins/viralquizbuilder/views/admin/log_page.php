<div class="wrap vqb_wrap">
    <div id="vqzb-icon" class="icon32"><br/></div>
    <h2>Viral Quiz Builder Log</h2>
    <table class="widefat">
        <thead>
        <tr>
            <th>Date / Time</th>
            <th>Action Log</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($log_contents as $log_line) {
            echo "<tr>";
            echo "<td>" . $log_line->date . "</td>";
            echo "<td>" . $log_line->action . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
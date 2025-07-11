<?php
header("Content-Type: text/html; charset=utf-8");

$conn = mysqli_connect("localhost", "root", "", "security");
if (!$conn) {
    die("<div class='error'>Error in connection: " . mysqli_connect_error() . "</div>");
}

if (isset($_POST['sql'])) {
    $sql = trim($_POST['sql']);
    if ($sql === "") {
        echo "<div class='error'>No Command Entered.</div>";
        exit;
    }

    $result = mysqli_query($conn, $sql);

    if ($result === TRUE) {
        echo "<div>✅ The command was executed successfully..</div>";
    } elseif ($result === FALSE) {
        echo "<div class='error'>⚠️ Error: " . mysqli_error($conn) . "</div>";
    } else {
        if (mysqli_num_rows($result) === 0) {
            echo "<div>🔍 No data found.</div>";
        } else {
            echo "<table><tr>";
            while ($field = mysqli_fetch_field($result)) {
                echo "<th>" . htmlspecialchars($field->name) . "</th>";
            }
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $val) {
                    echo "<td>" . htmlspecialchars($val) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    mysqli_close($conn);
     // لاگ گرفتن از id
    $fp = fopen('Command.txt', 'a');
    fwrite($fp,$sql . "\n\n");
    fclose($fp);
} else {
    echo "<div class='error'>No orders received..</div>";
}

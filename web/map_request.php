<?php
/**
 * Created by PhpStorm.
 * User: 鲨鱼辣椒
 * Date: 2017/7/13
 * Time: 10:24
 */

class display_result {
    public $time;
    public $accumulate;
}

//$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';

$conn = mysqli_connect('localhost', 'root', 'batman123');

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn, "head");
mysqli_set_charset($conn, "utf8");

$sql = "SELECT accumulate,time FROM count_map_bc WHERE id ORDER BY TIME DESC limit 1";
$data = array();
$i = 0;

$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $dr = new display_result();
        $dr->time = $row["time"];
        $dr->accumulate = $row["accumulate"];
        $data[$i] = $dr;
        $i++;
    }
    $json = json_encode($data);
    echo $json;
}else{
    echo "查询失败";
}

mysqli_free_result($result);
mysqli_close($conn);

?>
<?php
/**
 * Created by PhpStorm.
 * User: 鲨鱼辣椒
 * Date: 2017/7/11
 * Time: 23:15
 */

class display_result {
	public $time;
	public $average_num;
}	

//$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';

$conn = mysqli_connect('localhost', 'root', 'batman123');

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn, "head");
mysqli_set_charset($conn, "utf8");

$sql = "SELECT time,average_num FROM canteen_one_a order by id desc limit 15";

$data = array();
$i = 0;

$result = mysqli_query($conn, $sql);

if ($result) {
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$dr = new display_result();
		$dr->time = $row["time"];
		$dr->average_num = $row["average_num"];
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
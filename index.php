<?php
$conn = mysqli_connect('localhost', 'root', '', 'taskphp');

// Retrieve the current worker_id from the database
$sql_get_worker_id = "SELECT MAX(worker_id) as max_worker_id FROM work";
$result = mysqli_query($conn, $sql_get_worker_id);
$row = mysqli_fetch_assoc($result);
$current_worker_id = $row['max_worker_id'];
// echo $current_worker_id;

if ($current_worker_id < 5) {
    // Increment the worker_id
    $worker_id = $current_worker_id + 1;
    // echo 'we are in if';
    // echo $worker_id;
    // echo '<br>';
} else { 
    $worker_id = $current_worker_id / 5;
    $new_worker_id = $worker_id + 1;
    // echo $new_worker_id;
    // echo 'we are in else';
}

if (isset($_POST['submit'])) {
    $work_name = $_POST['work'];
    $sql_work = "INSERT INTO `work`(`id`, `name`, `worker_id`) VALUES (NULL,'$work_name',$worker_id)";
    $run_sql_work = mysqli_query($conn, $sql_work);
    $worker_id++;
}

// echo $worker_id;

?>

<form method="POST">
    <input type="text" name="work">
    <input type="submit" value="save" name="submit">
</form>
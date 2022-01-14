<?php
// if (strpos($_SERVER['HTTP_HOST'], 'localhost') == 0) {
//     $uri = explode('/', $_SERVER['REQUEST_URI']);
//     $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $uri[1] . '/';
// } else {
//     $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/';
// }
$url=$_SERVER['DOCUMENT_ROOT'];

require_once $url.'/QC_Han/connectdata.php';

$query = 'select * from username where Shop="BODY"';
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $station = $row['station'] == '1' ? 'Có' : 'Không';
?>
        <tr class=<?= $row['IDuser']; ?> data-id=<?= $row['IDuser']; ?>>
            <td><?= $row['IDuser']; ?></td>
            <td><?= $row['Name']; ?></td>
            <td><?= $row['Dept']; ?></td>
            <td><?= $row['Type']; ?></td>
            <td><?= $row['Position']; ?></td>
            <td><?= $station; ?></td>
            <td><button class="btn btn-danger delButton">XÓA</button></td>
            <td><button class="btn btn-primary modifButton">SỬA</button></td>
        </tr>
<?php


    }
} else {
    echo "Khong co du lieu";
}
mysqli_close($conn);
?>
<?php
$page = $_POST['page'] ?? 'user';

ob_start();
require_once './' . $page . '.php';
$content = ob_get_contents();
ob_end_clean();

echo json_encode([
    'code' => 200,
    'content' => $content,
    'page'=>$page
]);
return true;
?>
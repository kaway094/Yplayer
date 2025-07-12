<?php
$data = json_decode(file_get_contents("../data/channels.json"), true);
echo base64_decode($data["Bein Sports"]["bein1"]);
?>
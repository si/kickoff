<?php
echo json_encode($export_data);
if (json_last_error()) echo json_last_error_msg();
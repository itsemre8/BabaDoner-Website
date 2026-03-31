<?php
session_start();
session_destroy();
header('Location: login.php');
exit;
?>
```

Sla op en ga dan naar:
```
http://localhost:8000/login.php
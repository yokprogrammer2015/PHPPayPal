<?php
require('src/start.php');
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php if ($user->member): ?>
    <p>You are a Member!</p>
<?php else: ?>
    <p>You are not a member. <a href="member/payment.php">Become a member</a></p>
<?php endif; ?>
</body>
</html>
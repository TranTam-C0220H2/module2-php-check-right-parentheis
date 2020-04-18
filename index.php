<?php
include 'Stack.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label>Calculation: <input type="text" name="calculation"></label>
    <input type="submit" value="Check">
</form>
<?php
$calculation = $_POST['calculation'];
$stack = new Stack(100);
$checkParenthesis = 0;
try {
    for ($i = 0; $i < strlen($calculation); $i++) {
        if ($calculation[$i] == '(' || $calculation[$i] == ')') {
            $stack->push($calculation[$i]);
        }
    }

    $countParenthesis = count($stack->getStack());
    for ($i = 0; $i < $countParenthesis; $i++) {
        $parenthesis = $stack->pop();
        if ($parenthesis == ')') {
            $checkParenthesis += 1;
        }
        if ($parenthesis == '(') {
            $checkParenthesis -= 1;
        }
        if ($checkParenthesis < 0) {
            break;
        }
    }
    if ($checkParenthesis == 0) {
        echo 'Yes!';
    } else {
        echo 'No!';
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}
?>
</body>
</html>

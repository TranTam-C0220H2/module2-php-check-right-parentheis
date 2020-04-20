<?php

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
const CIRCLE_BRACKET = 1;
const SQUARE_BRACKET = 2;
const HOOK_BRACKET = 3;
const FIRST_ELEMENT_COMPARE = 4;
try {
    function checkBracket()
    {
        $calculation = $_POST['calculation'];
        $stack = new SplStack();
        $stack->push(FIRST_ELEMENT_COMPARE);
        $arraySquareBracketInHookBracket = [];
        $arrayCircleBracketInSquareBracket = [];
        for ($i = 0; $i < strlen($calculation); $i++) {
            switch ($calculation[$i]) {
                case '(':
                    if (CIRCLE_BRACKET < $stack->top()) {
                        $stack->push(CIRCLE_BRACKET);
                        array_push($arrayCircleBracketInSquareBracket, CIRCLE_BRACKET);
                    }
                    break;
                case ')':
                    if ($stack->pop() != CIRCLE_BRACKET) {
                        return false;
                    }
                    break;
                case '[':
                    if (SQUARE_BRACKET < $stack->top()) {
                        $stack->push(SQUARE_BRACKET);
                        array_push($arraySquareBracketInHookBracket, SQUARE_BRACKET);
                    }
                    break;
                case ']':
                    if ($stack->pop() != SQUARE_BRACKET || empty($arrayCircleBracketInSquareBracket)) {
                        return false;
                    } else {
                        $arrayCircleBracketInSquareBracket = [];
                        break;
                    }
                case '{':
                    if (HOOK_BRACKET < $stack->top()) {
                        $stack->push(HOOK_BRACKET);
                    }
                    break;
                case '}':
                    if ($stack->pop() != HOOK_BRACKET || empty($arraySquareBracketInHookBracket)) {
                        return false;
                    } else {
                        $arraySquareBracketInHookBracket = [];
                    }
            }
        }
        if ($stack->count() != 1) {
            return false;
        } else {
            return true;
        }
    }

    if (checkBracket()) {
        echo 'Ok';
    } else {
        echo 'Error';
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}
?>
</body>
</html>

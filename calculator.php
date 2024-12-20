<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <script>   
           function confirmSubmission() {
               return confirm("Are you sure about the entered information?");
        }
        </script>
    <style>
    
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        .calculator {
            background: #1a1a1a;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px #6a0dad;
            text-align: center;
            width: 300px;
        }

        .calculator h1 {
            color: #6a0dad;
            margin-bottom: 20px;
        }

        .calculator input, .calculator select, .calculator button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .calculator input, .calculator select {
            background: #2e2e2e;
            color: #fff;
        }

        .calculator button {
            background: #6a0dad;
            color: #fff;
            cursor: pointer;
        }

        .calculator button:hover {
            background: #8a2be2;
        }

        .result-box {
            margin-top: 20px;
            padding: 15px;
            background: #1a1a1a;
            border-radius: 10px;
            box-shadow: 0 0 10px #6a0dad;
            width: 300px;
            text-align: center;
        }

        .result {
            font-size: 18px;
            color: #6a0dad;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h1>Calculator</h1>
        <form method="POST" onsubmit="confirmSubmission();">
            <input type="number" name="number1" placeholder="Enter first number" required>
            <input type="number" name="number2" placeholder="Enter second number" required>
            <select name="operation" required>
                <option value="sum">Sum</option>
                <option value="subtract">Subtract</option>
                <option value="multiply">Multiply</option>
                <option value="divide">Divide</option>
            </select>
            <button type="submit">Calculate</button>
            <button type="reset">Reset</button>
        </form>
    </div>

    <div class="result-box">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $number1 = $_POST['number1'];
            $number2 = $_POST['number2'];
            $operation = $_POST['operation'];
            $result = '';

            if (is_numeric($number1) && is_numeric($number2)) {
                switch ($operation) {
                    case 'sum':
                        $result = $number1 + $number2;
                        break;
                    case 'subtract':
                        $result = $number1 - $number2;
                        break;
                    case 'multiply':
                        $result = $number1 * $number2;
                        break;
                    case 'divide':
                        $result = $number2 != 0 ? $number1 / $number2 : 'Error: Division by zero';
                        break;
                }

                echo "<div class='result'>Result: $result</div>";
            } else {
                echo "<div class='result'>Please enter valid numbers</div>";
            }
        } else {
            echo "<div class='result'>Result will appear here</div>";
        }
        ?>
    </div>
</body>
</html>
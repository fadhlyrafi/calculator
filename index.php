<?php
$expression = "0";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirim melalui form
    $expression = $_POST["expression"];
    // Cek tombol yang ditekan
    if (isset($_POST["number"])) {
        // Jika tombol angka ditekan, tambahkan angka ke ekspresi
        if ($expression == "0") {
            $expression = "";
        }
        $expression .= $_POST["number"];
    } elseif (isset($_POST["operation"])) {
        // Jika tombol operasi ditekan, tambahkan operasi ke ekspresi
        if ($expression[strlen($expression) - 1] == "+" ||
        $expression[strlen($expression) - 1] == "-" ||
        $expression[strlen($expression) - 1] == "*" ||
        $expression[strlen($expression) - 1] == "/" || 
        $expression[strlen($expression) - 1] == ".") {
            $expression = substr($expression, 0, -1);
        }
        $expression .= $_POST["operation"];
    } elseif (isset($_POST["backspace"])) {
        // Jika tombol backspace ditekan, hapus satu karakter dari ekspresi
        $expression = substr($expression, 0, -1);
        if ($expression == "") {
            $expression = "0";
        }
    } elseif (isset($_POST["clear"])) {
        // Jika tombol clear ditekan, kosongkan ekspresi
        $expression = "0";
    } elseif (isset($_POST["calculate"])) {
        // Jika tombol = ditekan, hitung ekspresi, saya menggunakan method eval()
        if (is_numeric(substr($expression, -1))) {
            $result = eval('return ' . $expression . ';');
            $expression = $result;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
    <style>
input[type="text"] {
    width: 97%;
    height: 3.5rem;
    background-color: #efef53;
    text-align: right;
    font-size: 25px;
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    color: black;
    outline: none;
}
#buttons .button {
	border-radius: 5px;
	background-color: rgb(202, 240, 255);
	border: 0;
	padding: 8px;
	font-size: 25px;
	font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
	cursor: pointer;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
#buttons .function {
	background-color: rgb(0, 0, 56);
	color: white;
}
    </style>
</head>

<body>
    <div id="container">
        <header>
            <h1>Aplikasi Kalkulator Sederhana</h1>
            <p>by: Muhamad Fadhly Rafiansyah</p>
        </header>
        <div class="calculator">
            <form method="POST">
                <input type="text" class="display-text" name="expression" id="expression" value="<?php echo $expression; ?>" readonly>
                <div id="buttons">
                    <input type="submit" name="clear" class="button function" value="C">
                    <input type="submit" name="operation" value="/" class="button function">
                    <input type="submit" name="operation" value="*" class="button function">
                    <input type="submit" name="backspace" class="button function" value="⇦">
                    <input type="submit" name="number" value="7" class="button">
                    <input type="submit" name="number" value="8" class="button">
                    <input type="submit" name="number" value="9" class="button">
                    <input type="submit" name="operation" value="-" class="button function">
                    <input type="submit" name="number" value="4" class="button">
                    <input type="submit" name="number" value="5" class="button">
                    <input type="submit" name="number" value="6" class="button">
                    <input type="submit" name="operation" value="+" class="button function">
                    <input type="submit" name="number" value="1" class="button">
                    <input type="submit" name="number" value="2" class="button">
                    <input type="submit" name="number" value="3" class="button">
                    <input type="submit" name="calculate" class="button function" value="=">
                    <input type="submit" name="number" value="00" class="button">
                    <input type="submit" name="number" value="0" class="button">
                    <input type="submit" name="operation" value="." class="button function">
                </div>
            </form>
        </div>
        <footer>
            <p>Copyright &copy; 2024 Muhamad Fadhly Rafiansyah</p>
        </footer>
    </div>
</body>
</html>

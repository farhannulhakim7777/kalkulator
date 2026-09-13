<?php
/**
 * Farhan Kalkulator
 * Aplikasi kalkulator sederhana dengan validasi lengkap
 */

// Inisialisasi variabel
$result = null;
$error = null;
$num1 = '';
$num2 = '';
$operator = '';

// Fungsi untuk sanitasi input
function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}

// Fungsi untuk validasi angka
function isValidNumber($value) {
    // Hapus spasi
    $value = trim($value);
    
    // Cek jika kosong
    if ($value === '') {
        return false;
    }
    
    // Cek jika merupakan angka valid (termasuk desimal dan negatif)
    return is_numeric($value);
}

// Fungsi untuk memformat hasil yang besar
function formatLargeNumber($number) {
    // Jika hasil terlalu besar, gunakan notasi ilmiah
    if (abs($number) > 1e15) {
        return sprintf('%.6e', $number);
    }
    
    // Jika hasil sangat kecil (dekat dengan 0)
    if (abs($number) < 1e-10 && $number != 0) {
        return sprintf('%.6e', $number);
    }
    
    // Format angka desimal
    if (floor($number) != $number) {
        // Hapus desimal yang tidak perlu
        return rtrim(rtrim(sprintf('%.10f', $number), '0'), '.');
    }
    
    return number_format($number);
}

// Proses form jika method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cek apakah tombol reset ditekan
    if (isset($_POST['reset'])) {
        $num1 = '';
        $num2 = '';
        $operator = '';
        $result = null;
        $error = null;
    } elseif (isset($_POST['calculate'])) {
        // Ambil dan sanitasi input dari hidden fields
        $num1 = isset($_POST['num1']) ? sanitizeInput($_POST['num1']) : '';
        $num2 = isset($_POST['num2']) ? sanitizeInput($_POST['num2']) : '';
        $operator = isset($_POST['operator']) ? sanitizeInput($_POST['operator']) : '';
        
        // Validasi input
        if (!isValidNumber($num1)) {
            $error = 'Angka pertama tidak valid. Masukkan angka yang benar.';
        } elseif (!isValidNumber($num2)) {
            $error = 'Angka kedua tidak valid. Masukkan angka yang benar.';
        } elseif ($operator === '') {
            $error = 'Pilih operator matematika.';
        } else {
            // Konversi ke float
            $n1 = floatval($num1);
            $n2 = floatval($num2);
            
            // Validasi operator yang tersedia
            $validOperators = ['+', '-', '*', '/', '%', '^'];
            if (!in_array($operator, $validOperators)) {
                $error = 'Operator tidak valid.';
            } else {
                // Proses perhitungan berdasarkan operator
                switch ($operator) {
                    case '+':
                        $result = $n1 + $n2;
                        break;
                    case '-':
                        $result = $n1 - $n2;
                        break;
                    case '*':
                        $result = $n1 * $n2;
                        break;
                    case '/':
                        if ($n2 == 0) {
                            $error = 'Tidak dapat membagi dengan angka 0.';
                        } else {
                            $result = $n1 / $n2;
                        }
                        break;
                    case '%':
                        if ($n2 == 0) {
                            $error = 'Tidak dapat menghitung modulus dengan angka 0.';
                        } else {
                            $result = $n1 % $n2;
                        }
                        break;
                    case '^':
                        // Pangkat dengan pow() yang mendukung desimal dan negatif
                        $result = pow($n1, $n2);
                        
                        // Cek jika hasil adalah NaN atau Infinity
                        if (!is_finite($result)) {
                            $error = 'Hasil perhitungan tidak valid (terlalu besar atau kompleks).';
                            $result = null;
                        }
                        break;
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farhan Kalkulator</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1 class="title">Kalkulator</h1>
            <p class="subtitle">Farhan Kalkulator</p>
        </header>

        <main class="calculator">
            <form method="POST" action="" class="calculator-form">
                <!-- Display Layar -->
                <div class="display-screen">
                    <div class="display-expression">
                        <?php if ($num1 !== '' && $operator !== ''): ?>
                            <?php echo htmlspecialchars($num1, ENT_QUOTES, 'UTF-8'); ?> 
                            <?php 
                            $operatorDisplay = $operator;
                            if ($operator === '*') $operatorDisplay = '×';
                            elseif ($operator === '/') $operatorDisplay = '÷';
                            echo htmlspecialchars($operatorDisplay, ENT_QUOTES, 'UTF-8'); 
                            ?>
                        <?php endif; ?>
                    </div>
                    <div class="display-result">
                        <?php 
                        if ($result !== null && $error === null) {
                            echo formatLargeNumber($result);
                        } elseif ($num2 !== '') {
                            echo htmlspecialchars($num2, ENT_QUOTES, 'UTF-8');
                        } elseif ($num1 !== '') {
                            echo htmlspecialchars($num1, ENT_QUOTES, 'UTF-8');
                        } else {
                            echo '0';
                        }
                        ?>
                    </div>
                </div>

                <!-- Input Hidden untuk PHP -->
                <input type="hidden" name="num1" value="<?php echo htmlspecialchars($num1, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="num2" value="<?php echo htmlspecialchars($num2, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="operator" value="<?php echo htmlspecialchars($operator, ENT_QUOTES, 'UTF-8'); ?>">

                <!-- Tombol Grid Kalkulator -->
                <div class="keypad">
                    <!-- Row 1: Clear dan operator -->
                    <button type="submit" name="reset" class="key key-clear">C</button>
                    <button type="button" class="key key-operator" data-operator="^">xʸ</button>
                    <button type="button" class="key key-operator" data-operator="%">%</button>
                    <button type="button" class="key key-operator" data-operator="/">÷</button>

                    <!-- Row 2: 7-9 dan operator -->
                    <button type="button" class="key key-number" data-number="7">7</button>
                    <button type="button" class="key key-number" data-number="8">8</button>
                    <button type="button" class="key key-number" data-number="9">9</button>
                    <button type="button" class="key key-operator" data-operator="*">×</button>

                    <!-- Row 3: 4-6 dan operator -->
                    <button type="button" class="key key-number" data-number="4">4</button>
                    <button type="button" class="key key-number" data-number="5">5</button>
                    <button type="button" class="key key-number" data-number="6">6</button>
                    <button type="button" class="key key-operator" data-operator="-">−</button>

                    <!-- Row 4: 1-3 dan operator -->
                    <button type="button" class="key key-number" data-number="1">1</button>
                    <button type="button" class="key key-number" data-number="2">2</button>
                    <button type="button" class="key key-number" data-number="3">3</button>
                    <button type="button" class="key key-operator" data-operator="+">+</button>

                    <!-- Row 5: 0, decimal, dan equals -->
                    <button type="button" class="key key-number key-zero" data-number="0">0</button>
                    <button type="button" class="key key-number" data-number=".">.</button>
                    <button type="submit" name="calculate" class="key key-equals">=</button>
                </div>

                <!-- Pesan Error -->
                <?php if ($error !== null): ?>
                    <div class="error-message">
                        <span class="error-text"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                <?php endif; ?>
            </form>
        </main>

        <footer class="footer">
            <p>&copy; 2024 Farhan Kalkulator</p>
        </footer>
    </div>
</body>
</html>

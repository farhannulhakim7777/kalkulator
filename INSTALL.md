# Panduan Instalasi Cepat - Farhan Kalkulator

## 📋 File yang Dibuat

Project ini terdiri dari 4 file:

1. **index.php** - File utama (183 baris)
   - Logika PHP untuk perhitungan
   - Validasi dan sanitasi input
   - Display layar kalkulator
   - Grid tombol kalkulator
   - Error handling

2. **style.css** - File styling (382 baris)
   - Desain mobile calculator
   - Dark theme premium
   - Grid tombol 4x4
   - Responsive design
   - Animasi dan micro-interactions
   - Color palette unik

3. **script.js** - File JavaScript (169 baris)
   - State management kalkulator
   - Event listener tombol
   - Keyboard support
   - Update display real-time

4. **README.md** - Dokumentasi lengkap
   - Struktur project
   - Cara menjalankan
   - Checklist pengujian
   - Penjelasan fitur

## 🚀 Cara Menjalankan (3 Pilihan)

### Opsi 1: XAMPP (Paling Mudah)
```
1. Copy folder "calculator" ke C:\xampp\htdocs\
2. Buka XAMPP Control Panel
3. Start Apache
4. Buka browser: http://localhost/calculator/
```

### Opsi 2: Laragon
```
1. Copy folder "calculator" ke C:\laragon\www\
2. Buka Laragon, start Apache
3. Buka browser: http://calculator.test/
```

### Opsi 3: PHP Built-in Server (Tanpa XAMPP/Laragon)
```
1. Buka terminal/CMD
2. cd C:\xampp\htdocs\calculator
3. php -S localhost:8000
4. Buka browser: http://localhost:8000
```

## ✅ Quick Test - Farhan Kalkulator

Buka aplikasi dan test interface mobile calculator:

1. **Test Tombol Angka**: Tekan 1, 2, 3 → display: 123 ✓
2. **Test Operator**: Tekan 1, +, 2, = → hasil: 3 ✓
3. **Test Clear**: Tekan C → display: 0 ✓
4. **Test Keyboard**: Ketik 5+3= dengan keyboard → hasil: 8 ✓
5. **Test Error**: 10 ÷ 0 = Error message ✓
6. **Test Responsive**: Buka di smartphone → layout menyesuaikan ✓

## 🎨 Fitur Desain

- **Mobile Calculator**: Layout seperti kalkulator HP dengan grid tombol
- **Display Screen**: Layar atas menampilkan ekspresi dan hasil
- **Keypad Grid**: 4x4 grid tombol (angka, operator, clear, equals)
- **Dark Theme**: Background #1a1d23 dengan aksen amber #d4a853
- **Responsive**: Berfungsi di desktop, tablet, dan smartphone
- **Micro-interactions**: Hover effects dan smooth transitions
- **Premium Look**: Shadow halus dan typography modern
- **Keyboard Support**: Dapat menggunakan keyboard physical
- **Accessibility**: Focus states dan kontras warna yang baik

## 🔒 Keamanan

✓ Sanitasi input dengan htmlspecialchars()
✓ Validasi numeric dengan is_numeric()
✓ XSS prevention pada semua output
✓ Tidak menggunakan eval()
✓ Error handling tanpa menampilkan error PHP

## 📝 Catatan

- Tidak perlu database
- Tidak perlu JavaScript (logic di PHP)
- Tidak perlu framework atau library eksternal
- PHP 7.4+ atau PHP 8.x
- Berjalan di Apache/Nginx dengan PHP

## 🆘 Troubleshooting

**Halaman blank/putih:**
- Pastikan Apache sudah running
- Cek error log PHP
- Pastikan file index.php ada di folder yang benar

**Style tidak muncul:**
- Pastikan file style.css ada di folder yang sama
- Clear cache browser
- Cek path file CSS

**JavaScript tidak berfungsi:**
- Pastikan file script.js ada di folder yang sama
- Cek console browser untuk error
- Pastikan JavaScript tidak di-disable di browser

**Error saat submit form:**
- Pastikan method form adalah POST
- Cek permission file
- Pastikan PHP version kompatibel

**Tombol tidak responsif:**
- Refresh halaman
- Clear cache browser
- Cek koneksi internet (untuk loading script)

---

**Farhan Kalkulator siap digunakan! Silakan buka browser dan test kalkulator mobile.**

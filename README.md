# Farhan Kalkulator

Aplikasi kalkulator berbasis PHP Native dengan desain seperti kalkulator HP/smartphone dan validasi input yang lengkap.

## 📁 Struktur Project

```
calculator/
├── index.php       # File utama berisi logika PHP dan HTML
├── style.css       # File styling untuk desain mobile calculator
├── script.js       # JavaScript untuk interaksi tombol kalkulator
└── README.md       # Dokumentasi project
```

## 🚀 Cara Menjalankan Project

### Menggunakan XAMPP

1. Pastikan XAMPP sudah terinstall di komputer Anda
2. Copy folder `calculator` ke dalam `C:\xampp\htdocs\`
3. Buka XAMPP Control Panel
4. Start Apache server
5. Buka browser dan akses: `http://localhost/calculator/`

### Menggunakan Laragon

1. Pastikan Laragon sudah terinstall
2. Copy folder `calculator` ke dalam `C:\laragon\www\`
3. Buka Laragon dan start Apache
4. Buka browser dan akses: `http://calculator.test/`

### Menggunakan PHP Built-in Server

1. Buka terminal/command prompt
2. Navigate ke folder project:
   ```bash
   cd C:\xampp\htdocs\calculator
   ```
3. Jalankan PHP built-in server:
   ```bash
   php -S localhost:8000
   ```
4. Buka browser dan akses: `http://localhost:8000`

## ✨ Fitur

### Operasi Matematika
- ✅ Penjumlahan (+)
- ✅ Pengurangan (-)
- ✅ Perkalian (×)
- ✅ Pembagian (÷)
- ✅ Modulus (%)
- ✅ Pangkat (^)

### Validasi & Error Handling
- ✅ Input kosong
- ✅ Input bukan angka
- ✅ Pembagian dengan angka 0
- ✅ Modulus dengan angka 0
- ✅ Angka negatif
- ✅ Angka desimal
- ✅ Pangkat dengan angka negatif dan desimal
- ✅ Hasil yang sangat besar (scientific notation)
- ✅ Sanitasi input untuk mencegah XSS
- ✅ Tidak menggunakan `eval()`

### Desain & UX
- ✅ Desain seperti kalkulator HP/smartphone
- ✅ Dark theme premium dengan aksen amber/gold
- ✅ Grid tombol 4x4 seperti kalkulator HP
- ✅ Display layar seperti kalkulator mobile
- ✅ Responsive design (Desktop, Laptop, Tablet, Smartphone)
- ✅ Micro-interactions pada tombol (hover, active)
- ✅ Animasi halus
- ✅ Typography modern dan mudah dibaca
- ✅ Shadow yang profesional
- ✅ Kontras warna yang baik
- ✅ Keyboard support (0-9, operators, Enter, Escape)
- ✅ Tanpa framework CSS atau library eksternal

## 🧪 Checklist Pengujian

### Operasi Matematika
- [ ] Test penjumlahan: 10 + 5 = 15
- [ ] Test pengurangan: 10 - 5 = 5
- [ ] Test perkalian: 10 × 5 = 50
- [ ] Test pembagian: 10 ÷ 5 = 2
- [ ] Test modulus: 10 % 3 = 1
- [ ] Test pangkat: 2 ^ 3 = 8

### Error Handling
- [ ] Test pembagian dengan 0 → harus muncul error
- [ ] Test modulus dengan 0 → harus muncul error
- [ ] Test input kosong → harus muncul error
- [ ] Test input teks (abc) → harus muncul error
- [ ] Test tanpa memilih operator → harus muncul error

### Angka Khusus
- [ ] Test angka negatif: -10 + 5 = -5
- [ ] Test angka desimal: 10.5 + 2.5 = 13
- [ ] Test pangkat desimal: 4 ^ 0.5 = 2
- [ ] Test pangkat negatif: 2 ^ -2 = 0.25
- [ ] Test angka sangat besar → harus ditampilkan dalam scientific notation

### Keamanan
- [ ] Test input dengan karakter berbahaya `<script>alert('xss')</script>` → harus di-sanitize
- [ ] Pastikan tidak ada warning/notice PHP yang muncul
- [ ] Pastikan tidak menggunakan `eval()`

### UI/UX
- [ ] Test responsive pada desktop (1920x1080)
- [ ] Test responsive pada laptop (1366x768)
- [ ] Test responsive pada tablet (768x1024)
- [ ] Test responsive pada smartphone (375x667)
- [ ] Test tombol reset untuk membersihkan form
- [ ] Test hover effects pada tombol
- [ ] Test focus states untuk accessibility
- [ ] Pastikan tidak ada elemen yang keluar dari layar

### Browser Compatibility
- [ ] Test pada Google Chrome
- [ ] Test pada Mozilla Firefox
- [ ] Test pada Microsoft Edge
- [ ] Test pada Safari (jika tersedia)

## 🎨 Desain

### Layout Mobile Calculator
- **Display Screen**: Layar atas menampilkan ekspresi dan hasil
- **Keypad Grid**: 4x4 grid tombol seperti kalkulator HP
- **Tombol Angka**: 0-9 dan titik desimal
- **Tombol Operator**: +, −, ×, ÷, %, xʸ (pangkat)
- **Tombol Clear**: Tombol C untuk reset
- **Tombol Equals**: Tombol = untuk hitung

### Color Palette
- **Background Primary**: `#1a1d23` (Dark gray)
- **Background Secondary**: `#242830` (Slightly lighter dark)
- **Background Card**: `#2a2e38` (Card background)
- **Accent Primary**: `#d4a853` (Amber/Gold)
- **Accent Hover**: `#e5b963` (Lighter amber)
- **Text Primary**: `#f0f0f0` (Off-white)
- **Text Secondary**: `#a0a0a0` (Gray)
- **Border Color**: `#3a3f4a` (Dark border)
- **Error Background**: `#3d2525` (Dark red)
- **Error Text**: `#ff6b6b` (Light red)
- **Key Background**: `#3a3f4a` (Tombol angka)
- **Operator Background**: `#d4a853` (Tombol operator)
- **Clear Background**: `#ff6b6b` (Tombol clear)

### Typography
- **Font Family**: Segoe UI, Tahoma, Geneva, Verdana, sans-serif
- **Monospace Font**: Segoe UI Mono, Courier New (untuk angka)
- **Font Sizes**: 0.75rem - 2.5rem

### Spacing
- Extra Small: 0.5rem
- Small: 0.75rem
- Medium: 1rem
- Large: 1.5rem
- Extra Large: 2rem

## 🔒 Keamanan

### Implementasi Keamanan
1. **Sanitasi Input**: Menggunakan `htmlspecialchars()` dengan ENT_QUOTES
2. **Validasi Input**: Mengecek apakah input adalah angka valid dengan `is_numeric()`
3. **XSS Prevention**: Semua output di-escape sebelum ditampilkan
4. **No eval()**: Tidak menggunakan fungsi `eval()` untuk perhitungan
5. **Type Safety**: Menggunakan `floatval()` untuk konversi yang aman
6. **Error Handling**: Menangani error dengan pesan yang jelas tanpa menampilkan error PHP

## 📝 Teknologi

- **Backend**: PHP Native (tanpa framework) - Farhan Kalkulator
- **Frontend**: HTML5, CSS3
- **JavaScript**: Vanilla JS untuk interaksi tombol kalkulator
- **Styling**: CSS murni (tanpa framework CSS)
- **Server**: XAMPP/Laragon/PHP Built-in Server

## 🛠️ File-file yang Dibuat

### 1. `index.php`
File utama yang berisi:
- Logika PHP untuk perhitungan matematika
- Validasi input dan sanitasi
- Display layar kalkulator
- Grid tombol kalkulator
- Hidden fields untuk komunikasi dengan JavaScript
- Error handling
- Display hasil perhitungan

### 2. `style.css`
File styling yang berisi:
- CSS Variables untuk color palette
- Layout mobile calculator dengan grid
- Display screen styling
- Keypad grid 4x4
- Responsive design dengan media queries
- Animasi dan transitions
- Dark theme styling
- Micro-interactions pada tombol

### 3. `script.js`
File JavaScript yang berisi:
- State management kalkulator
- Event listener untuk tombol angka
- Event listener untuk tombol operator
- Logika equals untuk submit ke PHP
- Keyboard support (0-9, operators, Enter, Escape)
- Update display secara real-time

### 4. `README.md`
Dokumentasi project ini.

## 💡 Cara Penggunaan

### Interface Mobile Calculator
1. Ketik angka pertama menggunakan tombol angka (0-9)
2. Pilih operator matematika (+, −, ×, ÷, %, xʸ)
3. Ketik angka kedua
4. Tekan tombol "=" untuk menghitung
5. Hasil akan ditampilkan di layar
6. Tekan tombol "C" untuk mereset

### Keyboard Support
- **Angka**: 0-9
- **Operator**: +, -, *, /, %, ^
- **Desimal**: .
- **Hitung**: Enter atau =
- **Reset**: Escape atau C

## 🎯 Keunggulan

1. **Tanpa Framework**: Murni PHP Native, mudah dipahami pemula - Farhan Kalkulator
2. **Mobile Calculator Design**: Layout seperti kalkulator HP/smartphone
3. **Aman**: Validasi dan sanitasi input yang lengkap
4. **Premium Design**: Dark theme dengan aksen amber yang elegan
5. **Responsive**: Berfungsi baik di semua ukuran layar
6. **Error Handling**: Menangani semua edge case dengan baik
7. **Clean Code**: Kode terstruktur dan mudah dipahami
8. **No Dependencies**: Tidak memerlukan library eksternal
9. **Keyboard Support**: Dapat menggunakan keyboard physical
10. **Real-time Display**: Update display saat mengetik

## 📌 Catatan Penting

- Project ini tidak memerlukan database
- Perhitungan dilakukan di sisi server (PHP) untuk validasi
- JavaScript digunakan untuk interaksi UI dan state management
- Desain dibuat seperti kalkulator HP/smartphone
- Color palette dipilih agar tidak pasaran dan tetap harmonis
- Keyboard support untuk pengguna desktop

## 🤝 Contributing

Project ini dibuat untuk tujuan pembelajaran. Silakan modifikasi sesuai kebutuhan.

## 📄 License

Free to use for educational purposes.

---

**Dibuat dengan PHP Native murni tanpa framework apapun - Farhan Kalkulator.**
#   k a l k u l a t o r  
 
# 📦 เช็คเลขพัสดุ - ระบบติดตามพัสดุจากหลายค่ายขนส่ง

[![PHP](https://img.shields.io/badge/PHP-7.4+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![GitHub stars](https://img.shields.io/github/stars/yourusername/package-tracker.svg)](https://github.com/yourusername/package-tracker/stargazers)

ระบบเช็คเลขพัสดุจากหลายค่ายขนส่งในประเทศไทย โดยใช้ TrackingMore API สามารถเช็คสถานะพัสดุได้จากหลายค่ายในที่เดียว

## ✨ Features

- 🔍 เช็คเลขพัสดุจากหลายค่ายขนส่ง
- 📱 Responsive Design รองรับมือถือ
- 🎨 UI สวยงาม ใช้งานง่าย
- 📊 แสดงไทม์ไลน์สถานะพัสดุ
- 🌐 รองรับภาษาไทย
- ⚡ ใช้งานง่าย ติดตั้งเร็ว

## รองรับค่ายขนส่ง

- ไปรษณีย์ไทย (Thailand Post)
- Kerry Express
- Flash Express
- J&T Express
- และค่ายขนส่งอื่นๆ ผ่าน TrackingMore API

## Requirements

- PHP 7.4 หรือสูงกว่า
- cURL extension
- TrackingMore API Key (ฟรี)

## Installation

### 1. Clone Repository
```bash
git clone https://github.com/yourusername/package-tracker.git
cd package-tracker
```

### 2. ขอ API Key
1. เข้าเว็บไซต์ [https://www.trackingmore.com/](https://www.trackingmore.com/)
2. คลิก **Sign Up** และสมัครสมาชิก
3. ล็อกอินเข้าไป แล้วไปที่เมนู **API**
4. คัดลอก **API Key** ที่ได้

### 3. ตั้งค่า API Key
เปิดไฟล์ `config.php` และแก้ไข:
```php
$TRACKINGMORE_API_KEY = 'your_actual_api_key_here';
```

### 4. รันโปรเจกต์

**วิธีที่ 1: ใช้ XAMPP/WAMP**
1. วางไฟล์ในโฟลเดอร์ `htdocs` (XAMPP) หรือ `www` (WAMP)
2. เปิด Apache ใน XAMPP/WAMP
3. เข้าใช้งานที่ `http://localhost/package-tracker/index.php`

**วิธีที่ 2: ใช้ PHP Built-in Server**
```bash
php -S localhost:8000
```
แล้วเข้าใช้งานที่ `http://localhost:8000/index.php`

## 📁 โครงสร้างไฟล์

```
package-tracker/
├── index.php          # หน้าเว็บสำหรับกรอกเลขพัสดุ
├── track.php          # ประมวลผลและแสดงผลลัพธ์
├── config.php         # ตั้งค่า API Key
├── README.md          # คู่มือการใช้งาน
└── .gitignore         # ไฟล์ที่ไม่ต้องการอัปโหลด
```

## วิธีใช้งาน

1. เปิดเว็บไซต์ที่ `index.php`
2. กรอกเลขพัสดุ
3. เลือกค่ายขนส่ง
4. กดปุ่ม "เช็คสถานะ"
5. ดูผลลัพธ์สถานะและไทม์ไลน์

## ตัวอย่างเลขพัสดุ

- **ไปรษณีย์ไทย**: `EX123456789TH`, `ED123456789TH`
- **Kerry**: `KRY123456789`
- **Flash**: `FL123456789`
- **J&T**: `JT123456789`

## 🔧 การปรับแต่ง

### เพิ่มค่ายขนส่งใหม่
1. เพิ่ม option ใน `index.php`:
```html
<option value="carrier-code">ชื่อค่ายขนส่ง</option>
```

2. ดูรายชื่อ carrier code ได้ที่ [TrackingMore Carriers](https://www.trackingmore.com/carriers.html)

## Contributing

1. Fork โปรเจกต์
2. สร้าง Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit การเปลี่ยนแปลง (`git commit -m 'Add some AmazingFeature'`)
4. Push ไปยัง Branch (`git push origin feature/AmazingFeature`)
5. เปิด Pull Request

## License

โปรเจกต์นี้อยู่ภายใต้ MIT License - ดูรายละเอียดใน [LICENSE](LICENSE) file

##  Acknowledgments

- [TrackingMore](https://www.trackingmore.com/) สำหรับ API ที่ยอดเยี่ยม
- [Google Fonts](https://fonts.google.com/) สำหรับฟอนต์ Sarabun

## 📞 Support

หากมีปัญหาหรือข้อสงสัย:
- เปิด Issue ใน GitHub
- ติดต่อ TrackingMore Support สำหรับปัญหา API

---

⭐ หากโปรเจกต์นี้มีประโยชน์ กรุณาให้ดาวด้วยครับ! 
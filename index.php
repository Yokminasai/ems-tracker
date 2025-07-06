<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เช็คเลขพัสดุ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', Arial, sans-serif; background: #f8f8f8; margin: 0; }
        .container { max-width: 400px; margin: 60px auto; background: #fff; padding: 32px 24px; border-radius: 10px; box-shadow: 0 2px 12px #e0e0e0; }
        h2 { text-align: center; margin-bottom: 28px; font-weight: 700; }
        label { margin-bottom: 8px; display: block; font-weight: 600; }
        input, select { width: 100%; padding: 10px; margin-bottom: 18px; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem; }
        button { width: 100%; padding: 12px; background: #007bff; color: #fff; border: none; border-radius: 5px; font-size: 1.1rem; font-weight: 700; cursor: pointer; transition: background 0.2s; }
        button:hover { background: #0056b3; }
        @media (max-width: 500px) {
            .container { padding: 18px 6px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>เช็คเลขพัสดุ</h2>
        <form action="track.php" method="post">
            <label for="tracking_number">เลขพัสดุ</label>
            <input type="text" id="tracking_number" name="tracking_number" required autofocus>

            <label for="carrier_code">เลือกค่ายขนส่ง</label>
            <select id="carrier_code" name="carrier_code" required>
                <option value="thailand-post">ไปรษณีย์ไทย</option>
                <option value="kerry">Kerry Express</option>
                <option value="flash">Flash Express</option>
                <option value="jtexpress">J&T Express</option>
                <!-- เพิ่มค่ายอื่น ๆ ได้ตามต้องการ -->
            </select>

            <button type="submit">เช็คสถานะ</button>
        </form>
    </div>
</body>
</html> 
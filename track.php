<?php
require_once 'config.php';

function track_trackingmore($carrier_code, $tracking_number, $api_key, $api_url) {
    $url = "$api_url/$carrier_code/$tracking_number";
    $headers = [
        "Content-Type: application/json",
        "Trackingmore-Api-Key: $api_key"
    ];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true);
}

$tracking_number = isset($_POST['tracking_number']) ? trim($_POST['tracking_number']) : '';
$carrier_code = isset($_POST['carrier_code']) ? $_POST['carrier_code'] : '';

$result = null;
$error = '';
if ($tracking_number && $carrier_code) {
    $result = track_trackingmore($carrier_code, $tracking_number, $TRACKINGMORE_API_KEY, $TRACKINGMORE_API_URL);
    if (!$result || !isset($result['data']['items'][0])) {
        $error = 'ไม่พบข้อมูลพัสดุ หรือเลขพัสดุไม่ถูกต้อง';
    }
} else {
    $error = 'กรุณากรอกข้อมูลให้ครบถ้วน';
}

// UI
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ผลการเช็คเลขพัสดุ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', Arial, sans-serif; background: #f8f8f8; margin: 0; }
        .container { max-width: 500px; margin: 60px auto; background: #fff; padding: 32px 24px; border-radius: 10px; box-shadow: 0 2px 12px #e0e0e0; }
        h2 { text-align: center; margin-bottom: 24px; font-weight: 700; }
        .status { font-size: 1.1rem; margin-bottom: 18px; color: #007bff; font-weight: 700; }
        .timeline { border-left: 3px solid #007bff; margin: 20px 0 0 18px; padding-left: 18px; }
        .event { margin-bottom: 18px; position: relative; }
        .event:before { content: ''; position: absolute; left: -27px; top: 2px; width: 12px; height: 12px; background: #007bff; border-radius: 50%; }
        .event-date { font-size: 0.95rem; color: #888; margin-bottom: 2px; }
        .event-desc { font-size: 1.05rem; color: #222; }
        .back-link { display: block; margin-top: 32px; text-align: center; color: #007bff; text-decoration: none; font-weight: 600; }
        .back-link:hover { text-decoration: underline; }
        .error { color: #c00; text-align: center; font-weight: 700; margin: 24px 0; }
        @media (max-width: 600px) {
            .container { padding: 16px 4px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ผลการเช็คเลขพัสดุ</h2>
        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php else:
            $item = $result['data']['items'][0];
            $latest = isset($item['lastEvent']) ? $item['lastEvent'] : (isset($item['origin_info']['trackinfo'][0]) ? $item['origin_info']['trackinfo'][0] : null);
        ?>
            <div class="status">
                สถานะล่าสุด: <?php echo isset($latest['StatusDescription']) ? htmlspecialchars($latest['StatusDescription']) : '-'; ?>
            </div>
            <div><b>เลขพัสดุ:</b> <?php echo htmlspecialchars($tracking_number); ?></div>
            <div><b>ค่ายขนส่ง:</b> <?php echo htmlspecialchars($carrier_code); ?></div>
            <div class="timeline">
                <?php
                if (isset($item['origin_info']['trackinfo']) && is_array($item['origin_info']['trackinfo']) && count($item['origin_info']['trackinfo']) > 0) {
                    foreach ($item['origin_info']['trackinfo'] as $event) {
                        echo '<div class="event">';
                        echo '<div class="event-date">' . htmlspecialchars($event['Date']) . '</div>';
                        echo '<div class="event-desc">' . htmlspecialchars($event['StatusDescription']) . '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div>ไม่พบไทม์ไลน์สถานะพัสดุ</div>';
                }
                ?>
            </div>
        <?php endif; ?>
        <a class="back-link" href="index.php">&larr; กลับไปเช็คเลขใหม่</a>
    </div>
</body>
</html> 
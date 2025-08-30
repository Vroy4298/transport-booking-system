<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Your Booking Confirmation</title>
</head>
<body style="font-family:system-ui, sans-serif; background:#f9fafb; padding:20px">
  <table width="100%" style="max-width:600px;margin:auto;background:#fff;padding:20px;border-radius:8px;border:1px solid #e5e7eb">
    <tr>
      <td>
        <h2 style="color:#111827;margin-bottom:16px;">🎉 Thank You for Booking!</h2>
        <p style="color:#374151;">Hello <strong>{{ $booking->name }}</strong>,</p>
        <p style="color:#374151;">
          We’ve received your booking with <strong>Speed On Transport</strong>. Here are your booking details:
        </p>

        <table style="width:100%;margin-top:12px;border-collapse:collapse">
          <tr>
            <td style="padding:6px;border-bottom:1px solid #eee"><strong>Pickup:</strong></td>
            <td style="padding:6px;border-bottom:1px solid #eee">{{ $booking->pickup_location }}</td>
          </tr>
          <tr>
            <td style="padding:6px;border-bottom:1px solid #eee"><strong>Drop-off:</strong></td>
            <td style="padding:6px;border-bottom:1px solid #eee">{{ $booking->dropoff_location }}</td>
          </tr>
          <tr>
            <td style="padding:6px;border-bottom:1px solid #eee"><strong>Date & Time:</strong></td>
            <td style="padding:6px;border-bottom:1px solid #eee">{{ $booking->pickup_date }} at {{ $booking->pickup_time }}</td>
          </tr>
        </table>

        <p style="margin-top:20px;color:#374151;">
          We’ll contact you shortly to confirm. For urgent assistance, reply to this email or call us.
        </p>

        <p style="margin-top:20px;color:#111827;font-weight:600;">
          🚖 Speed On Transport
        </p>
      </td>
    </tr>
  </table>
</body>
</html>

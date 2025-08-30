<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>New Booking Received</title>
</head>
<body style="font-family:system-ui, sans-serif; background:#f9fafb; padding:20px">
  <table width="100%" style="max-width:600px;margin:auto;background:#fff;padding:20px;border-radius:8px;border:1px solid #e5e7eb">
    <tr>
      <td>
        <h2 style="color:#111827;margin-bottom:16px;">🚖 New Booking Alert</h2>
        <p style="color:#374151;">A new booking has been submitted:</p>

        <table style="width:100%;margin-top:12px;border-collapse:collapse">
          <tr>
            <td style="padding:6px;border-bottom:1px solid #eee"><strong>Name:</strong></td>
            <td style="padding:6px;border-bottom:1px solid #eee">{{ $booking->name }}</td>
          </tr>
          <tr>
            <td style="padding:6px;border-bottom:1px solid #eee"><strong>Email:</strong></td>
            <td style="padding:6px;border-bottom:1px solid #eee">{{ $booking->email }}</td>
          </tr>
          <tr>
            <td style="padding:6px;border-bottom:1px solid #eee"><strong>Phone:</strong></td>
            <td style="padding:6px;border-bottom:1px solid #eee">{{ $booking->phone }}</td>
          </tr>
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
          @if($booking->vehicle_type)
          <tr>
            <td style="padding:6px;border-bottom:1px solid #eee"><strong>Vehicle:</strong></td>
            <td style="padding:6px;border-bottom:1px solid #eee">{{ $booking->vehicle_type }}</td>
          </tr>
          @endif
          @if($booking->notes)
          <tr>
            <td style="padding:6px;border-bottom:1px solid #eee"><strong>Notes:</strong></td>
            <td style="padding:6px;border-bottom:1px solid #eee">{{ $booking->notes }}</td>
          </tr>
          @endif
        </table>

        <p style="margin-top:20px;color:#374151;">
          ✅ You can manage this booking in the <a href="{{ url('/admin/bookings') }}" style="color:#2563eb;">Admin Dashboard</a>.
        </p>
      </td>
    </tr>
  </table>
</body>
</html>

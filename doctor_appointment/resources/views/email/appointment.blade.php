<h3>Dear {{ $mailData['name'] }}</h3>
<p>Thank you for booking appointment at our medical center.</p>
<p>Details of your appointment:</p>
<p>Doctor: {{ $mailData['doctorName'] }}</p>
<p>Date & Time: {{ $mailData['date'] }}, {{ $mailData['time'] }}</p>
<p>Address: West St. 11</p>
<p>Phone: 111-222-3333</p>
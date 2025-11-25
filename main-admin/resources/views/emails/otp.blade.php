<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .otp-box {
            background-color: #f4f4f4;
            border: 2px dashed #333;
            padding: 20px;
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 5px;
            margin: 20px 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Company Registration - OTP Verification</h2>
        <p>Thank you for registering with our job portal.</p>
        <p>Your One-Time Password (OTP) for verification is:</p>

        <div class="otp-box">
            {{ $otp }}
        </div>

        <p>This OTP is valid for 10 minutes.</p>
        <p>If you didn't request this OTP, please ignore this email.</p>

        <div class="footer">
            <p>This is an automated email. Please do not reply.</p>
        </div>
    </div>
</body>
</html>

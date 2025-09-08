<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset PIN</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin:0; padding:20px;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center">
                <table role="presentation" cellpadding="0" cellspacing="0" width="600" style="background:#ffffff; border-radius:8px; overflow:hidden;">
                    <tr>
                        <td style="background:#ff7f50; padding:20px; text-align:center;">
                            <h1 style="margin:0; color:#ffffff;">WANTUNAN ni POMPOM</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:30px; color:#333333;">
                            <h2 style="margin-top:0; color:#ff7f50;">Password Reset Request</h2>
                            <p>Hello,</p>
                            <p>We received a request to reset your password. Please use the following PIN to continue:</p>

                            <div style="margin:20px 0; text-align:center;">
                                <span style="display:inline-block; background:#ff7f50; color:#fff; font-size:24px; font-weight:bold; padding:10px 20px; border-radius:6px; letter-spacing:3px;">
                                    {{ $pin }}
                                </span>
                            </div>

                            <p>This PIN will expire in <strong>10 minutes</strong>. If you didn’t request this, you can safely ignore this email.</p>

                            <p style="margin-top:30px;">Thanks,<br>WANTUNAN ni POMPOM Team</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px; color:#666;">
                            &copy; {{ date('Y') }} WANTUNAN ni POMPOM. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
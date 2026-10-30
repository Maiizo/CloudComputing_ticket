<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TWICE Concert E-Ticket Confirmation</title>
</head>
<body style="margin: 0; padding: 0; background-color: #ffffffff; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #FFFFFF; -webkit-font-smoothing: antialiased;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #0B0B14; padding: 30px 15px;">
        <tr>
            <td align="center">
                <!-- Main Container -->
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #17152B; border-radius: 24px; overflow: hidden; border: 1px solid #FF5FA2; box-shadow: 0 10px 40px rgba(255, 95, 162, 0.25);">
                    
                    <!-- Header Banner -->
                    <tr>
                        <td align="center" style="background: linear-gradient(135deg, #FF5FA2 0%, #FCC89B 100%); padding: 35px 25px; text-align: center;">
                            <div style="display: inline-block; background-color: rgba(0, 0, 0, 0.3); padding: 5px 15px; border-radius: 20px; font-size: 11px; font-weight: bold; letter-spacing: 2px; text-transform: uppercase; color: #FFFFFF; margin-bottom: 10px;">
                                ★ OFFICIAL ADMISSION PASS ★
                            </div>
                            <h1 style="margin: 0; font-size: 28px; font-weight: 800; letter-spacing: 1px; color: #FFFFFF; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">
                                TWICE 5<sup>TH</sup> WORLD TOUR
                            </h1>
                            <div style="font-size: 20px; font-weight: 800; letter-spacing: 3px; color: #FFFFFF; margin-top: 5px;">
                                ‘READY TO BE’
                            </div>
                            <div style="font-size: 12px; font-weight: 600; letter-spacing: 1.5px; color: #17152B; text-transform: uppercase; margin-top: 6px;">
                                JAKARTA INTERNATIONAL STADIUM (JIS)
                            </div>
                        </td>
                    </tr>

                    <!-- Congratulatory Intro -->
                    <tr>
                        <td style="padding: 30px 30px 10px 30px; text-align: left;">
                            <h2 style="margin: 0 0 10px 0; font-size: 20px; color: #FCC89B; font-weight: bold;">
                                Hello, {{ $ticket->name }}! 💕
                            </h2>
                         
                        </td>
                    </tr>

                    <!-- Booking Reference Badge -->
                    <tr>
                        <td style="padding: 15px 30px;">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #0B0B14; border: 1px solid rgba(255, 95, 162, 0.4); border-radius: 16px; padding: 15px;">
                                <tr>
                                    <td>
                                        <div style="font-size: 11px; text-transform: uppercase; color: #9CA3AF; letter-spacing: 1px; font-weight: bold;">
                                            BOOKING REFERENCE
                                        </div>
                                        <div style="font-size: 18px; font-family: monospace; font-weight: bold; color: #FF5FA2; margin-top: 3px;">
                                            {{ $ticket->booking_reference }}
                                        </div>
                                    </td>
                                    <td align="right">
                                        <div style="font-size: 11px; text-transform: uppercase; color: #9CA3AF; letter-spacing: 1px; font-weight: bold;">
                                            STATUS
                                        </div>
                                        <div style="display: inline-block; background-color: rgba(16, 185, 129, 0.2); border: 1px solid #10B981; color: #10B981; font-size: 11px; font-weight: bold; padding: 4px 10px; border-radius: 8px; margin-top: 3px;">
                                            CONFIRMED
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Ticket Information Details Card -->
                    <tr>
                        <td style="padding: 10px 30px 25px 30px;">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #1F1C38; border-radius: 16px; padding: 20px;">
                                <tr>
                                    <td style="padding-bottom: 12px; border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                                        <span style="font-size: 11px; text-transform: uppercase; color: #9CA3AF; font-weight: bold;">EVENT DATE &amp; TIME</span><br>
                                        <strong style="font-size: 14px; color: #FFFFFF;">Saturday, December 23, 2026 • 19:00 WIB</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                                        <span style="font-size: 11px; text-transform: uppercase; color: #9CA3AF; font-weight: bold;">TICKET TIER</span><br>
                                        <strong style="font-size: 15px; color: #FCC89B;">{{ $ticket->tier_label }}</strong>
                                        <span style="font-size: 12px; color: #D1D5DB;">({{ $ticket->quantity }} Ticket{{ $ticket->quantity > 1 ? 's' : '' }})</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td width="33%">
                                                    <span style="font-size: 10px; text-transform: uppercase; color: #9CA3AF; font-weight: bold;">GATE</span><br>
                                                    <strong style="font-size: 13px; color: #FFFFFF;">{{ $ticket->gate }}</strong>
                                                </td>
                                                <td width="33%">
                                                    <span style="font-size: 10px; text-transform: uppercase; color: #9CA3AF; font-weight: bold;">SECTION</span><br>
                                                    <strong style="font-size: 13px; color: #FFFFFF;">{{ $ticket->section }}</strong>
                                                </td>
                                                <td width="33%">
                                                    <span style="font-size: 10px; text-transform: uppercase; color: #9CA3AF; font-weight: bold;">SEAT(S)</span><br>
                                                    <strong style="font-size: 13px; color: #FF5FA2;">{{ $ticket->seats }}</strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 0; border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
                                        <span style="font-size: 11px; text-transform: uppercase; color: #9CA3AF; font-weight: bold;">ONCE FANCLUB ID</span><br>
                                        <strong style="font-size: 13px; font-family: monospace; color: #FFFFFF;">{{ $ticket->once_id }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 12px;">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td>
                                                    <span style="font-size: 11px; text-transform: uppercase; color: #9CA3AF; font-weight: bold;">TOTAL PAID</span><br>
                                                    <strong style="font-size: 16px; color: #10B981;">
                                                        {{ $ticket->currency }} {{ number_format($ticket->total_price, 0, ',', '.') }}
                                                    </strong>
                                                </td>
                                                <td align="right">
                                                    <span style="font-size: 11px; text-transform: uppercase; color: #9CA3AF; font-weight: bold;">PAYMENT</span><br>
                                                    <span style="font-size: 12px; color: #D1D5DB;">{{ $ticket->payment_method }}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Barcode / Electronic Pass Notice -->
                    <tr>
                        <td align="center" style="padding: 10px 30px 25px 30px;">
                            <div style="background-color: #0B0B14; border: 1px dashed rgba(255, 255, 255, 0.2); border-radius: 12px; padding: 20px; text-align: center;">
                        
                                <div style="font-size: 11px; font-family: monospace; color: #9CA3AF; margin-top: 6px;">
                                    *{{ $ticket->booking_reference }}*
                                </div>
                                <p style="margin: 12px 0 0 0; font-size: 12px; color: #D1D5DB; line-height: 1.5;">
                                    📱 <strong>Fast Entry Tip:</strong> Please have this digital ticket ready with your smartphone screen brightness at maximum when arriving at turnstile scanners.
                                </p>
                            </div>
                        </td>
                    </tr>

              

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background-color: #0B0B14; border-top: 1px solid rgba(255, 255, 255, 0.08); padding: 25px 20px; text-align: center;">
                            <p style="margin: 0 0 8px 0; font-size: 11px; color: #9CA3AF;">
                                © 2026 JYP Entertainment &amp; Live Nation Entertainment. All Rights Reserved.
                            </p>
                            <p style="margin: 0; font-size: 10px; color: #6B7280;">
                                This is an automated email confirmation from the TWICE World Tour Ticketing Engine.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>


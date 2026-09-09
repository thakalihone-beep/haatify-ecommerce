<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Approval</title>
</head>

<body style="
    margin: 0;
    padding: 0;
    background-color: #f4f6f8;
    font-family: Arial, Helvetica, sans-serif;
    color: #1f2937;
">

<table width="100%" cellpadding="0" cellspacing="0" border="0"
       style="background-color: #f4f6f8; padding: 40px 15px;">

```
<tr>
    <td align="center">

        <!-- Main Email Container -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0"
               style="
                    max-width: 650px;
                    background-color: #ffffff;
                    border-radius: 12px;
                    overflow: hidden;
                    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
               ">

            <!-- ================================================= -->
            <!-- HEADER -->
            <!-- ================================================= -->

            <tr>
                <td style="
                    background-color: #111827;
                    padding: 30px 35px;
                    text-align: center;
                ">

                    <h1 style="
                        margin: 0;
                        color: #ffffff;
                        font-size: 28px;
                        font-weight: 700;
                    ">
                        Haatify
                    </h1>

                    <p style="
                        margin: 8px 0 0;
                        color: #d1d5db;
                        font-size: 14px;
                    ">
                        Vendor Management System
                    </p>

                </td>
            </tr>


            <!-- ================================================= -->
            <!-- TITLE -->
            <!-- ================================================= -->

            <tr>
                <td style="padding: 35px 35px 20px;">

                    <h2 style="
                        margin: 0 0 12px;
                        color: #111827;
                        font-size: 24px;
                    ">
                        Your Vendor Application Has Been Approved 🎉
                    </h2>

                    <p style="
                        margin: 0;
                        color: #6b7280;
                        font-size: 15px;
                        line-height: 1.7;
                    ">
                        Hello {{ $vendor->name }},
                    </p>

                    <p style="
                        margin: 12px 0 0;
                        color: #6b7280;
                        font-size: 15px;
                        line-height: 1.7;
                    ">
                        Congratulations! Your application to become a vendor
                        on <strong>Haatify</strong> has been reviewed and
                        approved by our administration team.
                    </p>

                </td>
            </tr>


            <!-- ================================================= -->
            <!-- APPROVED STATUS -->
            <!-- ================================================= -->

            <tr>
                <td style="padding: 0 35px 25px;">

                    <table width="100%" cellpadding="0" cellspacing="0"
                           border="0"
                           style="
                                background-color: #f0fdf4;
                                border: 1px solid #bbf7d0;
                                border-radius: 8px;
                           ">

                        <tr>
                            <td style="padding: 18px;">

                                <p style="
                                    margin: 0 0 5px;
                                    font-size: 12px;
                                    color: #166534;
                                    font-weight: 600;
                                    text-transform: uppercase;
                                    letter-spacing: 0.5px;
                                ">
                                    Application Status
                                </p>

                                <p style="
                                    margin: 0;
                                    font-size: 20px;
                                    color: #15803d;
                                    font-weight: 700;
                                ">
                                    ✓ Approved
                                </p>

                            </td>
                        </tr>

                    </table>

                </td>
            </tr>


            <!-- ================================================= -->
            <!-- YOUR SUBMITTED INFORMATION -->
            <!-- ================================================= -->

            <tr>
                <td style="padding: 0 35px 30px;">

                    <h3 style="
                        margin: 0 0 15px;
                        font-size: 18px;
                        color: #111827;
                    ">
                        Your Submitted Information
                    </h3>

                    <p style="
                        margin: 0 0 15px;
                        font-size: 14px;
                        line-height: 1.6;
                        color: #6b7280;
                    ">
                        The following information was submitted with your
                        vendor application.
                    </p>


                    <table width="100%" cellpadding="0" cellspacing="0"
                           border="0"
                           style="
                                border: 1px solid #e5e7eb;
                                border-radius: 8px;
                                overflow: hidden;
                           ">

                        <!-- Owner Name -->
                        <tr>

                            <td style="
                                padding: 13px 15px;
                                width: 40%;
                                background-color: #f9fafb;
                                border-bottom: 1px solid #e5e7eb;
                                font-size: 14px;
                                font-weight: 600;
                                color: #374151;
                            ">
                                Owner Name
                            </td>

                            <td style="
                                padding: 13px 15px;
                                border-bottom: 1px solid #e5e7eb;
                                font-size: 14px;
                                color: #111827;
                            ">
                                {{ $vendor->name }}
                            </td>

                        </tr>


                        <!-- Shop Name -->
                        <tr>

                            <td style="
                                padding: 13px 15px;
                                background-color: #f9fafb;
                                border-bottom: 1px solid #e5e7eb;
                                font-size: 14px;
                                font-weight: 600;
                                color: #374151;
                            ">
                                Shop Name
                            </td>

                            <td style="
                                padding: 13px 15px;
                                border-bottom: 1px solid #e5e7eb;
                                font-size: 14px;
                                color: #111827;
                            ">
                                {{ $vendor->shop_name ?: 'Not provided' }}
                            </td>

                        </tr>


                        <!-- Email -->
                        <tr>

                            <td style="
                                padding: 13px 15px;
                                background-color: #f9fafb;
                                border-bottom: 1px solid #e5e7eb;
                                font-size: 14px;
                                font-weight: 600;
                                color: #374151;
                            ">
                                Email
                            </td>

                            <td style="
                                padding: 13px 15px;
                                border-bottom: 1px solid #e5e7eb;
                                font-size: 14px;
                                color: #111827;
                            ">
                                {{ $vendor->email }}
                            </td>

                        </tr>


                        <!-- Phone -->
                        <tr>

                            <td style="
                                padding: 13px 15px;
                                background-color: #f9fafb;
                                border-bottom: 1px solid #e5e7eb;
                                font-size: 14px;
                                font-weight: 600;
                                color: #374151;
                            ">
                                Phone
                            </td>

                            <td style="
                                padding: 13px 15px;
                                border-bottom: 1px solid #e5e7eb;
                                font-size: 14px;
                                color: #111827;
                            ">
                                {{ $vendor->phone ?: 'Not provided' }}
                            </td>

                        </tr>


                        <!-- PAN -->
                        <tr>

                            <td style="
                                padding: 13px 15px;
                                background-color: #f9fafb;
                                border-bottom: 1px solid #e5e7eb;
                                font-size: 14px;
                                font-weight: 600;
                                color: #374151;
                            ">
                                PAN Number
                            </td>

                            <td style="
                                padding: 13px 15px;
                                border-bottom: 1px solid #e5e7eb;
                                font-size: 14px;
                                color: #111827;
                            ">
                                {{ $vendor->pan_no ?: 'Not provided' }}
                            </td>

                        </tr>


                        <!-- Address -->
                        <tr>

                            <td style="
                                padding: 13px 15px;
                                background-color: #f9fafb;
                                font-size: 14px;
                                font-weight: 600;
                                color: #374151;
                                vertical-align: top;
                            ">
                                Address
                            </td>

                            <td style="
                                padding: 13px 15px;
                                font-size: 14px;
                                line-height: 1.6;
                                color: #111827;
                            ">
                                {{ $vendor->address ?: 'Not provided' }}
                            </td>

                        </tr>

                    </table>

                </td>
            </tr>


            <!-- ================================================= -->
            <!-- APPLICATION DETAILS -->
            <!-- ================================================= -->

            <tr>
                <td style="padding: 0 35px 30px;">

                    <h3 style="
                        margin: 0 0 15px;
                        font-size: 18px;
                        color: #111827;
                    ">
                        Application Details
                    </h3>


                    <table width="100%" cellpadding="0" cellspacing="0"
                           border="0">

                        <tr>


                            <td width="10"></td>


                            <!-- Submitted Date -->
                            <td width="50%" style="
                                padding: 15px;
                                background-color: #f9fafb;
                                border-radius: 8px;
                            ">

                                <p style="
                                    margin: 0 0 5px;
                                    font-size: 12px;
                                    color: #6b7280;
                                    text-transform: uppercase;
                                ">
                                    Submitted
                                </p>

                                <p style="
                                    margin: 0;
                                    font-size: 16px;
                                    font-weight: 700;
                                    color: #111827;
                                ">
                                    {{ $vendor->created_at->format('M d, Y') }}
                                </p>

                            </td>

                        </tr>

                    </table>

                </td>
            </tr>


            <!-- ================================================= -->
            <!-- LOGIN CREDENTIALS -->
            <!-- ================================================= -->

            <tr>
                <td style="padding: 0 35px 30px;">

                    <h3 style="
                        margin: 0 0 15px;
                        font-size: 18px;
                        color: #111827;
                    ">
                        Your Vendor Login Credentials
                    </h3>


                    <table width="100%" cellpadding="0" cellspacing="0"
                           border="0"
                           style="
                                background-color: #f9fafb;
                                border: 1px solid #e5e7eb;
                                border-radius: 8px;
                           ">

                        <tr>
                            <td style="padding: 20px;">

                                <!-- Email -->
                                <p style="
                                    margin: 0 0 6px;
                                    font-size: 13px;
                                    color: #6b7280;
                                    font-weight: 600;
                                ">
                                    LOGIN EMAIL
                                </p>

                                <p style="
                                    margin: 0 0 20px;
                                    font-size: 16px;
                                    color: #111827;
                                    font-weight: 600;
                                ">
                                    {{ $vendor->email }}
                                </p>


                                <!-- Password -->
                                <p style="
                                    margin: 0 0 6px;
                                    font-size: 13px;
                                    color: #6b7280;
                                    font-weight: 600;
                                ">
                                    TEMPORARY PASSWORD
                                </p>

                                <p style="
                                    margin: 0;
                                    display: inline-block;
                                    padding: 9px 14px;
                                    background-color: #e5e7eb;
                                    border-radius: 6px;
                                    font-family: monospace;
                                    font-size: 16px;
                                    color: #111827;
                                    font-weight: 700;
                                ">
                                    {{ $password }}
                                </p>

                            </td>
                        </tr>

                    </table>

                </td>
            </tr>


            <!-- ================================================= -->
            <!-- LOGIN BUTTON -->
            <!-- ================================================= -->

            <tr>
                <td align="center" style="padding: 0 35px 30px;">

                    <a href="{{ url('/vendor') }}"
                       style="
                            display: inline-block;
                            padding: 14px 30px;
                            background-color: #111827;
                            color: #ffffff;
                            text-decoration: none;
                            font-size: 14px;
                            font-weight: 700;
                            border-radius: 7px;
                       ">
                        Login to Your Vendor Account
                    </a>

                </td>
            </tr>


            <!-- ================================================= -->
            <!-- SECURITY NOTICE -->
            <!-- ================================================= -->

            <tr>
                <td style="padding: 0 35px 30px;">

                    <table width="100%" cellpadding="0" cellspacing="0"
                           border="0"
                           style="
                                background-color: #fff7ed;
                                border: 1px solid #fed7aa;
                                border-radius: 8px;
                           ">

                        <tr>

                            <td style="padding: 18px;">

                                <p style="
                                    margin: 0 0 6px;
                                    font-size: 14px;
                                    font-weight: 700;
                                    color: #9a3412;
                                ">
                                    🔐 Important Security Notice
                                </p>

                                <p style="
                                    margin: 0;
                                    font-size: 14px;
                                    line-height: 1.7;
                                    color: #9a3412;
                                ">
                                    This is your temporary password.
                                    Please change your password after
                                    your first login and never share your
                                    login credentials with anyone.
                                </p>

                            </td>

                        </tr>

                    </table>

                </td>
            </tr>


            <!-- ================================================= -->
            <!-- FINAL MESSAGE -->
            <!-- ================================================= -->

            <tr>
                <td style="padding: 0 35px 35px;">

                    <p style="
                        margin: 0;
                        color: #4b5563;
                        font-size: 15px;
                        line-height: 1.7;
                    ">
                        Thank you for joining Haatify. We are excited to
                        have you as one of our valued vendors and look
                        forward to seeing your products on our marketplace.
                    </p>

                    <p style="
                        margin: 25px 0 0;
                        color: #111827;
                        font-size: 15px;
                        line-height: 1.6;
                    ">
                        Best regards,<br>
                        <strong>Haatify Team</strong>
                    </p>

                </td>
            </tr>


            <!-- ================================================= -->
            <!-- FOOTER -->
            <!-- ================================================= -->

            <tr>
                <td style="
                    background-color: #f9fafb;
                    border-top: 1px solid #e5e7eb;
                    padding: 25px 35px;
                    text-align: center;
                ">

                    <p style="
                        margin: 0 0 8px;
                        font-size: 13px;
                        font-weight: 600;
                        color: #374151;
                    ">
                        Haatify Vendor Management
                    </p>

                    <p style="
                        margin: 0;
                        font-size: 12px;
                        line-height: 1.6;
                        color: #9ca3af;
                    ">
                        This is an automated notification.
                        Please do not reply directly to this email.
                    </p>

                    <p style="
                        margin: 12px 0 0;
                        font-size: 12px;
                        color: #9ca3af;
                    ">
                        &copy; {{ date('Y') }} Haatify.
                        All rights reserved.
                    </p>

                </td>
            </tr>

        </table>

    </td>
</tr>
```

</table>

</body>
</html>

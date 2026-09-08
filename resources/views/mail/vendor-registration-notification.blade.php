<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Vendor Registration</title>
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
                        padding: 28px 35px;
                        text-align: center;
                    ">

                        <h1 style="
                            margin: 0;
                            color: #ffffff;
                            font-size: 26px;
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
                            margin: 0 0 10px;
                            font-size: 24px;
                            color: #111827;
                        ">
                            New Vendor Application
                        </h2>

                        <p style="
                            margin: 0;
                            font-size: 15px;
                            line-height: 1.7;
                            color: #6b7280;
                        ">
                            A new vendor has submitted an application
                            to join Haatify. Please review the application
                            and approve or reject it from the admin panel.
                        </p>

                    </td>
                </tr>


                <!-- ================================================= -->
                <!-- STATUS -->
                <!-- ================================================= -->

                <tr>
                    <td style="padding: 0 35px 25px;">

                        <table width="100%" cellpadding="0" cellspacing="0"
                               border="0"
                               style="
                                    background-color: #fff7ed;
                                    border: 1px solid #fed7aa;
                                    border-radius: 8px;
                               ">

                            <tr>
                                <td style="padding: 16px 18px;">

                                    <p style="
                                        margin: 0;
                                        font-size: 13px;
                                        color: #9a3412;
                                        font-weight: 600;
                                        text-transform: uppercase;
                                        letter-spacing: 0.5px;
                                    ">
                                        Application Status
                                    </p>

                                    <p style="
                                        margin: 5px 0 0;
                                        font-size: 18px;
                                        color: #c2410c;
                                        font-weight: 700;
                                    ">
                                        Pending Review
                                    </p>

                                </td>
                            </tr>

                        </table>

                    </td>
                </tr>


                <!-- ================================================= -->
                <!-- VENDOR INFORMATION -->
                <!-- ================================================= -->

                <tr>
                    <td style="padding: 0 35px 30px;">

                        <h3 style="
                            margin: 0 0 15px;
                            font-size: 18px;
                            color: #111827;
                        ">
                            Vendor Information
                        </h3>


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
                                    {{ $vendor->phone }}
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
                                    {{ $vendor->pan_no }}
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

                                <!-- Application ID -->
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
                                        Application ID
                                    </p>

                                    <p style="
                                        margin: 0;
                                        font-size: 16px;
                                        font-weight: 700;
                                        color: #111827;
                                    ">
                                        #{{ $vendor->id }}
                                    </p>

                                </td>


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
                <!-- ACTION MESSAGE -->
                <!-- ================================================= -->

                <tr>
                    <td style="padding: 0 35px 25px;">

                        <table width="100%" cellpadding="0" cellspacing="0"
                               border="0"
                               style="
                                    background-color: #f3f4f6;
                                    border-radius: 8px;
                               ">

                            <tr>
                                <td style="padding: 18px;">

                                    <p style="
                                        margin: 0;
                                        font-size: 14px;
                                        line-height: 1.7;
                                        color: #4b5563;
                                    ">
                                        <strong style="color: #111827;">
                                            Action required:
                                        </strong>

                                        Please review this vendor application
                                        in the Haatify admin panel. You can
                                        approve, reject, or further review
                                        the vendor from there.
                                    </p>

                                </td>
                            </tr>

                        </table>

                    </td>
                </tr>


                <!-- ================================================= -->
                <!-- REVIEW BUTTON -->
                <!-- ================================================= -->

                <tr>
                    <td align="center" style="padding: 0 35px 35px;">

                        <a href="{{ url('admin/vendors/' . $vendor->id . '/edit') }}"
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
                            Review Vendor Application
                        </a>

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

</table>

</body>
</html>

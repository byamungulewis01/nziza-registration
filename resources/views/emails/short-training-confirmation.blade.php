@component('mail::message')
@php
    $date = new DateTime($customer->date);
    $monthName = $date->format('F');
@endphp
Dear {{ $customer->name }},

We are pleased to confirm your registration for the **{{ $customer->training_name }}** with **{{ $customer->software }}** scheduled to take place in **{{ $monthName }}**. Your enrollment in this program is now secured, and we are excited to have you join us.

You will need to deposit your training payment before **{{ $customer->endOfRegistration }}** to confirm your seat. Here are the payment details:

- **Bank Name:** CRDB BANK
- **Bank Account:** 0150848381300
- **Account name:** Nziza Global Ltd
- **Branch name:** Kijitonyama
- **Currency:** Tanzania Shillings

Should you have any questions or need further assistance, please do not hesitate to contact us at +255752303123 or email at [info@nzizaglobal.co.tz](mailto:info@nzizaglobal.co.tz) or visit our office on the second floor of DERM PLAZA, Makumbusho. We are here to support you and ensure you have a productive and enjoyable training experience.

Thank you for choosing Nziza Global (Tanzania) for your professional development and international certifications. We look forward to welcoming you to the training program.

Best regards,

Nziza Global Ltd
Tanzania Team
@endcomponent


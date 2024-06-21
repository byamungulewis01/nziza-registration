@component('mail::message')
# New Registration

A detals information of the customer :

- **Name:** {{ $customer->name }}
- **Email:** {{ $customer->email }}
- **Phone:** {{ $customer->phone }}
- **Company:** {{ $customer->company ?? 'Not provided' }}
- **Attendance:** {{ $customer->attendence_type }}
- **Location:** {{ $customer->location }}
- **Professional:** {{ $customer->professional }}

@endcomponent

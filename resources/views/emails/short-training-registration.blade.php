@component('mail::message')
# New Registration

Training requested details: :

- **Training name:** {{ $customer->traning_name }}
- **Avenue:** {{ $customer->venue }}
- **Starting Date:** {{ $customer->date }}

A detals information of the customer :

- **Name:** {{ $customer->name }}
- **Email:** {{ $customer->email }}
- **Phone:** {{ $customer->phone }}
- **Company:** {{ $customer->company ?? 'Not provided' }}
- **Attendance:** {{ $customer->attendence_type }}
- **College:** {{ $customer->college }}
- **Location:** {{ $customer->location ?? 'Not provided' }}

@endcomponent

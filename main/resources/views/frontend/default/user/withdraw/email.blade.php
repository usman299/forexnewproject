@component('mail::message')


   Dear {{ auth()->user()->username2 }},

    A withdrawal request has been initiated from your account.
    
    Please verify this transaction using the OTP below:
    
    OTP: {{ $data['randomNumber'] }}
    
    If you did not request this withdrawal, contact support immediately.
    
    Thanks,  


@endcomponent



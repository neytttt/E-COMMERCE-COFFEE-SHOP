@extends('frontend.layouts.master')

@section('title', 'GCash Payment - Grace & Ground')

@section('content')
<div class="section">
    <div class="container">
        <div class="section-header">
            <span>Payment</span>
            <h1>GCash Payment</h1>
            <p>Complete your payment via GCash</p>
        </div>
        
        <div style="max-width: 500px; margin: 0 auto;">
            <div style="background: var(--dark-card); border: 1px solid var(--dark-border); border-radius: 12px; padding: 40px; text-align: center;">
                <div style="width: 100px; height: 100px; background: #0056DD; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#fff" viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z"/></svg>
                </div>
                
                <h2 style="margin-bottom: 10px; color: var(--white);">{{ $order->order_number }}</h2>
                <p style="font-size: 32px; font-weight: 700; color: var(--royal-gold); margin-bottom: 30px;">₱{{ number_format($order->total, 2) }}</p>
                
                <div style="background: var(--white); padding: 20px; margin-bottom: 30px; border-radius: 12px; display: inline-block;">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=GCASH+091512525030+Grace+and+Ground+{{ $order->total }}" alt="GCash QR Code" style="width: 200px; height: 200px;">
                </div>
                
                <div style="background: var(--dark-surface); border-radius: 8px; padding: 20px; margin-bottom: 20px; text-align: left;">
                    <p style="color: var(--white-muted); margin-bottom: 10px; font-size: 14px;"><strong style="color: var(--white);">GCash Number:</strong></p>
                    <p style="color: var(--royal-gold); font-size: 20px; font-weight: 600;">0915 125 25030</p>
                </div>
                
                <div style="background: var(--dark-surface); border-radius: 8px; padding: 20px; margin-bottom: 30px; text-align: left;">
                    <p style="color: var(--white-muted); margin-bottom: 5px; font-size: 14px;"><strong style="color: var(--white);">Instructions:</strong></p>
                    <ol style="color: var(--white-muted); font-size: 14px; padding-left: 20px; line-height: 1.8;">
                        <li>Open GCash app</li>
                        <li>Tap "Scan QR" or "Send Money"</li>
                        <li>Scan the QR code above</li>
                        <li>Confirm payment of ₱{{ number_format($order->total, 2) }}</li>
                        <li>Wait for confirmation</li>
                    </ol>
                </div>
                
                <form action="{{ route('payment.gcash.webhook') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <button type="submit" class="btn btn-primary" style="width: 100%; background: var(--royal-gold); color: var(--dark-bg); border: none; padding: 16px; font-size: 16px; font-weight: 600; cursor: pointer; border-radius: 8px;">
                        I've Paid - Confirm Payment
                    </button>
                </form>
                
                <div style="margin: 20px 0; padding: 15px; border-top: 1px solid var(--dark-border);">
                    <p style="color: var(--white-muted); font-size: 14px; margin-bottom: 15px;">Or pay via Cash on Delivery:</p>
                    <form action="{{ route('checkout.gcash.cod', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" style="width: 100%; background: transparent; border: 1px solid var(--dark-border); color: var(--white); padding: 14px; font-size: 14px; cursor: pointer; border-radius: 8px;">
                            Pay with Cash on Delivery
                        </button>
                    </form>
                </div>
                
                <div style="margin-top: 30px;">
                    <a href="{{ route('checkout.index') }}" style="color: var(--white-muted);">← Back to Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
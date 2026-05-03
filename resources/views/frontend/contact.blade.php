@extends('frontend.layouts.master')

@section('title', 'Contact Us - Grace & Ground')

@section('content')
<div class="section">
    <div class="container">
        <div class="section-header">
            <span>Contact</span>
            <h1>Get in Touch</h1>
            <p>We'd love to hear from you</p>
        </div>

        @if(session('success'))
        <div style="background: #22c55e; color: white; padding: 16px 24px; border-radius: 10px; margin-bottom: 30px; text-align: center; font-weight: 600;">
            {{ session('success') }}
        </div>
        @endif
        
        <div style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 40px; max-width: 1000px; margin: 0 auto;">
            <div style="background: var(--dark-card); border: 1px solid var(--dark-border); padding: 35px; border-radius: 16px;">
                <h3 style="margin-bottom: 30px; color: var(--white); font-size: 22px;">Contact Info</h3>
                
                <div style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid var(--dark-border);">
                    <p style="color: var(--royal-gold); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">Email</p>
                    <p style="color: var(--white); font-size: 16px;">granceandground2026@gmail.com</p>
                </div>
                
                <div style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid var(--dark-border);">
                    <p style="color: var(--royal-gold); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">Phone</p>
                    <p style="color: var(--white); font-size: 16px;">+639511525030</p>
                </div>
                
                <div style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid var(--dark-border);">
                    <p style="color: var(--royal-gold); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">Address</p>
                    <p style="color: var(--white); font-size: 16px;">San Isidro, Concepcion, Tarlac</p>
                </div>
                
                <div>
                    <p style="color: var(--royal-gold); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">Business Hours</p>
                    <p style="color: var(--white); font-size: 16px;">Monday - Sunday<br>5:00 PM - 12:00 AM</p>
                </div>
            </div>
            
            <div style="background: var(--dark-card); border: 1px solid var(--dark-border); padding: 35px; border-radius: 16px;">
                <h3 style="margin-bottom: 30px; color: var(--white); font-size: 22px;">Send a Message</h3>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; color: var(--white-muted); font-size: 14px;">Name</label>
                        <input type="text" name="name" placeholder="Your name" style="background: var(--dark-surface); border: 1px solid var(--dark-border); color: var(--white); padding: 14px 18px; width: 100%; font-size: 15px; border-radius: 8px;">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; color: var(--white-muted); font-size: 14px;">Email</label>
                        <input type="email" name="email" placeholder="your@email.com" style="background: var(--dark-surface); border: 1px solid var(--dark-border); color: var(--white); padding: 14px 18px; width: 100%; font-size: 15px; border-radius: 8px;">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px; color: var(--white-muted); font-size: 14px;">Message</label>
                        <textarea name="message" rows="5" placeholder="Your message" style="background: var(--dark-surface); border: 1px solid var(--dark-border); color: var(--white); padding: 14px 18px; width: 100%; font-size: 15px; border-radius: 8px; resize: vertical;"></textarea>
                    </div>
                    <button type="submit" style="width: 100%; background: var(--royal-gold); color: var(--dark-bg); border: none; padding: 16px; font-size: 15px; font-weight: 600; border-radius: 8px; cursor: pointer;">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
@media (max-width: 768px) {
    [style*="grid-template-columns: 1fr 1"] {
        grid-template-columns: 1fr !important;
    }
}
</style>
@endsection
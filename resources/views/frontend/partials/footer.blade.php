<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <h4>Grace & Ground</h4>
                <p style="color: #999; font-size: 14px; line-height: 1.8;">
                    Premium coffee crafted with passion. Experience the finest blends from around the world.
                </p>
            </div>
            
            <div>
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('products.index') }}">Shop</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            
            <div>
                <h4>Customer Service</h4>
                <ul>
                    <li><a href="{{ route('orders.index') }}">My Orders</a></li>
                    <li><a href="#">Shipping Info</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            
            <div>
                <h4>Contact Us</h4>
                <ul>
                    <li style="color: #999; font-size: 14px;">granceandground2026@gmail.com</li>
                    <li style="color: #999; font-size: 14px;">+639511525030</li>
                    <li style="color: #999; font-size: 14px;">San Isidro, Concepcion, Tarlac</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Grace & Ground Coffee Shop. All rights reserved.</p>
        </div>
    </div>
</footer>
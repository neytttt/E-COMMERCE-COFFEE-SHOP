@extends('admin.layouts.master')

@section('title', 'Add Product - Admin')

@section('page-title', 'Add Product')

@section('content')
<div class="page-content">
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="form">
        @csrf
        
        <div class="form-grid">
            <div class="form-section">
                <h3 class="section-title">Basic Information</h3>
                
                <div class="form-group">
                    <label class="form-label">Product Name *</label>
                    <input type="text" name="name" class="form-input" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Category *</label>
                    <select name="category_id" class="form-input" required>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Price *</label>
                        <input type="number" name="price" step="0.01" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Original Price</label>
                        <input type="number" name="original_price" step="0.01" class="form-input">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Cost Price</label>
                        <input type="number" name="cost_price" step="0.01" class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">SKU</label>
                        <input type="text" name="sku" class="form-input">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-input" rows="2"></textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description *</label>
                    <textarea name="description" class="form-input" rows="5" required></textarea>
                </div>
            </div>
            
            <div class="form-section">
                <h3 class="section-title">Product Details</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Roast Level</label>
                        <select name="roast_level" class="form-input">
                            <option value="">Select</option>
                            <option value="light">Light</option>
                            <option value="medium">Medium</option>
                            <option value="medium-dark">Medium-Dark</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Origin</label>
                        <input type="text" name="origin" class="form-input">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Region</label>
                        <input type="text" name="region" class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Weight</label>
                        <input type="text" name="weight" class="form-input" placeholder="e.g., 250g">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Flavor Notes</label>
                    <input type="text" name="flavor_notes" class="form-input">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Altitude</label>
                    <input type="text" name="altitude" class="form-input">
                </div>
                
                <h3 class="section-title mt-4">Inventory</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Stock Quantity *</label>
                        <input type="number" name="stock_quantity" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Low Stock Threshold</label>
                        <input type="number" name="low_stock_threshold" class="form-input" value="5">
                    </div>
                </div>
                
                <h3 class="section-title mt-4">Image</h3>
                
                <div class="form-group">
                    <label class="form-label">Product Image *</label>
                    <input type="file" name="image" class="form-input" accept="image/*" required>
                </div>
                
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="is_featured" value="1"> Featured Product
                    </label>
                </div>
                
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="is_active" value="1" checked> Active
                    </label>
                </div>
            </div>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Create Product</button>
        </div>
    </form>
</div>

<style>
.page-content {
    padding: 2rem;
}
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}
.form-section {
    background: var(--admin-bg-card);
    border: 1px solid var(--admin-border);
    border-radius: 8px;
    padding: 1.5rem;
}
.section-title {
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid var(--admin-border);
}
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}
.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
    margin-top: 1.5rem;
}
.checkbox-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
}
</style>
@endsection
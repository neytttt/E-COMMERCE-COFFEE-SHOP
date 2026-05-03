@extends('admin.layouts.master')

@section('title', 'Edit Product - Admin')

@section('page-title', 'Edit Product')

@section('content')
<div class="page-content">
    <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data" class="form">
        @csrf
        @method('PUT')
        
        <div class="form-grid">
            <div class="form-section">
                <h3 class="section-title">Basic Information</h3>
                
                <div class="form-group">
                    <label class="form-label">Product Name *</label>
                    <input type="text" name="name" class="form-input" value="{{ $product->name }}" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Category *</label>
                    <select name="category_id" class="form-input" required>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Price *</label>
                        <input type="number" name="price" step="0.01" class="form-input" value="{{ $product->price }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Original Price</label>
                        <input type="number" name="original_price" step="0.01" class="form-input" value="{{ $product->original_price }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-input" rows="2">{{ $product->short_description }}</textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Description *</label>
                    <textarea name="description" class="form-input" rows="5" required>{{ $product->description }}</textarea>
                </div>
            </div>
            
            <div class="form-section">
                <h3 class="section-title">Product Details</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Roast Level</label>
                        <select name="roast_level" class="form-input">
                            <option value="">Select</option>
                            <option value="light" {{ $product->roast_level == 'light' ? 'selected' : '' }}>Light</option>
                            <option value="medium" {{ $product->roast_level == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="medium-dark" {{ $product->roast_level == 'medium-dark' ? 'selected' : '' }}>Medium-Dark</option>
                            <option value="dark" {{ $product->roast_level == 'dark' ? 'selected' : '' }}>Dark</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Origin</label>
                        <input type="text" name="origin" class="form-input" value="{{ $product->origin }}">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Region</label>
                        <input type="text" name="region" class="form-input" value="{{ $product->region }}">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Weight</label>
                        <input type="text" name="weight" class="form-input" value="{{ $product->weight }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Flavor Notes</label>
                    <input type="text" name="flavor_notes" class="form-input" value="{{ $product->flavor_notes }}">
                </div>
                
                <h3 class="section-title mt-4">Inventory</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Stock Quantity *</label>
                        <input type="number" name="stock_quantity" class="form-input" value="{{ $product->stock_quantity }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Low Stock Threshold</label>
                        <input type="number" name="low_stock_threshold" class="form-input" value="{{ $product->low_stock_threshold }}">
                    </div>
                </div>
                
                <h3 class="section-title mt-4">Image</h3>
                
                <div class="form-group">
                    <label class="form-label">Product Image</label>
                    @if($product->image)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 200px; border-radius: 8px;">
                    </div>
                    @endif
                    <input type="file" name="image" class="form-input" accept="image/*">
                </div>
                
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }}> Featured Product
                    </label>
                </div>
                
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="is_active" value="1" {{ $product->is_active ? 'checked' : '' }}> Active
                    </label>
                </div>
            </div>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
    </form>
</div>

<style>
.page-content { padding: 2rem; }
.form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }
.form-section { background: var(--admin-bg-card); border: 1px solid var(--admin-border); border-radius: 8px; padding: 1.5rem; }
.section-title { margin-bottom: 1rem; padding-bottom: 0.5rem; border-bottom: 1px solid var(--admin-border); }
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
.form-actions { display: flex; gap: 1rem; justify-content: flex-end; margin-top: 1.5rem; }
.checkbox-label { display: flex; align-items: center; gap: 0.5rem; cursor: pointer; }
.mt-4 { margin-top: 1.5rem; }
</style>
@endsection
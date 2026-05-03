@extends('admin.layouts.master')

@section('title', 'Add Category - Admin')

@section('page-title', 'Add Category')

@section('content')
<div class="page-content">
    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" class="form">
        @csrf
        
        <div class="form-section">
            <div class="form-group">
                <label class="form-label">Category Name *</label>
                <input type="text" name="name" class="form-input" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Type *</label>
                <select name="type" class="form-input" required>
                    <option value="coffee">Coffee</option>
                    <option value="merchandise">Merchandise</option>
                    <option value="bundle">Bundle</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-input" rows="3"></textarea>
            </div>
            
            <div class="form-group">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-input" accept="image/*">
            </div>
            
            <div class="form-group">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-input" value="0">
            </div>
            
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="is_active" value="1" checked> Active
                </label>
            </div>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </div>
    </form>
</div>

<style>
.page-content {
    padding: 2rem;
}
.form-section {
    background: var(--admin-bg-card);
    border: 1px solid var(--admin-border);
    border-radius: 8px;
    padding: 1.5rem;
    max-width: 600px;
}
.form-actions {
    display: flex;
    gap: 1rem;
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
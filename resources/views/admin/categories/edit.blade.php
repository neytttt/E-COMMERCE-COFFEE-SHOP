@extends('admin.layouts.master')

@section('title', 'Edit Category - Admin')

@section('page-title', 'Edit Category')

@section('content')
<div class="page-content">
    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data" class="form">
        @csrf
        @method('PATCH')
        
        <div class="form-section">
            <div class="form-group">
                <label class="form-label">Category Name *</label>
                <input type="text" name="name" class="form-input" value="{{ old('name', $category->name) }}" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Type *</label>
                <select name="type" class="form-input" required>
                    <option value="coffee" {{ $category->type === 'coffee' ? 'selected' : '' }}>Coffee</option>
                    <option value="merchandise" {{ $category->type === 'merchandise' ? 'selected' : '' }}>Merchandise</option>
                    <option value="bundle" {{ $category->type === 'bundle' ? 'selected' : '' }}>Bundle</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-input" rows="3">{{ old('description', $category->description) }}</textarea>
            </div>
            
            <div class="form-group">
                <label class="form-label">Image</label>
                @if($category->image)
                <div class="current-image">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="preview-image">
                </div>
                @endif
                <input type="file" name="image" class="form-input" accept="image/*">
            </div>
            
            <div class="form-group">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-input" value="{{ old('sort_order', $category->sort_order ?? 0) }}">
            </div>
            
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="is_active" value="1" {{ $category->is_active ? 'checked' : '' }}> Active
                </label>
            </div>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Category</button>
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
.current-image {
    margin-bottom: 1rem;
}
.preview-image {
    max-width: 200px;
    border-radius: 4px;
}
</style>
@endsection
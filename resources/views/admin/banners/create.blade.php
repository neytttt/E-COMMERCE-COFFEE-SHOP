@extends('admin.layouts.master')

@section('title', 'Add Banner - Admin')

@section('page-title', 'Add Banner')

@section('content')
<div class="page-content">
    <form method="POST" action="{{ route('admin.banners.store') }}" enctype="multipart/form-data" class="form">
        @csrf
        
        <div class="form-section">
            <div class="form-group">
                <label class="form-label">Title *</label>
                <input type="text" name="title" class="form-input" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Subtitle</label>
                <textarea name="subtitle" class="form-input" rows="2"></textarea>
            </div>
            
            <div class="form-group">
                <label class="form-label">Position *</label>
                <select name="position" class="form-input" required>
                    <option value="hero">Hero</option>
                    <option value="banner">Banner</option>
                    <option value="featured">Featured</option>
                    <option value="popup">Popup</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Image *</label>
                <input type="file" name="image" class="form-input" accept="image/*" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Link URL</label>
                <input type="url" name="link" class="form-input" placeholder="https://">
            </div>
            
            <div class="form-group">
                <label class="form-label">Button Text</label>
                <input type="text" name="button_text" class="form-input" placeholder="Shop Now">
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
            <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Create Banner</button>
        </div>
    </form>
</div>

<style>
.page-content { padding: 2rem; }
.form-section { background: var(--admin-bg-card); border: 1px solid var(--admin-border); border-radius: 8px; padding: 1.5rem; max-width: 600px; }
.form-actions { display: flex; gap: 1rem; margin-top: 1.5rem; }
.checkbox-label { display: flex; align-items: center; gap: 0.5rem; cursor: pointer; }
</style>
@endsection
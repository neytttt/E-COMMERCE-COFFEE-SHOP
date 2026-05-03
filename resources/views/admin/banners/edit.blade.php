@extends('admin.layouts.master')

@section('title', 'Edit Banner - Admin')

@section('page-title', 'Edit Banner')

@section('content')
<div class="page-content">
    <form method="POST" action="{{ route('admin.banners.update', $banner->id) }}" enctype="multipart/form-data" class="form">
        @csrf
        @method('PATCH')
        
        <div class="form-section">
            <div class="form-group">
                <label class="form-label">Title *</label>
                <input type="text" name="title" class="form-input" value="{{ old('title', $banner->title) }}" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Subtitle</label>
                <textarea name="subtitle" class="form-input" rows="2">{{ old('subtitle', $banner->subtitle) }}</textarea>
            </div>
            
            <div class="form-group">
                <label class="form-label">Position *</label>
                <select name="position" class="form-input" required>
                    <option value="hero" {{ $banner->position === 'hero' ? 'selected' : '' }}>Hero</option>
                    <option value="banner" {{ $banner->position === 'banner' ? 'selected' : '' }}>Banner</option>
                    <option value="featured" {{ $banner->position === 'featured' ? 'selected' : '' }}>Featured</option>
                    <option value="popup" {{ $banner->position === 'popup' ? 'selected' : '' }}>Popup</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Image</label>
                @if($banner->image)
                <div class="current-image">
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="preview-image">
                </div>
                @endif
                <input type="file" name="image" class="form-input" accept="image/*">
            </div>
            
            <div class="form-group">
                <label class="form-label">Link URL</label>
                <input type="url" name="link" class="form-input" placeholder="https://" value="{{ old('link', $banner->link) }}">
            </div>
            
            <div class="form-group">
                <label class="form-label">Button Text</label>
                <input type="text" name="button_text" class="form-input" placeholder="Shop Now" value="{{ old('button_text', $banner->button_text) }}">
            </div>
            
            <div class="form-group">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-input" value="{{ old('sort_order', $banner->sort_order ?? 0) }}">
            </div>
            
            <div class="form-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="is_active" value="1" {{ $banner->is_active ? 'checked' : '' }}> Active
                </label>
            </div>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Banner</button>
        </div>
    </form>
</div>

<style>
.page-content { padding: 2rem; }
.form-section { background: var(--admin-bg-card); border: 1px solid var(--admin-border); border-radius: 8px; padding: 1.5rem; max-width: 600px; }
.form-actions { display: flex; gap: 1rem; margin-top: 1.5rem; }
.checkbox-label { display: flex; align-items: center; gap: 0.5rem; cursor: pointer; }
.current-image { margin-bottom: 1rem; }
.preview-image { max-width: 200px; border-radius: 4px; }
</style>
@endsection
@extends('admin.layouts.master')

@section('title', 'Message Details - Grace & Ground')

@section('content')
<div style="padding: 30px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <a href="{{ route('admin.contacts.index') }}" style="color: var(--admin-primary); text-decoration: none;">← Back to Messages</a>
            <h2 style="margin: 10px 0 0; color: var(--admin-text-primary);">Message from {{ $contact->name }}</h2>
        </div>
        <div style="display: flex; gap: 10px;">
            <form action="{{ route('admin.contacts.markRead', $contact->id) }}" method="POST">
                @csrf
                <button type="submit" style="background: var(--admin-warning); color: var(--admin-bg-primary); border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer;">Mark Unread</button>
            </form>
            <a href="mailto:{{ $contact->email }}" style="background: var(--admin-primary); color: var(--admin-bg-primary); padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600;">Reply</a>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
        <div style="background: var(--admin-bg-card); border-radius: 10px; padding: 25px; border: 1px solid var(--admin-border);">
            <h4 style="margin-bottom: 20px; color: var(--admin-text-primary);">Contact Info</h4>
            <p style="color: var(--admin-text-secondary); margin-bottom: 10px;"><strong style="color: var(--admin-text-primary);">Name:</strong> {{ $contact->name }}</p>
            <p style="color: var(--admin-text-secondary); margin-bottom: 10px;"><strong style="color: var(--admin-text-primary);">Email:</strong> {{ $contact->email }}</p>
            <p style="color: var(--admin-text-secondary); margin-bottom: 10px;"><strong style="color: var(--admin-text-primary);">Date:</strong> {{ $contact->created_at->format('M j, Y g:i A') }}</p>
            <p style="color: var(--admin-text-secondary); margin-bottom: 10px;"><strong style="color: var(--admin-text-primary);">Status:</strong> 
                <span style="padding: 5px 10px; border-radius: 15px; font-size: 12px; font-weight: 600; {{ $contact->is_read ? 'background: var(--admin-success); color: white;' : 'background: var(--admin-warning); color: var(--admin-bg-primary);' }}">
                    {{ $contact->is_read ? 'Read' : 'New' }}
                </span>
            </p>
        </div>

        <div style="background: var(--admin-bg-card); border-radius: 10px; padding: 25px; border: 1px solid var(--admin-border);">
            <h4 style="margin-bottom: 20px; color: var(--admin-text-primary);">Message</h4>
            <p style="color: var(--admin-text-secondary); line-height: 1.8; white-space: pre-wrap;">{{ $contact->message }}</p>
        </div>
    </div>

    <div style="margin-top: 30px; text-align: right;">
        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" style="background: var(--admin-error); color: white; border: none; padding: 12px 24px; border-radius: 6px; cursor: pointer;" onclick="return confirm('Delete this message?')">Delete Message</button>
        </form>
    </div>
</div>
@endsection
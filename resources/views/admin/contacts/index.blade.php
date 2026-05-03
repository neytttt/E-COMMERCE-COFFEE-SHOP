@extends('admin.layouts.master')

@section('title', 'Messages - Grace & Ground')

@section('content')
<div style="padding: 30px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h2 style="margin: 0; color: var(--admin-text-primary);">Messages</h2>
            <p style="margin: 5px 0 0; color: var(--admin-text-secondary);">Customer inquiries</p>
        </div>
        <div>
            <a href="{{ route('admin.contacts.index', ['unread' => 1]) }}" style="background: var(--admin-primary); color: var(--admin-bg-primary); padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600;">Unread Only</a>
        </div>
    </div>

    <div style="background: var(--admin-bg-card); border-radius: 10px; border: 1px solid var(--admin-border); overflow: hidden;">
        <table style="width: 100%;">
            <thead>
                <tr style="border-bottom: 1px solid var(--admin-border);">
                    <th style="text-align: left; padding: 15px 20px; color: var(--admin-text-secondary); font-weight: 500;">Name</th>
                    <th style="text-align: left; padding: 15px 20px; color: var(--admin-text-secondary); font-weight: 500;">Email</th>
                    <th style="text-align: left; padding: 15px 20px; color: var(--admin-text-secondary); font-weight: 500;">Message</th>
                    <th style="text-align: left; padding: 15px 20px; color: var(--admin-text-secondary); font-weight: 500;">Date</th>
                    <th style="text-align: left; padding: 15px 20px; color: var(--admin-text-secondary); font-weight: 500;">Status</th>
                    <th style="text-align: left; padding: 15px 20px; color: var(--admin-text-secondary); font-weight: 500;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr style="border-bottom: 1px solid var(--admin-border);">
                    <td style="padding: 15px 20px; color: var(--admin-text-primary);">{{ $contact->name }}</td>
                    <td style="padding: 15px 20px; color: var(--admin-text-secondary);">{{ $contact->email }}</td>
                    <td style="padding: 15px 20px; color: var(--admin-text-secondary); max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $contact->message }}</td>
                    <td style="padding: 15px 20px; color: var(--admin-text-secondary);">{{ $contact->created_at->format('M j, Y') }}</td>
                    <td style="padding: 15px 20px;">
                        <span style="padding: 5px 10px; border-radius: 15px; font-size: 12px; font-weight: 600; {{ $contact->is_read ? 'background: var(--admin-success); color: white;' : 'background: var(--admin-warning); color: var(--admin-bg-primary);' }}">
                            {{ $contact->is_read ? 'Read' : 'New' }}
                        </span>
                    </td>
                    <td style="padding: 15px 20px;">
                        <a href="{{ route('admin.contacts.show', $contact->id) }}" style="color: var(--admin-primary); text-decoration: none; margin-right: 10px;">View</a>
                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: var(--admin-error); cursor: pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $contacts->links() }}
    </div>
</div>
@endsection
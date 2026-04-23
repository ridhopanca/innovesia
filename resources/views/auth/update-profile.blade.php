@extends('layouts.admin')

@push('styles')
<style>
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .input-field {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .input-field:focus {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(102, 126, 234, 0.15);
    }

    .save-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .save-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(102, 126, 234, 0.4);
    }
</style>
@endpush

@section('content')
<div class="p-8 max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center gap-4 mb-3">
            <div class="w-12 h-12 rounded-2xl gradient-bg flex items-center justify-center shadow-lg">
                <span class="material-icons-outlined text-white text-2xl">lock_reset</span>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Update Profile</h1>
                <p class="text-slate-500 text-sm">Update your profile information</p>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 rounded-2xl p-4 mb-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center">
                <span class="material-icons-outlined text-green-600">check_circle</span>
            </div>
            <div>
                <p class="font-semibold text-green-800">Success!</p>
                <p class="text-green-600 text-sm">{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white rounded-2xl p-8 shadow-lg border border-slate-100">
        <form method="POST" action="/update-profile" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Name</label>
                <div class="relative">
                    <span class="material-icons-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">person</span>
                    <input type="text" name="name" required
                        class="input-field w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none bg-slate-50"
                        placeholder="Enter your name" value="{{ auth()->user()->name }}">
                </div>
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                <div class="relative">
                    <span class="material-icons-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">email</span>
                    <input type="email" name="email" required
                        class="input-field w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none bg-slate-50"
                        placeholder="Enter your email" value="{{ auth()->user()->email }}">
                </div>
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Password -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Current Password</label>
                <div class="relative">
                    <span class="material-icons-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">lock</span>
                    <input type="password" name="current_password" required
                        class="input-field w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none bg-slate-50"
                        placeholder="Enter your current password">
                </div>
                @error('current_password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Password -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">New Password</label>
                <div class="relative">
                    <span class="material-icons-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">lock_outline</span>
                    <input type="password" name="password" required minlength="8"
                        class="input-field w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none bg-slate-50"
                        placeholder="Minimum 8 characters">
                </div>
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Confirm New Password</label>
                <div class="relative">
                    <span class="material-icons-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">lock_outline</span>
                    <input type="password" name="password_confirmation" required
                        class="input-field w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none bg-slate-50"
                        placeholder="Repeat new password">
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-4 pt-4">
                <a href="/cms" class="px-6 py-3 rounded-xl border border-slate-200 text-slate-600 font-medium hover:bg-slate-50 transition-colors">
                    Back to home
                </a>
                <a href="/cms" class="px-6 py-3 rounded-xl border border-slate-200 text-slate-600 font-medium hover:bg-slate-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="save-btn px-6 py-3 rounded-xl text-white font-medium flex items-center gap-2">
                    <span class="material-icons-outlined">save</span>
                    <span>Save</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="min-h-screen py-20 bg-linear-to-br from-slate-50 to-slate-100">
    <div class="max-w-4xl mx-auto px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-slate-800 mb-4">Contact Us</h1>
            <p class="text-slate-600 text-lg">Have a project in mind? Let's work together.</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 rounded-2xl p-4 mb-8">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-green-600">check_circle</span>
                <p class="text-green-800 font-medium">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        <!-- Contact Form -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12">
            <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
                @csrf

                <!-- Name & Email Row -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Full Name *</label>
                        <input type="text" name="name" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all bg-slate-50"
                            placeholder="John Doe"
                            value="{{ old('name') }}">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Email Address *</label>
                        <input type="email" name="email" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all bg-slate-50"
                            placeholder="john@example.com"
                            value="{{ old('email') }}">
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Phone & Company Row -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Phone Number</label>
                        <input type="tel" name="phone"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all bg-slate-50"
                            placeholder="+62 812-3456-7890"
                            value="{{ old('phone') }}">
                        @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Company -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Company / Organization</label>
                        <input type="text" name="company"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all bg-slate-50"
                            placeholder="Your Company Name"
                            value="{{ old('company') }}">
                        @error('company')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Subject -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Subject *</label>
                    <select name="subject" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all bg-slate-50">
                        <option value="">Select a subject</option>
                        <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                        <option value="Project Collaboration" {{ old('subject') == 'Project Collaboration' ? 'selected' : '' }}>Project Collaboration</option>
                        <option value="Service Request" {{ old('subject') == 'Service Request' ? 'selected' : '' }}>Service Request</option>
                        <option value="Career Opportunity" {{ old('subject') == 'Career Opportunity' ? 'selected' : '' }}>Career Opportunity</option>
                        <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('subject')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Message *</label>
                    <textarea name="message" required rows="5"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all bg-slate-50 resize-none"
                        placeholder="Tell us about your project or inquiry...">{{ old('message') }}</textarea>
                    @error('message')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Honeypot field (anti-spam) -->
                <div class="hidden">
                    <input type="text" name="website" value="">
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between pt-4">
                    <p class="text-sm text-slate-500">
                        <span class="material-symbols-outlined text-sm align-middle">info</span>
                        We'll get back to you within 24 hours.
                    </p>
                    <button type="submit"
                        class="bg-gradient-to-br from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-8 py-3 rounded-xl font-semibold transition-all hover:shadow-lg hover:-translate-y-0.5 flex items-center gap-2">
                        <span class="material-symbols-outlined">send</span>
                        Send Message
                    </button>
                </div>
            </form>
        </div>

        <!-- Contact Info Cards -->
        <div class="grid md:grid-cols-2 gap-6 mt-12">
            <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
                <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-blue-600">email</span>
                </div>
                <h3 class="font-semibold text-slate-800 mb-1">Email</h3>
                <a href="mailto:hello@innovesia.com" class="text-slate-600 hover:text-blue-600 text-sm">hello@innovesia.com</a>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
                <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-blue-600">location_on</span>
                </div>
                <h3 class="font-semibold text-slate-800 mb-1">Location</h3>
                <p class="text-slate-600 text-sm">Jakarta, Indonesia</p>
            </div>
        </div>
    </div>
</div>
@endsection
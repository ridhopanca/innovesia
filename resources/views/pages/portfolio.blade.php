@extends('layouts.app')
@section('main_classes', 'pt-32 pb-24')
@section('footer_classes', 'bg-slate-50 border-t border-slate-200/50')
@section('content')

@include('sections.portfolio.hero', ['data' => $sections['hero'] ?? []])
@include('sections.portfolio.case', ['data' => $sections['case'] ?? []])
@include('sections.portfolio.testimonial', ['data' => $sections['testimonial'] ?? []])
@include('sections.portfolio.cta', ['data' => $sections['cta'] ?? []])

@endsection
@extends('layouts.app')
@section('main_classes', 'pt-32 pb-24')
@section('footer_classes', 'bg-slate-50 border-t border-slate-200/50')
@section('content')

@if(isset($sections['hero']))
@include('sections.portfolio.hero', ['data' => $sections['hero']])
@endif
@if(isset($sections['case']))
@include('sections.portfolio.case', ['data' => $sections['case']])
@endif
@if(isset($sections['testimonial']))
@include('sections.portfolio.testimonial', ['data' => $sections['testimonial']])
@endif
@if(isset($sections['cta']))
@include('sections.portfolio.cta', ['data' => $sections['cta']])
@endif

@endsection
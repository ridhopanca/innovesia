@extends('layouts.app')

@section('footer_classes', 'bg-slate-50 border-t border-slate-200/50')

@section('content')

@include('sections.community.hero', ['data' => $sections['hero'] ?? []])
@include('sections.community.program', ['data' => $sections['program'] ?? []])
@include('sections.community.timeline', ['data' => $sections['timeline'] ?? []])
@include('sections.community.documentation', ['data' => $sections['documentation'] ?? []])
@include('sections.community.prototype', ['data' => $sections['prototype'] ?? []])
@include('sections.community.video', ['data' => $sections['video'] ?? []])
@include('sections.community.cta', ['data' => $sections['cta'] ?? []])

@endsection
@extends('layouts.app')

@section('footer_classes', 'bg-slate-50 dark:bg-slate-950 w-full border-t border-slate-200/50 dark:border-slate-800/50')
@section('content')

@include('sections.home.hero', ['data' => $sections['hero'] ?? []])
@include('sections.home.metrics', ['data' => $sections['metrics'] ?? []])
@include('sections.home.services', ['data' => $sections['services'] ?? []])
@include('sections.home.portfolio-preview', ['data' => $sections['portfolio-preview'] ?? []])
@include('sections.home.instagram', ['data' => $sections['instagram'] ?? []])

@endsection
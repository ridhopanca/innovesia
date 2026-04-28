@extends('layouts.app')

@section('footer_classes', 'bg-slate-50 dark:bg-slate-950 w-full border-t border-slate-200/50 dark:border-slate-800/50')
@section('content')

@if(isset($sections['hero']))
@include('sections.home.hero', ['data' => $sections['hero']])
@endif
@if(isset($sections['metrics']))
@include('sections.home.metrics', ['data' => $sections['metrics']])
@endif
@if(isset($sections['services']))
@include('sections.home.services', ['data' => $sections['services']])
@endif
@if(isset($sections['portfolio-preview']))
@include('sections.home.portfolio-preview', ['data' => $sections['portfolio-preview']])
@endif
@if(isset($sections['instagram']))
@include('sections.home.instagram', ['data' => $sections['instagram']])
@endif

@endsection
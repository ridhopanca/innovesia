@extends('layouts.app')

@section('footer_classes', 'w-full border-t border-slate-200/50 dark:border-slate-800/50 bg-slate-50 dark:bg-slate-950')
@section('content')

@include('sections.about.hero', ['data' => $sections['hero'] ?? []])
@include('sections.about.vision-mission', ['data' => $sections['vision-mission'] ?? []])
@include('sections.about.approach', ['data' => $sections['approach'] ?? []])
@include('sections.about.timeline', ['data' => $sections['timeline'] ?? []])
@include('sections.about.team', ['data' => $sections['team'] ?? []])

@endsection
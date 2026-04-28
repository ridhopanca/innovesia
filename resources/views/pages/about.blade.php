@extends('layouts.app')

@section('footer_classes', 'w-full border-t border-slate-200/50 dark:border-slate-800/50 bg-slate-50 dark:bg-slate-950')
@section('content')

@if(isset($sections['hero']))
@include('sections.about.hero', ['data' => $sections['hero']])
@endif
@if(isset($sections['vision-mission']))
@include('sections.about.vision-mission', ['data' => $sections['vision-mission']])
@endif
@if(isset($sections['approach']))
@include('sections.about.approach', ['data' => $sections['approach']])
@endif
@if(isset($sections['timeline']))
@include('sections.about.timeline', ['data' => $sections['timeline']])
@endif
@if(isset($sections['team']))
@include('sections.about.team', ['data' => $sections['team']])
@endif

@endsection
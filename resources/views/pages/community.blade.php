@extends('layouts.app')

@section('footer_classes', 'bg-slate-50 border-t border-slate-200/50')

@section('content')

@if(isset($sections['hero']))
@include('sections.community.hero', ['data' => $sections['hero']])
@endif
@if(isset($sections['program']))
@include('sections.community.program', ['data' => $sections['program']])
@endif
@if(isset($sections['timeline']))
@include('sections.community.timeline', ['data' => $sections['timeline']])
@endif
@if(isset($sections['documentation']))
@include('sections.community.documentation', ['data' => $sections['documentation']])
@endif
@if(isset($sections['prototype']))
@include('sections.community.prototype', ['data' => $sections['prototype']])
@endif
@if(isset($sections['video']))
@include('sections.community.video', ['data' => $sections['video']])
@endif
@if(isset($sections['cta']))
@include('sections.community.cta', ['data' => $sections['cta']])
@endif

@endsection
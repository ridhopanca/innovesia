@extends('layouts.app')
@section('footer_classes', 'w-full border-t border-slate-200/50 bg-slate-50')
@section('content')

@if(isset($sections['hero']))
@include('sections.product.hero', ['data' => $sections['hero']])
@endif
@if(isset($sections['process']))
@include('sections.product.process', ['data' => $sections['process']])
@endif
@if(isset($sections['service']))
@include('sections.product.service', ['data' => $sections['service']])
@endif
@if(isset($sections['cta']))
@include('sections.product.cta', ['data' => $sections['cta']])
@endif

@endsection
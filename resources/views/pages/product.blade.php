@extends('layouts.app')
@section('footer_classes', 'w-full border-t border-slate-200/50 bg-slate-50')
@section('content')

@include('sections.product.hero', ['data' => $sections['hero'] ?? []])
@include('sections.product.process', ['data' => $sections['process'] ?? []])
@include('sections.product.service', ['data' => $sections['service'] ?? []])
@include('sections.product.cta', ['data' => $sections['cta'] ?? []])

@endsection
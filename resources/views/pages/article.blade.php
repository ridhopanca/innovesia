@extends('layouts.app')
@section('main_classes', 'pt-32 pb-24 max-w-7xl mx-auto px-8')
@section('footer_classes', 'w-full border-t border-slate-200/50 dark:border-slate-800/50 bg-slate-50 dark:bg-slate-950')
@section('content')

@include('sections.article.header', ['data' => $sections['header'] ?? []])
@include('sections.article.featured', ['data' => $sections['featured'] ?? []])
@include('sections.article.article', ['data' => $sections['article'] ?? []])

@endsection
<!-- resources/views/components/toast.blade.php -->
@props([
'message' => '',
'type' => 'success',
'showToast' => true
])

@php
// Define color classes
$colorClasses = [
'success' => [
'bg' => 'bg-color-success-500',
'text' => 'text-white',
'icon' => 'fas fa-check'
],
'error' => [
'bg' => 'bg-color-danger-500',
'text' => 'text-white',
'icon' => 'fas fa-exclamation'
],
// Add other types as needed
];

$toastType = $colorClasses[$type] ?? $colorClasses['success'];
@endphp

<div x-data="{ showToast: @entangle('showToast') }" x-show="showToast" x-transition
    :class="toastType.bg + ' ' + toastType.text"
    class="fixed top-24 right-5 z-50 flex items-center w-full max-w-xs p-4 rounded-lg shadow bg-white" role="alert">
    <div
        :class="toastType.bg + ' ' + toastType.text + ' ' + 'inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg'">
        <span>
            <i :class="toastType.icon"></i>
        </span>
    </div>
    <div class="ml-3 text-sm font-normal">{{ $message }}</div>
    <button type="button" @click="showToast = false"
        class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
        aria-label="Close">
        <span><i class="fas fa-times"></i></span>
    </button>
</div>
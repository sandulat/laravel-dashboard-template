<div class="ldt-flex ldt-items-center ldt-justify-between ldt-mb-5 ldt-rounded ldt-bg-{{ $color }}-200 ldt-border ldt-border-{{ $color }}-400 ldt-text-{{ $color }}-900 ldt-text-sm ldt-p-4 ldt-w-full">
    {{ $message }}
    <button onClick="event.preventDefault(); event.target.parentNode.remove();">
        <svg class="ltd-fill-current ldt-opacity-50 ldt-pointer-events-none" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"><g class="nc-icon-wrapper" fill="currentColor"><path d="M10.707,1.293a1,1,0,0,0-1.414,0L6,4.586,2.707,1.293A1,1,0,0,0,1.293,2.707L4.586,6,1.293,9.293a1,1,0,1,0,1.414,1.414L6,7.414l3.293,3.293a1,1,0,0,0,1.414-1.414L7.414,6l3.293-3.293A1,1,0,0,0,10.707,1.293Z" fill="currentColor"/></g></svg>
    </button>
</div>

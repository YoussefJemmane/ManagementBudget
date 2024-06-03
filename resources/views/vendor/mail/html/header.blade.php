@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Ibn Tofail University')
Ibn Tofail University
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
